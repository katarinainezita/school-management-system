<?php

namespace App\Http\Module\Article\Application\Services;

class CreateArticleRequest
{
    public function __construct(
        public int $section_id,
        public string $text,
    ) {
    }
}