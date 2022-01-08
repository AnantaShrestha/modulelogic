<?php
namespace Modules\Usermanagement\Repository\UserRepo;
interface UserInterface{
	public function getUserList();
	public function storeUser(Request $request);
	public function findUser($id);
	public function updateUser(Request $request,$id);
	public function deleteUser(Request $request);
	public function dataTableList();
}