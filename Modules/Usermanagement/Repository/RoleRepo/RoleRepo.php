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
		return $this->role->orderBy('created_at','desc')->get();
	}
	/**
	 * @return creat Role
	 */
	public function storeRole(Request $request){
		return $this->role->create($request->except('_token'));
	}

	/**
	 * @return find Role according to id
	 */
	public function findRole($id){
		return $this->role->find($id);
	}

	/**
	 * @return update Role according to id
	 */
	public function updateRole(Request $request,$id){
		$role=$this->findRole($id);
		return $role->update($request->except('_token'));
	}

	/**
	 * @return delete Role
	 */
	public function deleteRole(Request $request){
		$role=$this->findRole($request->id);
		return $role->delete();
	}

	/**
	 * @return datatable
	 */
	public function dataTableList(){
		return (new RoleDataTable)->dataTable($this->role);
	}

}