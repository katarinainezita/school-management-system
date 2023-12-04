<?php

namespace App\Http\Module\Article\Presentation\Controller;

use App\Http\Module\Article\Application\Services\CreateArticleRequest;
use App\Http\Module\Article\Application\Services\CreateArticleService;
use App\Http\Module\Article\Application\Services\GetArticleRequest;
use App\Http\Module\Article\Application\Services\GetArticleService;
use App\Http\Module\Article\Application\Services\EditArticleRequest;
use App\Http\Module\Article\Application\Services\EditArticleService;
use App\Http\Module\Article\Domain\Model\Article;
use Illuminate\Http\Request;

class ArticleController
{
    public function __construct(
        private CreateArticleService $create_article_service,
        private GetArticleService $getArticleService,
        private EditArticleService $edit_article_service
    ) {
    }

    public function createArticle(Request $request)
    {
        $request = new CreateArticleRequest(
            $request['section_id'],
            $request['text'],
        );

        $this->create_article_service->execute($request);

        return redirect()->back();
    }

    public function editArticle(Request $request)
    {
        $request = new EditArticleRequest(
            $request['section_id'],
            $request['text'],
        );

        $this->edit_article_service->execute($request);

        return redirect()->back();
    }

    public function getAllArticles()
    {
        $getArticleRequest = new GetArticleRequest();
        $articles = $this->getArticleService->execute($getArticleRequest);

        return ($articles);
    }
}