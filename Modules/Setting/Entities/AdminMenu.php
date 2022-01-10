<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{

    protected $guarded = [];


    public function reSort(array $data){
        try{
            \DB::connection('mysql')->beginTransaction();
            foreach ($data as $key => $menu) {
                self::where('id', $key)->update($menu);
            }
            \DB::connection('mysql')->commit();
            return ['type'=>'success','message'=>'Successfully updated'];
        }catch(\Throwable $e){
            \DB::connection('mysql')->rollBack();
            return ['type'=>'error','message'=>$e->getMessage()];
        }
    }
    
}
