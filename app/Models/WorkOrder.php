<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 12:51:20
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 12:55:53
 * @Description: 工单
 * @FilePath: \laravel-admin\app\Models\WorkOrder.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class WorkOrder extends Model
{
    use HasFactory,DefaultDatetimeFormat;

    public $status = [
        1   =>  '未开始',
        2   =>  '已下发',
        3   =>  '进行中',
        4   =>  '已完成',
    ];

    public $work_order_type = [
        '1' => '巡检工单',
        '2' => '报修工单'
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }
}
