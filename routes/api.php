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

// Route::get('profile', function () {
//     // Only verified users may enter...
// })->middleware('verified');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group([
            'prefix' => 'authenticate', 
            'middleware' => 'api', 
            'namespace' => 'App\\Http\\Controllers\\Auth'
        ], function ($api) {

        $api->post('me', 'LoginController@me')->name('auth.me');
        $api->post('login', 'LoginController@login')->name('auth.login');
        $api->post('logout', 'LoginController@logout')->name('auth.logout');
        $api->post('register', 'RegisterController@register')->name('auth.register');

        $api->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $api->post('password/reset', 'ResetPasswordController@reset')->name('password.update');
        $api->post('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');

        $api->get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
        $api->post('email/resend', 'VerificationController@resend')->name('verification.resend');
    });

    $api->get('test', function(){
        return [1, 2, 3, 4];
    });

});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
//     Route::post('authenticate', 'AuthController@authenticate')->name('api.authenticate');
//     Route::post('register', 'AuthController@register')->name('api.register');
// });

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

