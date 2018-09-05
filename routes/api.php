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

Route::group(['namespace' => 'Api', 'as' => 'api.'], function() {
    Route::post('login', 'AuthController@login');
    Route::post('refresh_token', 'AuthController@refreshToken');

    Route::group(['middleware' => ['auth:api', 'jwt.refresh']], function() {
        Route::post('logout', 'AuthController@logout');
        Route::post('user_logged', 'AuthController@userLogged');

        Route::apiResources([
            'users' => 'UserController',
            'categories' => 'CategoryController',
            'courses' => 'CourseController'
        ]);

        Route::resource('courses.categories', 'CourseCategoryController', ['only' => ['index', 'store', 'destroy']]);
    });
});
