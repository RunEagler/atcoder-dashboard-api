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


$api->version('v1', ['middleware' => ['api.throttle'], 'limit' => 1000, 'expires' => 5], function (Router $api) {

    Route::options('', function () {
        return response()->json();
    });

    $api->get('/programming_languages', '\App\Api\V1\Controllers\ProgrammingLanguageController@list');
    $api->get('/levels', '\App\Api\V1\Controllers\LevelController@list');
    $api->get('/contests/{contest_id}/problems', '\App\Api\V1\Controllers\ProblemController@list');
    $api->get('/problems/{problem_id}', '\App\Api\V1\Controllers\ProblemController@get');
    $api->post('/problems/add_last_path','\App\Api\V1\Controllers\ProblemController@add_last_path');
    $api->put('/problems/{problem_id}','\App\Api\V1\Controllers\ProblemController@update');
    $api->post('/problems/{problem_id}/tags/{tag_id}','\App\Api\V1\Controllers\ProblemController@add_tag');
    $api->delete('/problems/{problem_id}/tags/{tag_id}','\App\Api\V1\Controllers\ProblemController@delete_tag');
    $api->get('/contests', '\App\Api\V1\Controllers\ContestController@list');
    $api->post('/players', '\App\Api\V1\Controllers\PlayerController@entry');
    $api->post('/answers', '\App\Api\V1\Controllers\AnswerController@entry');
    $api->post('/answers/code/import', '\App\Api\V1\Controllers\AnswerController@import_code');
    $api->post('/tags','\App\Api\V1\Controllers\TagController@create');
    $api->get('/tags','\App\Api\V1\Controllers\TagController@list');
});



