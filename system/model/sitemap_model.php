<?php if (!defined('CREXO')) exit('No Trespassing!');

class Sitemap_Model extends Crexo_Model{

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

		if(!empty($rows)) {
			foreach($rows as $row){
				$data = $row['title'];
			}
		} else{
			$data = 'Not Found';
		}

		return $data;
	}

	public function page_alt($slug) {
		$rows = $this->db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['menu_name_alt'];
		}

		if(empty($data)) return ''; else return $data;
	}
	
	public function page_content($slug) {
		$rows = $this->db->select('pages',array( 'slug=' => $slug ));

		if(!empty($rows)){
			foreach($rows as $row){
				$data = $row['content'];
			}
		} else {
			$data = 'Page not found!';
		}

		return $data;
	}

	public function pages(){
		$rows = $this->db->select('pages',array('status=' => 1));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function name($slug,$page_template=''){
		if($page_template == 'private_job') {
			$conditions = array( 'slug=' => $slug );
			$query= $this->db->select('private_jobs',$conditions);
			foreach($query as $q){
				$page_name = $q['title'];
			}
		} else {
			if($slug!=404){
				$conditions = array( 'slug=' => $slug );
				$query= $this->db->select('pages',$conditions);
				foreach($query as $q){
					$page_name = $q['title'];
				}
			} else {
				$page_name = '404 - Page Not Found';
			}
		}
		return $page_name;
	}

	public function content($slug,$page_template=''){
		if($slug!=404){
			$conditions = array( 'slug=' => $slug );
			$query= $this->db->select('pages',$conditions);
			foreach($query as $q){
				$page_content = $q['content'];
			}
		} else {
			$page_content = 'Page you are looking for does not exist or has been moved';
		}

		return $page_content;
	}

	public function link($slug){
		$condition = array('slug=' => $slug);
		$query = $this->db->select('pages',$condition);
		foreach($query as $q){
			$row = $q['slug'];
		}
		$col = SITE_PATH.'/'.$row.'.html';
		return $col;
	}

	public function thumb($slug,$width='',$height='',$class=''){
		if($slug!=404){
			$page_featured_image = '';
			$conditions = array( 'slug=' => $slug );
			$query= $this->db->select('pages',$conditions);
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			} else {
				$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
				//$featured_image = '';
			}
		} else {
			$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/general/404.png" width="'.$width.'" height="'.$height.'" />';
		}

		return $featured_image;
	}

	public function last_updated($slug) {
		if($slug!=404){
			$condition = array('slug=' => $slug);
			$query = $this->db->select('pages',$condition);
			foreach($query as $q){
				$page_last_updated = $q['last_updated'];
			}
		} else {
			$page_last_updated = date("Y-m-d");
		}

		return $page_last_updated;
	}

	public function id($slug) {
		if($slug!=404){
			$condition = array('slug=' => $slug);
			$query = $this->db->select('pages',$condition);
			foreach($query as $q){
				$row = $q['id'];
			}
		} else {
			$row = 1234567890123456789;
		}

		return $row;
	}

	public function featured_image($slug,$width='',$height='',$class=''){
		if($slug!=404){
			$page_featured_image = '';
			$conditions = array( 'slug=' => $slug );
			$query= $this->db->select('pages',$conditions);
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			} else {
				$featured_image = '';
			}
		} else {
			$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/general/404.png" width="'.$width.'" height="'.$height.'" />';
		}

		return $featured_image;
	}
}