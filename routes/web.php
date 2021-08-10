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


Auth::routes();
Route::group(['prefix' => LaravelLocalization::setLocale(),

    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {


});

Route::get('/', function () {
    return view('home');
});
/** General pages */
Route::get('/donate', 'GeneralController@donate')->name('General.donate');
Route::get('/our_work', 'GeneralController@our_work')->name('General.our_work');
Route::post('/saveContactUs', 'GeneralController@saveContactUs')->name('General.saveContactUs');
Route::get('/contact_us', 'GeneralController@contact_us')->name('General.contact_us');
Route::get('/hawkama', 'GeneralController@hawkama')->name('General.contact_us');
Route::get('/singleBlog/{id}', 'GeneralController@singleBlog')->name('General.singleBlog');
Route::get('/about_us', 'GeneralController@about_us')->name('General.about_us');
Route::get('/news', 'GeneralController@news')->name('General.news');
Route::get('/events', 'GeneralController@events')->name('General.events');
Route::get('/register', 'GeneralController@register')->name('General.register');
Route::post('/save_register', 'GeneralController@save_register')->name('General.save_register');

/** Team Routes */
Route::get('/Team', 'TeamController@Team')->name('Team.members');
Route::get('/Team/singleTeam', 'TeamController@singleTeam')->name('Team.singleTeam');
Route::get('/Team/teamWork', 'TeamController@teamWork')->name('Team.teamWork');


/** Subscribe Routes */
Route::get('/Subscribe/Active', 'SubscribeController@Active')->name('Subscribe.Active');
Route::get('/Subscribe/Associate', 'SubscribeController@Associate')->name('Subscribe.Associate');
Route::post('/Subscribe/saveSubscribe', 'SubscribeController@saveSubscribe')->name('Subscribe.saveSubscribe');


/** Blog Routes */
Route::get('/Blog', 'BlogController@Blog')->name('Blog.Blog');
Route::get('/Blog/singleBlog', 'BlogController@singleBlog')->name('Blog.singleBlog');
Route::get('/Blog/blogsByCat', 'BlogController@blogsByCat')->name('Blog.blogsByCat');
Route::get('/Blog/allBlog', 'BlogController@allBlog')->name('Blog.allBlog');
Route::get('/Blog/search', 'BlogController@search')->name('Blog.search');
Route::post('/Blog/saveComment/{id}', 'BlogController@saveComment')->name('Blog.saveComment');


/** About Routes */
Route::get('/info', 'AboutController@info')->name('About.info');
Route::get('/values', 'AboutController@values')->name('About.values');
Route::get('/president', 'AboutController@ceo')->name('About.ceo');

/** Reports Routes */
Route::get('/hawkama', 'ReportsController@hawkama')->name('Reports.hawkama');
Route::get('/Reports', 'ReportsController@reports')->name('Reports.reports');

/** Initiative Routes */
Route::get('/Initiatives', 'InitiativeController@initiatives')->name('Initiative.initiatives');

/** Blog Routes */
Route::get('/news', 'BlogController@news')->name('Blog.news');
Route::get('/partners', 'BlogController@partners')->name('Blog.partners');
Route::get('/testimonials', 'BlogController@testimonials')->name('Blog.testimonials');
