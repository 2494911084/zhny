<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-08 19:12:14
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-14 10:07:02
 * @Description: 管理员模型文件
 * @FilePath: \laravel-admin\app\Models\AdminUser.php
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class AdminUser extends Authenticatable implements JWTSubject
{
    use HasFactory,DefaultDatetimeFormat;

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function roles(): BelongsToMany
    {
        $pivotTable = config('admin.database.role_users_table');

        $relatedModel = config('admin.database.roles_model');

        return $this->belongsToMany($relatedModel, $pivotTable, 'user_id', 'role_id')->withTimestamps();
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
