<?php
namespace Modules\Usermanagement\Repository\RoleRepo;
use Modules\Usermanagement\Entities\Role;
use Illuminate\Http\Request;
use Modules\Usermanagement\DataTables\RoleDataTable;
class RoleRepo implements RoleInterface{
	private $role;

	public function __construct(Role $role){
		$this->role=$role;
	}

	/**
	 * @return list of permission
	 */
	public function getRoleList(){
		return $this->role->with('permissions','users')->orderBy('created_at','desc')->get();
	}
	/**
	 * @return creat Role
	 */
	public function storeRole(Request $request){
		$role=$this->role->create($request->except('_token','permissions','users'));
		$permissions=$request->permissions ?? [];
		$users=$request->users ?? [];
		if($permissions)
			$role->permissions()->attach($permissions);
		if($users)
			$role->users()->attach($users);
		return $role;
	}

	/**
	 * @return find Role according to id
	 */
	public function findRole($id){
		return $this->role->with('permissions','users')->find($id);
	}

	/**
	 * @return update Role according to id
	 */
	public function updateRole(Request $request,$id){
		$role=$this->findRole($id);
		$role->update($request->except('_token','permissions','users'));
		$permissions=$request->permissions ?? [];
		$users=$request->users ?? [];
			$role->permissions()->detach();
			$role->permissions()->attach($permissions);
			$role->users()->detach();
			$role->users()->attach($users);
		return $role;
	}

	/**
	 * @return delete Role
	 */
	public function deleteRole(Request $request){
		$role=$this->findRole($request->id);
		$role->permissions->detach();
		$role->users->detach();
		return $role->delete();
	}

	/**
	 * @return datatable
	 */
	public function dataTableList(){
		return (new RoleDataTable)->dataTable($this->role);
	}

}