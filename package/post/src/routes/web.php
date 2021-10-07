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

Route::get('importExportView', [FileController::class, 'importExportView']);
Route::get('export', [FileController::class, 'export'])->name('export');
Route::post('import', [FileController::class, 'import'])->name('import');











?>
