<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 06:41:23
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 12:50:42
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Admin\bootstrap.php
 */

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
use Encore\Admin\Facades\Admin;

// Encore\Admin\Form::forget(['map', 'editor']);
// 覆盖`admin`命名空间下的视图
app('view')->prependNamespace('admin', resource_path('views/admin'));

if (Admin::user()) {
    $confg = \App\Models\AdminConfig::where('admin_user_id', Admin::user()->id)->first();
    if (!empty($confg['ext'])) {
        $ext = $confg['ext'];
        foreach ($ext as $key => $value) {
            // dd($key);
            if ($key == 'logo') {
                config(["admin.$key" => "<img width='230' height='100' src='$value'>"]);
            } else {
                config(["admin.$key" => $value]);
            }
        }
    }
}

Admin::js('/js/layer/layer.js');
// Admin::disablePjax();
