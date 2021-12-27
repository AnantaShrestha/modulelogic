<?php

namespace Modules\Usermanagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    protected $table='roles';

    public function users()
    {

        return $this->belongsToMany(User::class,'users_roles', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions', 'role_id', 'permission_id');
    }

    protected static function boot() {
        parent::boot();
        static::creating(function ($role) {
            $role->slug = \Str::slug($role->name);
            $role->created_by=\Auth::guard('admin')->user()->id;
        });
    }

}
