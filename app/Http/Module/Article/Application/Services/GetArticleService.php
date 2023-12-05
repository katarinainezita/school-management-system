<?php

namespace App\Http\Module\Article\Application\Services;

use App\Http\Module\Article\Domain\Model\Article;
use App\Http\Module\Article\Infrastructure\Repository\ArticleRepository;

class GetArticleService
{

    public function __construct(
        private ArticleRepository $articleRepository
    ) {
    }

    public function execute()
    {
        $articles = $this->articleRepository->getAllArticles();

        return $articles;
    }
}