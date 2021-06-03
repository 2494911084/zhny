<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 12:01:53
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 15:44:23
 * @Description: 巡检计划
 * @FilePath: \laravel-admin\app\Models\Inspection.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Inspection extends Model
{
    use HasFactory,DefaultDatetimeFormat;

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function wecaht_user()
    {
        return $this->belongsTo(WechatUser::class);
    }

    public function admin_user()
    {
        return $this->belongsTo(AdminUser::class);
    }

    public function work_order()
    {
        return $this->hasOne(WorkOrder::class);
    }
}
