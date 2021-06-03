<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-08 21:54:38
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 13:32:32
 * @Description: 采集设备
 * @FilePath: \laravel-admin\app\Admin\Controllers\EquipmentsController.php
 */

namespace App\Admin\Controllers;

use App\Models\Equipment;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Models\Project;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Widgets\Box;
use Illuminate\Support\Facades\Log;

class EquipmentsController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '采集设备';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $equipment = new Equipment();
        $grid = new Grid($equipment);

        if (Admin::user()->inRoles(['children_user'])) {
            $grid->model()->where('admin_user_id', Admin::user()->id);
        }

        if (Admin::user()->inRoles(['operator'])) {
            $admin_user_ids = AdminUser::where('parent_id', Admin::user()->id)->get()->pluck('id');
            $admin_user_ids[] = Admin::user()->id;
            $grid->model()->whereIn('admin_user_id', $admin_user_ids);
        }
        $grid->header(function ($query) use ($equipment) {

            $doughnut = view('admin.equipment.akz', compact('equipment'));

            return new Box('', $doughnut);
        });

        // ? $grid->column('id', __('Id'));
        $grid->column('mac', __('Mac'));
        $grid->column('sn', __('Sn'));
        $grid->column('project.title', __('Project id'));
        // // $grid->column('admin_user_id', __('Admin user id'));
        $grid->column('equipment_type', __('Equipment type id'))->using($equipment->equipment_type);
        $grid->column('name','设备名称');
        $grid->column('status', __('Status'))->using([0=>"离线",1=>"在线"])->label([
            1 => 'success',
            0 => 'danger',
        ]);
        $grid->column('uppl', __('Uppl'))->using($equipment->uppl);
        $grid->column('beilv', __('Beilv'))->using($equipment->uppl);
        $grid->column('work_date', __('Work date'));
        $grid->column('remarks', __('Remarks'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->filter(function($filter) use ($equipment){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->like('name','设备名称');
            $filter->equal('status', __('Status'))->radio([
                ''   => 'All',
                0    => '离线',
                1    => '在线',
            ]);
            $filter->equal('project_id', __('Project id'))->select(Project::where('admin_user_id', Admin::user()->id)->get()->pluck('title','id'));
            $filter->equal('equipment_type', __('Equipment type id'))->select($equipment->equipment_type);

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
        $show = new Show(Equipment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('project_id', __('Project id'));
        $show->field('admin_user_id', __('Admin user id'));
        $show->field('equipment_type', __('Equipment type id'));
        $show->field('name','设备名称');
        $show->field('sn', __('Sn'));
        $show->field('status', __('Status'));
        $show->field('work_date', __('Work date'));
        $show->field('latitude', __('Latitude'));
        $show->field('longitude', __('Longitude'));
        $show->field('remarks', __('Remarks'));
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
        $equipment = new Equipment();
        $form = new Form($equipment);

        $form->hidden('admin_user_id', __('Admin user id'));
        $form->select('equipment_type', __('Equipment type id'))->options($equipment->equipment_type)->required();
        $form->text('name', '设备名称')->required();
        $form->text('mac', __('Mac'))->required();
        $form->text('sn', __('Sn'))->required();
        $form->select('project_id', __('Project id'))->options(Project::where('admin_user_id', Admin::user()->id)->get()->pluck('title', 'id'))->required();
        $form->hidden('status', __('Status'))->default(0);
        $form->text('beilv', __('Beilv'));

        $form->date('work_date', __('Work date'))->required();

        $form->textarea('remarks', __('Remarks'));

        $form->saving(function (Form $form) {
            $form->admin_user_id = Admin::user()->id;
        });
        return $form;
    }

    public function project_equipment(Request $request)
    {
        $provinceId = $request->get('q');
        return Equipment::where('project_id', $provinceId)->get(['id', DB::raw('name as text')]);
    }

    public function equipmentkz()
    {

        $equipment_id = request()->input('equipment_id');
        $up_pl = request()->input('up_pl');
        Equipment::where('id', $equipment_id)->update([
            'uppl' => $up_pl,
        ]);
        return response()->json([
            'message' => '发送成功'
        ]);
    }
}
