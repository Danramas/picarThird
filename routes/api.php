<?php

use App\Http\Controllers\AuthController;
use Dingo\Api\Routing\Router;
use Saritasa\LaravelControllers\Api\ApiResourceRegistrar;

/* @var Router $api */
$api = app(Router::class);

$api->version(config('api.version'), function (Router $api) {
    $registrar = new ApiResourceRegistrar($api);

    // Authentication
    $registrar->post('auth', AuthController::class, 'login');
    $registrar->put('auth', AuthController::class, 'refreshToken');

    // Password reset
    $registrar->post('auth/password/reset', ForgotPasswordApiController::class, 'sendResetLinkEmail');
    $registrar->put('auth/password/reset', ResetPasswordApiController::class, 'reset');
    $registrar->delete('auth', AuthController::class, 'logout');
});



Route::post('/register', 'AuthController@register')->name('register');
Route::post('/login', 'AuthController@login')->name('login');
Route::post('/logout', 'AuthController@logout')->name('logout');

Route::namespace('Api')->group(function () {
    Route::get('/samples','SampleController@index');
    Route::get('/marks', 'MarkController@index');
    Route::get('/modifications', 'ModificationController@index');
    Route::get('/search','AdvertController@index');
    Route::get('/search/advert', 'AdvertController@show');
    Route::get('/comments','CommentController@index');
    Route::post('/comment','CommentController@create');
    Route::post('/createAdvert', 'AdvertController@create');
    Route::get('/users', 'UserController@index');
    Route::post('/upload','UploadController@store');
    Route::get('/checkSubscribe', 'SubscribeController@checkSubscribeStatus');
    Route::get('/subscribe', 'SubscribeController@subscribe');
});
