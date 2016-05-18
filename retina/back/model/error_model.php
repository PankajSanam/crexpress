<?php
namespace Retina\Back;

class Error_Model extends Base_Model{

	public function page_title($slug) {
		$Db = new \Db;
		$rows = $Db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['title'];
		}
		return $data;
	}

	public function latest_page(){
		$Db = new \Db;
		$rows = $Db->select('pages','','last_updated','DESC',0,1);
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}

?>