<?php

namespace App\Http\Module\Article\Application\Services;

use App\Http\Module\Article\Domain\Model\Article;
use App\Http\Module\Article\Infrastructure\Repository\ArticleRepository;

class DeleteArticleService
{

    public function __construct(
        private ArticleRepository $article_repository
    ) {
    }

    public function execute(DeleteArticleRequest $request)
    {
        $id = $request->section_id;

        $this->article_repository->delete($id);
    }
}