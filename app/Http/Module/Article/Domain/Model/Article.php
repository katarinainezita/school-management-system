<?php

namespace App\Http\Module\Article\Domain\Model;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Article
{
    /**
     * @param int $section_id
     * @param string $text
     */
    public function __construct(
        public int $section_id,
        public string $text,
    ) 
    {
    }
}