<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Repository\MenuRepo\MenuRequest;
use Modules\Setting\Repository\MenuRepo\MenuRepo;
class MenusettingController extends Controller
{
    private $menuRepo;

    public function __construct(menuRepo $menuRepo){
        $this->menuRepo=$menuRepo;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['menus']=$this->menuRepo->getListMenu()->groupBy('parent_id');
        return view('setting::menu.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::menu.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(MenuRequest $request)
    {
        $this->menuRepo->storeMenu($request);
        return redirect()->route('admin.menu')->with(['message'=>'Menu created Successfully','type'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['menu']=$this->menuRepo->findMenu($id);
        return view('setting::menu.form',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->menuRepo->updateMenu($request,$id);
        return redirect()->route('admin.menu')->with(['message'=>'Menu updated successfully','type'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $this->menuRepo->deleteMenu($request);
        return response()->json(['message'=>'Menu Deleted Successfully','type'=>'warning']);

    }


    public function sort(Request $request){
        $response=$this->menuRepo->menuSort($request);
        return response()->json($response);
    }
}
