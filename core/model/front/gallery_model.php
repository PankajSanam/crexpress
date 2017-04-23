<?php if (!defined('CREXO')) exit('No Trespassing!');

class Gallery_Model extends Crexo_Model{

	private $db;
	
	public function __construct(){
		$this->db = new Db();
	}
	
	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
	public function page_title($slug) {

		$rows = $this->db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['title'];
		}

		return $data;
	}
	
	public function page_content($slug) {
		$rows = $this->db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['content'];
		}

		return $data;
	}
	
	public function galleries(){
		$Db = new \Db;
		$rows = $Db->select('gallery');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function categories(){
		$Db = new \Db;
		$rows = $Db->select('gallery_categories');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function category_name($id){
		$Db = new \Db;
		$query = $Db->select('gallery_categories',array( 'id=' => $id ));
		foreach($query as $q){ }
		return $q['name'];
	}

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('gallery',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}
	
	function delete_gallery($id){
		$this->db->delete('gallery',array( 'id=' => $id ));
		return true;
	}

}