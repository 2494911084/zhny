<?php

namespace App\Admin\Controllers;

use App\Models\WorkOrder;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;

class WorkOrdersController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '工单管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $work_order = new WorkOrder();
        $grid = new Grid($work_order);

        if (Admin::user()->inRoles(['children_user'])) {
            $grid->model()->where('admin_user_id', Admin::user()->id);
        }

        if (Admin::user()->inRoles(['operator'])) {
            $admin_user_ids = AdminUser::where('parent_id', Admin::user()->id)->get()->pluck('id');
            $admin_user_ids[] = Admin::user()->id;
            $grid->model()->whereIn('admin_user_id', $admin_user_ids);
        }
        // 禁用创建按钮
        $grid->disableCreateButton();
        //
        $grid->disableActions();

        $grid->column('id', __('Id'));
        $grid->column('num', '工单编号');
        $grid->column('equipment.name', __('Equipment id'));
        // $grid->column('status', __('Status'))->using($work_order->status);

        $grid->column('status')->radio($work_order->status);

        $grid->column('work_order_type', __('Work order type'))->using($work_order->work_order_type);
        // $grid->column('admin_user_id', __('Admin user id'));
        // $grid->column('inspection_id', __('Inspection id'));
        // $grid->column('repair_id', __('Repair id'));
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
        $show = new Show(WorkOrder::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('num', __('Num'));
        $show->field('equipment_id', __('Equipment id'));
        $show->field('status', __('Status'));
        $show->field('work_order_type', __('Work order type'));
        $show->field('admin_user_id', __('Admin user id'));
        $show->field('inspection_id', __('Inspection id'));
        $show->field('repair_id', __('Repair id'));
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
        $form = new Form(new WorkOrder());

        $form->text('num', __('Num'));
        $form->number('equipment_id', __('Equipment id'));
        $form->text('status', __('Status'));
        $form->text('work_order_type', __('Work order type'));
        $form->number('admin_user_id', __('Admin user id'));
        $form->number('inspection_id', __('Inspection id'));
        $form->number('repair_id', __('Repair id'));
        $form->text('feedback', __('Feedback'));

        return $form;
    }
}
