<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-13 08:12:24
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 09:26:22
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Admin\Controllers\AlarmsController.php
 */

namespace App\Admin\Controllers;

use App\Models\Alarm;
use App\Models\Equipment;
use App\Models\AdminUser;
use App\Models\Project;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;

class AlarmsController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '报警设置';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Alarm());


        if (Admin::user()->inRoles(['children_user'])) {
            $grid->model()->where('admin_user_id', Admin::user()->id);
        }

        if (Admin::user()->inRoles(['operator'])) {
            $admin_user_ids = AdminUser::where('parent_id', Admin::user()->id)->get()->pluck('id');
            $admin_user_ids[] = Admin::user()->id;
            $grid->model()->whereIn('admin_user_id', $admin_user_ids);
        }

        $grid->column('id', __('Id'));
        $grid->column('equipment.name', __('Equipment id'));
        // $grid->column('admin_user_id', __('Admin user id'));
        $grid->column('gz', __('Gz'));
        $grid->column('status', __('Status'))->using([
            0 => '关闭',
            1 => '开启'
        ]);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Alarm::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('equipment_id', __('Equipment id'));
        $show->field('admin_user_id', __('Admin user id'));
        $show->field('gz', __('Gz'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Alarm());

        $form->hidden('admin_user_id', __('Admin user id'));

        $form->select('project_id', __('Project id'))->options(Project::where('admin_user_id', Admin::user()->id)->get()->pluck('title', 'id'))->load('equipment_id', '/admin/api/projects/equipment')->required();

        $form->select('equipment_id', __('Equipment id'))->required();
        $states = [
            'on'  => ['value' => 1, 'text' => '开启', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '关闭', 'color' => 'danger'],
        ];

        $form->switch('status', __('Status'))->states($states);
        $form->divider();
        $form->table('gz', __('Gz'), function ($table) {
            $table->text('监控点位');
            $table->text('报警阈值');
        });


        $form->saving(function (Form $form) {

            $form->admin_user_id = Admin::user()->id;
        });
        return $form;
    }
}
