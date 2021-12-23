<?php

namespace Modules\Usermanagement\Entities;

use Illuminate\Database\Eloquent\Model;
class Permission extends Model
{

    protected $guarded = [];
    protected $table='permissions';

    public function setAccessUriAttribute($value)
    {
        $this->attributes['access_uri'] = implode(',', ($value ?? []));
    }


    protected static function boot() {
        parent::boot();
        static::creating(function ($permission) {
            $permission->slug = \Str::slug($permission->name);
        });
    }

}
