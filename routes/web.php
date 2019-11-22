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

//Route::get('/', function () {
//    return view('index');
//})->name('index');

Auth::routes();

Route::get('/', 'VolunteerController@index')->name('index')->middleware('guest');
Route::get('/dashboard', 'VolunteerController@dashboard')->name('dashboard')->middleware('auth:web');
Route::get('/volunteer/edit','VolunteerController@edit')->name('profile.edit')->middleware('auth:web');
Route::patch('/volunteer/update','VolunteerController@update')->name('profile.update')->middleware('auth:web');

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/about', 'HomeController@about')->name('about');

Route::resource('events', 'EventController');
Route::post('/events/favorite/{event}', 'EventController@favorite')->name('events.favorite');
Route::delete('/events/unfavorite/{event}', 'EventController@unfavorite')->name('events.unfavorite');
//Route::get('/events', 'EventController@index')->name('events');
//Route::get('/events/{event}', 'EventController@show')->name('events.show');

//Route::get('/applies', 'ApplyController@index')->name('apply.index');
Route::post('/applies/{event}', 'ApplyController@apply')->name('apply')->middleware('auth:web');
Route::delete('/applies/{event}', 'ApplyController@cancel')->name('apply.cancel')->middleware('auth:web');

Route::get('/image','ImageController@index')->name('image.index');
Route::get('/image/create','ImageController@create')->name('image.create');
Route::get('image/{image}','ImageController@show')->name('image.show');
Route::post('/image','ImageController@store')->name('image.store')->middleware('auth:web');
Route::get('/volunteer/image/edit','ImageController@edit')->name('image.edit')->middleware('auth:web');
Route::patch('image/{image}','ImageController@update')->name('image.update');
Route::delete('/image/{image}','ImageController@destroy')->name('image.destroy');
//Route::resource('image','ImageController');



Route::get('/organization', 'OrganizationController@index')->name('organization.index')->middleware('guest');
Route::get('/organization/dashboard', 'OrganizationController@dashboard')->name('organization.dashboard')->middleware('auth:web_organization');
Route::prefix('/organization')->name('organization.')->namespace('Organization')->group(function(){

    Route::namespace('Auth')->group(function(){
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');
        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Registration Routes...
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    });
});