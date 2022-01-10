<?php 

namespace Modules\Setting\Repository\MenuRepo;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'title'=>'required'
		];
	}
}