<?php

namespace Modules\Usermanagement\Entities;

use Illuminate\Database\Eloquent\Model;
class Permission extends Model
{

    protected $guarded = [];
    protected $table='permissions';

    public function users()
    {

        return $this->belongsToMany(User::class,'users_permissions', 'permission_id', 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions', 'permission_id', 'role_id');
    }

    public function setAccessUriAttribute($value)
    {
        $this->attributes['access_uri'] = implode(',', ($value ?? []));
    }


    protected static function boot() {
        parent::boot();
        static::creating(function ($permission) {
            $permission->slug = \Str::slug($permission->name);
            $permission->created_by=\Auth::guard('admin')->user()->id;
        });
    }


    public function passRequest(): bool{
        if (empty($this->access_uri)) {
            return false;
        }
        $uriCurrent = \Route::getCurrentRoute()->uri;
        $urlArr = explode(',', $this->access_uri);
        if(in_array($uriCurrent,$urlArr)){
            return true;
        }
        return false;

    }

}
