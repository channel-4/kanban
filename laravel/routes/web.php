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

/* リスト関連 */
Route::namespace('Lists')->group(function() {
    // 一覧
    Route::get('/', 'ListsController@index'); 
    // 新規追加
    Route::get('/list/new', 'ListsController@new');
    Route::post('/list/new', 'ListsController@store');
    // 更新
    Route::get('/list/edit/{list_id}', 'ListsController@edit');
    Route::post('/list/edit/{list_id}', 'ListsController@update');
    // 削除
    Route::post('/list/delete/{list_id}', 'ListsController@destroy');
});

/* カード関連 */
Route::namespace('Cards')->group(function() {
    // 新規追加
    Route::get('/list/{list_id}/card/new', 'CardsController@new');
    Route::post('/list/{list_id}/card/new', 'CardsController@store');
    // 更新
    Route::get('/list/{list_id}/card/edit/{card_id}', 'CardsController@edit');
    Route::post('/list/{list_id}/card/edit/{card_id}', 'CardsController@update');
    // 削除
    Route::post('/card/delete/{card_id}', 'CardsController@destroy');
});

// 認証関連
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('/login/callback', 'Auth\LoginController@handleGoogleCallback');