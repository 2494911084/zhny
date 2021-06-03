<?php
/*
 * @Author: zhujianan
 * @Date: 2021-04-28 14:19:29
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-04-28 14:19:49
 * @Description: 所有的 Api 控制器都会继承这个基类
 * @FilePath: \lve\app\Http\Controllers\Api\Controller.php
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Database\Eloquent\Builder;

class Controller extends BaseController
{
    /**
     * @description: 校验用户是否是管理员
     * @param {*} $user
     * @return {*} true or false
     */
    public function is_admin($user)
    {
        $role_count = $user->roles()
            ->where(function (Builder $query) {
                return $query->whereIn('slug', ['administrator']);
            })
            ->count();
        return $role_count>0?'true':'false';
    }
    public function is_operator($user)
    {
        $role_count = $user->roles()
            ->where(function (Builder $query) {
                return $query->whereIn('slug', ['operator']);
            })
            ->count();
        return $role_count>0?'true':'false';
    }
}
