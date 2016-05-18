<?php
namespace Retina\Front;

class Home_Model extends _Model{

	public function page_title($slug) {
		$Db = new \Db;
		$rows = $Db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['title'];
		}

		return $data;
	}

	public function page_content($slug) {
		$Db = new \Db;
		$rows = $Db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['content'];
		}

		return $data;
	}

	public function galleries(){
		$Db = new \Db;
		$rows = $Db->select('gallery',array('status=' => 1));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function sliders(){
		$Db = new \Db;
		$sliders = $Db->select('sliders',array( 'status='=> 1 ));
		return $sliders;
	}

	public function colleges(){
		$Db = new \Db;
		$from = (isset($_GET['from']) ? $_GET['from'] : 0);
		$to = (isset($_GET['to']) ? $_GET['to'] : 5);

		$rows = $Db->select('colleges',array('status=' => 1),'id','asc',$from,$to);
		foreach($rows as $row){
			$col[] = $row;
		}
		if(!empty($col)) return $col; else return array();
	}
}