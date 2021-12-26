<?php
namespace Modules\Usermanagement\DataTables;
use App\DataTables\DataTableTrait;
class RoleDataTable{
	use DataTableTrait;
	/**
	 * @return built table html
	 */
	public function dataTable($query){
		$data=$this->htmlBuilder($query);
		return $data;
	}

	/**
	 * @return query to get data
	 */
	public function query($query){
		if(isset($_GET['search'])  && !empty($_GET['search'])){
			$search=$_GET['search'];
			$query=$query->where('name','like','%'.$search.'%');
		}
		$query=$query->orderBy('created_at','desc')->newQuery();
		if(isset($_GET['page']) && !empty($_GET['page'])){
			$query=$query->offset($_GET['page']);
		}
		$query=$query->paginate(isset($_GET['length']) && !empty($_GET['length']) ? $_GET['length'] : PAGINATION_NUMBER);
		return $query;
	}

	/**
	 * @return editable column 
	*/
	public function editable($key,$obj){
		switch ($key) {
			case 'action':
				return '<a class="update_button" href="'.route('admin.route.edit',['id'=>$obj->id]).'">'.edit_icon().'</a><button class="delete_button">'.delete_icon().'</button>';
				break;
			default:
				return null;
				break;
		}

	}

	/** 
	 * @return table columns
	 */
	public function columns(){
		return [
			'name' =>'Name',
			'slug' =>'Slug',
			'created_at'=>'Created At',
			'action'=>[
				'title'=>'Action',
				'editable'=>true
			]
		];
	}
	/** 
	 * @return action button
	 */
	public function actionButton(){
		return[
			'create'=>[
				'title'=>'Create',
				'action'=>route('admin.role.create'),
				'className'=>'create-btn'
			]
		];
	}
	/**
	 * @return datatable id
	 */
	public function tableId(){
		return 'role_table';
	}
}