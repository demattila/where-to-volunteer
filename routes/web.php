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


use App\Events\MyEvent;
use Illuminate\Support\Facades\App;

//Testing
Route::get('test', function () {
//    event(new \App\Events\ApplyResponse('Levente'));
//    event(new MyEvent('hello world'));
    return view('testPusher');
});

Route::get('/sender', function () {
    return view('sender');
});
Route::post('/sender', function () {
//this is 4 post
    $text = request()->get('text');
    event(new MyEvent($text));
});


Route::get('/home', 'HomeController@home')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/GetCurrentUserId', function () {
    if (auth()->guard('web')->check() ){
        return auth()->guard('web')->user()->id;
    }
    if (auth()->guard('web_organization')->check() ){
        return auth()->guard('web_organization')->user()->id;
    }
    return null;
});

//Localization
Route::get('/lang/{locale}','LocalizationController@index');

//Stories
//Route::get('/stories','StoryController@index')->name('stories.index');
Route::resource('stories', 'StoryController');
Route::post('/{story}/comment', 'CommentController@store')->name('comments.store')->middleware('auth.any');
Route::delete('/comment/{comment}', 'CommentController@destroy')->name('comments.delete')->middleware('auth.any');

//Volunteer
Auth::routes();
Route::get('/', 'VolunteerController@index')->name('index')->middleware('guest:web_organization')->middleware('guest:web');
Route::get('/dashboard', 'VolunteerController@dashboard')->name('dashboard')->middleware('auth:web');
Route::get('/volunteer/edit','VolunteerController@edit')->name('profile.edit')->middleware('auth:web');
Route::patch('/volunteer/update','VolunteerController@update')->name('profile.update')->middleware('auth:web');
Route::post('/delete','VolunteerController@destroy')->name('profile.delete')->middleware('auth:web');

//Image
//Route::get('/image','ImageController@index')->name('image.index');
//Route::get('/image/create','ImageController@create')->name('image.create');
//Route::get('image/{image}','ImageController@show')->name('image.show');
Route::post('/image/user','ImageController@store')->name('image.store');
Route::post('/image/event/{event}','ImageController@store_event')->name('event.image.store');
Route::post('/image/story/{story}','ImageController@store_story')->name('story.image.store');
Route::post('/image/additional/{story}','ImageController@store_story_additional')->name('story.additionalImages.store');
Route::get('/image/edit','ImageController@edit')->name('image.edit');
Route::get('/event/{event}/image/edit','ImageController@event_edit')->name('event.image.edit');
Route::get('/story/{story}/image/edit','ImageController@story_edit')->name('story.image.edit');
//Route::patch('image/{image}','ImageController@update')->name('image.update');
Route::delete('/image/volunteer/{image}','ImageController@destroy')->name('image.destroy');
Route::delete('/image/event/{image}','ImageController@destroy')->name('event.image.destroy');
Route::delete('/image/story/{image}','ImageController@destroy')->name('story.image.destroy');
Route::delete('/image/additional/{story}','ImageController@destroy_story')->name('story.additionalImages.destroy');


//Event
Route::post('/events/fetch', 'EventController@fetch')->name('events.fetch');
Route::resource('events', 'EventController');
//Route::get('events', 'EventController@index')->name('events.index');
//Route::get('/events/create', 'EventController@create')->name('events.create');
//Route::get('/events/{event}', 'EventController@show')->name('events.show');
//Route::post('/events/favorite/{event}', 'EventController@favorite')->name('events.favorite');
//Route::delete('/events/unfavorite/{event}', 'EventController@unfavorite')->name('events.unfavorite');
Route::post('/event/favorite', 'EventController@fav')->name('events.favorite');
Route::post('/event/unfavorite', 'EventController@unfav')->name('events.unfavorite');


//Apply
//Route::get('/applies', 'ApplyController@index')->name('apply.index');
Route::post('/applies/{event}', 'ApplyController@apply')->name('apply')->middleware('auth:web');
Route::delete('/applies/{event}', 'ApplyController@cancel')->name('apply.cancel')->middleware('auth:web');
Route::post('/applies/{event}/accept/{volunteer}', 'ApplyController@accept')->name('apply.accept')->middleware('auth:web_organization');
Route::post('applies/{event}/reject/{volunteer}', 'ApplyController@reject')->name('apply.reject')->middleware('auth:web_organization');


Route::get('/organization/events/ongoing/{event}','EventController@orgOngoingDetails')->name('events.ongoing_show');
//Organization
Route::prefix('/organization')->name('organization.')->namespace('Organization')->group(function(){
    Route::get('/', 'OrganizationController@index')->name('index')->middleware('guest:web_organization')->middleware('guest:web');
    Route::get('/dashboard', 'OrganizationController@dashboard')->name('dashboard')->middleware('auth:web_organization');
    Route::get('/edit','OrganizationController@edit')->name('profile.edit')->middleware('auth:web_organization');
    Route::post('/delete','OrganizationController@destroy')->name('profile.delete')->middleware('auth:web_organization');

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

//Terms of Service
Route::get('/register/terms', 'TermController@terms')->name('terms.latest');

//Route::get('/terms', 'TermController@index')->name('terms.index')->middleware('auth')->middleware('verified');
//Route::get('/terms/{term}/edit', 'TermController@edit')->name('terms.edit')->middleware('auth')->middleware('verified');
//Route::get('/terms/create', 'TermController@create')->name('terms.create')->middleware('auth')->middleware('verified');
//Route::post('/terms', 'TermController@store')->name('terms.store')->middleware('auth')->middleware('verified');
//Route::delete('/terms/{term}', 'TermController@destroy')->name('terms.delete')->middleware('auth')->middleware('verified');
Route::resource('terms','TermController');
Route::post('terms/{term}/publish', 'TermController@publish')->name('terms.publish');
Route::post('terms/accept', 'TermController@accept')->name('terms.accept');