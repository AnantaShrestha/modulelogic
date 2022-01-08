<?php
namespace Modules\Usermanagement\Repository\UserRepo;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'name'=>'required',
			'username'=>'required|unique:users,name,'.$this->id,
		];
	}
}
