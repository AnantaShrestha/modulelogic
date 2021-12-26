<?php
namespace Modules\Usermanagement\Repository\PermissionRepo;
use Modules\Usermanagement\Entities\Permission;
use Illuminate\Http\Request;
use Modules\Usermanagement\DataTables\PermissionDataTable;
class PermissionRepo implements PermissionInterface{
	private $permission;

	public function __construct(Permission $permission){
		$this->permission=$permission;
	}

	/**
	 * @return list of permission
	 */
	public function getPermissionList(){
		return $this->permission->orderBy('created_at','desc')->get();
	}
	/**
	 * @return creat permission
	 */
	public function storePermission(Request $request){
		return $this->permission->create($request->except('_token'));
	}

	/**
	 * @return find permission according to id
	 */
	public function findPermission($id){
		return $this->permission->find($id);
	}

	/**
	 * @return update permission according to id
	 */
	public function updatePermission(Request $request,$id){
		$permission=$this->findPermission($id);
		return $permission->update($request->except('_token'));
	}

	/**
	 * @return delete permission
	 */
	public function deletePermission(Request $request){
		$permission=$this->findPermission($request->id);
		return $permission->delete();
	}

	/**
	 * @return datatable
	 */
	public function dataTableList(){
		return (new PermissionDataTable)->dataTable($this->permission);
	}

}