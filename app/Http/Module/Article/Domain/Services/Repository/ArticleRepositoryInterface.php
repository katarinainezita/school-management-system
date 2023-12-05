<?php

namespace App\Http\Module\Article\Domain\Services\Repository;

use App\Http\Module\Article\Domain\Model\Article;

interface ArticleRepositoryInterface
{
    public function save(Article $article);
    public function edit(Article $article);
    public function delete(int $id);
    public function getAllArticles();
}