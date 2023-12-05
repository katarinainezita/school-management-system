<?php

namespace App\Http\Module\Article\Application\Services;

use App\Http\Module\Article\Domain\Model\Article;
use App\Http\Module\Article\Infrastructure\Repository\ArticleRepository;

class CreateArticleService
{

    public function __construct(
        private ArticleRepository $article_repository
    ) {
    }

    public function execute(CreateArticleRequest $request)
    {
        $article = new Article(
            $request->section_id,
            $request->text,
        );

        $this->article_repository->save($article);
    }
}