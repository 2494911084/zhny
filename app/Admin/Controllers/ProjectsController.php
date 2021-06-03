<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-08 19:14:07
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 11:07:34
 * @Description: 项目控制器
 * @FilePath: \laravel-admin\app\Admin\Controllers\ProjectsController.php
 */

namespace App\Admin\Controllers;

use App\Models\Project;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
class ProjectsController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '项目管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Project());

        if (Admin::user()->inRoles(['children_user'])) {
            $grid->model()->where('admin_user_id', Admin::user()->id);
        }

        if (Admin::user()->inRoles(['operator'])) {
            $admin_user_ids = AdminUser::where('parent_id', Admin::user()->id)->get()->pluck('id');
            $admin_user_ids[] = Admin::user()->id;
            $grid->model()->whereIn('admin_user_id', $admin_user_ids);
        }

        $grid->column('id', __('Id'));
        // $grid->column('admin_user_id', __('Admin user id'));
        $grid->column('title', __('Title'));
        $grid->column('person', __('Person'));
        $grid->column('tel', __('Tel'));
        $grid->column('start_date', __('Start date'));
        $grid->column('modeling', __('Modeling'))->link();
        $grid->column('line_image', __('Line Image'))->link();
        // //$grid->column('image', __('Image'));
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
        $show = new Show(Project::findOrFail($id));

        $show->field('id', __('Id'));
        // $show->field('admin_user_id', __('Admin user id'));
        $show->field('title', __('Title'));
        $show->field('person', __('Person'));
        $show->field('tel', __('Tel'));
        $show->field('start_date', __('Start date'));
        $show->field('intro', __('Intro'));
        $show->field('latitude', __('Latitude'));
        $show->field('longitude', __('Longitude'));
        $show->field('province_id', __('Province id'));
        $show->field('city_id', __('City id'));
        $show->field('district_id', __('District id'));
        $show->field('image', __('Image'));
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
        $form = new Form(new Project());

        $form->hidden('admin_user_id', __('Admin user id'));
        $form->text('title', __('Title'));
        $form->text('person', __('Person'));
        $form->mobile('tel', __('Tel'));
        $form->url('modeling', __('Modeling'));
        $form->url('line_image', __('Line Image'));
        $form->date('start_date', __('Start date'))->default(date('Y-m-d'));
        $form->image('image','图片');
        $form->distpicker([
            'province_id' => '省',
            'city_id'     => '市',
            'district_id' => '区'
        ]);
        $form->latlong('latitude', 'longitude', '经纬度')->zoom(4)->default(['lat' => 37, 'lng' => 103]);
        $form->editor('intro', __('Intro'));
        // // $form->image('image', __('Image'));
        $form->saving(function (Form $form) {

            $form->admin_user_id = Admin::user()->id;

        });
        return $form;
    }
}
