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
    Route::get('/list/edit/{list_id}', 'ListController@edit');
    Route::post('/list/edit/{list_id}', 'ListController@update');
    // 削除
    Route::post('/list/delete/{list_id}', 'ListingsController@destroy');
});

/* カード関連 */
// TODO リストが完成したら作成する

// 認証関連
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('/login/callback', 'Auth\LoginController@handleGoogleCallback');