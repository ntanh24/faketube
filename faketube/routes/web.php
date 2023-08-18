<?php

use App\Http\Controllers\ChannelController;
use App\Models\Channel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("channels",[ChannelController::class,"index"])->name("channels.index");
Route::get("channels/create", [ChannelController::class,"create"])->name("channels.create");
Route::get("channels/{id}", [ChannelController::class,"show"])->name("channels.show");

Route::get("channels/{id}/edit", [ChannelController::class,"edit"])->name("channels.edit");

Route::post("channels", [ChannelController::class,"store"])->name("channels.store");
Route::put("channels/{id}", [ChannelController::class,"update"])->name("channels.update");
Route::delete("channels/{id}", [ChannelController::class,"destroy"])->name("channels.destroy");
