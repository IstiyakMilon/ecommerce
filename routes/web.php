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

// Backend Route

Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
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
