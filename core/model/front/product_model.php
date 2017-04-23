<?php if (!defined('CREXO')) exit('No Trespassing!');

class Product_Model extends Crexo_Model{
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
		$rows = $this->db->select('product',array('product_id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}
	
	public function edit_feature_data($action_id){
		$rows = $this->db->select('product_feature',array('id=' => $action_id));
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

		return $data;
	}
	
	public function pdf_name($slug) {

		$rows = $this->db->select('product',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['file'];
		}
		
		//$output = DATA_PATH.'/product/'.$data;
		
		return $data;
	}
	
	public function product_image($slug) {

		$rows = $this->db->select('product',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['image'];
		}

		return $data;
	}
	
	public function page_content($slug) {
		$rows = $this->db->select('product',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['content'];
		}

		return $data;
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

	public function category_title($id){
		if ($id == 0) return '<em>n/a</em>';
			
		$query = $this->db->select('product',array( 'product_id=' => $id ));
		return $query[0]['title'];
	}
	
	public function features($slug){
		$ids = $this->db->select('product', array( 'slug=' => $slug ),'sort_order','asc' );
		foreach($ids as $id) {
			$product_id = $id['product_id'];
		}

		$rows = $this->db->select('product_feature', array( 'product_id=' => $product_id ) );
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	function delete_product($id){
		$query = $this->db->select('product',array( 'parent_id=' => $id ));

		if(count($query) === 0) {
			$this->db->delete('product',array( 'product_id=' => $id ));
			return true;
		} else {
			return false;
		}
	}
	
	function delete_feature($id){
		$this->db->delete('product_feature',array( 'id=' => $id ));
		return true;
	}
}