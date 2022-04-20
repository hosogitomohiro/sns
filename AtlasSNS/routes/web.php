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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('search','UsersController@search');

Route::get('search','UsersController@timeline');


Route::get('/follow-list','FollowsController@followList');

Route::get('/follow-list','FollowsController@timelined');

Route::get('/follower-list','FollowsController@followerList');

Route::get('/follower-list','FollowsController@timeline');

Route::get ('index.blade.php','PostsController@index');

Route::get ('post/index','PostsController@index');

Route::post ('post/create','PostsController@create');

Route::get ('post/{id}/delete','PostsController@delete');

Route::get ('post/{id}/update-form','PostsController@update');

Auth::routes();
//フォローリストページ
Route::get('hello', 'PostsController@');

Route::get('/logout',[
  'uses' => 'Auth\LoginController@getLogout',
  'as' => 'login.logout'
  ]);
//検索ページ
//  プロフィールページ
Route::group(['middleware' => 'auth'], function () {

  //プロフィール編集画面表示
  Route::get('/profile', 'UsersController@show')->name('profile');
  //プロフィール編集
  Route::put('/profile', 'UsersController@profileUpdate')->name('profile_edit');
  Route::group(['prefix' => 'users'], function() {
    Route::get('edit/{id}', 'UsersController@getEdit')->name('users.edit');
    Route::post('edit/{id}', 'UsersController@postEdit')->name('users.postEdit');
    Route::post('edit/{id}', 'UsersController@postEdit')->name('users.postEdit');
  });
});
