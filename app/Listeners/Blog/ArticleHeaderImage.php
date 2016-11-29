<?php

namespace App\Listeners\Blog;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Blog\ArticleWasCreatedOrUpdated;

class ArticleHeaderImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticleWasCreatedOrUpdated  $event
     * @return void
     */
    public function handle(ArticleWasCreatedOrUpdated $event)
    {
        // upload image to s3, set header_image path in article
    }
}
