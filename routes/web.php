<?php

use App\Category;
use App\Http\Controllers\AuthUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqControllerbru;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Artisan;

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

//view App
Route::get('', 'IndexController@index')->name('index');
Route::get('storagelink', function () {
	Artisan::call('storage:link');
});

Route::get('clear', function(){
	Artisan::call('config:cache');
});

Route::get('contact', 'PageController@contact')->name('contact');
Route::post('contact', 'UserContactController@store')->name('submit.contact');
Route::get('checkout-account', 'PageController@checkoutAccount')->name('checkout-account');
Route::get('detail-product/{name}', 'PageController@detailProduct')->name('detail-product');
Route::get('detail-private-vault/{name}', 'PageController@detailVault')->name('detail-vault');
Route::get('private-vault', 'PageController@privateVault')->name('private-vault');
Route::get('browse-brand', 'PageController@browseBrand')->name('browse-brand');
Route::get('browse-category', 'PageController@browseCategory')->name('browse-category');
Route::get('user-trade', 'PageController@trade')->name('user.trade');
Route::post('user-trade', 'UserTradeController@store')->name('trade.upload');
Route::get('about-us', 'PageController@aboutUs')->name('about-us');
Route::post('buynow', 'PageController@buyNow')->name('buynow');
Route::get('account-verify', 'AuthUserController@verify')->name('verify.account');
Route::get('search', 'SearchController@index')->name('search');
Route::post('search-data', 'SearchController@data')->name('search.data');

Route::group(['middleware' => 'user'], function () {
	Route::get('cart', 'PageController@cart')->name('cart');
	Route::get('account-page', 'PageController@accountPage')->name('account-page');
	Route::put('account-page/{id}', 'UserController@update')->name('update.account');
	Route::post('add-address', 'UserAddressController@store')->name('add.address');
	Route::put('address/{id}', 'UserAddressController@show')->name('show.address');
	Route::post('address/{id}', 'UserAddressController@update')->name('update.address');
	Route::post('cart', 'CartController@store')->name('add.to_cart');
	Route::delete('cart', 'CartController@destroy')->name('delete.in_cart');
	Route::post('checkout', 'CartController@checkout')->name('checkout');
	Route::post('get-address', 'UserAddressController@getAddress');
	Route::get('checkout', function(){
		return redirect()->route('cart');
	});
	Route::patch('logout-user', 'UserController@logout')->name('user.logout');
	
});
Route::patch('checkout', 'TransactionController@store')->name('make.order');
Route::get('buynow', function(){
	return redirect()->route('index');
});

Route::get('search', 'PageController@search')->name('search');

Route::group(['middleware' => 'guest.user'], function () {
	Route::get('registration', 'AuthUserController@registration')->name('registration');
	Route::post('registration', 'AuthUserController@submitRegistration')->name('registration.store');
	Route::get('sign-in', 'AuthUserController@login')->name('sign-in');
	Route::post('sign-in', 'AuthUserController@submitLogin')->name('submit.sign-in');
	Route::get('forgot-password', 'UserForgotPasswordController@index')->name('forgot.password');
	Route::post('forgot-password', 'UserForgotPasswordController@store')->name('forgot.password.email');
	Route::get('reset-password', 'UserForgotPasswordController@update')->name('forgot.password.form');
	Route::post('reset-password', 'UserForgotPasswordController@reset')->name('reset.password.submit');
});
Route::group(['middleware' => 'admin'], function () {

	Route::resource('dashboard', 'DashboardController');
	// Route::resource('faq', 'FaqController');
	
	Route::get('product/code', 'ProductController@getCode');
	Route::resource('product', 'ProductController');
	Route::resource('home-product', 'HomeProductController');

	Route::get('product/category/{id}', 'ProductController@category');
	Route::get('product/subcategory/{id}', 'ProductController@subcategory');
	Route::post('product/delete-image', 'ProductController@deleteImage');
	Route::get('profile', 'UserController@profile')->name('profile');
	Route::put('profile-update/{user}', 'UserController@profileUpdate')->name('profile.update');

	Route::resource('banner', 'BannerController');
	Route::get('banner/delete/{id}', 'BannerController@destroy')->name('banner.destroy');

	Route::resource('article', 'ArticleController');
	Route::get('article/delete/{id}', 'ArticleController@destroy')->name('article.destroy');
	Route::post('article-attach', 'ArticleController@attach')->name('article.attach.store');
	Route::post('article-attach-destroy', 'ArticleController@attachDestroy')->name('article.attach.destroy');

	Route::resource('user', 'UserController');
	Route::resource('brand', 'BrandController');

	Route::resource('about', 'AboutController');
	Route::post('about-attach', 'AboutController@attach')->name('about.attach.store');
	Route::post('about-attach-destroy', 'AboutController@attachDestroy')->name('about.attach.destroy');
	Route::delete('about/value/{id}', 'AboutController@valueDestroy');

	Route::resource('setting', 'SettingController');
	Route::resource('admin-private-vault', 'PrivateVaultController', [
		'names' => [
			'index' => 'vault.index',
			'show' => 'vault.show',
			'update' => 'vault.update',
			'store' => 'vault.store',
			'destroy' => 'vault.destroy',
			'create' => 'vault.create',
		]
	]);

	Route::resource('user-contact', 'UserContactController');

	Route::get('faq', 'FaqControllerbru@index')->name('faq.index');
	Route::get('faq/create', 'FaqControllerbru@create')->name('faq.create');
	Route::post('faq', 'FaqControllerbru@store')->name('faq.store');
	Route::get('faq/{faq:id}', 'FaqControllerbru@show')->name('faq.show');
	Route::put('faq/update/{faq:id}', 'FaqControllerbru@update')->name('faq.update');
	Route::get('faq/delete/{faq:id}', 'FaqControllerbru@destroy')->name('faq.destroy');
	Route::resource('category', 'CategoryController', [
		'names' => [
			'index' => 'category.index',
			'store' => 'category.store', 
			'update' => 'category.update', 
			'destroy' => 'category.destroy'
		]
	]);
	Route::resource('trade', 'UserTradeController');
	Route::delete('sub-category/{id}', 'CategoryController@deleteSub')->name('delete.sub-category');
	Route::get('sub-category-data/{id}', 'SubCategoryController@show')->name('data.sub-category');
	Route::resource('user', 'AdminUserController');
	Route::resource('partner', 'PartnerController');
	// Route::resource('transaction', 'TransactionController');
});

Auth::routes();
