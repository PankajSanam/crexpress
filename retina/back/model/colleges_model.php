<?php
namespace Retina\Back;

class Colleges_Model extends _Model{

	public function colleges(){
		$Db = new \Db;
		$rows = $Db->select('colleges');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function college_pages(){
		$Db = new \Db;
		$rows = $Db->select('pages',array('page_category_id<>' => '0'));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}
	

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('colleges',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}

?>