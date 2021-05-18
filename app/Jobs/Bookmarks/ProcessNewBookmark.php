<?php

namespace App\Jobs\Bookmarks;

use App\Models\Bookmark;
use Illuminate\Bus\Queueable;
use App\Support\Scrapers\Embed;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessNewBookmark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Bookmark $bookmark) {}

    public function handle(Embed $client): void
    {
        $embed = $client->create($this->bookmark->url);
        
        try {
            $this->bookmark->title = $embed->data['title'];
            $this->bookmark->description = $embed->data['description'];
            $this->bookmark->type = $embed->data['type'];
            $this->bookmark->data = $embed->data->toArray();
            $this->bookmark->status = Bookmark::$states['processed'];
            $this->bookmark->save();

        } catch (\Exception $exception) {

            $this->bookmark->update([
                'status' => Bookmark::$states['failed'],
            ]);

            report($exception);

            return;
        }
    }
}
