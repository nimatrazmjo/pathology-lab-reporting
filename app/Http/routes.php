<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware'=>['auth']], function(){

    /************* User Routs *****************/
    Route::resource('user','UserController');


    /************* Report Routes ***************/
    Route::group(['prefix' => 'report'],function(){
        Route::get('/{id}/test/','ReportController@getTest');
    });
    Route::resource('report','ReportController');

    /************** Test Routes ***************/
    Route::group(['prefix' => 'test'], function(){
        Route::get('/{id}/create/','TestController@create');
        Route::post('/store','TestController@store');
    });

    /**************** PDF routes **************/
    Route::get('/pdf/{id}', 'PDFController@index');

    /*************** Mail routes ***************/
    Route::get('/mail/{id}','MailController@send');


    /*************** Search Routes *************/
    Route::post('/search', 'SearchController@search');

    Route::get('/','UserController@index');
});

Route::auth();