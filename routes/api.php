<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1'], function () {

    //Addresses ===========================================================================================================.
    Route::apiResource('addresses', 'Api\Addresses\AddressController');

    // Oauth ===========================================================================================================.
    Route::post('oauth/login', 'Api\passport\PassportController@login');
    Route::post('oauth/register', 'Api\passport\PassportController@register');
    Route::post('oauth/facebook', 'Api\passport\PassportController@facebook');
    Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    Route::get('oauth/check-token', 'Api\passport\PassportController@checkToken');

    // Password ========================================================================================================.
    Route::post('password/email', 'Auth\ForgotPasswordController@getResetPassword');
    Route::post('password/reset', 'Auth\ResetPasswordController@setResetPassword');

    // Permissions =====================================================================================================.
    Route::apiResource('permissions', 'Api\permission\PermissionController');
    Route::apiResource('permissions.roles', 'Api\permission\PermissionRoleController');
    Route::apiResource('permissions.users', 'Api\permission\PermissionUserController');
    Route::apiResource('roles.permissions', 'Api\permission\RolePermissionController');

    //Roles ===========================================================================================================.
    Route::apiResource('roles', 'Api\permission\RoleController');
    Route::apiResource('roles.users', 'Api\permission\RoleUserController');

    //Users ===========================================================================================================.
    Route::post('users/check-email', 'Api\users\UserController@checkEmail'); //No Order
    Route::get('users/me', 'Api\users\UserController@me'); //No Order
    Route::apiResource('users', 'Api\users\UserController')->except(['me','checkEmail']);
    Route::apiResource('users.roles', 'Api\users\UserRoleController');
});
