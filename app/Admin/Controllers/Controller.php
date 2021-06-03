<?php
// *
namespace App\Admin\Controllers;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class Controller extends AdminController
{
    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function show($id, Content $content)
    {
        $m = $this->detail($id);

        if (!$this->authoriza($m))
        {
            abort(403);
        }

        return $content
            ->title($this->title())
            ->description($this->description['show'] ?? trans('admin.show'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function edit($id, Content $content)
    {
        if (!$this->authoriza($this->detail($id)))
        {
            abort(403);
        }
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body($this->form());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->authoriza($this->detail($id)))
        {
            abort(403);
        }
        return $this->form()->destroy($id);
    }

    public function authoriza($m)
    {
        $child_user_ids = Administrator::where('parent_id', Admin::user()->id)->get()->pluck('id')->toArray();
        if (Admin::user()->inRoles(['admin', 'administrator']) || Admin::user()->id == $m->model()->admin_user_id || in_array(Admin::user()->id, $child_user_ids))
        {
            return true;
        }
        return false;
    }
}
