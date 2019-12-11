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


use Illuminate\Support\Facades\App;

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/about', 'HomeController@about')->name('about');

Route::get('/lang/{locale}','LocalizationController@index');

//Volunteer Routes
Auth::routes();
Route::get('/', 'VolunteerController@index')->name('index')->middleware('guest:web_organization')->middleware('guest:web');
Route::get('/dashboard', 'VolunteerController@dashboard')->name('dashboard')->middleware('auth:web');
Route::get('/volunteer/edit','VolunteerController@edit')->name('profile.edit')->middleware('auth:web');
Route::patch('/volunteer/update','VolunteerController@update')->name('profile.update')->middleware('auth:web');

//Image Routes
//Route::get('/image','ImageController@index')->name('image.index');
//Route::get('/image/create','ImageController@create')->name('image.create');
//Route::get('image/{image}','ImageController@show')->name('image.show');
Route::post('/image/volunteer','ImageController@store')->name('image.store');
Route::post('/image/event/{event}','ImageController@event_store')->name('event.image.store');
Route::get('/image/edit','ImageController@edit')->name('image.edit');
Route::get('/event/{event}/image/edit','ImageController@event_edit')->name('event.image.edit');
//Route::patch('image/{image}','ImageController@update')->name('image.update');
Route::delete('/image/volunteer/{image}','ImageController@destroy')->name('image.destroy');
Route::delete('/image/event/{image}','ImageController@event_destroy')->name('event.image.destroy');




//Event Routes
Route::resource('events', 'EventController');
Route::get('/organization/events/ongoing/{event}','EventController@orgOngoingDetails')->name('events.ongoing_show');
//Route::get('events', 'EventController@index')->name('events.index');
//Route::get('/events/create', 'EventController@create')->name('events.create');
//Route::get('/events/{event}', 'EventController@show')->name('events.show');
Route::post('/events/favorite/{event}', 'EventController@favorite')->name('events.favorite');
Route::delete('/events/unfavorite/{event}', 'EventController@unfavorite')->name('events.unfavorite');

//Apply routes
//Route::get('/applies', 'ApplyController@index')->name('apply.index');
Route::post('/applies/{event}', 'ApplyController@apply')->name('apply')->middleware('auth:web');
Route::delete('/applies/{event}', 'ApplyController@cancel')->name('apply.cancel')->middleware('auth:web');
Route::post('/applies/{event}/accept/{volunteer}', 'ApplyController@accept')->name('apply.accept')->middleware('auth:web_organization');
Route::post('applies/{event}/reject/{volunteer}', 'ApplyController@reject')->name('apply.reject')->middleware('auth:web_organization');


//Organization Routes
Route::prefix('/organization')->name('organization.')->namespace('Organization')->group(function(){
    Route::get('/', 'OrganizationController@index')->name('index')->middleware('guest:web_organization')->middleware('guest:web');
    Route::get('/dashboard', 'OrganizationController@dashboard')->name('dashboard')->middleware('auth:web_organization');
    Route::get('/edit','OrganizationController@edit')->name('profile.edit')->middleware('auth:web_organization');
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
        Route::get('register', 'RegisterController@showRegistrationForm');
        Route::post('register', 'RegisterController@register')->name('register');
    });
});