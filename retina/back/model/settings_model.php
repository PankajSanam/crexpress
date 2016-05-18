<?php
namespace Retina\Back;

class Settings_Model extends _Model{

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

	public function google_analytics(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'google_analytics'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function google_webmaster(){
		$Db = new \Db;
		$rows = $Db->select('settings', array('name=' => 'google_webmaster'));
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