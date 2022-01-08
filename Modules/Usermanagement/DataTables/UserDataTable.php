<?php
namespace Modules\Usermanagement\DataTables;
use App\DataTables\DataTableTrait;
class UserDataTable{
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

		$query=$query->with('permissions','roles');
		if(isset($_GET['search'])  && !empty($_GET['search'])){
			$search=$_GET['search'];
			$query=$query->where('name','like','%'.$search.'%')
			->orWhere('username','like','%'.$search.'%');
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
			case 'created_at':
				return $obj->created_at->format('Y/m/d');
				break;
			case 'action':
				return '<a class="update_button" href="'.route('admin.user.edit',['id'=>$obj->id]).'">'.edit_icon().'</a><button class="delete_button" data-id="'.$obj->id.'" data-url="'.route('admin.user.delete').'">'.delete_icon().'</button>';
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
			'username' =>'Username',
			'created_at'=>[
				'title'=>'Created At',
				'editable'=>true
			],
			'action'=>[
				'title'=>'Action',
				'editable'=>true
			]
		];
	}
	/** 
	 * @return action button
	 */
	public function settings(){
		return[
			'buttons'=>[
					'create'=>[
					'title'=>'Create',
					'action'=>route('admin.user.create'),
					'className'=>'create-btn'
				]
			]
		];
	}
	/**
	 * @return datatable id
	 */
	public function tableId(){
		return 'userTable';
	}
	
}