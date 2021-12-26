<?php
namespace Modules\Usermanagement\Repository\PermissionRepo;
use Illuminate\Http\Request;

interface PermissionInterface{
	public function getPermissionList();
	public function storePermission(Request $request);
	public function findPermission($id);
	public function updatePermission(Request $request,$id);
	public function deletePermission(Request $request);
	public function dataTableList();

}