<?php

namespace App\Admin\Controllers;

use App\Models\DataGffd;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DataGffdsController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '光伏发电';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DataGffd());
        $grid->fixColumns(3, -4);
        $grid->disableActions();
        $grid->disableCreateButton();

        $grid->column('id', __('Id'));
        $grid->column('equipment_id', __('Equipment id'));
        $grid->column('cnt', __('Cnt'));
        $grid->column('pv1_u', __('Pv1 u'));
        $grid->column('pv2_u', __('Pv2 u'));
        $grid->column('pv1_l', __('Pv1 l'));
        $grid->column('pv2_l', __('Pv2 l'));
        $grid->column('r_u', __('R u'));
        $grid->column('s_u', __('S u'));
        $grid->column('t_u', __('T u'));
        $grid->column('r_l', __('R l'));
        $grid->column('s_l', __('S l'));
        $grid->column('t_l', __('T l'));
        $grid->column('r_f', __('R f'));
        $grid->column('s_f', __('S f'));
        $grid->column('t_f', __('T f'));
        $grid->column('all_p', __('All p'));
        $grid->column('run_state', __('Run state'));
        $grid->column('temp', __('Temp'));
        $grid->column('all_power', __('All power'));
        $grid->column('all_time', __('All time'));
        $grid->column('today_power', __('Today power'));
        $grid->column('date_time', __('Date time'));

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
        $show = new Show(DataGffd::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('equipment_id', __('Equipment id'));
        $show->field('cnt', __('Cnt'));
        $show->field('all_power', __('All power'));
        $show->field('all_time', __('All time'));
        $show->field('pv1_u', __('Pv1 u'));
        $show->field('pv2_u', __('Pv2 u'));
        $show->field('pv1_l', __('Pv1 l'));
        $show->field('pv2_l', __('Pv2 l'));
        $show->field('r_u', __('R u'));
        $show->field('s_u', __('S u'));
        $show->field('t_u', __('T u'));
        $show->field('r_l', __('R l'));
        $show->field('s_l', __('S l'));
        $show->field('t_l', __('T l'));
        $show->field('r_f', __('R f'));
        $show->field('s_f', __('S f'));
        $show->field('t_f', __('T f'));
        $show->field('all_p', __('All p'));
        $show->field('run_state', __('Run state'));
        $show->field('temp', __('Temp'));
        $show->field('today_power', __('Today power'));
        $show->field('date_time', __('Date time'));
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
        $form = new Form(new DataGffd());

        $form->number('equipment_id', __('Equipment id'));
        $form->text('cnt', __('Cnt'));
        $form->text('all_power', __('All power'));
        $form->text('all_time', __('All time'));
        $form->text('pv1_u', __('Pv1 u'));
        $form->text('pv2_u', __('Pv2 u'));
        $form->text('pv1_l', __('Pv1 l'));
        $form->text('pv2_l', __('Pv2 l'));
        $form->text('r_u', __('R u'));
        $form->text('s_u', __('S u'));
        $form->text('t_u', __('T u'));
        $form->text('r_l', __('R l'));
        $form->text('s_l', __('S l'));
        $form->text('t_l', __('T l'));
        $form->text('r_f', __('R f'));
        $form->text('s_f', __('S f'));
        $form->text('t_f', __('T f'));
        $form->text('all_p', __('All p'));
        $form->text('run_state', __('Run state'));
        $form->datetime('temp', __('Temp'))->default(date('Y-m-d H:i:s'));
        $form->datetime('today_power', __('Today power'))->default(date('Y-m-d H:i:s'));
        $form->datetime('date_time', __('Date time'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
