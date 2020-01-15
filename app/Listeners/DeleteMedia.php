<?php

namespace App\Listeners;

use App\Events\MediaDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class DeleteMedia
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
     * @param object $event
     * @return void
     */
    public function handle(MediaDeleted $event)
    {
        Storage::disk('local')->delete('public/media/' . $event->media->name);
    }
}
