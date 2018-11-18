<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\item;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\Payer;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use Carbon\Carbon;
use App\Product;
use App\inscription;
use Session;
use Redirect;
class PaymentController extends Controller
{
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
                $payer->setPaymentMethod('paypal');
        $item_list = new ItemList();
        
            $item_1 = new Item();
            $item_1->setName('Compra en linea') /** item name **/
                        ->setCurrency('MXN')
                        ->setQuantity(1)
                        ->setPrice($request->total); /** unit price **/
           
                    $item_list->setItems(array($item_1));    
        $amount = new Amount();
                $amount->setCurrency('MXN')
                    ->setTotal($request->total);
        $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Pago con paypal');
        $redirect_urls = new RedirectUrls();
                $redirect_urls->setReturnUrl(route('paysuccess')) /** Specify return URL **/
                    ->setCancelUrl(route('paycancel'));
        $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
                //  dd($payment->create($this->_api_context));exit;
                // dd($payment);
                try {
                    $payment->create($this->_api_context);
                    } 
                catch (\PayPal\Exception\PPConnectionException $ex) {
                        if (\Config::get('app.debug')) {
                        \Session::put('error', 'Connection timeout');
                                        return Redirect::route('paywithpaypal');
                        } else {
                        \Session::put('error', 'Some error occur, sorry for inconvenient');
                                        return Redirect::route('paywithpaypal');
                        }
                    }
        foreach ($payment->getLinks() as $link) {
        if ($link->getRel() == 'approval_url') {
        $redirect_url = $link->getHref();
                        break;
        }
        }
        /** add payment ID to session **/
                Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
        /** redirect to paypal **/
                    return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
                return Redirect::route('paywithpaypal');
    }
    
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
                Session::forget('paypal_payment_id');
                if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        \Session::put('error', 'Payment failed');
                    return Redirect::route('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
                $execution = new PaymentExecution();
                $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
                $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
        \Session::put('success', 'Payment success');
                    return Redirect::route('/');
        }
        \Session::put('error', 'Payment failed');
                return Redirect::route('/');
    }
}