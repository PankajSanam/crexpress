<?php if (!defined('CREXO')) exit('No Trespassing!');

class Client_Model extends Crexo_Model
{
	public function client()
	{
		$Db = new Db;
		$rows = $Db->select('client');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_data($action_id)
	{
		$Db = new Db;
		$rows = $Db->select('client',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}
}