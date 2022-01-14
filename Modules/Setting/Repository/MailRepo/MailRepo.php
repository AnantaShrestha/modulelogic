<?php
namespace Modules\Setting\Repository\MailRepo;

use Illuminate\Http\Request;
use Modules\Setting\Entities\Mailsetting;

class MailRepo {
	private $mailSetting;

	public function __construct(Mailsetting $mailSetting){
		$this->mailSetting=$mailSetting;
	}

	public function configureEmail(){
		$mailSetting = \Auth::guard('admin')->user()->mailSetting;
        return $mailSetting;
	}

	public function updateOrCreateMailSetting(Request $request){
		$data=$request->except('_token');
		$data['user_id']=\Auth::guard('admin')->user()->id;
		$mailSetting=$this->configureEmail();
		if($mailSetting){
			return $this->mailSetting->where('id',$mailSetting->id)->update($data);
		}
		else{
			return $this->mailSetting->create($data);
		}

	}
}