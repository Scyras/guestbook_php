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

Route::get('/', 'GuestBookController@index');

Route::get('/about','GuestBookController@about')->name('about');

Route::get('/messages/create','MessagesController@create')->name('message.create');

Route::get('/messages','MessagesController@index')->name('message.index');
Route::get('/messages/{id}/delete','MessagesController@delete')->name('message.delete');
Route::post('/messages','MessagesController@store')->name('message.store');
Route::post('/messages/update','MessagesController@update')->name('message.update');
Route::get('/messages/{id}/show','MessagesController@show')->name('message.show');
Route::get('/messages/{id}/edit','MessagesController@edit')->name('message.edit');

route::resource('replyMessages', 'ReplyMessagesController', ['except' => ['create','show','index']]);

Route::get('/home', 'GuestBookController@index')->name('home');
Route::get('/profile/{user}','GuestBookController@profile')->name('profile');
Route::post('profile','GuestBookController@updateProfile')->name('profile.store');
Auth::routes();
//logout stopped working... help from google
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

