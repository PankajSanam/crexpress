<?php
class DB {
	public static function select_query($table_name,$conditions='',$sort_by='',$sort_order='',$start_limit='',$end_limit='') {
		global $pdo;

		$sql = NULL;

		if($conditions!='') {
			foreach($conditions as $key=>$value) {
				$where[] = $key." '".mysql_real_escape_string(stripslashes(trim($value)))."'";
			}
			$sql.= implode(' AND ', $where);
		} else {
			$sql.= ' 1 = 1 ';
		}

		if($sort_by!='' AND $sort_order!='') {
			$sql.= ' ORDER BY ' . $sort_by." ".$sort_order;
		}

		if($start_limit!='') {
			$sql.= " LIMIT $start_limit";
		}
		if($end_limit!=''){
			$sql .= ",$end_limit ";
		}
		
		$query = $pdo->prepare("select *from $table_name where $sql");
		$query->execute();

		return $query->fetchAll();
	}

	public static function count_query($table_name,$conditions="") {
		global $pdo;

		$sql = NULL;

		if($conditions!='') {
			foreach($conditions as $key=>$value) {
				$where[] = $key." '".$value."'";
			}
			$sql.= implode(' AND ', $where);
		} else {
			$sql.= ' 1 = 1 ';
		}

		$query = $pdo->prepare("select *from $table_name where $sql");
		$query->execute();

		return $query->rowCount();
	}

	public static function insert_query($table_name,$values) {
		global $pdo;

		$columns = array_keys($values);
		$columns = implode(", ", $columns);

		//Sanitizing user input
		foreach($values as $val){
			$value[] = mysql_real_escape_string(stripslashes(trim($val)));
		}

		$values = implode("','", $value);

		$query = $pdo->prepare("INSERT into ".$table_name." (".$columns.") VALUES ('".$values."')");
		$query->execute();
	}

	public static function update_query($table_name,$values,$conditions){
		global $pdo;		

		foreach($values as $key1=>$value) {
			$set[] = " ".$key1." = '".mysql_real_escape_string(stripslashes(trim($value)))."'";
		}
		$set_clause = implode(', ', $set);
		
		foreach($conditions as $key2=>$condition) {
			$where[] = $key2." '".$condition."'";
		}
		$where_clause = implode(', ', $where);
		
		$query = $pdo->prepare("UPDATE $table_name SET $set_clause WHERE $where_clause");
		$query->execute();
	}

	public static function delete_me($tblname,$values,$onSuccess="",$onFailure=""){
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
?>