<?php

Route::group(['prefix'=>'book'],function(){
	Route::get('/','BookController@index')->name('book.index');
	Route::get('/create','BookController@create')->name('book.create');
	Route::post('/create/store','BookController@store')->name('book.store');
	Route::get('/edit/{book}','BookController@edit')->name('book.edit');
	Route::post('/update/{book}','BookController@update')->name('book.update');
	Route::get('/delete/{book}','BookController@delete')->name('book.delete');


	Route::get('/booksold','SoldController@index')->name('soldbook.index');
	Route::get('/booksold/create','SoldController@create')->name('soldbook.create');
	Route::post('/booksold/store','SoldController@store')->name('soldbook.store');
	Route::get('/booksold/edit/{soldbook}','SoldController@edit')->name('soldbook.edit');

	Route::post('/getbookprice','BookController@getPrice')->name('getbookPrice');


});