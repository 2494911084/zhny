<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-12 23:01:29
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-12 23:53:16
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Models\AdminConfig.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminConfig extends Model
{
    use HasFactory;


    protected $casts = [
        'ext' => 'json'
    ];
    public function setExtAttribute($ext)
    {
        if (is_array($ext)) {
            $this->attributes['ext'] = json_encode($ext);
        }
    }

    public function getExtAttribute($ext)
    {
        return json_decode($ext, true);
    }
}
