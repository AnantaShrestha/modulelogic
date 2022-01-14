<?php
namespace Modules\Setting\DataTables;
use App\DataTables\DataTableTrait;
use Modules\Setting\Entities\LogActivity;
class LogActivityDataTable{
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
		$query=$query->with('user')->orderBy('created_at','desc')->newQuery();
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
			case 'user_id':
				return $obj->user->name;
				break;
			case 'output':
				return '<span class="toolstip" tool="'.str_replace('"','',$obj->output).'">'.substr($obj->output,0,70).'</span>';
				break;
			case 'created_at':
				return $obj->created_at->format('Y/m/d');
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
			'user_id' =>[
				'title'=>'User Name',
				'editable'=>true
			],
			'method' =>'Method',
			'path'=>'Path',
			'output'=>[
				'title'=>'Output',
				'editable'=>'true'
			],
			'created_at'=>[
				'title'=>'Created At',
				'editable'=>true
			],
		];
	}

	/** 
	 * @return action button
	 */
	public function settings(){
		return[
			'searchBox'=>false,
			'length'=>false,
			'button'=>[
			]
		];
	}

	/**
	 * @return datatable id
	 */
	public function tableId(){
		return 'logTable';
	}

}