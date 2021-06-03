<?php

namespace App\Admin\Controllers;

use App\Models\DataDxdb;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Database\Eloquent\Model;

class DataDxdbsController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '单相电表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DataDxdb());

        $grid->fixColumns(3, -4);
        $grid->disableActions();
        $grid->disableCreateButton();

        $grid->column('id', __('Id'));
        $grid->column('equipment_id', __('Equipment id'));
        $grid->column('cnt', __('Cnt'));
        $grid->column('a_u', __('A u'));
        $grid->column('a_l', __('A l'));
        $grid->column('pf', __('Pf'));
        $grid->column('freq', __('Freq'));
        $grid->column('ep', __('Ep'));
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
        $show = new Show(DataDxdb::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('equipment_id', __('Equipment id'));
        $show->field('cnt', __('Cnt'));
        $show->field('a_u', __('A u'));
        $show->field('a_l', __('A l'));
        $show->field('pf', __('Pf'));
        $show->field('freq', __('Freq'));
        $show->field('ep', __('Ep'));
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
        $form = new Form(new DataDxdb());

        $form->number('equipment_id', __('Equipment id'));
        $form->text('cnt', __('Cnt'));
        $form->text('a_u', __('A u'));
        $form->text('a_l', __('A l'));
        $form->text('pf', __('Pf'));
        $form->text('freq', __('Freq'));
        $form->text('ep', __('Ep'));
        $form->datetime('date_time', __('Date time'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
