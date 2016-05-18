<?php if (!defined('CREXO')) exit('No Trespassing!');

class College_Model extends Crexo_Model{

	private $db;
	
	public function __construct(){
		$this->db = new Db();
	}

	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
	public function page_title($slug) {
		$query= $this->db->select('pages',array( 'slug=' => $slug ));
		
		$page_name = '';
		foreach($query as $q){
			$page_name = $q['title'];
		}

		if($page_name!=''){
			return $page_name;
		} else {
			return '';
		}
	}

	public function page_content($slug) {
		$query= $this->db->select('pages',array( 'slug=' => $slug ));
		
		$page_content = '';
		foreach($query as $q){
			$page_content = $q['content'];
		}
		
		if($page_content!=''){
			return $page_content;
		} else {
			return '';
		}
	}

	public static function featured_image($slug,$width='',$height='',$class=''){
		if($slug!=404){
			$query= $this->db->select('private_jobs',array( 'slug=' => $slug ));
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="'.DATA_VIEW.'/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			} else {
				//$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
				$featured_image = '';
			}
			return $featured_image;
		} else {
			$featured_image = '<img class="'.$class.'" src="'.DATA_VIEW.'/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
			return $featured_image;
		}
	}

	public function colleges($id){
		$col = array();
		$abc = array();

		$rows = $this->db->select('colleges',array('status=' => 1, 'page_id=' => $id));
		foreach($rows as $row){
			$col[] = $row;
		}
		$output = $col;
		if(count($output)<1){
			$rows = $this->db->select('pages',array('status=' => 1, 'page_category_id=' => $id));
			foreach($rows as $row){
				$col[] = $row;
			}

			foreach($col as $c) {
				$rows = $this->db->select('colleges',array('status=' => 1, 'page_id=' => $c['id']));
				foreach($rows as $row){
					$abc[] = $row;
				}
			}
			$output = $abc;
		}
		return $output;
	}

}