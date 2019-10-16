<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

    /**
    $user = \App\Models\User::find(1);
    return new \App\Mail\WellcomeUser($user);
    **/

    /**
    $message = new App\Models\Message();
    $message->name="juan";
    $message->email="jcperdomoq@uqvirtual.edu.co";
    return new  App\Mail\WellcomeUser();
    **/

    $shopping = App\Models\Shopping::find(1);
    return new \App\Mail\ShoppingMail($shopping);

});
