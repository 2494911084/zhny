<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 06:41:23
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 15:44:31
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Models\Repair.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Repair extends Model
{
    use HasFactory,DefaultDatetimeFormat;

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function work_order()
    {
        return $this->hasOne(WorkOrder::class);
    }

}
