<?php
namespace App\DataTables;
trait DataTableTrait{
	/**
	 * @return html builder
	 */
	public function htmlBuilder($query){
		$makeData['queryData']=$this->query($query);
		$makeData['columns']=$this->columns();
		$makeData['self']=new self();
		if(isset($_GET['action']) && $_GET['action'] ==true){
			$data=\View::make("backend.datatable.includes.table-body")->with($makeData);
		}else{
			$makeData['tableId']=$this->tableId();
			$makeData['actionButton']=$this->actionButton();
			$data['table']=\View::make("backend.datatable.generate_datatable_html")->with($makeData)->render();
			$data['script']=\View::make("backend.datatable.generate_datatable_script")->render();
		}
		return $data;		
	}

}

