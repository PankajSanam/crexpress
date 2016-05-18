<?php
class Db_query{
	public $tablename;
	public $values;
	public $columns;
	public $query;
	public $sortby;
	public $sorttype;
	public $startlimit;
	public $endlimit;
	public $conditions;
	public $sql;
	public $result;

	public function run_query($query){
		$this->result = mysql_query($this->query) or die(db_error());
		return $this->result;
	}

	public function insert_query($tablename,$values) {

		$this->tablename = $tablename;
		$this->columns = array_keys($values);
		$this->columns = implode(", ", $this->columns);

		//Sanitizing user inputs
		foreach($values as $val){
			$value[] = mysql_real_escape_string(stripslashes(trim($val)));
		}

		$this->values = $value;
		$this->values = implode("','", $this->values);
		
		$this->query = "INSERT into ".$this->tablename." (".$this->columns.") VALUES ('".$this->values."')";
		$this->run_query($this->query);
	}

	public function update_query($tablename,$values,$conditions){
		
		$this->tablename = $tablename;

		foreach($values as $key1=>$value) {
			$set[] = " ".$key1." = '".mysql_real_escape_string(stripslashes(trim($value)))."'";
		}
		$set_clause = implode(', ', $set);
		
		foreach($conditions as $key2=>$condition) {
			$where[] = " ".$key2." = '".$condition."'";
		}
		$where_clause = implode(', ', $where);
		
		$this->query = "UPDATE ".$this->tablename." set ".$set_clause." where ".$where_clause."";
		$this->run_query($this->query);
	}
	public function select_query($tablename,$conditions="",$sortby="",$sorttype="",$startlimit="",$endlimit="") {
		$this->tablename = $tablename;
		$sql='';

		if($conditions!='') {
			foreach($conditions as $key=>$value) {
				$where[] = " ".$key." = '".$value."'";
			}
			$sql.= implode(' AND ', $where);
		} else {
			$sql.= ' 1 = 1 ';
		}
		if($sortby!='' AND $sorttype!='') {
			$sql.= ' ORDER BY ' . $sortby." ".$sorttype;
		}
		if($startlimit!='' AND $endlimit!='') {
			$sql.= " LIMIT $startlimit,$endlimit";
		}
		$this->sql = $sql;
		$this->query = "SELECT * from $this->tablename where $this->sql ";
		$this->result = $this->run_query($this->query);

		while($this->row = mysql_fetch_array($this->result)){
			$this->col[] = $this->row;
		}
		return $this->col;
	}

	public function delete_me($tblname,$values,$onSuccess="",$onFailure=""){
		if($values!='') {
			foreach($values as $key=>$value) {
				$where[] = " ".$key." = '".mysql_real_escape_string($value)."'";
			}
			$where_clause = implode(' AND ', $where);
			
			$sql = "delete from ".$tblname." where ".$where_clause."";
		}

		$result=mysql_query($sql) or die('DB Halt');
		if(!$result) { $process_msg=$onFailure; } else { $process_msg=$onSuccess;}
		echo $process_msg;
	}
}
$db = new Db_query;
$db1 = new Db_query;
$db2 = new Db_query;
?>