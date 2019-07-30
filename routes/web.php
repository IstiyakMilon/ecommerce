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
// Frontend Route
Route::get('/', 'HomeController@index');

// Home Product by Category
Route::get('/product_by_category/{category_id}', 'HomeController@showProduct_by_Category');

// Home Product by Brand
Route::get('/product_by_brand/{brand_id}', 'HomeController@showProduct_by_brand');

// Home View Product details

Route::get('/view_product/{product_id}', 'HomeController@product_details_by_id');

// Backend Route

Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');

// Category Route

Route::get('/add-category', 'CategoryController@index');
Route::get('/all-category', 'CategoryController@all_category');

Route::post('/save-category', 'CategoryController@save_category');

Route::get('/inactive_category/{category_id}', 'CategoryController@inactive_category');
Route::get('/active_category/{category_id}', 'CategoryController@active_category');

Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');

// Brand Route

Route::get('/add-brand', 'BrandController@index');

Route::get('/all-brand', 'BrandController@show_brand');

Route::post('/save-brand', 'BrandController@save_brand');

Route::get('/inactive-brand/{brand_id}', 'BrandController@inactive_brand');
Route::get('/active-brand/{brand_id}', 'BrandController@active_brand');

Route::get('/edit-brand/{brand_id}', 'BrandController@edit_brand');
Route::post('/update-brand/{brand_id}', 'BrandController@update_brand');
Route::get('/delete-brand/{brand_id}', 'BrandController@delete_brand');

//Product route
Route::get('/add-product', 'ProductController@index');
Route::post('/save-product', 'ProductController@save_product');

Route::get('/all-product', 'ProductController@all_product');

Route::get('/inactive_product/{product_id}', 'ProductController@inactive_product');
Route::get('/active_product/{product_id}', 'ProductController@active_product');

Route::get('/edit-product/{product_id}', 'ProductController@edit_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');

// Slider Route

Route::get('/add-slider', 'SliderController@index');

Route::get('/all-slider', 'SliderController@all_slider');

Route::post('/save-slider', 'SliderController@save_slider');

Route::get('/inactive-slider/{slider_id}', 'SliderController@inactive_slider');
Route::get('/active-slider/{slider_id}', 'SliderController@active_slider');

Route::get('/delete-slider/{slider_id}', 'SliderController@delete_slider');
