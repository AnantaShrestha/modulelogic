<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Mailsetting extends Model
{

    protected $guarded = [];
    protected $hidden = ['driver','host','port','encryption','username','password'];
    
    

}
