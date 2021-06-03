<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 13:26:10
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 15:41:14
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Observers\RepairObserver.php
 */

namespace App\Observers;

use App\Models\Repair;
use Illuminate\Support\Facades\DB;

class RepairObserver
{
    /**
     * Handle the Repair "created" event.
     *
     * @param  \App\Models\Repair  $repair
     * @return void
     */
    public function created(Repair $repair)
    {
        DB::table('work_orders')->insert([
            "num" => time() . random_int(1,100) . 1,
            "equipment_id"      => $repair->equipment_id,
            "status"            => 1,
            'work_order_type'   => 2,
            "admin_user_id"     => $repair->admin_user_id,
            "inspection_id"     => 0 ,
            "repair_id"         => $repair->id,
            "created_at"        => date('Y-m-d H:i:s'),
            "updated_at"        => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Handle the Repair "updated" event.
     *
     * @param  \App\Models\Repair  $repair
     * @return void
     */
    public function updated(Repair $repair)
    {
        //
    }

    /**
     * Handle the Repair "deleted" event.
     *
     * @param  \App\Models\Repair  $repair
     * @return void
     */
    public function deleted(Repair $repair)
    {
        //
    }

    /**
     * Handle the Repair "restored" event.
     *
     * @param  \App\Models\Repair  $repair
     * @return void
     */
    public function restored(Repair $repair)
    {
        //
    }

    /**
     * Handle the Repair "force deleted" event.
     *
     * @param  \App\Models\Repair  $repair
     * @return void
     */
    public function forceDeleted(Repair $repair)
    {
        //
    }
}
