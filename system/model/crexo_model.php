<?php if (!defined('CREXO')) exit('No Trespassing!');

class Crexo_Model {
	
	private $db;
	
	public function __construct(){
		$this->db = new Db();
	}

	public function meta_title($page) {
		$page = explode('.',$page);
		$page = $page[0];

		$meta_tables = $this->db->check_meta();
		$count_tables = count($meta_tables);

		if(strrchr($page, '?')) {
			$page = explode('?', $page);
			$page = $page[0];
		}

		for($i = 0; $i <= $count_tables - 1; $i++) {
			$result = $this->db->select($meta_tables[$i], array( 'slug=' => $page, 'status=' => 1 ));
			$count = count($result);

			if($count > 0) {
				$meta_title = $result[0]['meta_title'];
				break;
			} else {
				$meta_title = '404 - Not Found';
			}
		}
		$meta_title = '<title>' . $meta_title . '</title>' . "\n";
		return $meta_title;
	}

	public function meta_description($page) {
		$page = explode('.',$page);
		$page = $page[0];
		
		$meta_tables = $this->db->check_meta();
		$count_tables = count($meta_tables);

		if(strrchr($page, '?')) {
			$p = explode('?', $page);
			$page = $p[0];
		} else {
			$page = $page;
		}

		$cond = array(
			'slug=' => $page,
			'status=' => 1
		);

		for($i = 0; $i <= $count_tables - 1; $i++) {
			$result = $this->db->select($meta_tables[$i], $cond);
			$count = count($result);

			if($count > 0) {
				$meta_description = $result[0]['meta_description'];
				break;
			} else {
				$meta_description = 'Content Not found';
			}
		}
		$meta_description = '<meta name="description" content="' . $meta_description . '" />' . "\n";
		return $meta_description;
	}

	public function meta_keywords($page) {
		$page = explode('.',$page);
		$page = $page[0];
		
		$meta_tables = $this->db->check_meta();
		$count_tables = count($meta_tables);

		if(strrchr($page, '?')) {
			$p = explode('?', $page);
			$page = $p[0];
		} else {
			$page = $page;
		}

		$cond = array(
			'slug=' => $page,
			'status=' => 1
		);

		for($i = 0; $i <= $count_tables - 1; $i++) {
			$result = $this->db->select($meta_tables[$i], $cond);
			$count = count($result);

			if($count > 0) {
				$meta_keywords = $result[0]['meta_keywords'];
				break;
			} else {
				$meta_keywords = 'not found, 404 error';
			}
		}
		$meta_keywords = '<meta name="keywords" content="' . $meta_keywords . '" />' . "\n";
		return $meta_keywords;
	}

	public function page_id($slug){
		$tables = $this->db->check_meta();
		$count_tables = count($tables);
		$cond = array( 'slug=' => $slug );

		for($i = 0 ; $i <= $count_tables-1; $i++){
			$result =  $this->db->select($tables[$i], $cond);
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
		$rows = $this->db->select('settings', array('name=' => 'google_webmaster'));

		foreach($rows as $row) {}

		return '<meta name="google-site-verification" content="'.$row['value'].'" />';
	}

	public function email(){
		$rows = $this->db->select('settings', array('name=' => 'email'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function landline(){
		$rows = $this->db->select('settings', array('name=' => 'landline'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function mobile(){
		$rows = $this->db->select('settings', array('name=' => 'mobile'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function address(){
		$rows = $this->db->select('settings', array('name=' => 'address'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function favicon(){
		$rows = $this->db->select('settings', array('name=' => 'favicon'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function logo(){
		$rows = $this->db->select('settings', array('name=' => 'logo'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}

	public function about(){
		$rows = $this->db->select('settings', array('name=' => 'about'));
		foreach($rows as $row){
			$col = $row['value'];
		}
		return $col;
	}
	
	public function latest_news($length){
		$sanitize = new Sanitize();
		
		$cond = array( 'id=' => 17 );
		$rows = $this->db->select('pages',$cond);
		
		$content = $rows[0]['content'];

		return $sanitize->strip_html($content, $length);
	}

}