<?php

namespace App\Http\Module\Article\Infrastructure\Repository;

use App\Http\Module\Article\Domain\Model\Article;
use App\Http\Module\Article\Domain\Services\Repository\ArticleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function save(Article $article)
    {
        DB::table('articles')->upsert(
            [
                'section_id' => $article->section_id,
                'text' => $article->text,
            ],
            'section_id'
        );
    }

    public function edit(Article $article)
    {
        DB::table('articles')->where('section_id', $article->section_id)
                            ->update(['text' => $article->text]);
    }

    public function getAllArticles()
    {
        return DB::table('articles')->get();
    }
}