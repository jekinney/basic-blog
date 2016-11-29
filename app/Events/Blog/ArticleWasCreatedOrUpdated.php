<?php

namespace App\Events\Blog;

use App\Blog\Models\Article;
use Illuminate\Queue\SerializesModels;

class ArticleWasCreatedOrUpdated
{
    use SerializesModels;

    public $article;

    public $imagePath;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article, $imagePath)
    {
        $this->article = $article;
        $this->imagePath = $imagePath;
    }
}
