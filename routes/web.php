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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','Admin\LoginController@loginForm')->name('login')->middleware('AdminGuest');
Route::post('/login/check','Admin\LoginController@loginCheck')->name('loginCheck')->middleware('AdminGuest');

Route::group(['prefix'=>'admin','middleware'=>['AdminAuth']],function(){
    Route::get('/' ,'Admin\HomeController@index')->name('admin.home');
    Route::resource('/Category','Admin\CategoryController');
    Route::resource('/Enquiry','Admin\EnquiryController');
    Route::resource('/Applicant','Admin\ApplicantController');
    Route::get('/checklist','Admin\ApplicantController@checklist')->name('checklist');
    Route::get('/logout','Admin\LoginController@logout')->name('logout');
});
