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
	return view('welcome');
});




Route::get('detail', [
	'as' 	=> 'detail',
	'uses' 	=> 'PageController@CallDetail',
]);


Route::get('indexAdmin', [
	'as' 	=> 'indexAdmin',
	'uses' 	=> 'PageController@indexAdmin',
]);   


Route::group(['prefix' => 'admin/product'], function () {
	Route::get('index', [
		'as' 	=> 'admin/index',
		'uses' 	=> 'PageController@indexAdmin',
	]);
	Route::get('getAdd', [
		'as' 	=> 'admin/product/getAdd',
		'uses' 	=> 'PageController@getAddProduct',
	]);
	Route::post('postAdd', [
		'as' 	=> 'admin/product/postAdd',
		'uses' 	=> 'ProductController@postAdd',
	]);

	Route::get('editProduct/{id}', [
		'as' 	=> 'admin/product/getEditProduct',
		'uses' 	=> 'PageController@getEditProduct',
	]);
	Route::post('editProduct/{id}', [
		'as' 	=> 'admin.product.postEditProduct',
		'uses' 	=> 'ProductController@postEditProduct'
	]);

	Route::get('deleteProduct/{id}', [
		'as' 	=> 'getDelete',
		'uses' 	=> 'ProductController@getDelete'
	]);

}); 
Route::group(['prefix' => 'admin/category'], function () {
	Route::get('display', [
		'as' 	=> 'admin/display',
		'uses' 	=> 'PageController@displayCategory',
	]);
	Route::get('getAdd', [
		'as' 	=> 'admin/category/getAdd',
		'uses' 	=> 'PageController@getAddCategory',
	]);
	Route::post('postAdd', [
		'as' 	=> 'admin/category/postAdd',
		'uses' 	=> 'TypeproductController@postAdd',
	]);

	Route::get('editProduct/{id}', [
		'as' 	=> 'admin/category/getEditProduct',
		'uses' 	=> 'PageController@getEditProduct',
	]);
	Route::post('editProduct/{id}', [
		'as' 	=> 'admin.category.postEditProduct',
		'uses' 	=> 'TypeproductController@postEditProduct'
	]);

	Route::get('deleteProduct/{id}', [
		'as' 	=> 'getDelete',
		'uses' 	=> 'TypeproductController@getDelete'
	]);

}); 


Route::group(['prefix' => 'user'], function () {
	Route::get('index', [
		'as' 	=> 'user/index',
		'uses' 	=> 'PageController@CallIndex',
	]);
	Route::get('category_Product/{id_category}', [
		'as' 	=> 'user/category_Product',
		'uses' 	=> 'PageController@category_Product',
	]);
	Route::get('detailProduct/{id_product}', [
		'as' 	=> 'user/detailProduct',
		'uses' 	=> 'PageController@detailProduct',
	]);

	Route::get('addToCart/{id_product}', [
		'as' 	=> 'user/addToCart',
		'uses' 	=> 'PageController@addToCart',
	]);
	Route::get('deleteItemCart/{id_product}', [
		'as' 	=> 'user/deleteItemCart',
		'uses' 	=> 'PageController@deleteItemCart',
	]);

	Route::get('checkOut', [
		'as' 	=> 'user/checkOut',
		'uses' 	=> 'PageController@getcheckOut',
	]);
	Route::post('postCheckOut', [
		'as' 	=> 'user/postCheckOut',
		'uses' 	=> 'PageController@postCheckOut',
	]);
}); 
