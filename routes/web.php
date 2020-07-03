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
Route::resource('stories', 'StoryController');
Route::post('/{story}/comment', 'CommentController@store')->name('comments.store')->middleware('auth.any');
Route::delete('/comment/{comment}', 'CommentController@destroy')->name('comments.delete')->middleware('auth.any');


//Images
Route::post('/image/user','ImageController@store')->name('image.store');
Route::post('/image/event/{event}','ImageController@store_event')->name('event.image.store');
Route::post('/image/story/{story}','ImageController@store_story')->name('story.image.store');
Route::post('/image/additional/{story}','ImageController@store_story_additional')->name('story.additionalImages.store');
Route::get('/image/edit','ImageController@edit')->name('image.edit');
Route::get('/event/{event}/image/edit','ImageController@event_edit')->name('event.image.edit');
Route::get('/story/{story}/image/edit','ImageController@story_edit')->name('story.image.edit');
Route::delete('/image/volunteer/{image}','ImageController@destroy')->name('image.destroy');
Route::delete('/image/event/{image}','ImageController@destroy')->name('event.image.destroy');
Route::delete('/image/story/{image}','ImageController@destroy')->name('story.image.destroy');
Route::delete('/image/additional/{story}','ImageController@destroy_story')->name('story.additionalImages.destroy');

//Volunteer
Auth::routes();
Route::get('/', 'VolunteerController@index')->name('index')->middleware('guest:web_organization')->middleware('guest:web');
Route::get('/dashboard', 'VolunteerController@dashboard')->name('dashboard')->middleware('auth:web');
Route::get('/volunteer/edit','VolunteerController@edit')->name('profile.edit')->middleware('auth:web');
Route::patch('/volunteer/update','VolunteerController@update')->name('profile.update')->middleware('auth:web');
Route::post('/delete','VolunteerController@destroy')->name('profile.delete')->middleware('auth:web');
//Event
Route::post('/events/fetch', 'EventController@fetch')->name('events.fetch');
Route::post('/events/getSearchEvents', 'EventController@getSearchEvents')->name('events.getSearchEvents');
Route::resource('events', 'EventController');
Route::post('/events/{event}/postDelete','EventController@destroy')->name('events.postDelete');
Route::post('/event/favorite', 'EventController@fav')->name('events.favorite');
Route::post('/event/unfavorite', 'EventController@unfav')->name('events.unfavorite');
//Apply
Route::post('/applies/{event}', 'ApplyController@apply')->name('apply')->middleware('auth:web');
Route::delete('/applies/{event}', 'ApplyController@cancel')->name('apply.cancel')->middleware('auth:web');
Route::post('/applies/{event}/accept/{volunteer}', 'ApplyController@accept')->name('apply.accept')->middleware('auth:web_organization');
Route::post('applies/{event}/reject/{volunteer}', 'ApplyController@reject')->name('apply.reject')->middleware('auth:web_organization');
//Organization
Route::get('/organization/events/ongoing/{event}','EventController@orgOngoingDetails')->name('events.ongoing_show')->middleware('auth:web_organization')->middleware('guest:web');
Route::prefix('/organization')->name('organization.')->namespace('Organization')->group(function(){
    Route::get('/', 'OrganizationController@index')->name('index')->middleware('guest:web_organization')->middleware('guest:web');
    Route::get('/dashboard', 'OrganizationController@dashboard')->name('dashboard')->middleware('auth:web_organization');
    Route::get('/edit','OrganizationController@edit')->name('profile.edit')->middleware('auth:web_organization');
    Route::patch('/update','OrganizationController@update')->name('profile.update')->middleware('auth:web_organization');
    Route::post('/delete','OrganizationController@destroy')->name('profile.delete')->middleware('auth:web_organization');
    Route::namespace('Auth')->group(function(){
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');
        // Registration Routes
        Route::get('register', 'RegisterController@showRegistrationForm');
        Route::post('register', 'RegisterController@register')->name('register');
    });
});
Route::post('/organization/message','MessageController@store')->name('organization.message')->middleware('auth:web_organization');
Route::post('/message/{message}','MessageController@destroy')->name('message.delete')->middleware('auth:web');

//Terms of Service
Route::get('/register/terms', 'TermController@terms')->name('terms.latest');
Route::prefix('/admin')->group(function() {
    Route::resource('terms', 'TermController')->middleware('admin');
    Route::get('/users', 'AdminController@index')->name('users.index')->middleware('auth')->middleware('verified')->middleware('admin');
    Route::delete('users/{type}/{id}', 'AdminController@destroy')->name('users.destroy')->middleware('auth')->middleware('verified')->middleware('admin');

});
Route::post('/admin/terms/{term}/publish', 'TermController@publish')->name('terms.publish')->middleware('admin');
Route::post('terms/accept', 'TermController@accept')->name('terms.accept');
Route::post('/admin/terms/delete-old', 'TermController@deleteOldTerms')->name('terms.delete.old')->middleware('admin');



