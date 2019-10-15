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

Route::get('mailable', function () {
    $invoice = \App\Models\User::find(1);

    return new \App\Mail\WellcomeUser($invoice);
});
