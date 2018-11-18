<?php

namespace App\Jobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;

class TranslateSlug implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $topic;

    public function __construct(Topic $topic)
    {
        $сategories = DB::table('categories')->get();
      View::share('сategories', $сategories);
        $this->topic = $topic;
    }

    public function handle()
    {
        $slug = app(SlugTranslateHandler::class)->translate($this->topic->title);

        \DB::table('topics')->where('id', $this->topic->id)->update(['slug' => $slug]);
    }
}