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
Route::post('get-master-audio-recording','Api\RecordingController@getMasterRecording');
Route::post('get-student-audio-recording','Api\RecordingController@getStudentRecording');
Route::get('get-student-recording-data','Api\RecordingController@getStudentRecordingData');
