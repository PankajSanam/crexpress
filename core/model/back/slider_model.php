<?php if (!defined('CREXO')) exit('No Trespassing!');

class Slider_Model extends Crexo_Model{

	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
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