<?php

Route::group(['prefix'=>'MCQ'],function(){
	Route::get('/','MCQController@index')->name('MCQ.index');
	Route::get('/create','MCQController@create')->name('MCQ.create');

	Route::post('/store','MCQController@store')->name('MCQ.store');
	Route::get('/edit/{mcq}','MCQController@edit')->name('MCQ.edit');
	Route::post('/update/{mcq}','MCQController@update')->name('MCQ.update');
	Route::get('/delete/{mcq}','MCQController@delete')->name('MCQ.delete');



	Route::get('/mcqSold','SoldmcqController@index')->name('soldMCQ.index');
	Route::get('/mcqSold/create','SoldmcqController@create')->name('soldMCQ.create');
	Route::post('/mcqSold/store','SoldmcqController@store')->name('soldMCQ.store');
	Route::get('/mcqSold/edit/{soldMCQ}','SoldmcqController@edit')->name('soldMCQ.edit');

	Route::post('/getbookprice','MCQController@getPrice')->name('sold.getMcqPrice');



});