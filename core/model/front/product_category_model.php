<?php if (!defined('CREXO')) exit('No Trespassing!');

class Product_Category_Model extends Crexo_Model{
	private $db;
	
	public function __construct(){
		$this->db = new Db();
	}

	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
	public function products(){
		$Db = new \Db;
		$rows = $Db->select('product');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('product',array('product_id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}
	
	public function page_title($slug) {

		$rows = $this->db->select('product',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['title'];
		}

		if(!empty($data)) return $data; else return '';
	}
	
	public function page_content($slug) {
		$rows = $this->db->select('product',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['content'];
		}

		if(!empty($data)) return $data; else return '';
	}
	
	public function categories(){
		$cond = array(
			'parent_id=' => 0,
			'is_product=' => 0,
		);
		$rows = $this->db->select('product', $cond);
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function category_id($slug){
		$query = $this->db->select('product',array( 'slug=' => $slug ));
		return $query[0]['product_id'];
	}

}