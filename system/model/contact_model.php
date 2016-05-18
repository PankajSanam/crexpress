<?php if (!defined('CREXO')) exit('No Trespassing!');

class Contact_Model extends Crexo_Model{

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
}