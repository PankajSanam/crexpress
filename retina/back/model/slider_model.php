<?php
namespace Retina\Back;

class Slider_Model extends Base_Model{

	public function sliders(){
		$Db = new \Db;
		$rows = $Db->select('sliders', array('slider_category_id=' => 1) );
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function slider_categories(){
		$Db = new \Db;
		$rows = $Db->select('slider_categories');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('sliders',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}

?>