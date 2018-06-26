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

Route::any('/', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::any('/cart/add', ['uses' => 'ShoppingController@addToCart']);
Route::any('/cart', ['uses' => 'ShoppingController@showCart', 'as' => 'cart']);
Route::any('/cart/remove/{id}', ['uses' => 'ShoppingController@removeProductFromCart', 'as' => 'removeProductFromCart']);
Route::any('/cart/checkout', ['uses' => 'ShoppingController@cartCheckout', 'as' => 'cartCheckout']);
Route::any('/cart/checkout/complete', ['uses' => 'ShoppingController@checkoutComplete', 'as' => 'checkoutComplete']);
Route::any('/cart/checkout/success', ['uses' => 'ShoppingController@checkoutSuccess', 'as' => 'checkoutSuccess']);
Route::any('/cart/updateCartQty', ['uses' => 'ShoppingController@updateCartQty', 'as' => 'updateCartQty']);
Route::any('/cart/subtotal', ['uses' => 'ShoppingController@getCartSubtotal', 'as' => 'getCartSubtotal']);

Route::any('/newsletter', ['uses' => 'NewsletterController@index', 'as' => 'joinNewsletter']);

Route::any('/product/getRandomProduct', ['uses' => 'ProductsController@getRandomProduct', 'as' => 'getRandomProduct']);
Route::any('/{category}/c', ['uses' => 'ProductsController@categoriesPage', 'as' => 'categoriesPage']);
Route::any('/{subcategory}/sc', ['uses' => 'ProductsController@subcategoriesPage', 'as' => 'subcategoriesPage']);
Route::any('/{searchKey}/s', ['uses' => 'ProductsController@searchProduct', 'as' => 'searchProduct', ]);
Route::any('/{productName}/p/{id}', ['uses' => 'ProductsController@index', 'as' => 'viewProduct']);


Route::any('/refund-policy', ['uses' => 'HomeController@refundPolicy', 'as' => 'refundPolicy']);
Route::any('/privacy-policy', ['uses' => 'HomeController@privacyPolicy', 'as' => 'privacyPolicy']);
Route::any('/terms-service', ['uses' => 'HomeController@termsService', 'as' => 'termsService']);



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/index', function () {
    $current_page = "index";

    return view('admin.index', compact('current_page'));
})->middleware('auth');

Route::get('/admin/clients/index', function () {
    $current_page = "clients";

    return view('admin.clients', compact('current_page'));
})->middleware('auth');

/**
 * Products routes
 */
Route::get('/admin/products/index', ['uses' => 'Admin\ProductsController@index'])->middleware('auth');
Route::post('/admin/products/addproduct', ['uses' => 'Admin\ProductsController@add_product'])->middleware('auth');
Route::get('/admin/products/deleteproduct/{id}', ['uses' => 'Admin\ProductsController@delete_product'])->middleware('auth');
Route::post('/admin/products/uploadproductimages', ['uses' => 'Admin\ProductsController@upload_product_images', 'as' => 'uploadProductImages'])->middleware('auth');

Route::get('/admin/orders/index', function () {
    $current_page = "orders";

    return view('admin.orders', compact('current_page'));
})->middleware('auth');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});