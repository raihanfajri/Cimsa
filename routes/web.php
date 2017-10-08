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
        return view('about.about')->with(compact('title'));
    });

    Route::get('official-partners', function(){
        return view('about.official-partner');
    });

    Route::get('alumni', function(){
        return view('about.alumni');
    });

    Route::get('alumni/alumni-of-the-month','GuestController@showAlumniOfTheMonth');

    Route::get('alumni/directory','GuestController@showAlumni');
});

Route::get('/articles', 'GuestController@showArticles');
Route::get('/articles/{articleId}', [
    'as' => 'articles.detail',
    'uses' => 'GuestController@showArticlesDetail'
]);

Route::get('/activities', 'GuestController@showActivities');
Route::get('/activities/{activityId}', [
    'as' => 'activity.detail',
    'uses' => 'GuestController@showActivityDetail'
]);

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
Route::group(['prefix'=>'admin','middleware'=> ['admin','revalidate']], function(){
    Route::get('/','DashboardController@index');
    Route::get('/catalogs','CatalogsController@index');
    Route::post('/catalogs/store','CatalogsController@store');
    Route::get('/catalogs/edit/{id}', 'CatalogsController@edit');
    Route::put('/catalogs/update/{id}', 'CatalogsController@update');
    Route::delete('/catalogs/destroy/{id}', 'CatalogsController@destroy');
    Route::get('/activities','ActivitiesController@index');
    Route::post('/activities/store','ActivitiesController@store');
    Route::get('/activities/edit/{id}','ActivitiesController@edit');
    Route::put('/activities/update/{id}','ActivitiesController@update');
    Route::delete('/activities/destroy/{id}','ActivitiesController@destroy');
    Route::get('/articles','ArticlesController@index');
    Route::get('/articles/datatable','ArticlesController@datatablesRequest');
    Route::post('/articles/store','ArticlesController@store');
    Route::get('/articles/edit/{id}','ArticlesController@edit');
    Route::post('/articles/update/{id}','ArticlesController@update');
    Route::delete('/articles/destroy/{id}','ArticlesController@destroy');
    Route::get('/alumni','AlumniController@index');
    Route::post('/alumni/store','AlumniController@store');
    Route::get('/alumni/edit/{id}','AlumniController@edit');
    Route::post('/alumni/update/{id}','AlumniController@update');
    Route::delete('/alumni/destroy/{id}','AlumniController@destroy');
    Route::post('/alumni/storeofthemonth','AlumniController@storeUpdateAlumniOfTheMonth');
    Route::get('/message','MessageController@index');
    Route::delete('message/destroy/{id}','MessageController@destroy');
});
Route::post('/sendMsg','MessageController@store');
Auth::routes();
