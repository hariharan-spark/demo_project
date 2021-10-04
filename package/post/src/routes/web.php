<?php

use Illuminate\Support\Facades\Route;


use  Package\Post\App\Http\Controllers\PostController;
use  Package\Post\App\Http\Controllers\FileController;









Route::get('/post', [PostController::class, 'post'])->name('post');
Route::post('/addpost', [PostController::class, 'addPost'])->name('add-post');
Route::get('/getpost', [PostController::class, 'getPost']);
Route::post('/update', [PostController::class, 'updatePost'])->name('update-post');
Route::Post('/delete', [PostController::class, 'deletePost'])->name('delete-post');





Route::get('/file', [FileController::class, 'index']);
Route::post('/store-file', [FileController::class, 'store']);




Route::post('file-import', [FileController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [FileController::class, 'fileExport'])->name('file-export');






?>
