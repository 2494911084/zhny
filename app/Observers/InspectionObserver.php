<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 13:26:10
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 15:43:05
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Observers\InspectionObserver.php
 */

namespace App\Observers;

use App\Models\Inspection;
use Illuminate\Support\Facades\DB;

class InspectionObserver
{
    /**
     * Handle the Inspection "created" event.
     *
     * @param  \App\Models\Inspection  $Inspection
     * @return void
     */
    public function created(Inspection $inspection)
    {
        DB::table('work_orders')->insert([
            "num" => time() . random_int(1,100) . 1,
            "equipment_id"      => $inspection->equipment_id,
            "status"            => 1,
            'work_order_type'   => 1,
            "admin_user_id"     => $inspection->admin_user_id,
            "irepair_id"        => 0 ,
            "inspection_id"     => $inspection->id,
            "created_at"        => date('Y-m-d H:i:s'),
            "updated_at"        => date('Y-m-d H:i:s')
        ]);
    }

}
