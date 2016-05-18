<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Db extends PDO
{
	public $pdo;

	private $database;
	private $user;
	private $pass;

	protected $query = array();

	private $unions = array();

	/**
	 * Holds all the data that has been filtered when inserting or updating
	 * information directly from a from posted by an end user.
	 *
	 */
	private $_aData = array();

	public function __construct()
	{
		$this->database = DB_NAME;
		$this->user = DB_USER;
		$this->pass = DB_PASSWORD;
		$dns = 'mysql:dbname='.$this->database.';host=localhost';

		parent::__construct( $dns, $this->user, $this->pass );

		/*try
		{
			$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
			//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e)
		{
			//throw new Exception($e->getMessage());
			exit('Connection Error!');
		}*/
	}

	public function select($select)
	{
		if (!isset($this->query['select']))
		{
			$this->query['select'] = 'SELECT ';
		}

		$this->query['select'] .= $select;

		return $this;
	}

	/**
	 * Stores the FROM part of a query
	 *
	 * @param string $table Table to query
	 * @param string $alias Optional usage of alias can be passed here
	 * @return object Returns own object
	 */
	public function from($table, $alias = '')
	{
		$this->query['table'] = 'FROM ' . $table . ($alias ? ' AS ' . $alias : '');
		return $this;
	}

	/**
	 * Stores the WHERE part of a query
	 * Example using a string method:
	 * <code>
	 * ->where('user_id = 1')
	 * </code>
	 * Example using an array method:
	 * <code>
	 * $conds = array();
	 * $conds[] = 'AND user_id = 1';
	 * $conds[] = 'AND email = \'foo@bar.com\'';
	 * ->where($conds)
	 * </code>
	 *
	 * @param mixed $conds Can be a string of the WHERE part of an SQL query or an array or all the parts of an SQL query.
	 * @return object Returns own object
	 */
	public function where($conds)
	{
		$this->query['where'] = '';
		if (is_array($conds) && count($conds))
		{
			foreach ($conds as $cond)
			{
				$this->query['where'] .= $cond . ' ';
			}
			$this->query['where'] = "WHERE " . trim(preg_replace("/^(AND|OR)(.*?)/i", "", trim($this->query['where'])));
		}
		else
		{
			if (!empty($conds))
			{
				$this->query['where'] .= 'WHERE ' . $conds;
			}
		}

		return $this;
	}

	/**
	 * Performs the final SQL query with all the information we have gathered from various
	 * other methods in this class. Via this method you can perform all tasks from getting
	 * a single field from a row, to just one row or a list of rows.
	 *
	 * @param string $type The command we plan to execute. It can also be NULL or empty and will simply return the SQL query itself without executing it.
	 * @return mixed Depending on the command you ran this can return various things, usually an array but it all depends on what you executed.
	 */
	public function run($type = NULL, $params = array())
	{
		if (($type == 'getField') && (!isset($this->query['limit']) || empty($this->query['limit'])))
		{
			$this->query['limit'] = ' LIMIT 1';
		}

		$sql = '';

		if (isset($this->query['select']))
		{
			$sql .= $this->query['select'] . "\n";
		}

		if (isset($this->query['join_count']))
		{
			$sql .= 'SELECT (';
		}

		if (isset($this->query['table']))
		{
			$sql .= $this->query['table'] . "\n";
		}

		if (isset($this->query['forceIndex']) && !empty($this->query['forceIndex']))
		{
			$sql .= 'FORCE INDEX (' . $this->query['forceIndex'] . ') ' . "\n";
		}

		if (isset($this->query['union_from']))
		{
			$sql .= "FROM(\n";
		}

		if (!isset($params['union_no_check']) && count($this->unions))
		{
			$unionCount = 0;
			foreach ($this->unions as $union)
			{
				$unionCount++;
				if ($unionCount != 1)
				{
					$sql .= (isset($this->query['join_count']) ? ' + ' : ' UNION ');
				}

				$sql .= '(' . $union . ')';
			}
		}

		if (isset($this->query['join_count']))
		{
			$sql .= ') AS total_count';
		}

		if (isset($this->query['union_from']))
		{
			$sql .= ") AS " . $this->query['union_from'] . "\n";
		}

		$sql .= (isset($this->query['join']) ? $this->query['join'] . "\n" : '');
		$sql .= (isset($this->query['where']) ? $this->query['where'] . "\n" : '');
		$sql .= (isset($this->query['group']) ? $this->query['group'] . "\n" : '');
		$sql .= (isset($this->query['having']) ? $this->query['having'] . "\n" : '');
		$sql .= (isset($this->query['order']) ? $this->query['order'] . "\n" : '');
		$sql .= (isset($this->query['limit']) ? $this->query['limit'] . "\n" : '');

		//not sure what it does
		if (method_exists($this, '_run'))
		{
			$sql = $this->_run();
		}

		$this->query = array();
		if (!isset($params['union_no_check']))
		{
			$this->unions = array();
		}

		$type = strtolower($type);
		switch ($type)
		{
			case 'getrows':
				$rows = $this->getRows($sql);
				break;
			case 'getrow':
				$rows = $this->getRow($sql);
				break;
			case 'getfield':
				$rows = $this->getField($sql);
				break;
			default:
				return $sql;
				break;
		}

		return $rows;
	}

	/**
	 * We clean out the query we just ran so another query can be built
	 *
	 */
	public function clean()
	{
		$this->query = array();
	}

	/**
	 * Returns several rows
	 *
	 * @param string $sql SQL query
	 */
	public function getRows($sql)
	{
		$query = self::prepare($sql);
		$query->execute();

		return $query->fetchAll();
	}

	/**
	 * Returns one row
	 *
	 * @param string $sql SQL query
	 */
	public function getRow($sql)
	{
		//for now this is doing same as getRows
		$query = self::prepare($sql);
		$query->execute();

		return $query->fetch();
	}

	/**
	 * Returns one field from a row
	 */
	public function getField($sql)
	{
		$query = self::prepare($sql);
		$query->execute();

		return $query->fetchColumn();
	}

	public function getT($table)
	{
		return TABLE_PREFIX.$table;
	}

	/**
	 * Stores the ORDER part of a query
	 *
	 * @param string $order SQL ORDER BY command
	 * @return object Returns own object
	 */
	public function order($order)
	{
		if (!empty($order))
		{
			$this->query['order'] = 'ORDER BY ' . $order;
		}

		return $this;
	}

	/**
	 * Stores the GROUP BY part of a query
	 *
	 * @param string $group SQL GROUP BY command
	 * @return object Returns own object
	 */
	public function group($group)
	{
		$this->query['group'] = 'GROUP BY ' . $group;
		return $this;
	}

	/**
	 * Stores the HAVING part of a query
	 *
	 * @param string $having SQL HAVING command
	 * @return object Returns own object
	 */
	public function having($having)
	{
		$this->query['having'] = 'HAVING ' . $having;
		return $this;
	}

	/**
	 * Creates a LEFT JOIN for an SQL query.
	 * Example of left joining tables:
	 * <code>
	 * $db->select('*')
	 *      ->from('user', 'u')
	 * 		->leftJoin('user_info', 'ui', 'ui.user_id = u.user_id')
	 * 		->run('getRows');
	 * </code>
	 *
	 * @param string $table Table to join
	 * @param string $alias Alias to use to identify the table and make it unique
	 * @param mixed $param Can be a string or an array of how to link the tables. This is usually a string that contains the part found with an SQL ON(__STRING__)
	 * @return object Returns own object
	 */
	public function leftJoin($table, $alias, $param = null)
	{
		$this->_join('LEFT JOIN', $table, $alias, $param);
		return $this;
	}

	/**
	 * Creates a INNER JOIN for an SQL query.
	 * Example of left joining tables:
	 * <code>
	 * $db->select('*')
	 * 		->from('user', 'u')
	 * 		->innerJoin('user_info', 'ui', 'ui.user_id = u.user_id')
	 * 		->run('getRows');
	 * </code>
	 *
	 * @param string $table Table to join
	 * @param string $alias Alias to use to identify the table and make it unique
	 * @param mixed $param Can be a string or an array of how to link the tables. This is usually a string that contains the part found with an SQL ON(__STRING__)
	 * @return object Returns own object
	 */
	public function innerJoin($table, $alias, $param = NULL)
	{
		$this->_join('INNER JOIN', $table, $alias, $param);
		return $this;
	}

	/**
	 * Creates a JOIN for an SQL query.
	 * Example of left joining tables:
	 * <code>
	 * $db->select('*')
	 * 		->from('user', 'u')
	 * 		->join('user_info', 'ui', 'ui.user_id = u.user_id')
	 * 		->run('getRows');
	 * </code>
	 *
	 * @param string $table Table to join
	 * @param string $alias Alias to use to identify the table and make it unique
	 * @param mixed $param Can be a string or an array of how to link the tables. This is usually a string that contains the part found with an SQL ON(__STRING__)
	 * @return object Returns own object
	 */
	public function join($table, $alias, $param = NULL)
	{
		$this->_join('JOIN', $table, $alias, $param);
		return $this;
	}

	/**
	 * Performs all the joins based on information passed from JOIN methods within this class.
	 *
	 * @param string $type The type of join we are going to use (LEFT JOIN, JOIN, INNER JOIN)
	 * @param string $table Table to join
	 * @param string $alias Alias to use to identify the table and make it unique
	 * @param mixed $param Can be a string or an array of how to link the tables. This is usually a string that contains the part found with an SQL ON(__STRING__)
	 */
	protected function _join($type, $table, $alias, $param = NULL)
	{
		if (!isset($this->query['join']))
		{
			$this->query['join'] = '';
		}
		$this->query['join'] .= $type . " " . $table . " AS " . $alias;

		if (is_array($param))
		{
			$this->query['join'] .= "\n\tON(";
			foreach ($param as $value)
			{
				$this->query['join'] .= $value . " ";
			}
		}
		else
		{
			if (preg_match("/(AND|OR|=|LIKE)/", $param))
			{
				$this->query['join'] .= "\n\tON({$param}";
			}
		}

		$this->query['join'] = preg_replace("/^(AND|OR)(.*?)/i", "", trim($this->query['join'])) . ")\n";
	}

	/**
	 * Gets all the joins made for the query.
	 *
	 * @return string Returns SQL joins
	 */
	public function getJoins()
	{
		return $this->query['join'];
	}

	/**
	 * Stores the LIMIT/OFFSET part of a query. It can also be used
	 * to create a pagination if params 2 and 3 and filled otherwise
	 * it behaves just as a limit on the SQL query.
	 *
	 * @param int $page If $limit and $count are NULL then this value is the LIMIT on the SQL query. However if $limit and $count are not NULL then this value is the current page we are on.
	 * @param string $limit Is how many to limit per query
	 * @param int $count Is how many rows there are in this query
	 * @return object Returns own object
	 */
	public function limit($page, $limit = NULL, $count = NULL, $return = false)
	{
		if ($limit === NULL && $count === NULL && $page !== NULL)
		{
			$this->query['limit'] = 'LIMIT ' . $page;
			return $this;
		}

		$offset = $page;

		$this->query['limit'] = ($limit ? 'LIMIT ' . $limit : '') . ($offset ? ' OFFSET ' . $offset : '');

		if ($return === true)
		{
			return $this->query['limit'];
		}

		return $this;
	}

	/**
	 * Build a UNION call.
	 *
	 * @return object Return self.
	 */
	public function union()
	{
		$this->unions[] = $this->run(NULL, array('union_no_check' => true));
		return $this;
	}

	/**
	 * Build a UNION FROM call.
	 *
	 * @param string $alias FROM alias name.
	 * @return object Return self.
	 */
	public function unionFrom($alias)
	{
		$this->query['union_from'] = $alias;
		return $this;
	}

	/**
	 * Define that this is a joined count
	 *
	 * @return object Return self.
	 */
	public function joinCount()
	{
		$this->query['join_count'] = true;
		return $this;
	}



	public function count($table_name,$conditions="")
	{
		$sql = NULL;
		$table_name = TABLE_PREFIX.$table_name;

		if($conditions!='') {
			foreach($conditions as $key=>$value) {
				$where[] = $key." '".$value."'";
			}
			$sql.= implode(' AND ', $where);
		} else {
			$sql.= ' 1 = 1 ';
		}

		$query = self::prepare("select *from $table_name where $sql");
		$query->execute();

		return $query->rowCount();
	}

	public function dbquery($sql)
	{
		$row = self::query("$sql");
		return $row;
	}

	public function insert($table_name,$values) {
		$table_name = TABLE_PREFIX.$table_name;
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
		$query = self::prepare($sql);

		foreach($value as $v){
			$data[] = $v;
		}
		$query->execute($data);
	}

	public function update($table_name,$values,$conditions){
		$table_name = TABLE_PREFIX.$table_name;

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

		$query = self::prepare("UPDATE $table_name SET $set_clause WHERE $where_clause");

		$query->execute($data);
	}

	public function search1($keywords) {
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

			$sql = self::prepare("select *from private_jobs where status=1 AND ($where2) ORDER by id DESC");
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

	//stop using this
	public function check_meta()
	{
		$query = self::prepare("SELECT distinct * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = '".DB_NAME."'  AND COLUMN_NAME = 'meta_title'");
		$query->execute();

		$rows = $query->fetchAll();
		foreach($rows as $row){
			$col[] = $row['TABLE_NAME'];
		}
		return $col;
	}

	public function delete($table_name,$conditions){
		$table_name = TABLE_PREFIX.$table_name;
		foreach($conditions as $key=>$condition) {
			$where[] = $key .' ' . $condition;
		}
		$where_clause = implode(' AND ', $where);

		$sql = "DELETE from ".$table_name." where ".$where_clause."";
		$query = self::prepare($sql);
		$query->execute();
	}

	/**
	 * Process data from a form a end-user posted and prepare it to be used when inserting/updating records
	 *
	 * @param array $aFields Array of rules of the fields that are allowed and the type it must be
	 * @param array $aVals  $_POST fields from a form
	 * @return object Returns own object
	 */
	public function process($aFields, $aVals)
	{
		foreach ($aFields as $mKey => $mVal)
		{
			if (is_numeric($mKey))
			{
				unset($aFields[$mKey]);

				$mKey = $mVal;
				$mVal = 'string';
			}

			if (empty($aVals[$mKey]))
			{
				$aVals[$mKey] = ($mVal == 'int' ? 0 : null);
			}

			$aFields[$mKey] = $mVal;
		}

		foreach ($aVals as $mKey => $mVal)
		{
			if (!isset($aFields[$mKey]))
			{
				continue;
			}

			$this->_aData[$mKey] = ($aFields[$mKey] == 'int' ? (int) $mVal : $mVal);
		}

		return $this;
	}

	/**
	 * Performs insert of one row. Accepts values to insert as an array:
	 *    'column1' => 'value1'
	 *    'column2' => 'value2'
	 *
	 * @access	public
	 * @param string  $sTable    table name
	 * @param array   $aValues   column and values to insert
	 * @param boolean $bEscape true - method escapes values (with "), false - not escapes
	 * @return int last ID (or 0 on error)
	 */
	public function insert1($sTable, $aValues = array(), $bEscape = true, $bReturnQuery = false)
	{
		if (!$aValues)
		{
			$aValues = $this->_aData;
		}

		$sValues = '';
		foreach ($aValues as $mValue)
		{
			if (is_null($mValue))
			{
				$sValues .= "NULL, ";
			}
			else
			{
				$sValues .= "'" . ($bEscape ? $this->escape($mValue) : $mValue) . "', ";
			}
		}
		$sValues = rtrim(trim($sValues), ',');

		if ($this->_aData)
		{
			$this->_aData = array();
		}

		$sSql = $this->_insert($sTable, implode(', ', array_keys($aValues)), $sValues);
		//r($sSql,true);
		//debug($sSql);

		if ($hRes = $this->query($sSql))
		{
			if ($bReturnQuery)
			{
				return $sSql;
			}

			return $this->getLastId();
		}

		return 0;
	}

	/**
	 * Runs an SQL query to run one SQL query and insert multiple rows. The 2nd and 3rd
	 * params much match in order to inser the data correctly.
	 *
	 * @param string $sTable Table to insert the data
	 * @param array $aFields Array of table fields
	 * @param array $aValues Array of values to insert that matches the table fields
	 * @return int Returns the last ID of the insert. Usually the auto_increment.
	 */
	public function multiInsert($sTable, $aFields, $aValues)
	{
		$sSql = "INSERT INTO {$sTable} (" . implode(', ', array_values($aFields)) . ") ";
		$sSql .= " VALUES\n";
		foreach ($aValues as $aValue)
		{
			$sSql .= "\n(";
			foreach ($aValue as $mValue)
			{
				if (is_null($mValue))
				{
					$sSql .= "NULL, ";
				}
				else
				{
					$sSql .= "'" . $this->escape($mValue) . "', ";
				}
			}
			$sSql = rtrim(trim($sSql), ',');
			$sSql .= "),";
		}
		$sSql = rtrim($sSql, ',');

		if ($hRes = $this->query($sSql))
		{
			return $this->getLastId();
		}

		return 0;
	}

	/**
	 * Performs update of rows.
	 *
	 * @param string $sTable  table name
	 * @param array  $aValues array of column=>new_value
	 * @param string $sCond   condition (without WHERE)
	 * @param boolean $bEscape true - method escapes values (with "), false - not escapes
	 * @return boolean true - update successfule, false - error
	 */
	public function update1($sTable, $aValues = array(), $sCond = null, $bEscape = true)
	{
		if (!is_array($aValues) && count($this->_aData))
		{
			$sCond = $aValues;
			$aValues = $this->_aData;
			$this->_aData = array();
		}

		$sSets = '';
		foreach ($aValues as $sCol => $sValue)
		{
			$sCmd = "=";
			if (is_array($sValue))
			{
				$sCmd = $sValue[0];
				$sValue = $sValue[1];
			}

			$sSets .= "{$sCol} {$sCmd} " . (is_null($sValue) ? 'NULL' : ($bEscape ? "'" . $this->escape($sValue) . "'" : $sValue)) . ", ";
		}
		$sSets[strlen($sSets) - 2] = '  ';

		return $this->query($this->_update($sTable, $sSets, $sCond));
	}

	/**
	 * Delete entry from the database
	 *
	 * @param string $sTable is the table name
	 * @param string $sQuery is the query we will run
	 * @return boolean true - update successfule, false - error
	 */
	public function delete1($sTable, $sQuery, $iLimit = null)
	{
		if ($iLimit !== null)
		{
			$sQuery .= ' LIMIT ' . (int) $iLimit;
		}

		return $this->query("DELETE FROM {$sTable} WHERE " . $sQuery);
	}

	/**
	 * Drops tables from the database
	 *
	 * @param string $aDrops Array of tables to drop
	 * @param array $aVals Not being used at the moment.
	 */
	public function dropTables($aDrops, $aVals = array())
	{
		if (!is_array($aDrops))
		{
			$aDrops = array($aDrops);
		}
		foreach ($aDrops as $sDrop)
		{
			$this->query("DROP TABLE IF EXISTS {$sDrop}");
		}
	}

	/**
	 * Build search params for keywords.
	 *
	 * @param string $sField Field to search
	 * @param string $sStr Keywords to use
	 * @return string Returns an SQL ready search statement
	 */
	public function searchKeywords($sField, $sStr)
	{
		if (is_array($sField))
		{
			$sQuery = '';
			$iIteration = 0;
			foreach ($sField as $sNewField)
			{
				$iIteration++;
				if ($iIteration != 1)
				{
					$sQuery .= ' OR ';
				}
				$sQuery .= $this->searchKeywords($sNewField, $sStr);
			}

			return $sQuery;
		}

		$aWords = explode(' ', $sStr);

		$sQuery = ' (';
		if (count($aWords))
		{
			$iIteration = 0;
			foreach ($aWords as $sWord)
			{
				$sWord = trim($sWord);
				if (strlen($sWord) < 4)
				{
					continue;
				}
				$iIteration++;
				if ($iIteration != 1)
				{
					$sQuery .= ' OR ';
				}
				$sQuery .= $sField . ' LIKE \'%' . Phpfox::getLib('database')->escape($sWord) . '%\'';
			}
		}

		if (!$iIteration)
		{
			return $sField . ' LIKE \'%' . Phpfox::getLib('database')->escape($sStr) . '%\' ';
		}

		$sQuery .= ') ';

		return $sQuery;
	}

	/**
	 * Insert data into the database
	 *
	 * @param string $sTable Database table
	 * @param string $sFields List of fields
	 * @param string $sValues List of values
	 * @return string Returns the actual SQL query to perform
	 */
	protected function _insert($sTable, $sFields, $sValues)
	{
		return 'INSERT INTO ' . $sTable . ' ' .
		'        (' . $sFields . ')' .
		' VALUES (' . $sValues . ')';
	}

	/**
	 * Updates data in a specific table
	 *
	 * @param string $sTable Table we are updating
	 * @param string $sSets SQL SET command
	 * @param string $sCond SQL WHERE command
	 * @return string Returns the actual SQL query to perform
	 */
	protected function _update($sTable, $sSets, $sCond)
	{
		//$content = 'UPDATE ' . $sTable . ' SET ' . $sSets . ' WHERE ' . $sCond."\n";
		//$myFile = "file.txt";
		//$fh = fopen($myFile, 'a') or die("can't open file");
		//fwrite($fh, $content);
		//fclose($fh);
		//file_put_contents("file.txt", $content, FILE_APPEND);
		//r('UPDATE ' . $sTable . ' SET ' . $sSets . ' WHERE ' . $sCond);
		//debug('UPDATE ' . $sTable . ' SET ' . $sSets . ' WHERE ' . $sCond);

		return 'UPDATE ' . $sTable . ' SET ' . $sSets . ' WHERE ' . $sCond;
	}

	public function createTable($sName, $aFields)
	{
		$sSql = 'CREATE TABLE ' . $sName . "\n";
		$sSql .= '(' . "\n";
		$bHasPK = false;
		foreach ($aFields as $aField)
		{
			$sSql .= $aField['name'] . ' ' . $aField['type'] . (isset($aField['extra']) ? ' ' . $aField['extra'] : '' ) . ",\n";
			if (isset($aField['primary_key']) && $aField['primary_key'] == true)
			{
				$bHasPK = $aField['name'];
			}
		}

		if ($bHasPK !== false)
		{
			$sSql .= 'PRIMARY KEY (`' . $bHasPK . '`)' . "\n";
		}

		$sSql .= ')';

		$this->query($sSql);
	}

	/**
	 * Tells which index to use by issuing a Force Index ($sName)
	 * @param type String
	 */
	public function forceIndex($sName)
	{
		if (preg_match('/([a-zA-Z0-9_]+)/', $sName, $aMatches) > 0)
		{
			$this->_aQuery['forceIndex'] = $aMatches[1];
		}
		return $this;
	}

	/**
	 * Returns MySQL server information. Here we only identify that it is MySQL and the version being used.
	 *
	 * @return string
	 */
	public function getServerInfo()
	{
		return 'MySQL ' . $this->getVersion();
	}

	/**
	 * Prepares string to store in db (performs  addslashes() )
	 *
	 * @param mixed $mParam string or array of string need to be escaped
	 * @return mixed escaped string or array of escaped strings
	 */
	public function escape($mParam)
	{
		if (is_array($mParam))
		{
			return array_map(array(&$this, 'escape'), $mParam);
		}

		if (get_magic_quotes_gpc())
		{
			$mParam = stripslashes($mParam);
		}

		$mParam = @($this->_aCmd['mysql_real_escape_string'] == 'mysqli_real_escape_string' ? $this->_aCmd['mysql_real_escape_string']($this->_hMaster, $mParam) : $this->_aCmd['mysql_real_escape_string']($mParam));

		return $mParam;
	}

	/**
	 * Returns row id from last executed query
	 *
	 * @return int id of last INSERT operation
	 */
	public function getLastId()
	{
		return @$this->_aCmd['mysql_insert_id']($this->_hMaster);
	}

	/**
	 * Returns the affected rows.
	 *
	 * @return array
	 */
	public function affectedRows()
	{
		return @$this->_aCmd['mysql_affected_rows']($this->_hMaster);
	}

	/**
	 * MySQL has special search functions, so we try to use that here.
	 *
	 * @param string $sType Type of search we plan on doing.
	 * @param mixed $mFields Array of fields to search
	 * @param string $sSearch Value to search for.
	 * @return string MySQL query to use when performing the search
	 */
	public function search($sType, $mFields, $sSearch)
	{
		switch ($sType)
		{
			case 'full':
				return "AND MATCH(" . implode(',', $mFields) . ") AGAINST ('+" . $this->escape($sSearch) . "' IN BOOLEAN MODE)";
				break;
			case 'like%':
				$sSql = '';
				foreach ($mFields as $sField)
				{
					$sSql .= "OR ". $sField . " LIKE '%" . $this->escape($sSearch) . "%' ";
				}
				return 'AND (' . trim(ltrim(trim($sSql), 'OR')) . ')';
				break;
		}
	}

	/**
	 * During development you may need to check how your queries are being executed and how long they are taking. This
	 * routine uses MySQL's EXPLAIN to return useful information.
	 *
	 * @param string $sQuery MySQL query to check.
	 * @return string HTML output of the information we have found about the query.
	 */
	public function sqlReport($sQuery)
	{
		$sHtml = '';
		$sExplainQuery = $sQuery;
		if (preg_match('/UPDATE ([a-z0-9_]+).*?WHERE(.*)/s', $sQuery, $m))
		{
			$sExplainQuery = 'SELECT * FROM ' . $m[1] . ' WHERE ' . $m[2];
		}
		elseif (preg_match('/DELETE FROM ([a-z0-9_]+).*?WHERE(.*)/s', $sQuery, $m))
		{
			$sExplainQuery = 'SELECT * FROM ' . $m[1] . ' WHERE ' . $m[2];
		}

		$sExplainQuery = trim($sExplainQuery);

		if (preg_match('/SELECT/se', $sExplainQuery) || preg_match('/^\(SELECT/', $sExplainQuery))
		{
			$bTable = false;

			if ($hResult = @($this->_aCmd['mysql_query'] == 'mysqli_query' ? $this->_aCmd['mysql_query']($this->_hMaster, "EXPLAIN $sExplainQuery") : $this->_aCmd['mysql_query']("EXPLAIN $sExplainQuery", $this->_hMaster)))
			{
				while ($aRow = @$this->_aCmd['mysql_fetch_assoc']($hResult))
				{
					list($bTable, $sData) = Phpfox_Debug::addRow($bTable, $aRow);

					$sHtml .= $sData;
				}
			}
			@$this->_aCmd['mysql_free_result']($hResult);

			if ($bTable)
			{
				$sHtml .= '</table>';
			}
		}

		return $sHtml;
	}

	/**
	 * Check if a field in the database is set to null
	 *
	 * @param string $sField The field we plan to check
	 * @return string Returns MySQL IS NULL usage
	 */
	public function isNull($sField)
	{
		return '' . $sField . ' IS NULL';
	}

	/**
	 * Check if a field in the database is set not null
	 *
	 * @param string $sField The field we plan to check
	 * @return string Returns MySQL IS NOT NULL usage
	 */
	public function isNotNull($sField)
	{
		return '' . $sField . ' IS NOT NULL';
	}

	/**
	 * Adds an index to a table.
	 *
	 * @param string $sTable Database table.
	 * @param string $sField List of indexes to add.
	 * @return resource Returns the MySQL resource from mysql_query()
	 */
	public function addIndex($sTable, $sField)
	{
		$sSql = 'ALTER TABLE ' . $sTable . ' ADD INDEX (' . $sField . ')';

		return $this->query($sSql);
	}

	/**
	 * Adds fields to a database table.
	 *
	 * @param array $aParams Array of fields and what type each field is.
	 * @return resource Returns the MySQL resource from mysql_query()
	 */
	public function addField($aParams)
	{
		$sSql = 'ALTER TABLE ' . $aParams['table'] . ' ADD ' . $aParams['field'] . ' ' . $aParams['type'] . '';
		if (isset($aParams['attribute']))
		{
			$sSql .= ' ' . $aParams['attribute'] . ' ';
		}
		if (isset($aParams['null']))
		{
			$sSql .= ' ' . ($aParams['null'] ? 'NULL' : 'NOT NULL') . ' ';
		}
		if (isset($aParams['default']))
		{
			$sSql .= ' ' . $aParams['default'] . ' ';
		}

		return $this->query($sSql);
	}

	/**
	 * Drops a specific field from a table.
	 *
	 * @param string $sTable Database table
	 * @param string $sField Name of the field to drop
	 * @return resource Returns the MySQL resource from mysql_query()
	 */
	public function dropField($sTable, $sField)
	{
		return $this->query('ALTER TABLE ' . $sTable . ' DROP ' . $sField. '');
	}

	/**
	 * Checks if a field already exists or not.
	 *
	 * @param string $sTable Database table to check
	 * @param string $sField Name of the field to check
	 * @return bool If the field exists we return true, if not we return false.
	 */
	public function isField($sTable, $sField)
	{
		$aRows = $this->getRows("SHOW COLUMNS FROM {$sTable}");
		foreach ($aRows as $aRow)
		{
			if (strtolower($aRow['Field']) == strtolower($sField))
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Checks if a field already exists or not.
	 *
	 * @param string $sTable Database table to check
	 * @param string $sField Name of the field to check
	 * @return bool If the field exists we return true, if not we return false.
	 */
	public function isIndex($sTable, $sField)
	{
		$aRows = $this->getRows("SHOW INDEX FROM {$sTable}");
		foreach ($aRows as $aRow)
		{
			if (strtolower($aRow['Key_name']) == strtolower($sField))
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Returns the status of the table.
	 *
	 * @return array Returns information about the table in an array.
	 */
	public function getTableStatus()
	{
		return $this->_getRows('SHOW TABLE STATUS', true, $this->_hMaster);
	}

	/**
	 * Checks if a database table exists.
	 *
	 * @param string $sTable Table we are looking for.
	 * @return bool If the table exists we return true, if not we return false.
	 */
	public function tableExists($sTable)
	{
		$aTables = $this->getTableStatus();

		foreach ($aTables as $aTable)
		{
			if ($aTable['Name'] == $sTable)
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Optimizes a table
	 *
	 * @param string $sTable Table to optimize
	 * @return resource Returns the MySQL resource from mysql_query()
	 */
	public function optimizeTable($sTable)
	{
		return $this->query('OPTIMIZE TABLE ' . $this->escape($sTable));
	}

	/**
	 * Repairs a table
	 *
	 * @param string $sTable Table to repair
	 * @return resource Returns the MySQL resource from mysql_query()
	 */
	public function repairTable($sTable)
	{
		return $this->query('REPAIR TABLE ' . $this->escape($sTable));
	}

	/**
	 * Checks if we can backup the database or not. This depends on the server itself.
	 * We currently only support unix based servers.
	 *
	 * @return bool Returns true if we can backup or false if we can't
	 */
	public function canBackup()
	{
		return ((function_exists("exec") AND $checkDump = @str_replace("mysqldump:","",exec("whereis mysqldump")) AND !empty($checkDump)) ? true : false);
	}

	/**
	 * Performs a backup of the database and places the backup in a specific area on the server
	 * based on what the admins decide.
	 *
	 * @param string $sPath Full path to where to place the backup.
	 * @return string Full path to where the backup is located including the file name.
	 */
	public function backup($sPath)
	{
		if (!is_dir($sPath))
		{
			return Phpfox_Error::set(Phpfox::getPhrase('admincp.the_path_you_provided_is_not_a_valid_directory'));
		}

		if (!Phpfox::getLib('file')->isWritable($sPath, true))
		{
			return Phpfox_Error::set(Phpfox::getPhrase('admincp.the_path_you_provided_is_not_a_valid_directory'));
		}

		$sPath = rtrim($sPath, PHPFOX_DS) . PHPFOX_DS;
		$sFileName = uniqid() . '.sql';
		$sZipName = 'sql-backup-' . date('Y-d-m', PHPFOX_TIME) . '-' . uniqid() . '.tar.gz';

		shell_exec("mysqldump --skip-add-locks --disable-keys --skip-comments -h". Phpfox::getParam(array('db','host')) ." -u". Phpfox::getParam(array('db','user')) ." -p". Phpfox::getParam(array('db','pass')) ." ". Phpfox::getParam(array('db','name')) ." > " . $sPath . $sFileName ."");
		chdir($sPath);
		shell_exec("tar -czf ". $sZipName ." " . $sFileName ."");
		chdir(PHPFOX_DIR);
		unlink($sPath . $sFileName);

		return $sPath . $sZipName;
	}

	/**
	 * Returns any SQL errors.
	 *
	 * @return string String of error message in case something failed.
	 */
	private function _sqlError()
	{
		return ($this->_aCmd['mysql_error'] == 'mysqli_error' ? @$this->_aCmd['mysql_error']($this->_hMaster) : @$this->_aCmd['mysql_error']());
	}


}