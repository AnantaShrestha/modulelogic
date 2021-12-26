<?php
namespace Modules\Usermanagement\Repository\RoleRepo;
use Illuminate\Http\Request;

interface RoleInterface{
	public function getRoleList();
	public function storeRole(Request $request);
	public function findRole($id);
	public function updateRole(Request $request,$id);
	public function deleteRole(Request $request);
	public function dataTableList();

}