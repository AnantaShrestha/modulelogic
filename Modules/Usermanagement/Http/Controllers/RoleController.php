<?php

namespace Modules\Usermanagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Usermanagement\Repository\RoleRepo\RoleRepo;
use Modules\Usermanagement\Repository\RoleRepo\RoleRequest;
class RoleController extends Controller
{
    private $roleRepo;
    public function __construct(RoleRepo $roleRepo){
        $this->roleRepo=$roleRepo;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data['rolesDataTable']=$this->roleRepo->dataTableList();
        if($request->ajax()){
            return $data['rolesDataTable']->render();
        }
        return view('usermanagement::role.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('usermanagement::role.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(RoleRequest $request)
    {
        $this->roleRepo->storeRole($request);
        return redirect()->route('admin.role')->with(['message','Role Created Successfuly']);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['role']=$this->roleRepo->findRole($id);
        return view('usermanagement::role.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(RoleRequest $request, $id)
    {
        $this->roleRepo->updateRole($request,$id);
        return redirect()->route('admin.role')->with(['message','Role updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
