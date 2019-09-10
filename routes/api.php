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

    //Categories ===========================================================================================================.
    Route::apiResource('categories', 'Api\Categories\CategoryController');
    Route::apiResource('categories.products', 'Api\Categories\CategoryProductController');

    //Cities ===========================================================================================================.
    Route::apiResource('cities', 'Api\Cities\CityController');

    //Departments ===========================================================================================================.
    Route::apiResource('departments', 'Api\Departments\DepartmentController');

    //DetailShoppings ===========================================================================================================.
    Route::apiResource('detail-shoppings', 'Api\DetailShoppings\DetailShoppingController');

    //Discounts ===========================================================================================================.
    Route::apiResource('discounts', 'Api\Discounts\DiscountController');

    //Images ===========================================================================================================.
    Route::apiResource('images', 'Api\Images\ImageController');

    //Messages ===========================================================================================================.
    Route::apiResource('messages', 'Api\Messages\MessageController');

    //NutritionalFacts ===========================================================================================================.
    Route::apiResource('nutritional-facts', 'Api\NutritionalFacts\NutritionalFactController');

    // Passport ===========================================================================================================.
    Route::post('oauth/login', 'Api\passport\PassportController@login');
    Route::post('oauth/register', 'Api\passport\PassportController@register');
    Route::post('oauth/facebook', 'Api\passport\PassportController@facebook');
    Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
    Route::get('oauth/check-token', 'Api\passport\PassportController@checkToken');

    // Password ========================================================================================================.
    Route::post('password/email', 'Auth\ForgotPasswordController@getResetPassword');
    Route::post('password/reset', 'Auth\ResetPasswordController@setResetPassword');

    //Payments ===========================================================================================================.
    Route::apiResource('payments', 'Api\Payments\PaymentController');

    // Permissions =====================================================================================================.
    Route::apiResource('permissions', 'Api\permission\PermissionController');
    Route::apiResource('permissions.roles', 'Api\permission\PermissionRoleController');
    Route::apiResource('permissions.users', 'Api\permission\PermissionUserController');

    //Products ===========================================================================================================.
    Route::post('products/search', 'Api\Products\ProductController@search');
    Route::apiResource('products', 'Api\Products\ProductController')->except('search');
    Route::apiResource('products.categories', 'Api\Products\ProductCategoryController');
    Route::apiResource('products.tags', 'Api\Products\ProductTagController');

    //Roles ===========================================================================================================.
    Route::apiResource('roles', 'Api\permission\RoleController');
    Route::apiResource('roles.permissions', 'Api\permission\RolePermissionController');
    Route::apiResource('roles.users', 'Api\permission\RoleUserController');

    //Shippings ===========================================================================================================.
    Route::apiResource('shippings', 'Api\Shippings\ShippingController');

    //Shoppings ===========================================================================================================.
    Route::apiResource('shoppings', 'Api\Shoppings\ShoppingController');

    //Sliders ===========================================================================================================.
    Route::apiResource('sliders', 'Api\Sliders\SliderController');

    //StatusOrders ===========================================================================================================.
    Route::apiResource('status-orders', 'Api\StatusOrders\StatusOrderController');

    //Tags ===========================================================================================================.
    Route::apiResource('tags', 'Api\Tags\TagController');

    //Users ===========================================================================================================.
    Route::post('users/check-email', 'Api\users\UserController@checkEmail'); //No Order
    Route::get('users/me', 'Api\users\UserController@me'); //No Order
    Route::apiResource('users', 'Api\users\UserController')->except(['me', 'checkEmail']);
    Route::apiResource('users.roles', 'Api\users\UserRoleController');
    Route::apiResource('users.discounts', 'Api\users\UserDiscountController');
    Route::apiResource('users.wishlists', 'Api\users\UserWishlistController');

    //Wishlists ===========================================================================================================.
    Route::apiResource('wishlists', 'Api\Wishlists\WishlistController');
});
