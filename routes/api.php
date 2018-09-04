<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api', 'as' => 'api.'], function() {
    Route::name('login')->post('login', 'AuthController@login');
    Route::name('refresh_token')->post('refresh_token', 'AuthController@refreshToken');

    Route::group(['middleware' => ['auth:api', 'jwt.refresh']], function() {
        Route::name('logout')->post('logout', 'AuthController@logout');
        Route::name('user_logged')->post('user_logged', 'AuthController@userLogged');
        Route::resource('users', 'UserController', ['except' => ['create', 'edit']]);
        Route::resource('categories', 'CategoryController', ['except' => ['create', 'edit']]);
        Route::resource('courses', 'CourseController', ['except' => ['create', 'edit']]);
        Route::resource('courses.categories', 'CourseCategoryController', ['only' => ['index', 'store', 'destroy']]);
    });
});
