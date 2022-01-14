<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Usermanagement\Entities\User;
class LogActivity extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
