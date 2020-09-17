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



Route::get('/','Admin\loginController@loginForm')->name('login')->middleware('AdminGuest');
Route::post('/login/check','Admin\loginController@loginCheck')->name('loginCheck')->middleware('AdminGuest');

Route::group(['prefix'=>'admin','middleware'=>['AdminAuth']],function(){
    Route::group(['prefix'=>'','middleware'=>['Admin']],function(){
        Route::resource('/Admin','Admin\AdminController');

    });
    Route::get('/PasswordChangeView','Admin\AdminController@PasswordChangeView')->name('PasswordChangeView');
    Route::put('/PasswordChange{id}','Admin\AdminController@PasswordChange')->name('PasswordChange');
    Route::resource('/Category','Admin\CategoryController');
    /*Enquiry Route*/
    Route::resource('/Enquiry','Admin\EnquiryController')->except('show','index');
    Route::any('/Enquiry/index','Admin\EnquiryController@index')->name('Enquiry.index');
    Route::put('/Enquiry/ColorCodeUpdate/{id}','Admin\EnquiryController@ColorUpdate')->name('ColorUpdate');
    Route::get('/EnquiryDetail/{id}','Admin\EnquiryController@Detail')->name('EnquiryDetail');

    /*Applicant Route*/
    Route::resource('/Applicant','Admin\ApplicantController')->except('show','index');
    Route::any('/Applicant/index','Admin\ApplicantController@index')->name('Applicant.index');
    Route::put('/Applicant/ColorCodeUpdate/{id}','Admin\ApplicantController@ColorUpdate')->name('ApplicantColorUpdate');
    Route::get('/ApplicantDetail/{id}','Admin\ApplicantController@Detail')->name('ApplicantDetail');
    Route::resource('/CheckList','Admin\CheckListController');
    Route::resource('/Education','Admin\EducationController');
    Route::resource('/Education2','Admin\Education2Controller');
    Route::resource('/HealthLicense','Admin\HealthLisenceController');
    Route::resource('/HealthLicense2','Admin\HealthLicense2Controller');
    Route::resource('/Employment','Admin\EmploymentController');
    Route::resource('/Employment2','Admin\Employment2Controller');
    Route::resource('/Employment3','Admin\Employment3Controller');
    Route::resource('/Employment4','Admin\Employment4Controller');
    Route::resource('/Employment5','Admin\Employment5Controller');
    Route::resource('/ProgressFlow','Admin\ProgressFlowController');
    Route::resource('/IncomingCallLog','Admin\IncommingCallLogController');
    Route::resource('/OutgoingCallLog','Admin\OutgoingCallLogController');
    Route::resource('/VisitorLog','Admin\VisitorLogController');

    /*SMS Route*/
    Route::any('/EnquirySMS','Admin\SMSController@EnquirySMS')->name('EnquirySMS');
    Route::any('/ApplicantSMS','Admin\SMSController@ApplicantSMS')->name('ApplicantSMS');
    Route::Post('/SendSMS','Admin\SMSController@SendSMS')->name('SendSMS');

    /*Email Route*/
    Route::any('/EnquiryMail','Admin\MailController@Enquiry')->name('EnquiryMail');
    Route::any('/ApplicantMail','Admin\MailController@Applicant')->name('ApplicantMail');
    Route::post('/SendMail','Admin\MailController@SendMail')->name('SendMail');

    /*Notification Route*/
    Route::get('/Enquirymarkasread',function (){
        auth()->user()->unreadNotifications->where('type','App\Notifications\EnquiryNotification')->markAsRead();
        auth()->user()->unreadNotifications->where('type','App\Notifications\EnquiryUpdateNotification')->markAsRead();
        return redirect()->route('Enquiry.index');
    })->name('Enquirymarkasread');
    Route::get('/Applicantmarkasread',function (){
        auth()->user()->unreadNotifications->where('type','App\Notifications\ApplicantNotification')->markAsRead();
        auth()->user()->unreadNotifications->where('type','App\Notifications\ApplicantUpdateNotification')->markAsRead();
        return redirect()->route('Applicant.index');
    })->name('Applicantmarkasread');

    /*others*/
    Route::get('/logout','Admin\loginController@logout')->name('logout');
    Route::get('/' ,'Admin\HomeController@index')->name('admin.home');
    Route::resource('/EnquiryAppointment','Admin\EnquiryAppointmentController');
    Route::resource('/ApplicantAppointment','Admin\ApplicantAppointmentController');

});
