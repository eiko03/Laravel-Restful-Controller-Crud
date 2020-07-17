<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcMail;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers','CustomerController@index');
Route::get('/customers/create','CustomerController@create');
Route::post('/customers','CustomerController@store');
Route::get('/customers/{customer}','CustomerController@show');
Route::get('/customers/{customer}/edit','CustomerController@edit');
Route::patch('/customers/{customer}','CustomerController@update');
Route::delete('/customers/{customer}','CustomerController@distroy');
/*Route::get('/email', function () {
      Mail::to('email@email.com')->send(new WelcMail());
    return new WelcMail();
});*/
Route::get('/quesner/create','QuesnerController@create');
Route::post('/quesner','QuesnerController@store');
Route::get('/quesner/{qu}','QuesnerController@show');
Route::get('/quesner/{questionner}/question/create','QuestionController@create');
Route::post('/quesner/{questionner}/question','QuestionController@store');
Route::delete('/quesner/{questionner}/question/{question}','QuestionController@destroy');
Route::get('/surveys/{qu}-{slug}','SurveyController@show');
Route::post('/surveys/{qu}-{slug}','SurveyController@store');


Auth::routes();

Route::get('/home', 'QuesnerController@home')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');

