<?php
/*
 * ---------------------------------------------------------------------
 * Database Operations
 * ---------------------------------------------------------------------
 * This file defines all database related operations. e.g.
 * 		1. Selecting data from a table
 * 		2. Counting total number of rows from select query
 * 		3. Inserting data into a table
 * 		4. Updating a table records
 * 		5. Searching data from a table
 * 		6. Check if meta tags exist in any table then returns the table names
 * 		7. Deleting a data from table
 */
class Db {

	/*
	| ---------------------------------------------------------------------
	|  Fetch Data from Table
	| ---------------------------------------------------------------------
	| This is used for fetching data from a table and store all its records
	| in an array to further used later in system.
	|
	| 'tablename' 	=>	Name of table where data needs to be fetched from.
	| 'conditions'	=>	where statement of a select query to define all
	|					conditions which are helpful to select sepecific
	|					records. If you want to select all data from a
	|					table then you can leave this field empty.
	| 'sort_by'		=> 	It specifies the column name which will be used to
	|					sort the fetched data from a table. If you don't
	|					want it then you can leave this empty.
	| 'sort_order'	=>	Defines the ascending and descending sort order.
	|					ASC for Ascending order, DESC for descending order.
	| 'start_limit'	=> 	Set the number of records you want the data to be
	|					fetched from. e.g. if you want to fetch the data
	|					by skipping first row then you can start it from 1.
	|					Very helpful in pagination. But if you just want to
	|					limit the records nothing more than that then use
	|					end limit and leave this empty.
	| 'end_limit'	=> 	It specifies the last record you need to fetch.
	|					e.g. if you want to fetch only 5 records from a
	|					table then you can set it to 5.
	|
	| Example:
	|		Db::select('table_name',array('id='=>1),'id','asc','','5')
	*/
	public function select($table_name,$conditions='',$sort_by='',$sort_order='',$start_limit='',$end_limit='') {
		global $pdo;

		$sql = NULL;

		if($conditions!='') {
			foreach($conditions as $key=>$value) {
				$where[] = $key." '".stripslashes(trim($value))."'";
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

	public function count($table_name,$conditions="") {
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

	public function insert($table_name,$values) {
		global $pdo;
		$data = array();
		$columns = array_keys($values);
		$columns = implode(", ", $columns);

		//Sanitizing user input
		foreach($values as $val){
			$value[] = stripslashes(trim($val));
		}

		$count_val = count($value);
		$count_value = '';
		for($i=1;$i<=$count_val;$i++){
			$count_value .= '?';
			if($i!=$count_val){
				$count_value .= ',';
			}
		}
		$sql = "INSERT into ".$table_name." (".$columns.") VALUES (".$count_value.")";
		$query = $pdo->prepare($sql);

		foreach($value as $v){
			$data[] = $v;
		}
		$query->execute($data);

	}


	public function update($table_name,$values,$conditions){
		global $pdo;		
		$data = array();

		foreach($values as $key1=>$value) {
			$set[] = " ".$key1." = ?";

			$data[] = $value;
		}
		$set_clause = implode(', ', $set);
		
		foreach($conditions as $key2=>$condition) {
			$where[] = $key2.' ? ';
			$data[] = $condition;
		}
		$where_clause = implode(', ', $where);
		
		$query = $pdo->prepare("UPDATE $table_name SET $set_clause WHERE $where_clause");

		$query->execute($data);
	}


	public function search($keywords) {
		global $pdo;

		$where = '';
		$where2 = '';
		$keywords = trim($keywords);
		$keywords = preg_split('/[\s]+/', $keywords);
		$total_keywords = count($keywords);

		foreach($keywords as $key=>$keyword){
			$where.=" meta_description LIKE '%$keyword%' OR meta_title LIKE '%$keyword%' OR title LIKE '%$keyword%' OR meta_keywords LIKE '%$keyword%' ";
			if($key != ($total_keywords - 1)) {
				$where.= " AND ";
			}
		}

		$query = $pdo->prepare("select *from pages where status=1 AND ($where) ORDER by id DESC");
		$query->execute();

		$results_num = $query->rowCount();

		if($results_num === 0){
			foreach($keywords as $key=>$keyword){
				$where2.="meta_description LIKE '%$keyword%' OR meta_title LIKE '%$keyword%' OR title LIKE '%$keyword%' OR meta_keywords LIKE '%$keyword%' ";
				if($key != ($total_keywords - 1)) {
					$where2.= " AND ";
				}
			}

			$sql = $pdo->prepare("select *from private_jobs where status=1 AND ($where2) ORDER by id DESC");
			$sql->execute();

			$results_count = $sql->rowCount();
			
			if($results_count === 0) {
				return false;
			} else {
				return $sql->fetchAll();
			}
		} else {
			return $query->fetchAll();
		}
		
	}

	public function check_meta() {
		global $pdo;

		$query = $pdo->prepare("SELECT distinct * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".DB_NAME."'  AND COLUMN_NAME = 'meta_title'");
		$query->execute();

		$rows = $query->fetchAll();
		foreach($rows as $row){
			$col[] = $row['TABLE_NAME'];
		}
		return $col;
	}

	public function delete($table_name,$conditions){
		global $pdo;
		
		foreach($conditions as $key=>$condition) {
			$where[] = $key .' ' . $condition;
		}
		$where_clause = implode(' AND ', $where);

		$sql = "DELETE from ".$table_name." where ".$where_clause."";
		$query = $pdo->prepare($sql);

		foreach($condition as $c){
			$data[] = $c;
		}
		$query->execute($data);
	}

	
}
?>