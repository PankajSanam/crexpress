<?php if ( ! defined('RETINA_VERSION')) exit('No direct access allowed');

class Navigation {

	public function current_menu($page_slug,$compare=''){
		if(empty($compare)) {
			if($page_slug == 'index' OR $page_slug=='') 
				return 'active'; 
			else
				return '';
		} else {
			if($page_slug == $compare)
				echo 'active'; 
			else 
				echo '';
		}
	}

	public function admin_current_menu($back,$slug){
		if($back == $slug) 
			return 'active'; 
		else 
			return '';
	}

	public function top_menus(){
		$Db = new Db;
		$cond = array( 
			'status=' => 1, 
			'menu_position=' => 'top', 
			'page_category_id=' => 0,
			'menu_name<>' => '',
			'menu_sort_order<>' => 0,
		);
		$query = $Db->select('pages',$cond,'menu_sort_order','asc');
		return $query;
	}

	public function top_submenus($id){
		$Db = new Db;
		$cond = array( 
			'page_category_id=' => $id,
			'status=' => 1,
			'menu_name<>' => '',
		);
		$query = $Db->select('pages',$cond);
		return $query;
	}

	public function submenus($id){
		$Db = new Db;
		$cond = array( 
			'menu_name<>' => '', 
			'status=' => 1, 
			'page_category_id=' => $id,
		);
		$query = $Db->select('pages', $cond);
		return $query;
	}

	public function sub_submenus($id){
		$Db = new Db;
		$cond = array( 
			'page_category_id=' => $id,
			'status=' => 1, 
			'menu_name<>' =>'',
		);
		$query = $Db->select('pages',$cond);
		return $query;
	}
}
?>