<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarpoolController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SendJoinNoticeMailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FeelController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\IndexController;

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

// 首頁
Route::get('/',[IndexController::class,'Index'])->name('home');
Route::get('/weather',[IndexController::class,'getweather']);

Route::middleware('auth')->group(function () {
    Route::get('/notice', [CarpoolController::class, 'cpjoinNotice'])->name('notice');
});

// 測試機器人
Route::get('/test',function (){
    return view();
});
require __DIR__.'/auth.php';