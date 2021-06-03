<?php
namespace App\Handlers;

use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class YsyHandler
{
    //根据appKey和secret获取accessToken 并存入数据库
    public function getToken($appKey,$secret,$video_id)
    {
        $api = 'http://open.ys7.com/api/lapp/token/get';
        // 发送 HTTP Post 请求
        $response = Http::asForm()->post($api,[
            "appKey"     =>  $appKey,
            "appSecret"    => $secret
        ]);
        $result = json_decode($response->getBody(), true);

        if (!$result['code'] == 200) {
            Log::error('萤石云获取token失败');
        }
        $token = $result['data']['accessToken'];

        DB::table('videos')->update([
            'id' => $video_id,
            'token' => $token
        ]);

        return $token;
    }

    //获取萤石云摄像头播放地址
    public function getVideoUrl($token,$deviceSerial,$channelNos,$video_id,$protocol)
    {
        $api = 'https://open.ys7.com/api/lapp/v2/live/address/get';
        // 发送 HTTP Post 请求
        $response = Http::asForm()->post($api,[
            "accessToken"     =>  $token,
            "deviceSerial"    => $deviceSerial,
            'channelNos' => $channelNos,
            'protocol'  => $protocol
        ]);
        $result = json_decode($response->getBody(), true);

        if (!$result['code'] == 200) {
            Log::error('萤石云获取播放地址失败');
            return false;
        }
        $video_url = $result['data']['url'];
        switch ($protocol)
        {
            case 1:
                $video_url_name = 'video_url';
                break;
            case 2:
                $video_url_name = 'video_url_hls';
                break;
            case 3:
                $video_url_name = 'video_url_rtmp';
                break;
            case 4:
                $video_url_name = 'video_url_flv';
                break;
            default:
                $video_url_name = 'video_url';

        }
        DB::table('videos')->update([
            'id' => $video_id,
             $video_url_name=> $video_url
        ]);

        return $token;
    }
}
