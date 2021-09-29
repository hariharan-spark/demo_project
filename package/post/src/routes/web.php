<?php

use Illuminate\Support\Facades\Route;


use  Package\Post\App\Http\Controllers\PostController;
use  Package\Post\App\Http\Controllers\FileController;









Route::get('/post', [PostController::class, 'post'])->name('post');
Route::post('/addpost', [PostController::class, 'addPost'])->name('add-post');
Route::get('/getpost', [PostController::class, 'getPost']);
Route::get('/edit/{id}', [PostController::class, 'editPost']);
Route::post('/update', [PostController::class, 'updatePost'])->name('update-post');
Route::get('/delete/{id}', [PostController::class, 'deletePost']);





Route::get('/file', [FileController::class, 'index']);
Route::post('/store-file', [FileController::class, 'store']);






?>
