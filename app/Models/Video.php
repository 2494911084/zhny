<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 00:01:26
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 00:23:49
 * @Description: 视频
 * @FilePath: \laravel-admin\app\Models\Video.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Video extends Model
{
    use HasFactory,DefaultDatetimeFormat;

    protected $casts = [
        'configure' => 'json'
    ];

    public $video_type = [
        1   =>  '萤石云',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
