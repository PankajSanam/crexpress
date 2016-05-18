<?php
namespace Retina\Back;

class Pages_Model extends _Model{

	public function pages(){
		$Db = new \Db;
		$rows = $Db->select('pages');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function page_templates(){
		$Db = new \Db;
		$rows = $Db->select('page_templates');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_page($action_id){
		$Db = new \Db;
		$rows = $Db->select('pages',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}
}

?>