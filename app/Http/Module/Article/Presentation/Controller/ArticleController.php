<?php

namespace App\Http\Module\Article\Presentation\Controller;

use App\Http\Module\Article\Application\Services\CreateArticleRequest;
use App\Http\Module\Article\Application\Services\CreateArticleService;
use App\Http\Module\Article\Application\Services\GetArticleRequest;
use App\Http\Module\Article\Application\Services\GetArticleService;
use App\Http\Module\Article\Application\Services\EditArticleRequest;
use App\Http\Module\Article\Application\Services\EditArticleService;
use App\Http\Module\Article\Application\Services\DeleteArticleRequest;
use App\Http\Module\Article\Application\Services\DeleteArticleService;
use App\Http\Module\Article\Domain\Model\Article;
use Illuminate\Http\Request;

class ArticleController
{
    public function __construct(
        private CreateArticleService $create_article_service,
        private GetArticleService $getArticleService,
        private EditArticleService $edit_article_service,
        private DeleteArticleService $delete_article_service
    ) {
    }

    public function createArticle(Request $request)
    {
        $request->validate([
            'section_id' => 'required|integer',
            'text' => 'required|string'
        ]);

        $request = new CreateArticleRequest(
            $request['section_id'],
            $request['text'],
        );

        $this->create_article_service->execute($request);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Article created successfully']);
    }

    public function editArticle(Request $request)
    {
        $request->validate([
            'section_id' => 'required|integer',
            'text' => 'required|string'
        ]);

        $request = new EditArticleRequest(
            $request['section_id'],
            $request['text'],
        );

        $this->edit_article_service->execute($request);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Article edited successfully']);
    }

    public function deleteArticle(Request $request)
    {
        $request->validate([
            'section_id' => 'required|integer|exists:articles,section_id'
        ]);

        $request = new DeleteArticleRequest(
            $request['section_id'],
        );

        $this->delete_article_service->execute($request);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Article deleted successfully']);
    }

    public function getAllArticles()
    {
        $getArticleRequest = new GetArticleRequest();
        $articles = $this->getArticleService->execute($getArticleRequest);

        return ($articles);
    }
}