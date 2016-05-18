<?php if (!defined('CREXO')) exit('No Trespassing!');

class Home_Model extends Crexo_Model{

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
		$rows = $this->db->select('gallery',array('status=' => 1));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function sliders(){
		$sliders = $this->db->select('sliders',array( 'status='=> 1 ));
		return $sliders;
	}

	public function colleges(){
		$from = (isset($_GET['from']) ? $_GET['from'] : 0);
		$to = (isset($_GET['to']) ? $_GET['to'] : 5);

		$rows = $this->db->select('colleges',array('status=' => 1),'id','asc',$from,$to);
		foreach($rows as $row){
			$col[] = $row;
		}
		if(!empty($col)) return $col; else return array();
	}
}