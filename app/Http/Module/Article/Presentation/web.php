<?php

use App\Http\Module\Article\Presentation\Controller\ArticleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('api/ping', function () {
    return csrf_token();
});

Route::get('api/testing', function () {
    return 'masuk';
});

Route::post('api/testing', function (Request $request){
    return $request;
});

Route::post('/learn/add-article', [ArticleController::class, 'createArticle'])->name('article.store');

Route::patch('/learn/edit-article', [ArticleController::class, 'editArticle'])->name('article.edit');

Route::patch('/learn/delete-article', [ArticleController::class, 'deleteArticle'])->name('article.delete');

Route::get('api/article', [ArticleController::class, 'getAllArticles']);

Route::post('api/article/create', [ArticleController::class, 'createArticle']);