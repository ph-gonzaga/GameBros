<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', 'HomeController@show');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search/category/{category}', 'HomeController@searchCategory')->name('search-category');
Route::get('/search/tag/{tag}', 'HomeController@searchTag')->name('search-tag');
Route::get('/show/{product}', 'HomeController@showProduct')->name('show-product');

Route::get('/search', 'HomeController@search')->name('search');

Route::middleware(['auth'])->group(function(){
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
    Route::get('/cart', 'CartsController@index')->name('cart');
    Route::get('/cart/{product}/store', 'CartsController@store')->name('cart-store');
    Route::get('/cart/{product}/remove', 'CartsController@destroy')->name('cart-remove');
    Route::get('/cart/remove', 'CartsController@destroyCart')->name('cart-remove-all');

    Route::get('/cart/checkout', function(){
        return redirect()->route('home');
    });
    Route::post('/cart/checkout', 'CartsController@checkout')->name('cart-checkout');

    Route::resource('orders', 'OrderController');
    Route::get('/order', 'OrderController@index')->name('order');
    Route::get('/search/order', 'OrderController@searchOrder')->name('search-order');
    Route::get('/order/show/{order}', 'OrderController@show')->name('order-show');

});
Route::middleware(['auth', 'admin'])->group(function(){
    Route::resource('categories', 'CategoriesController');
    Route::resource('products', 'ProductsController');
    Route::get('products-catalog', 'ProductsController@search')->name('search-products');
    Route::get('products-catalog/tag/{tag}', 'ProductsController@searchTag')->name('search-products-tag');
    Route::get('products-catalog/category/{category}', 'ProductsController@searchCategory')->name('search-products-category');
    Route::get('trashed-products', 'ProductsController@trashed')->name('trashed-products.index');
    Route::get('trashed-categories', 'CategoriesController@trashed')->name('trashed-categories.index');
    Route::put('restore-products/{product}', 'ProductsController@restore')->name('restore-products.update');
    Route::put('restore-categories/{category}', 'CategoriesController@restore')->name('restore-categories.update');
    Route::resource('tags', 'TagsController');
    Route::get('trashed-tags', 'TagsController@trashed')->name('trashed-tags.index');
    Route::put('restore-tags/{tag}', 'TagsController@restore')->name('restore-tags.update');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::put('users/{user}/change-admin', 'UsersController@changeAdmin')->name('users.change-admin');
});