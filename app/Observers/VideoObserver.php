<?php

namespace App\Observers;

use App\Models\Video;
use App\Handlers\YsyHandler;
use Illuminate\Support\Facades\DB;

class VideoObserver
{

    public function saved(Video $video)
    {
        $ysy = new YsyHandler;
        if (!$video['token'])
        {
            //萤石云
            if ($video['video_type'] == 1)
            {
                $token = $ysy->getToken($video['configure']['appkey'], $video['configure']['appsecret'], $video['id']);
            }
        } else {
            $token = $video['token'];
        }

        if (!$video['video_url'])
        {
            //1-ezopen、2-hls、3-rtmp、4-flv
            $ysy->getVideoUrl($token,$video['configure']['sn'],$video['configure']['passageway'],$video['id'], 1);
        }
        if (!$video['video_url_rtmp'])
        {
            //1-ezopen、2-hls、3-rtmp、4-flv
            $ysy->getVideoUrl($token,$video['configure']['sn'],$video['configure']['passageway'],$video['id'], 3);
        }
    }
    /**
     * Handle the Video "created" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function created(Video $video)
    {
        //
    }

    /**
     * Handle the Video "updated" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function updated(Video $video)
    {
        //
    }

    /**
     * Handle the Video "deleted" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function deleted(Video $video)
    {
        //
    }

    /**
     * Handle the Video "restored" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function restored(Video $video)
    {
        //
    }

    /**
     * Handle the Video "force deleted" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function forceDeleted(Video $video)
    {
        //
    }
}
