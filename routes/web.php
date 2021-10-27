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
    return view('guest.home');
});

Auth::routes();


Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/contacts', 'MailController@index')->name('contacts.index');
    Route::get('/contacts/create', 'MailController@create')->name('contacts.create');
    Route::post('/contacts', 'MailController@store')->name('contacts.store');
    Route::get('/contacts/tks', 'MailController@thank')->name('contacts.thanks');
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::patch('/users/{user}', 'UserController@update')->name('users.update');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
});


Route::get("{any?}", function () {
    return view('guest.home');
})->where("any", ".*");
