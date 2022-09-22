<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'middleware' => ['api'],
    'namespace' => 'Api',
    // Temporary for Flask Server Side Update
    'as' => 'api.'
], function () {

    // Common
    Route::group([
        'namespace' => 'Common',
        'prefix' => 'common',
        'as' => 'common.',
    ], function () {
       // 画像アップロードAPI
        Route::post('/pagination', 'PaginationController@upload')->name('uploadImage');
    });


    // Flask API
    Route::group([
        'namespace' => 'Flask',
        'prefix' => 'flask',
        'as' => 'flask.',
    ], function () {
        Route::post('/search_scraping', 'FlaskController@searchScraping')->name('search_scraping');
        Route::post('/get_ptable', 'FlaskController@getPtable')->name('get_ptable');
        Route::post('/get_batch', 'FlaskController@getBatch')->name('get_batch');

    });

});
