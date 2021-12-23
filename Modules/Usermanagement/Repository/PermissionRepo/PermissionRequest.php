<?php
namespace Modules\Usermanagement\Repository\PermissionRepo;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'name'=>'required|unique:permissions,name,'.$this->id,
			'slug'=>'nullable',
			'access_uri'=>'nullable'
		];
	}
}