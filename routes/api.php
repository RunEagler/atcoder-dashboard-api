<?php

use Dingo\Api\Routing\Router;
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

$api = app(Router::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


$api->version('v1', ['middleware' => ['cors', 'api.throttle'], 'limit' => 100, 'expires' => 5], function (Router $api) {

    $api->get('/programming_languages', '\App\Api\V1\Controllers\ProgrammingLanguageController@list');
    $api->get('/levels', '\App\Api\V1\Controllers\LevelController@list');
    $api->get('/contests/{contest_id}/problems', '\App\Api\V1\Controllers\ProblemController@list');
    $api->get('/problems/{problem_id}', '\App\Api\V1\Controllers\ProblemController@get');
    $api->get('/contests', '\App\Api\V1\Controllers\ContestController@list');
});



