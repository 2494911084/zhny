<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 06:41:23
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 12:36:18
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Admin\Controllers\AuthController.php
 */

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AuthController as BaseAuthController;
use Illuminate\Http\Request;

class AuthController extends BaseAuthController
{


    /**
     * Handle a login request.
     *
     * @param Request $request
     *
     * @return mixed
     */
    // public function postLogin(Request $request)
    // {
    //     $this->loginValidator($request->all())->validate();

    //     $credentials = $request->only([$this->username(), 'password']);
    //     $remember = $request->get('remember', false);

    //     if ($this->guard()->attempt($credentials, $remember)) {
    //         $request->session()->regenerate();
    //         return response()->json(["Status"=>"ok","Text"=>"登陆成功<br /><br />欢迎回来"]);
    //     }
    //     return response()->json(["Status"=>"err","Text"=>"登陆失败<br /><br />"]);

    //     return back()->withInput()->withErrors([
    //         $this->username() => $this->getFailedLoginMessage(),
    //     ]);
    // }
}
