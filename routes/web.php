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
Use App\WikiCars;
Use App\User;

Route::get('/', function () {
    $wikiCars = App\WikiCars::all();

    return view('Home');
});

Route::get('Information', 'WikiCarsController@index');
Route::get('/subscriber', 'WikiCarsController@subs')->name('subs.store');
//Route::get('profile','UserController@find')->name('user.show');
Route::get('/edit','UserController@subscriber_only')->name('auth.user');
Route::get('edit','WikiCarsController@edit');
Route::get('/search', 'WikiCarsController@search');
Route::post('/insert', 'WikiCarsController@add');
Route::post('/updated/{id}', 'WikiCarsController@updated');
Route::get('/update/{id}/', 'WikiCarsController@update');
Route::get('/updateUser/{id}/', 'AdminController@updateUser');
Route::post('/updatedUser/{id}/', 'AdminController@updatedUser');
Route::get('/delete/{id}','WikiCarsController@delete');
Route::get('Details/{id}', 'WikiCarsController@carDetails')->name('wikicar.show');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('profile','profileControler@update_avatar');
Route::get('/pdf/{id}', 'pdfController@pdf')->name('wikicar.download');

Route::resource('wikiCars', 'WikiCarsController');


Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/del/{id}','AdminController@deleteUser');

Route::get('/AdminPanel', 'AdminController@getUser');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
Route::group(['middleware' => 'auth:web,admin'], function(){
    Route::get('profile','UserController@find')->name('user.show');

    Route::get('profile','AdminController@find')->name('user.show');


});

Route::group(['middleware' => 'auth:web,admin'], function(){
    Route::get('api/wikiCars', 'apiController@index');

});
