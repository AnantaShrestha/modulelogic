<?php 
namespace Modules\Setting\Repository\MailRepo;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest{
	public function authorize(){
		return true;
	}

	public function rules(){
		return [
			'driver'=>'required',
            'host'=>'required',
            'port' => 'required',
            'encryption'=>'required',
            'username'=>'required',
            'password'=>'required',
            'name'=>'required',
            'address'=>'required|email',
		];
	}
}