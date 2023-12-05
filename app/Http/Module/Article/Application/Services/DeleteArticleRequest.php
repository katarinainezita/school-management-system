<?php

namespace App\Http\Module\Article\Application\Services;

class DeleteArticleRequest
{
    public function __construct(
        public int $section_id,
    ) {
    }
}