<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('me', 'me');
});


Route::get('/index' , [ArticleController::class , "index"]);
Route::post('/addArticle' , [ArticleController::class , "addArticle"]);
Route::get('/show/{id}' , [ArticleController::class , "showArticle"]);
Route::put('/update/{id}' , [ArticleController::class , "updateArticle"]);
Route::delete('/delete/{id}' , [ArticleController::class , "deleteArticle"]);
