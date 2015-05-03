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
