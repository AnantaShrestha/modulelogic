<?php

namespace Modules\Usermanagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    protected $table='roles';


    protected static function boot() {
        parent::boot();
        static::creating(function ($role) {
            $role->slug = \Str::slug($role->name);
            $role->created_by=\Auth::guard('admin')->user()->id;
        });
    }

}
