<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-13 08:43:59
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 08:49:50
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Admin\Controllers\AlarmDatasController.php
 */

namespace App\Admin\Controllers;

use App\Models\AlarmData;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Equipment;
class AlarmDatasController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '报警记录';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AlarmData());

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->expand();
            $filter->column(1/2, function ($filter) {
                $filter->equal('equipment_id', __('Equipment id'))->select(Equipment::all()->pluck('name','id'));
            });
            $filter->column(1/2, function ($filter) {
                $filter->between('alarm_time', __('Alarm time'))->datetime();
            });
        });
        $grid->disableCreateButton();
        $grid->disableActions();
        $grid->model()->orderBy('alarm_time','desc');
        $grid->column('id', __('Id'));
        $grid->column('equipment.name', __('Equipment id'));
        $grid->column('alarm_content', __('Alarm content'));
        $grid->column('alarm_time', __('Alarm time'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(AlarmData::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('equipment_id', __('Equipment id'));
        $show->field('alarm_content', __('Alarm content'));
        $show->field('alarm_time', __('Alarm time'));
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
        $form = new Form(new AlarmData());

        $form->number('equipment_id', __('Equipment id'));
        $form->text('alarm_content', __('Alarm content'));
        $form->datetime('alarm_time', __('Alarm time'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
