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
Route::get('lang', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::group(['prefix' =>''],function(){
    Route::get('/',['as' => 'login','uses' => 'LoginController@index']);
	Route::post('/dologin',['as' => 'dologin','uses' => 'LoginController@doLogin']);
	Route::any('/register',['as' => 'register','uses' => 'LoginController@register']);
	Route::any('/forgot_password_mail',['as' => 'forgot_password_mail','uses' => 'LoginController@forgot_password_mail']);
	Route::any('/reset-password/{token}',['as' => 'reset-password','uses' => 'LoginController@reset_password']);
    Route::get('/logout', ['as' => 'admin_logout','uses' => 'LoginController@doLogout']);
    Route::group(['middleware' => ['auth']],function(){
        Route::any('/dashboard',['as' => 'dashboard','uses' => 'DashboardController@index']);
        Route::resource('/clients', 'ClientController');
        Route::resource('/labours', 'LabourController');
        Route::resource('/items', 'ItemController');
    });
});


Route::get('/storage-link', function() { $exitCode = Artisan::call('storage:link');  return 1; });