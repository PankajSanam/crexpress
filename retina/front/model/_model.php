<?php
namespace Retina\Front;

class _Model {

	public function __construct(){
		// nothing
	}

	public function page_id($slug){
		$Db = new \Db;

		$tables = $Db->check_meta();
		$count_tables = count($tables);
		$cond = array( 'slug=' => $slug );

		for($i = 0 ; $i <= $count_tables-1; $i++){
			$result =  $Db->select($tables[$i], $cond);
			$count = count($result);

			if($count > 0){
				$id = $result[0]['id'];
				break;
			} else {
				$id = '';
			}
		}
		return $id;
	}

	public function google_webmaster(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'google_webmaster'));

		foreach($rows as $row) {}

		return '<meta name="google-site-verification" content="'.$row['value'].'" />';
	}

	public function email(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'email'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function landline(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'landline'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function mobile(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'mobile'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function address(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'address'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function favicon(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'favicon'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function logo(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'logo'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function about(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'about'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

}

?>