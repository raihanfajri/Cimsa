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

Route::get('/', 'HomepageController@index');

Route::group(['prefix'=>'about'], function(){
    Route::get('cimsa', function() {
        $title = 'CIMSA';
        return view('about')->with(compact('title'));
    });
});

Route::get('/articles', 'GuestController@showArticles');

Route::get('/articles/{articleId}', [
    'as' => 'articles.detail',
    'uses' => 'GuestController@showArticlesDetail'
]);

Route::get('/activities', 'GuestController@showActivities');
Route::get('/standing-committees', 'GuestController@showStandingCommittees');
Route::group(['prefix'=>'standing-committees'], function(){
    Route::get('/scome', function(){
        $title = 'SCOME';
        return view('sc.scome', compact('title'));
    });
    Route::get('/scope', function(){
        $title = 'SCOPE';
        return view('sc.scope', compact('title'));
    });
    Route::get('/score', function(){
        $title = 'SCORE';
        return view('sc.score', compact('title'));
    });
    Route::get('/scoph', function(){
        $title = 'SOCPH';
        return view('sc.scoph', compact('title'));
    });
    Route::get('/scora', function(){
        $title = 'SCORA';
        return view('sc.scora', compact('title'));
    });
    Route::get('/scorp', function(){
        $title = 'SCORP';
        return view('sc.scorp', compact('title'));
    });
});
Route::get('catalogs', 'GuestController@showCatalogs');
Route::group(['prefix'=>'admin'], function(){
    Route::get('/catalogs','CatalogsController@index');
});
