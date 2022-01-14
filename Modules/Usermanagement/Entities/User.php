<?php

namespace Modules\Usermanagement\Entities;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Modules\Usermanagement\Http\Traits\UserPermissionTrait;
use Modules\Setting\Entities\Mailsetting;
class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use UserPermissionTrait;
    protected $table='users';
    protected $guarded = [];
    protected $hidden  = [
        'password', 'remember_token',
    ];


    public function mailSetting(){
        return $this->hasOne(MailSetting::class,'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles', 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions', 'user_id', 'permission_id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    



}
