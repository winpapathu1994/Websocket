<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\UserController;
use App\Events\Test;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/broadcast', function () {
    broadcast(new Test());
});

Route::get('/', function () {
  if(Auth::User())
  {
    return redirect('chat');
  } else {
    return redirect('login');
  }
});
Route::middleware('auth:sanctum')->group(function(){

Route::post('/chat-message', [ChannelController::class, 'chatMessage']);
Route::get('/chat', [ChannelController::class, 'allMessages']);
Route::get('/all_users', [UserController::class, 'allUsers']);
});
