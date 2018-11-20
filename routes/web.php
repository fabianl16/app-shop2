<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');


Route::get('/consoles/{console}', 'ConsoleController@show');


Route::get('/paysuccess', 'CartController@update')->name('paysuccess');
Route::get('/paycancel', 'CartController@cancel')->name('paycancel');
Route::post('/paypal', 'PaymentController@payWithpaypal');



Route::middleware(['auth'])->group(function () {    //Rutas cliente
Route::get('/mispedidos', 'ProductController@order');
Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
Route::get('/mi-perfil', 'PerfilController@me')->name('mi-perfil');
Route::post('/update/mi-perfil', 'PerfilController@update');
Route::get('/edit/mi-perfil', 'PerfilController@edit');    
});




Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')
->group(function () {
	Route::get('/products', 'ProductController@index'); // listado
	Route::get('/products/create', 'ProductController@create'); // formulario
	Route::post('/products', 'ProductController@store'); // registrar
	Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario edición
	Route::post('/products/{id}/edit', 'ProductController@update');
	Route::get('/products/stock', 'ProductController@stock'); // actualizar
	Route::delete('/products/{id}', 'ProductController@destroy'); // form eliminar

	Route::get('/products/{id}/images', 'ImageController@index'); // listado
	Route::post('/products/{id}/images', 'ImageController@store'); // registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy'); // form eliminar	
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // destacar

	Route::get('/categories', 'CategoryController@index'); // listado
	Route::get('/categories/create', 'CategoryController@create'); // formulario
	Route::post('/categories', 'CategoryController@store'); // registrar
	Route::get('/categories/{category}/edit', 'CategoryController@edit'); // formulario edición
	Route::post('/categories/{category}/edit', 'CategoryController@update'); // actualizar
	Route::delete('/categories/{category}', 'CategoryController@destroy'); // form eliminar
    
    Route::get('/consoles', 'ConsoleController@index'); // listado
	Route::get('/consoles/create', 'ConsoleController@create'); // formulario
	Route::post('/consoles', 'ConsoleController@store'); // registrar
	Route::get('/consoles/{console}/edit', 'ConsoleController@edit'); // formulario edición
	Route::post('/consoles/{console}/edit', 'ConsoleController@update'); // actualizar
	Route::delete('/consoles/{console}', 'ConsoleController@destroy');

	 //Ventas
    Route::get('/ventas', 'VentasController@index');
    Route::get('/admin/ver-venta/{id}', 'VentasController@show');
	
});
