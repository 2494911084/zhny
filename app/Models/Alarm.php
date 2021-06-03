<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-13 08:10:45
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 08:23:32
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Models\Alarm.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Alarm extends Model
{
    use HasFactory,DefaultDatetimeFormat;

    protected $casts = [
        'gz' => 'json'
    ];
    public function getGzAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }

    public function setGzAttribute($value)
    {
        $this->attributes['gz'] = json_encode(array_values($value));
    }


    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
