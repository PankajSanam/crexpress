<?php
namespace Retina\Back;

class Jobs_Model extends Base_Model{

	public function private_jobs(){
		$Db = new \Db;
		$rows = $Db->select('private_jobs');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function job_categories(){
		$Db = new \Db;
		$rows = $Db->select('job_categories');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('private_jobs',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}

?>