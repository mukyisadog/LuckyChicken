<?php
namespace App\Http\Controllers;
use App\Http\Controllers\FeelController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;



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
// 首頁
Route::get('/', function () {
    return view('index');
});
// 心得
Route::get('/feelDetail/{id}',[FeelController::class,'feelDetail']);

Route::get('/feelDetail',function () {
    return view('feelDetail');
});

Route::get('/feelIndex', [FeelController::class,'feelIndex']);

Route::get('/feelMessage/{id}', function () {
    return view('feelMessage');
});

Route::post('/feelCom/{ftid}/{uid}',[FeelController::class,'feelCom']);

Route::post('feelMes/{uid}', [FeelController::class,'feelMes']);

// 論壇
Route::get('/forumIndex',[ForumController::class,'forumIndex']);

Route::get('/forumDetail/{sid}/{id}', [ForumController::class,'forumDetail']);

Route::get('/forumMessage/{id}', function () {
    return view('forumMessage');
});

Route::post('/forumMes/{uid}', [ForumController::class,'forumMes']);


// 登入註冊
Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});



