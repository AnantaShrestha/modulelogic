<?php
namespace Modules\Setting\Repository\MenuRepo;

use Illuminate\Http\Request;
use Modules\Setting\Entities\AdminMenu;
class MenuRepo implements MenuInterface{
	private $menu;
	public function __construct(){
		$this->menu=new Adminmenu;
	}


	/**
	 * @return  list of menu
	 */
	public function getListMenu(){
		return $this->menu->orderBy('sort','asc')->get();
	}
	/**
	 * @return store menu
	 */
	public function storeMenu(Request $request){
		return $this->menu->create($request->except('_token'));
	}
	/**
	 * @return find menu according to id
	 */
	public function findMenu($id){
		$menu=$this->menu->findOrFail($id);
		return $menu;
	}
	/**
	 * @return update menu
	 */
	public function updateMenu(Request $request,$id){
		$menu=$this->findMenu($id);
		return $menu->update($request->except('_token'));
	}


	/**
	 * @return delete menu
	 */
	public function deleteMenu(Request $request){
		$menu=$this->findMenu($request->id);
		return $menu->delete();
	}
	/**
	 * @return select option list 
	 */
	public function getTreeMenu($parent = 0, &$tree = null, $menus = null, &$st = ''){
		$menus = $menus ?? $this->getListMenu()->groupBy('parent_id');
        $tree = $tree ?? [];
        $lisMenu = $menus[$parent] ?? [];
        foreach ($lisMenu as $menu) {
            $tree[$menu->id] = $st . ' ' . $menu->title;
            if (!empty($menus[$menu->id])) {
                $st .= '--';
                $this->getTreeMenu($menu->id, $tree, $menus, $st);
                $st = '';
            }
        }
        return $tree;
	}

	/**
	 *  @return sorting menu
	 */
	public function menuSort(Request $request){
		$data = $request->menu ?? [];
        $reSort = json_decode($data, true);
        $newTree=$this->sortingProcess($reSort);
        return $this->menu->resort($newTree);
	}
	/**
	 * @return process sorting
	 */
	protected function sortingProcess($reSort,$parent = 0,&$tree= null){
		$tree= $tree ?? [];
		foreach($reSort as $key=>$level){
			$id=$level['id'];
			$tree[$id] = [
                'parent_id' =>$parent,
                'sort' => ++$key,
            ];
            $children=$level['children'] ?? '';
            if(!empty($children)){
            	$this->sortingProcess($children,$id,$tree);
            }
		}
		return $tree;
	}



	 /**
     * Get list menu can visible for user
     *
     * @return  [type]  [return description]
     */
    public function getListVisible()
    {
       $list = $this->getListMenu();
       $listVisible = [];
       $user=\Auth::guard('admin')->user();
       foreach($list as $menu){
	       	if (empty($menu->uri) || $menu->uri === 'admin/dashboard') {
	       		$listVisible[] = $menu;
	       	} else{
	       		$url = url($menu->uri);
	       		if ($user->checkUrlAllowAccess($url)) {
	       			$listVisible[] = $menu;
	       		}
	       	}
       }
       $listVisible = collect($listVisible);
       $groupVisible = $listVisible->groupBy('parent_id');
        foreach ($listVisible as $key => $value) {
            if ((isset($groupVisible[$value->id]) && count($groupVisible[$value->id]) == 0)
                || (!isset($groupVisible[$value->id]) && !$value->uri)
            ){
                unset($listVisible[$key]);
                continue;
            }
        }
        $listVisible=collect($listVisible);
        $groupVisible = $listVisible->groupBy('parent_id');
        foreach ($listVisible as $key => $value) {
            if ((isset($groupVisible[$value->id]) && count($groupVisible[$value->id]) == 0)
                || (!isset($groupVisible[$value->id]) && !$value->uri)
            ){
                unset($listVisible[$key]);
                continue;
            }
        }
        $listVisible=$listVisible->groupBy('parent_id');
        return $listVisible;
    }

}