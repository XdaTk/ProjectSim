<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/editor', function () {
    return view('test.editor');
});
Route::get('/userinfo', function () {
    return Hash::make("xdatk");
});
/**
 * 博客内容控制器
 */
Route::get('/', 'Index\BlogController@index');
Route::get('/blog/{id}', 'Index\BlogController@show')->where(['id' => '[0-9]+']);
Route::get('/blog/classify/{id}', 'Index\BlogController@classify')->where(['id' => '[0-9]+']);
Route::post('/blog/love/{id}', 'Index\BlogController@blogLoverCount')->where(['id' => '[0-9]+']);
/**
 * 评论相关路由控制
 */
Route::post('/blog/comment/add/{id}','Index\CommentsController@create')->where(['id' => '[0-9]+']);
Route::post('/blog/comment/show/{id}','Index\CommentsController@show')->where(['id' => '[0-9]+']);
/**
 * 编辑器文件上传控制
 */
Route::post('/edit/editorFileUpload', ['as' => 'editorFileUpload', 'uses' => 'Util\EditorFileUploadController@image']);
/**
 * 用户权限相关验证
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/**
 * 控制面板相关功能
 */
Route::get('home', ['middleware' => 'auth', 'uses' => 'Admin\AdminController@index']);
Route::get('home/blog/create', ['middleware' => 'auth', 'uses' => 'Admin\BlogEditController@create']);
Route::post('home/blog/create', ['middleware' => 'auth', 'uses' => 'Admin\BlogEditController@save']);
Route::get('home/blog/update/{id}', ['middleware' => 'auth', 'uses' => 'Admin\BlogEditController@update']);
Route::post('home/blog/update/{id}', ['middleware' => 'auth', 'uses' => 'Admin\BlogEditController@updatePost']);
Route::get('home/blog/', ['middleware' => 'auth', 'uses' => 'Admin\BlogEditController@index']);
Route::get('home/blog/del/{id}', ['middleware' => 'auth', 'uses' => 'Admin\BlogEditController@del']);

Route::get('home/classify/create', ['middleware' => 'auth', 'uses' => 'Admin\ClassifyEditController@create']);
Route::post('home/classify/create', ['middleware' => 'auth', 'uses' => 'Admin\ClassifyEditController@save']);
Route::get('home/classify/update/{id}', ['middleware' => 'auth', 'uses' => 'Admin\ClassifyEditController@update']);
Route::post('home/classify/update/{id}', ['middleware' => 'auth', 'uses' => 'Admin\ClassifyEditController@updatePost']);
Route::get('home/classify/', ['middleware' => 'auth', 'uses' => 'Admin\ClassifyEditController@index']);
Route::get('home/classify/del/{id}', ['middleware' => 'auth', 'uses' => 'Admin\ClassifyEditController@del']);

Route::get('home/comment/', ['middleware' => 'auth', 'uses' => 'Admin\CommentsEditController@index']);
Route::get('home/comment/del/{id}', ['middleware' => 'auth', 'uses' => 'Admin\CommentsEditController@del']);

Route::get('home/love/create', ['middleware' => 'auth', 'uses' => 'Admin\AdminController@lovecreate']);
Route::post('home/love/create', ['middleware' => 'auth', 'uses' => 'Admin\AdminController@lovesave']);
Route::get('home/love/', ['middleware' => 'auth', 'uses' => 'Admin\AdminController@loveindex']);
Route::get('home/love/del/{id}', ['middleware' => 'auth', 'uses' => 'Admin\AdminController@lovedel']);