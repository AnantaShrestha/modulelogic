<?php 
namespace Modules\Setting\Repository\MenuRepo;
use Illuminate\Http\Request;

interface MenuInterface{
	public function getListMenu();
	public function storeMenu(Request $request);
	public function findMenu($id);
	public function updateMenu(Request $request,$id);
	public function deleteMenu(Request $request);
	public function getTreeMenu();
	public function menuSort(Request $request);
}