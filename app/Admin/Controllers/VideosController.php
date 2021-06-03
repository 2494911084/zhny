<?php

namespace App\Admin\Controllers;

use App\Models\Equipment;
use App\Models\Project;
use App\Models\Video;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;

class VideosController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '视频对讲';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $video = new Video();
        $grid = new Grid($video);

        if (Admin::user()->inRoles(['children_user'])) {
            $grid->model()->where('admin_user_id', Admin::user()->id);
        }

        if (Admin::user()->inRoles(['operator'])) {
            $admin_user_ids = AdminUser::where('parent_id', Admin::user()->id)->get()->pluck('id');
            $admin_user_ids[] = Admin::user()->id;
            $grid->model()->whereIn('admin_user_id', $admin_user_ids);
        }
        $grid->column('id', __('Id'));
        $grid->column('video_name', __('Video name'));
//        $grid->column('video_url', __('Video url'));
        $grid->column('video_type', __('Video type'))->using($video->video_type);
        $grid->column('equipment.name', __('Equipment id'));
        $grid->column('configure', __('Configure'));
        $grid->column('对讲')->display(function (){
            return "<a target='_blank' href=".url('/videodj/'.$this->id).">点击</a>";
        });
        // // $grid->column('admin_user_id', __('Admin user id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->like('video_name', __('Video name'));
            $filter->equal('video_type', __('Video type'))->radio([
                ''   => 'All',
                1    => '萤石云',
            ]);
            $filter->where(function ($query) {

                $query->whereHas('equipment', function ($query) {
                    $query->where('sn', 'like', "%{$this->input}%")->orWhere('sn', 'like', "%{$this->input}%");
                });

            }, '采集设备');

        });
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
        $show = new Show(Video::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('video_name', __('Video name'));
        $show->field('video_url', __('Video url'));
        $show->field('video_type', __('Video type'));
        $show->field('equipment_id', __('Equipment id'));
        $show->field('configure', __('Configure'));
        $show->field('admin_user_id', __('Admin user id'));
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
        $video = new Video();
        $form = new Form($video);

        $form->text('video_name', __('Video name'))->required();
//        $form->text('video_url', __('Video url'));
        $form->select('video_type', __('Video type'))->options($video->video_type)->required();

        $form->select('project_id', __('Project id'))->options(Project::where('admin_user_id', Admin::user()->id)->get()->pluck('title', 'id'))->load('equipment_id', '/admin/api/projects/equipment')->required();

        $form->select('equipment_id', __('Equipment id'))->required();

        $form->embeds('configure', __('Configure'), function ($form) {

            $form->text('appkey')->rules('required');
            $form->text('appsecret')->rules('required');
            $form->text('sn')->rules('required');
            $form->text('passageway','通道号')->rules('required');
        });
        $form->hidden('admin_user_id', __('Admin user id'));

        $form->saving(function (Form $form) {

            $form->admin_user_id = Admin::user()->id;

        });

        return $form;
    }
}
