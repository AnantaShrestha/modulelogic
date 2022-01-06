<?php
namespace Modules\Usermanagement\Repository\UserRepo;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'name'=>'required|regex:/^[\pL\s\-]+$/u',
			'username' => 'required|unique:users,username,'.$this->id,
			'email'=>'required|unique:users,email'.$this->id,
			'password'=>$this->id == null ? 'required|confirmed|min:6' : 'nullable|confirmed|min:6',
			'image'=>'nullable|image'
		];
	}
}