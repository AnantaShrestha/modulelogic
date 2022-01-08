<?php

namespace Modules\Usermanagement\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use Modules\Usermanagement\Repository\UserRepo\UserRepo;
use Modules\Usermanagement\Repository\UserRepo\UserRequest;
class UserController extends Controller
{
    private $userRepo;
    public function __construct(UserRepo $userRepo){
        $this->userRepo=$userRepo;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data['usersDataTable']=$this->userRepo->dataTableList();
        if($request->ajax()){
            return $data['usersDataTable']->render();
        }
        return view('usermanagement::user.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('usermanagement::user.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $this->userRepo->saveUser($request);
        return redirect()
        ->route('user.index')
        ->with(['message'=>'User added Successfully','type'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['user']=$this->userRepo->findUser($id);
        return view('usermanagement::user.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->roleRepo->updateUser($request,$id);
        return redirect()->route('admin.user')->with(['message','User updated successfully','type'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $this->userRepo->deleteUser($request);
        return response()->json(['message'=>'User Deleted Successfully']);
    }
}
