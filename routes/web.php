<?php

use Illuminate\Support\Facades\Route;
use App\Mail\PrometricMail;

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
    Route::get('/EnquiryDetail/{id}','Admin\EnquiryController@Detail')->name('EnquiryDetail');
    Route::resource('/Applicant','Admin\ApplicantController');
    Route::resource('/CheckList','Admin\CheckListController');
    Route::resource('/Education','Admin\EducationController');
    Route::resource('/HealthLisence','Admin\HealthLisenceController');
    Route::resource('/Employment','Admin\EmploymentController');
    Route::resource('/ProgressFlow','Admin\ProgressFlowController');
    Route::get('/EnquirySMS','Admin\SMSController@EnquirySMS')->name('EnquirySMS');
    Route::get('/ApplicantSMS','Admin\SMSController@ApplicantSMS')->name('ApplicantSMS');
    Route::Post('/SendSMS','Admin\SMSController@SendSMS')->name('SendSMS');
    Route::get('/EnquiryMail','Admin\MailController@Enquiry')->name('EnquiryMail');
    Route::get('/ApplicantMail','Admin\MailController@Applicant')->name('ApplicantMail');
    Route::post('/SendMail','Admin\MailController@SendMail')->name('SendMail');
    Route::get('/Enquirymarkasread',function (){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->route('Enquiry.index');
    })->name('Enquirymarkasread');
    Route::get('/Applicantmarkasread',function (){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->route('Applicant.index');
    })->name('Applicantmarkasread');
    Route::get('/logout','Admin\LoginController@logout')->name('logout');
});
