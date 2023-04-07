<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FeelController;
use App\Http\Controllers\ForumController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// 首頁
Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 心得
Route::get('/feelDetail/{id}',[FeelController::class,'feelDetail']);


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






require __DIR__.'/auth.php';
