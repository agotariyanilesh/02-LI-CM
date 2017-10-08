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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/login','Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Admin\AdminLoginController@login')->name('admin.login.submit');
    //Route::post('/logout','Admin\AdminLoginController@adminLogout')->name('admin.logout');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

	Route::get('/users/datatable','UserManageController@getdatatable')->name('getusertable');
    Route::resource('/users','UserManageController');

    Route::resource('/category','Admin\CategoryController');

    Route::resource('/contentType','Admin\ContentTypeController');

    Route::resource('/content','Admin\ContentController');

    Route::resource('/faq','Admin\FaqController');

    Route::resource('/faqCat','Admin\FaqCategoryController');  

    Route::get('siteSetting','Admin\SiteSettingController@edit');
    Route::post('site_setting/info','Admin\SiteSettingController@info')->name('admin.site_setting.info');  

    Route::resource('/email','Admin\EmailTemplateController');

    Route::get('/profile','Admin\ProfileController@index');
    Route::post('/profile/info','Admin\ProfileController@info');
    Route::post('/profile/password','Admin\ProfileController@password');
});
