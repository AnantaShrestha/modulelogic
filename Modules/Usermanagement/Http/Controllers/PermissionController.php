<?php

namespace Modules\Usermanagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Usermanagement\Repository\PermissionRepo\PermissionRepo;
use Modules\Usermanagement\Repository\PermissionRepo\PermissionRequest;
class PermissionController extends Controller
{
    private $permissionRepo;
    public function __construct(PermissionRepo $permissionRepo){
        $this->permissionRepo=$permissionRepo;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data['permissionsDataTable']=$this->permissionRepo->dataTableList();
        if($request->ajax()){
            return $data['permissionsDataTable']->render();
        }
        return view('usermanagement::permission.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('usermanagement::permission.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PermissionRequest $request)
    {
        $this->permissionRepo->storePermission($request);
        return redirect()->route('admin.permission')->with(['message'=>'Permission created successfully','type'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['permission']=$this->permissionRepo->findPermission($id);
        return view('usermanagement::permission.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PermissionRequest $request, $id)
    {
        $this->permissionRepo->updatePermission($request,$id);
         return redirect()->route('admin.permission')->with(['message'=>'Permission updated successfully','type'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $this->permissionRepo->deletePermission($request);
        return response()->json(['message'=>'Permission Deleted Successfully','type'=>'warning']);
    }
}
