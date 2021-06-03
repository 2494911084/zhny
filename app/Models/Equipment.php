<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-08 21:22:07
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-12 18:32:08
 * @Description: 采集设备
 * @FilePath: \laravel-admin\app\Models\Equipment.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Equipment extends Model
{
    use HasFactory,DefaultDatetimeFormat;
    protected $table = 'equipments';
    public $equipment_type = [
        1 => '单相电表',
        2 => '三相电表',
        3 => '光伏发电',
        4 => '风力发电',
        5 => '储能设备',
        6 => '环境采集器',
        7 => '气象仪',
    ];
    public $uppl = [
        // 1 => "5秒",
        // 2 => "10秒",
        20 => "20秒",
        30 => "30秒",
        40 => "40秒",
        50 => "50秒",
        60 => "1分钟",
        120 => "2分钟",
        180 => "3分钟",
        240 => "4分钟",
        300 => "5分钟",
        600 => "10分钟",
        900 => "15分钟",
        1800 => "30分钟",
        3600 => "1小时",
        7200 => "2小时",
        10800 => "3小时",
        14400 => "4小时",
        18000 => "5小时",
        21600 => "6小时",
        25200 => "7小时",
        28800 => "8小时",
        32400 => "9小时",
        36000 => "10小时",
        39600 => "11小时",
        43200 => "12小时",
        46800 => "13小时",
        50400 => "14小时",
        54000 => "15小时",
        57600 => "16小时",
        61200 => "17小时",
        64800 => "18小时",
        68400 => "19小时",
        72000 => "20小时",
        75600 => "21小时",
        79200 => "22小时",
        82800 => "23小时",
        86400 => "24小时",
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // * 关联用户
    public function admin_user()
    {
        return $this->belongsTo(AdminUser::class);
    }

    // * 关联报警设置
    public function alarmSetting()
    {
        return $this->hasOne(AlarmSetting::class);
    }

    // * 关联视频
    public function video()
    {
        return $this->hasOne(Video::class);
    }

    // * 关联报警记录 一对多
    public function alarm_datas()
    {
        return $this->hasMany(AlarmData::class);
    }
}
