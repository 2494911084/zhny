<?php

namespace App\Admin\Controllers;

use App\Models\DataSxdb;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DataSxdbsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '三相电表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DataSxdb());
        $grid->fixColumns(3, -2);
        $grid->disableActions();
        $grid->disableCreateButton();

        $grid->column('id', __('Id'));
        $grid->column('equipment_id', __('Equipment id'));
        $grid->column('cnt', __('Cnt'));
        $grid->column('a_u', __('A相电压'));
        $grid->column('b_u', __('B相电压'));
        $grid->column('c_u', __('C相电压'));
        $grid->column('ab_u', __('Ab相电压'));
        $grid->column('bc_u', __('Bc相电压'));
        $grid->column('ca_u', __('Ca相电压'));
        $grid->column('a_l', __('A相电流'));
        $grid->column('b_l', __('B相电流'));
        $grid->column('c_l', __('C相电流'));
        $grid->column('a_p', __('A相有功功率'));
        $grid->column('b_p', __('B相有功功率'));
        $grid->column('c_p', __('C相有功功率'));
        $grid->column('all_p', __('总有功功率'));
        $grid->column('a_pn', __('A相无功功率'));
        $grid->column('b_pn', __('B相无功功率'));
        $grid->column('c_pn', __('C相无功功率'));
        $grid->column('all_pn', __('总无功功率'));
        $grid->column('a_q', __('A相功率因素'));
        $grid->column('b_q', __('B相功率因素'));
        $grid->column('c_q', __('C相功率因素'));
        $grid->column('all_q', __('总功率因素'));
        $grid->column('freq', __('Freq'));
        $grid->column('eup_f', __('正向有功电能'));
        $grid->column('enp_f', __('反向有功电能'));
        $grid->column('ep_f', __('有功电能总和'));
        $grid->column('eup_b', __('感性无功电度'));
        $grid->column('enp_b', __('容性无功电度'));
        $grid->column('ep_b', __('无功电能总和'));
        $grid->column('u_unb', __('电压不平衡度'));
        $grid->column('i_unb', __('电流不平衡度'));
        $grid->column('ep_need', __('有功需量'));
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
        $show = new Show(DataSxdb::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('equipment_id', __('Equipment id'));
        $show->field('cnt', __('Cnt'));
        $show->field('a_u', __('A u'));
        $show->field('b_u', __('B u'));
        $show->field('c_u', __('C u'));
        $show->field('ab_u', __('Ab u'));
        $show->field('bc_u', __('Bc u'));
        $show->field('ca_u', __('Ca u'));
        $show->field('a_l', __('A l'));
        $show->field('b_l', __('B l'));
        $show->field('c_l', __('C l'));
        $show->field('a_p', __('A p'));
        $show->field('b_p', __('B p'));
        $show->field('c_p', __('C p'));
        $show->field('all_p', __('All p'));
        $show->field('a_pn', __('A pn'));
        $show->field('b_pn', __('B pn'));
        $show->field('c_pn', __('C pn'));
        $show->field('all_pn', __('All pn'));
        $show->field('a_q', __('A q'));
        $show->field('b_q', __('B q'));
        $show->field('c_q', __('C q'));
        $show->field('all_q', __('All q'));
        $show->field('freq', __('Freq'));
        $show->field('eup_f', __('Eup f'));
        $show->field('enp_f', __('Enp f'));
        $show->field('ep_f', __('Ep f'));
        $show->field('eup_b', __('Eup b'));
        $show->field('enp_b', __('Enp b'));
        $show->field('ep_b', __('Ep b'));
        $show->field('u_unb', __('U unb'));
        $show->field('i_unb', __('I unb'));
        $show->field('ep_need', __('Ep need'));
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
        $form = new Form(new DataSxdb());

        $form->number('equipment_id', __('Equipment id'));
        $form->text('cnt', __('Cnt'));
        $form->text('a_u', __('A u'));
        $form->text('b_u', __('B u'));
        $form->text('c_u', __('C u'));
        $form->text('ab_u', __('Ab u'));
        $form->text('bc_u', __('Bc u'));
        $form->text('ca_u', __('Ca u'));
        $form->text('a_l', __('A l'));
        $form->text('b_l', __('B l'));
        $form->text('c_l', __('C l'));
        $form->text('a_p', __('A p'));
        $form->text('b_p', __('B p'));
        $form->text('c_p', __('C p'));
        $form->text('all_p', __('All p'));
        $form->text('a_pn', __('A pn'));
        $form->text('b_pn', __('B pn'));
        $form->text('c_pn', __('C pn'));
        $form->text('all_pn', __('All pn'));
        $form->text('a_q', __('A q'));
        $form->text('b_q', __('B q'));
        $form->text('c_q', __('C q'));
        $form->text('all_q', __('All q'));
        $form->text('freq', __('Freq'));
        $form->text('eup_f', __('Eup f'));
        $form->text('enp_f', __('Enp f'));
        $form->text('ep_f', __('Ep f'));
        $form->text('eup_b', __('Eup b'));
        $form->text('enp_b', __('Enp b'));
        $form->text('ep_b', __('Ep b'));
        $form->text('u_unb', __('U unb'));
        $form->text('i_unb', __('I unb'));
        $form->text('ep_need', __('Ep need'));
        $form->datetime('date_time', __('Date time'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
