<?php

namespace App\Blog\Observers;

use App\User;
use App\Blog\Models\Article;

class Articles
{
	/**
     * Listen to the Article creating event.
     *
     * @param  Article  $article
     * @return void
     */
    public function creating(Article $article)
    {
        $article->slug = str_slug($article->title);
        $article->author_name = User::find($article->user_id)->name;
        $article->publish_at = \Carbon\Carbon::now()->toDateTimeString();
    }

    /**
     * Listen to the Article updating event.
     *
     * @param  Article  $article
     * @return void
     */
    public function updating(Article $article)
    {
        $article->slug = str_slug($article->title);
    }
}