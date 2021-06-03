<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 12:15:06
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-10 08:34:37
 * @Description: 设备巡检
 * @FilePath: \laravel-admin\app\Admin\Controllers\InspectionsController.php
 */

namespace App\Admin\Controllers;

use App\Models\Inspection;
use App\Models\Project;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use App\Models\Equipment;
use App\Models\WorkOrder;

class InspectionsController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '设备巡检';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $inspection = new Inspection();
        $grid = new Grid($inspection);

        if (Admin::user()->inRoles(['children_user'])) {
            $grid->model()->where('admin_user_id', Admin::user()->id);
        }

        if (Admin::user()->inRoles(['operator'])) {
            $admin_user_ids = AdminUser::where('parent_id', Admin::user()->id)->get()->pluck('id');
            $admin_user_ids[] = Admin::user()->id;
            $grid->model()->whereIn('admin_user_id', $admin_user_ids);
        }

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('equipment.name', __('Equipment id'));
        $grid->column('wechat_user_id', __('Wechat user id'));
        // $grid->column('admin_user.name', __('Admin user id'));
        $grid->column('ins_date', __('Ins date'));
        $grid->column('up_date', __('Up date'));
        $grid->column('work_order.num','工单编号');
        $grid->column('work_order.status','工单状态')->using((new WorkOrder)->status);
        $grid->column('remarks', __('Remarks'));
        $grid->column('feedback', __('Feedback'));
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
        $show = new Show(Inspection::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('equipment_id', __('Equipment id'));
        $show->field('wechat_user_id', __('Wechat user id'));
        $show->field('admin_user_id', __('Admin user id'));
        $show->field('ins_date', __('Ins date'));
        $show->field('up_date', __('Up date'));
        $show->field('remarks', __('Remarks'));
        $show->field('feedback', __('Feedback'));
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
        $form = new Form(new Inspection());

        $form->text('name', __('Name'))->required();

        $form->select('project_id', __('Project id'))->options(Project::where('admin_user_id', Admin::user()->id)->get()->pluck('title', 'id'))->load('equipment_id', '/admin/api/projects/equipment')->required();

        $form->select('equipment_id', __('Equipment id'))->required();
        // ! 微信用户
        $form->select('wechat_user_id', __('Wechat user id'))->options([]);
        $form->hidden('admin_user_id', __('Admin user id'));
        $form->datetime('ins_date', __('Ins date'))->default(date('Y-m-d H:i:s', time() + (24 * 60 * 60)));
        $form->datetime('up_date', __('Up date'))->default(date('Y-m-d H:i:s', time() + (2 * 60 * 60)));
        $form->textarea('remarks', __('Remarks'));
        // // $form->text('feedback', __('Feedback'));


        $form->saving(function (Form $form) {

            $form->admin_user_id = Admin::user()->id;

        });
        return $form;
    }
}
