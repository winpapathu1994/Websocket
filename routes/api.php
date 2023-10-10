<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\ChatMessageEvent;
use App\Events\PlaygroundEvent;
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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/playground', function() {
    event(new PlaygroundEvent());
    return null;
});
/*
Route::post('/chat-message', function(Request $request) {
    event(new ChatMessageEvent($request->message, auth()->user()));
    return null;
});
*/



