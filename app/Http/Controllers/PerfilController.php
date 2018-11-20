<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

	 public function me(){
        $user = auth()->user();
        return view('User.perfil', compact('user'));
    }
     public function edit(){
        $user = auth()->user();
        return view('User.edit', compact('user'));
    }

     public function update(Request $request){

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre.',
            'name.min' => 'Tu nombre debe tener al menos 3 caracteres.',
            'name.max' => 'Tu nombre debe tener un maximo de 25 caracteres.',
            'username.required' => 'Es necesario ingresar un nombre de usuario.',
            'username.min' => 'Tu nombre de usuario debe tener al menos 3 caracteres.',
            'username.max' => 'Tu nombre de usuario no debe superar los 10 caracteres.',
            'address.min' => 'Tu direccion debe ser de la forma Colonia Ejemplo Calle: ejemplo CP:333.',
            'address.required' => 'Necesitamos un domicilio para enviar futuras compras.',
            'phone.numeric' => 'Tu telefono celular solo debe presentar numeros'
           
        ];
        $rules = [
            'name' => 'required|min:3|max:25',
            'username' => 'required|min:3|max:10',
            'address' => 'required|min:7',
            'phone' => 'numeric'
        ];
        $this->validate($request, $rules, $messages);







        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return redirect('/mi-perfil')->with('alert', 'Cambios guardados');
    }
}
