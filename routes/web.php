<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FolderController;

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

Route::get('/', function () { return view('welcome'); })->middleware('admin')->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('')->middleware('admin')->group(function(){
    Route::get('/folders', [FolderController::class, 'index'])->name('folders.index');
    Route::get('/folders/{folder:id}',[FolderController::class, 'tri'])->name('folders.tri');
    Route::get('/createfolder',[FolderController::class,'create'])->name('folders.create');
    Route::get('/{folder:id}/createfolder',[FolderController::class,'tricreate'])->name('folders.tricreate');
    Route::post('/folders/store',[FolderController::class,'store'])->name('folders.store');
    Route::get('/folder',[FolderController::class,'show'])->name('folders.show');
    Route::delete('/folders/{folder:id}/delete',[FolderController::class,'delete'])->name('folders.delete');
    Route::get('/folders/{folder}/edit',[FolderController::class,'edit'])->name('folders.edit');
    Route::put('/folders/{folder}/update',[FolderController::class,'update'])->name('folders.update');
});

Route::prefix('')->middleware('admin')->group(function(){
    Route::get('/users',[UserController::class, 'index'])->name('users');
    Route::get('/users/{user}',[UserController::class, 'edit'])->name('users.edit');
    Route::get('/createuser',[UserController::class, 'create'])->name('users.create');
    Route::post('/users/store',[UserController::class,'store'])->name('users.store');
    Route::put('/users/{user}/update',[UserController::class,'update'])->name('users.update');
    Route::delete('/users/{user:id}/delete',[UserController::class,'delete'])->name('users.delete');
});
