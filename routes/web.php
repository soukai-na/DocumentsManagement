<?php

use App\Models\User;
use App\Models\Groupe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DocumentController;

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



Route::get('/', [HomeController::class, 'welcome'])->middleware('admin')->name('welcome');

Route::get('/compte',[UserController::class, 'compte'])->name('compte');
Route::put('{user}/compteUpdate',[UserController::class,'compteUpdate'])->name('compte.updatePhoto');

Auth::routes();

Route::get('/home', [HomeController::class, 'doc'])->name('home');
Route::get('/files',[DocumentController::class, 'files'])->name('files');

Route::prefix('')->group(function(){
    Route::get('/folders', [FolderController::class, 'index'])->name('folders.index');
    Route::get('/folders/{folder:id}',[FolderController::class, 'tri'])->name('folders.tri');
    Route::get('/createfolder',[FolderController::class,'create'])->name('folders.create');
    Route::get('/{folder:id}/createsousfolder',[FolderController::class,'tricreate'])->name('folders.tricreate');
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


Route::prefix('')->group(function(){
    Route::get('/document',[DocumentController::class, 'index'])->name('documents');
    Route::get('/editdocument/{document}',[DocumentController::class, 'edit'])->name('documents.edit');
    Route::get('/document/{document}',[DocumentController::class, 'show'])->name('documents.show');
    Route::get('/{folder:id}/createdocument',[DocumentController::class, 'create'])->name('documents.create');
    Route::post('/document/store',[DocumentController::class,'store'])->name('documents.store');
    Route::put('/document/{document}/update',[DocumentController::class,'update'])->name('documents.update');
    Route::put('/document/{document}/updateFile',[DocumentController::class,'updateFile'])->name('documents.updateFile');
    Route::delete('/document/{document:id}/delete',[DocumentController::class,'delete'])->name('documents.delete');
    Route::get('/document/download/{document:id}',[DocumentController::class,'download'])->name('documents.download');
});

Route::prefix('')->middleware('admin')->group(function(){
    Route::get('/groupes',[GroupeController::class, 'index'])->name('groupes');
    Route::get('/groupes/{groupe}',[GroupeController::class, 'edit'])->name('groupes.edit');
    Route::get('/creategroupe',[GroupeController::class, 'create'])->name('groupes.create');
    Route::post('/groupes/store',[GroupeController::class,'store'])->name('groupes.store');
    Route::put('/groupes/{groupe}/update',[GroupeController::class,'update'])->name('groupes.update');
    Route::delete('/groupes/{groupe:id}/delete',[GroupeController::class,'delete'])->name('groupes.delete');
});


Route::get('/relation',function(){
    return Groupe::with('users')->find(1);
});

Route::get('/search',[SearchController::class,'search'])->name('search');