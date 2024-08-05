<?php

namespace App\Listeners;

use App\Events\UpdateView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseArticleViews
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UpdateView $event): void
    {
        $article = $event->article;
        $article->increment('views');
    }
}
