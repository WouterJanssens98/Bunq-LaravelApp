<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@getIndex')->name('home');

Route::get('/', function () {
    return redirect('/home');
});


Route::group(['middleware' => ['auth']], function () {
    // routes that require user to be authenticated
    Route::get('admin/news', 'DashboardController@getIndex')->name('admin.news');
    Route::get('admin/news/delete/{id}', 'DashboardController@getDelete')->name('admin.deleteNews');
    Route::get('admin/news/edit/{id}', 'DashboardController@getEdit')->name('admin.editNews');
    Route::post('admin/news/{id}', 'DashboardController@postEdit')->name('admin.postEdit');
});


Route::prefix('dashboard')->as('dashboard.')->group(function(){

    Route::group(['middleware' => ['auth']], function () {
        // routes that require user to be authenticated

        Route::get('/', function () {
            return redirect('dashboard/pages');
        })->name('dashboard');

        Route::get('/pages', 'DashboardController@getIndexPages')->name('pages.index');
        Route::get('/pages/create', 'DashboardController@getCreatePage')->name('pages.create');
        Route::post('/pages/create', 'DashboardController@postCreatePage')->name('pages.create.post');
        Route::get('/pages/edit/{page}', 'DashboardController@getEditPage')->name('pages.edit');
        Route::post('/pages/edit/{page}', 'DashboardController@postEditPage')->name('pages.edit.post');
        Route::post('/pages/delete', 'DashboardController@postDelete')->name('pages.delete');

    });
});





Route::get('locales/{lang}', 'LocaleController@index');



Route::get('/contact', 'ContactController@getIndex')->name('contact');
Route::post('/contact', 'ContactController@postContact')->name('contact.save');

// Route::get('/about', 'AboutController@getIndex')->name('about');

// Route::get('/privacy', 'PrivacyController@getIndex')->name('privacy');

Route::get('/news', 'NewsController@getIndex')->name('news');
Route::get('/news/{id}', 'NewsController@getDetail')->name('news.detail');


Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, config()->get('app.locales'))) {
      session(['locale' => $locale]);
    }
    return redirect()->back();
  });

Auth::routes();

Route::get('/{slug}', 'PagesController@getPage')->name('page');
