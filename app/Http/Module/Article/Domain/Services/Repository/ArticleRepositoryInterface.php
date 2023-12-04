<?php

namespace App\Http\Module\Article\Domain\Services\Repository;

use App\Http\Module\Article\Domain\Model\Article;

interface ArticleRepositoryInterface
{
    public function save(Article $article);
    public function getAllArticles();
}