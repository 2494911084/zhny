<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-08 19:11:55
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-08 23:19:15
 * @Description: 项目模型文件
 * @FilePath: \laravel-admin\app\Models\Project.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class Project extends Model
{
    use HasFactory,DefaultDatetimeFormat;

    public function admin_user()
    {
        return $this->belongsTo(AdminUser::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
