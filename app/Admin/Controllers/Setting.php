<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-12 22:51:57
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 01:08:18
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Admin\Controllers\Setting.php
 */

namespace App\Admin\Controllers;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use App\Models\AdminConfig;
use Encore\Admin\Facades\Admin;
use App\Handlers\ImageUploadHandler;

class Setting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '系统设置';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        // dd($request->file('ext.logo'));
        $admin_config = new AdminConfig();
        $uploader = new ImageUploadHandler();
        $user_config = $admin_config->where('admin_user_id', Admin::user()->id)->first();
        $ext = $request->input('ext');

        if ($request->file('ext.logo')) {
            $result = $uploader->save($request->file('ext.logo'), 'logo', Admin::user()->id);
        // dd($request->file('ext.logo'));
            if ($result) {
                $ext['logo'] = $result['path'];
            }
        }

        if ($user_config) {
            $user_config->admin_user_id = Admin::user()->id;

            if (!isset($ext['logo']) && isset($user_config->ext['logo'])) {
                $ext['logo'] = $user_config->ext['logo'];
            }
            $user_config->ext = $ext;
            $user_config->save();
        } else {
            $admin_config->admin_user_id = Admin::user()->id;
            $admin_config->ext = $ext;
            $admin_config->save();
        }
        admin_success('修改完成.');
        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->hidden('admin_user_id');

        $this->embeds('ext', '', function ($form) {

            $form->text('title', '系统名称');
            $form->image('logo', 'logo');
            $form->text('logo-mini', 'logo-mini');
            $form->text('top_alert', '顶部文字');
            // $form->text('skin', '皮肤');
            // $form->radio('skin')->options(['m' => "", 'f'=> 'Male'])->default('m');

        });
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        $admin_config = new AdminConfig();
        $user_config = $admin_config->where('admin_user_id', Admin::user()->id)->first();
        if ($user_config) {
            $ext = $user_config['ext'];
        } else {
            $ext['skin'] = 'skin-blue';
        }
        return [
            'ext' => $ext,
        ];
    }
}
