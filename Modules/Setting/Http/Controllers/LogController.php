<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use Modules\Setting\Entities\LogActivity;
use Modules\Setting\DataTables\LogActivityDataTable;

class LogController extends Controller
{
    private $logActivity;

    public function __construct(LogActivity $logActivity){
        $this->logActivity=$logActivity;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data['logDataTable']=$this->dataTableList();
        if($request->ajax()){
            return $data['logDataTable']->render();
        }
        return view('setting::log.index',$data);
    }


    protected function dataTableList(){
        return (new LogActivityDataTable)->dataTable($this->logActivity);
    }
   
}
