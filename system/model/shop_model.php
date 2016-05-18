<?php if (!defined('CREXO')) exit('No Trespassing!');

class Shop_Model extends Crexo_Model{

	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
	public function products(){
		$Db = new \Db;
		$rows = $Db->select('shop');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('shop',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}