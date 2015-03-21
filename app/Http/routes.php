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
Route::get("/", function () {
    return \SimBlog\Models\User::all();
});

Route::get('/editor', function () {
    return view('test.editor');
});

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
