<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 01:20:23
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-10 08:35:15
 * @Description: 设备报修
 * @FilePath: \laravel-admin\app\Admin\Controllers\RepairsController.php
 */

namespace App\Admin\Controllers;

use App\Models\Project;
use App\Models\Repair;
use App\Models\Equipment;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use App\Models\WorkOrder;

class RepairsController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '设备报修';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $repair = new Repair();
        $grid = new Grid($repair);

        if (Admin::user()->inRoles(['children_user'])) {
            $grid->model()->where('admin_user_id', Admin::user()->id);
        }

        if (Admin::user()->inRoles(['operator'])) {
            $admin_user_ids = AdminUser::where('parent_id', Admin::user()->id)->get()->pluck('id');
            $admin_user_ids[] = Admin::user()->id;
            $grid->model()->whereIn('admin_user_id', $admin_user_ids);
        }
        $grid->column('id', __('Id'));
        // // $grid->column('admin_user_id', __('Admin user id'));
        $grid->column('equipment.name', __('Equipment id'));
        $grid->column('wechat_user_id', '推送微信');
        $grid->column('person', '报修人');
        $grid->column('tel', __('Tel'));
        $grid->column('reason', __('Reason'));
        $grid->column('work_order.num','工单编号');
        $grid->column('work_order.status','工单状态')->using((new WorkOrder)->status);
        $grid->column('视频对讲');
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
        $show = new Show(Repair::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('admin_user_id', __('Admin user id'));
        $show->field('equipment_id', __('Equipment id'));
        $show->field('wechat_user_id', __('Wechat user id'));
        $show->field('person', __('Person'));
        $show->field('tel', __('Tel'));
        $show->field('reason', __('Reason'));
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
        $form = new Form(new Repair());

        $form->hidden('admin_user_id', __('Admin user id'));

        $form->select('project_id', __('Project id'))->options(Project::where('admin_user_id', Admin::user()->id)->get()->pluck('title', 'id'))->load('equipment_id', '/admin/api/projects/equipment')->required();

        $form->select('equipment_id', __('Equipment id'))->required();
        $form->hidden('wechat_user_id', __('Wechat user id'));
        $form->text('person', __('Person'));
        $form->text('tel', __('Tel'));
        $form->textarea('reason', __('Reason'));

        $form->saving(function (Form $form) {

            $form->admin_user_id = Admin::user()->id;
            $form->wechat_user_id = 1;
        });

        // ! 设备报修提交完成后，新增一条工单记录

        return $form;
    }
}
