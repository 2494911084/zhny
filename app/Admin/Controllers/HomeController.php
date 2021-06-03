<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 06:41:23
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 09:48:23
 * @Description: 全景能源
 * @FilePath: \laravel-admin\app\Admin\Controllers\HomeController.php
 */

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Widgets\Box;
use Symfony\Component\VarDumper\Cloner\Data;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Handlers\YsyHandler;
use App\Models\AdminUser;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
    public function qjny(Content $content)
    {
        Admin::disablePjax();
        $projects = $this->get_projects();

        if ($project_id = request()->input('project_id')) {
            $project = Project::find($project_id);
        }else {
            $project = $projects->first();
        }
        // dd($project);
        // dd($project);
        // return $content->title('全景能源')
        //     // ->description('简介')
        //     ->view('admin.custom.qjny.index', compact('projects'));
        return $content
            ->title('首页')
            ->row(function (Row $row) use ($projects,$project) {
                $s = new Box('全景能源', view('admin.custom.qjny.index', compact('projects','project')));
                $s->style('info');
                $row->column(12, $s);
            });
    }
    public function zhnh(Content $content)
    {
        $lx = request()->input('lx');
        if (!$lx) {
            $lx = 3;
        }
        $d = request()->input('d');
        if (!$d) {
            $d = 1;
        }
        $dateTime = request()->input('dateTime');
        if (!$dateTime) {
            $dateTime = Carbon::now()->toDateString();
        }
        $projects = $this->get_projects();
        if ($project_id = request()->input('project_id')) {
            $project = Project::find($project_id);
        }else {
            $project = $projects->first();
        }
        $data['labels'] = null;
        $data['data'] = null;
        $data['name'] = null;
        switch ($lx)
        {
            case 1:
                break;
            case 2:
                break;
            case 3: //水
                $table = 'data_sycsbs';
                $data['name'] = '流量';
                $data['data'] = implode(',',DB::table($table)->get()->pluck('ll')->toArray());
                $data['label'] = '"' . implode('","',DB::table($table)->get()->pluck('date_time')->toArray()) . '"';
                // ["2021-05-28 10:43:35","2021-05-28 10:21:55","2021-05-28 10:04:48","2021-05-28 10:02:10","2021-05-28 10:00:15"]
                // dd($data['label']);
                // foreach ($data['label'] as $v) {
                //     $data['labels'][] = strtotime($v);
                // }
                break;
            case 4:
                break;
        }
        return $content
            ->title('综合能耗')
            ->row(function (Row $row) use ($projects,$project,$lx,$d,$dateTime,$data) {

                $row->column(3, function (Column $column) use ($projects,$project,$dateTime)  {
                    $column->row(view('admin.custom.zhnh.projects', compact('projects','project')));
                    $n = new Box('能源日历', view('admin.custom.zhnh.rili',compact('dateTime','project')));
                    $n->style('info');
                    $column->row($n);
                });
                $s = new Box('综合能耗', view('admin.custom.zhnh.chartjs', compact('projects','project','lx','d','dateTime','data')));
                $s->style('info');
                $row->column(9, $s);
            });
    }
    public function nhdb(Content $content)
    {
        $lx = request()->input('lx');
        if (!$lx) {
            $lx = 1;
        }
        $d = request()->input('d');
        if (!$d) {
            $d = 1;
        }
        $projects = $this->get_projects();
        if ($project_id = request()->input('project_id')) {
            $project = Project::find($project_id);
        }elseif($equipment_id = request()->input('equipment_id')){
            $equipment = Equipment::find($equipment_id);
        }else {
            $project = $projects->first();
        }

        // return $content->title('详情')
        //     ->description('简介')
        //     ->view('admin.custom.home', compact('projects'));
        return $content
            ->title('能耗对比')
            ->row(function (Row $row) use ($projects,$project,$lx,$d) {

//                $row->column(3, view('admin.custom.nhdb.projects', compact('projects','project')));

                $s = new Box('能耗对比', view('admin.custom.nhdb.chartjs', compact('projects','project','lx','d')));
                $s->style('info');
                $row->column(12, $s);
            });
    }
    public function nhph(Content $content)
    {
        $lx = request()->input('lx');
        if (!$lx) {
            $lx = 1;
        }
        $d = request()->input('d');
        if (!$d) {
            $d = 1;
        }
        $projects = $this->get_projects();
        if ($project_id = request()->input('project_id')) {
            $project = Project::find($project_id);
        }else {
            $project = $projects->first();
        }

        // return $content->title('详情')
        //     ->description('简介')
        //     ->view('admin.custom.home', compact('projects'));
        return $content
            ->title('能耗排行')
            ->row(function (Row $row) use ($projects,$project,$lx,$d) {
                $s = new Box('能耗排行', view('admin.custom.nhph.chartjs', compact('projects','project','lx','d')));
                $s->style('info');
                $row->column(12, $s);
            });
    }
    public function nhfs(Content $content)
    {
        $lx = request()->input('lx');
        if (!$lx) {
            $lx = 1;
        }
        $d = request()->input('d');
        if (!$d) {
            $d = 1;
        }
        $projects = $this->get_projects();
        if ($project_id = request()->input('project_id')) {
            $project = Project::find($project_id);
        }else {
            $project = $projects->first();
        }

        // return $content->title('详情')
        //     ->description('简介')
        //     ->view('admin.custom.home', compact('projects'));
        return $content
            ->title('能耗分时')
            ->row(function (Row $row) use ($projects,$project,$lx,$d) {

//                $row->column(3, view('admin.custom.nhfs.projects', compact('projects','project')));

                $s = new Box('能耗分时', view('admin.custom.nhfs.chartjs', compact('projects','project','lx','d')));
                $s->style('info');
                $row->column(12, $s);
            });
    }

    // 获取权限内能看到的所有项目
    public function get_projects()
    {
        $projects = [];
        if (Admin::user()->inRoles(['children_user'])) {
            $projects = Project::where('admin_user_id', Admin::user()->id)->with('equipments')->orderBy('created_at', 'desc')->get();
        }

        if (Admin::user()->inRoles(['operator'])) {
            $admin_user_ids = AdminUser::where('parent_id', Admin::user()->id)->get()->pluck('id');
            $admin_user_ids[] = Admin::user()->id;
            $projects = Project::whereIn('admin_user_id', $admin_user_ids)->with('equipments')->orderBy('created_at', 'desc')->get();
        }

        if (Admin::user()->inRoles(['administrator'])) {
            $projects = Project::orderBy('created_at', 'desc')->with('equipments')->get();
        }

        return $projects;
    }
//  ! 计数据应该是单独提出来进行存储的，不然量大了以后查询很费资源
    // 查询电的能耗数据
    public function get_project_d($project,$d)
    {
        // 电能源的所有设备类型
        $element_typies = DB::table('element_typies')->where('energy_type', 2)->get();
        // 日数据
        if ($d == 1) {
            $data[] = null;
            foreach ($element_typies as $value) {
                $data[] = DB::table($value['data_base_name'])
                ->whereDate('created_at', Carbon::now()->toDateString())
                ->get();
            }
        }
    }

    public function maps(Content $content)
    {
        Admin::disablePjax();
        $projects = $this->get_projects();
        $project = null;
        return $content->title('地图分布')
            // ->description('地图分布')
            ->view('admin.custom.maps', compact('projects','project'));
    }
}
