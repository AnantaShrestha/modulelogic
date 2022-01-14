<?php

namespace Modules\Setting\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\Setting\Repository\MailRepo\MailRequest;
use Modules\Setting\Repository\MailRepo\MailRepo;
class MailsettingController extends Controller
{
    private $mailRepo;
    public function __construct(MailRepo $mailRepo){
        $this->mailRepo=$mailRepo;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['mail']=$this->mailRepo->configureEmail();
        return view('setting::mail.form',$data);
    }

    public function store(MailRequest $request){
        $this->mailRepo->updateorCreateMailSetting($request);
        return redirect()->back()->with(['message'=>'Mail setting updated successfully','type'=>'success'],200);
    }

   
}
