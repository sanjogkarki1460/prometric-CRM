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

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['AdminAuth']],function(){
    Route::group(['prefix'=>'','middleware'=>['Admin']],function(){
        Route::resource('/Admin','AdminController');

    });
    Route::get('/PasswordChangeView','AdminController@PasswordChangeView')->name('PasswordChangeView');
    Route::put('/PasswordChange{id}','AdminController@PasswordChange')->name('PasswordChange');
    Route::resource('/Profession','CategoryController');
    /*Enquiry Route*/
    Route::resource('/Enquiry','EnquiryController')->except('show','index');
    Route::any('/Enquiry/index','EnquiryController@index')->name('Enquiry.index');
    Route::put('/Enquiry/EligibilityUpdate/{id}','EnquiryController@EligibilityUpdate')->name('EligibilityUpdate');
    Route::put('/Enquiry/ColorCodeUpdate/{id}','EnquiryController@ColorUpdate')->name('ColorUpdate');
    Route::get('/EnquiryDetail/{id}','EnquiryController@Detail')->name('EnquiryDetail');
    Route::get('/EnquiryDetail/Pdf/{id}','EnquiryController@pdf')->name('EnquiryDetailPdf');


    /*Applicant Route*/
    Route::resource('/Applicant','ApplicantController')->except('show','index','create');
    Route::any('/Applicant/create/{id}','ApplicantController@AppApplicant')->name('AddTOApplicant');
    Route::any('/Applicant/index','ApplicantController@index')->name('Applicant.index');
    Route::put('/Applicant/ColorCodeUpdate/{id}','ApplicantController@ColorUpdate')->name('ApplicantColorUpdate');
    Route::get('/ApplicantDetail/{id}','ApplicantController@Detail')->name('ApplicantDetail');
    Route::get('ApplicantDetail/Pdf/{id}','ApplicantController@pdf')->name('ApplicantDetailPdf');
    Route::resource('/CheckList','CheckListController');
    Route::resource('/Education','EducationController');
    Route::resource('/Education2','Education2Controller');
    Route::resource('/Education3','Education3Controller');
    Route::resource('/HealthLicense','HealthLisenceController');
    Route::resource('/HealthLicense2','HealthLicense2Controller');
    Route::resource('/Employment','EmploymentController');
    Route::resource('/Employment2','Employment2Controller');
    Route::resource('/Employment3','Employment3Controller');
    Route::resource('/Employment4','Employment4Controller');
    Route::resource('/Employment5','Employment5Controller');
    Route::resource('/ProgressFlow','ProgressFlowController');
    Route::resource('/IncomingCallLog','IncommingCallLogController');
    Route::resource('/OutgoingCallLog','OutgoingCallLogController');
    Route::resource('/VisitorLog','VisitorLogController');

    /*SMS Route*/
    Route::any('/EnquirySMS','SMSController@EnquirySMS')->name('EnquirySMS');
    Route::any('/ApplicantSMS','SMSController@ApplicantSMS')->name('ApplicantSMS');
    Route::Post('/SendSMS','SMSController@SendSMS')->name('SendSMS');

    /*Email Route*/
    Route::any('/EnquiryMail','MailController@Enquiry')->name('EnquiryMail');
    Route::any('/ApplicantMail','MailController@Applicant')->name('ApplicantMail');
    Route::post('/SendMail','MailController@SendMail')->name('SendMail');

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
    Route::get('/logout','loginController@logout')->name('logout');
    Route::get('/' ,'HomeController@index')->name('admin.home');
    Route::resource('/EnquiryAppointment','EnquiryAppointmentController');
    Route::resource('/ApplicantAppointment','ApplicantAppointmentController');
    require_once('Component/Book.php');
    require_once('Component/MCQ.php');


});
