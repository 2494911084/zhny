<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AlarmData;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class EquipmentDatasContoller extends Controller
{
    public function equipment_data(Request $request)
    {
        $time = date("Y-m-d H:i:s", $request->input('timestamp')/1000);

        $payload = json_decode($request->input('payload'), true);

        //查询出设备
        $equipment = Equipment::where('sn', $payload['id'])->first();
        if ($equipment)
        {
            //更新设备的在线状态
            $equipment->status = $payload['cnt'];
            $equipment->save();

            if($payload['cnt'] == 0)
            {
                AlarmData::create([
                    'equipment_id' => $equipment['id'],
                    'alarm_content' => '设备离线',
                    'alarm_time' => date("Y-m-d H:i:s", time()),
                ]);
            }


            //获取设备上报的数据
            $value = $payload['Value'];

            //根据设备类型获取设备数据表
            switch ($payload['type'])
            {
                case 1:
                    //正泰单相电表
                    DB::table('data_dxdbs')->insert([
                        'equipment_id' => $equipment['id'],
                        'a_u' => $value['A_U'],
                        'a_l' => $value['A_I'],
                        'pf' => $value['PF'],
                        'freq' => $value['Freq'],
                        'ep' => $value['Ep'],
                        'cnt'   => $payload['cnt'],
                        'date_time' => $time,
                    ]);
                    break;
                case 5:
                    //光伏发电
                    DB::table('data_gffds')->insert([
                        'equipment_id' => $equipment['id'],
                        'all_power' => $value['All_Power'],
                        'all_time' => $value['All_Time'],
                        'pv1_u' => $value['Pv1_U'],
                        'pv2_u' => $value['Pv2_U'],
                        'pv1_l' => $value['Pv1_I'],
                        'pv2_l' => $value['Pv2_I'],
                        'r_u' => $value['R_U'],
                        's_u' => $value['S_U'],
                        't_u' => $value['T_U'],
                        'r_l' => $value['R_I'],
                        's_l' => $value['S_I'],
                        't_l' => $value['T_I'],
                        'r_f' => $value['R_f'],
                        's_f' => $value['S_f'],
                        't_f' => $value['T_f'],
                        'all_p' => $value['All_P'],
                        'run_state' => $value['Run_State'],
                        'temp' => $value['Temp'],
                        'today_power' => $value['Today_Power'],
                        'cnt'   => $payload['cnt'],
                        'date_time' => $time,
                    ]);
                    break;
            }
        }
    }

}
