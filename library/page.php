<?php
class Page {
	public static function slug($page,$page_template){
		if($page_template=='private_job') {
			$count = DB::count_query('private_jobs', array('slug=' => $page, 'status=' => 1 ));
			$result = DB::select_query('private_jobs', array('slug=' => $page, 'status=' => 1 ));
		} else {
			$count = DB::count_query('pages', array('slug=' => $page, 'status=' => 1 ));
			$result = DB::select_query('pages', array('slug=' => $page, 'status=' => 1 ));
		}
		if($count > 0)
			return $result[0]['slug'];
		else
			return 404;
	}

	public static function template($page){
		$result1 = DB::select_query('pages', array('slug=' => $page, 'status=' => 1 ));
		$count1 = DB::count_query('pages', array('slug=' => $page, 'status=' => 1 ));
		
		$result2 = DB::select_query('private_jobs', array('slug=' => $page, 'status=' => 1 ));
		$count2 = DB::count_query('private_jobs', array('slug=' => $page, 'status=' => 1 ));

		if($count1 > 0 ) {
			$page_template = Page::template_name($result1[0]['page_template_id']);
		} else {
			if($count2 > 0) {
				$page_template = Page::template_name($result2[0]['page_template_id']);
			} else {
				$page_template = 'page';	
			}
		}
		return $page_template;
	}

	public static function template_name($id){
		$cond = array( 'id=' => $id );
		$query = DB::select_query('page_templates',$cond);
		foreach($query as $q){ }
		return $q['template_name'];
	}

	public static function name($slug,$page_template=''){
		if($page_template == 'private_job') {
			$conditions = array( 'slug=' => $slug );
			$query= DB::select_query('private_jobs',$conditions);
			foreach($query as $q){
				$page_name = $q['title'];
			}
		} else {
			if($slug!=404){
				$conditions = array( 'slug=' => $slug );
				$query= DB::select_query('pages',$conditions);
				foreach($query as $q){
					$page_name = $q['title'];
				}
			} else {
				$page_name = '404 - Page Not Found';
			}
		}
		return $page_name;
	}

	public static function content($slug,$page_template=''){
		if($slug!=404){
			$conditions = array( 'slug=' => $slug );
			$query= DB::select_query('pages',$conditions);
			foreach($query as $q){
				$page_content = $q['content'];
			}
		} else {
			$page_content = 'Page you are looking for does not exist or has been moved';
		}

		return $page_content;
	}

	public static function featured_image($slug,$width='',$height='',$class=''){
		if($slug!=404){
			$page_featured_image = '';
			$conditions = array( 'slug=' => $slug );
			$query= DB::select_query('pages',$conditions);
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="uploads/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			} else {
				$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
				//$featured_image = '';
			}
		} else {
			$featured_image = '<img class="'.$class.'" src="uploads/general/404.png" width="'.$width.'" height="'.$height.'" />';
		}

		return $featured_image;
	}

	public static function last_updated($slug) {
		if($slug!=404){
			$condition = array('slug=' => $slug);
			$query = DB::select_query('pages',$condition);
			foreach($query as $q){
				$page_last_updated = $q['last_updated'];
			}
		} else {
			$page_last_updated = date("Y-m-d");
		}

		return $page_last_updated;
	}

	public static function id($slug) {
		if($slug!=404){
			$condition = array('slug=' => $slug);
			$query = DB::select_query('pages',$condition);
			foreach($query as $q){
				$row = $q['id'];
			}
		} else {
			$row = 1234567890123456789;
		}

		return $row;
	}

	public static function link($slug){
		$condition = array('slug=' => $slug);
		$query = DB::select_query('pages',$condition);
		foreach($query as $q){
			$row = $q['slug'];
		}
		$col = $row.'.html';
		return $col;
	}

	public static function latest_page(){
		$query = DB::select_query('pages','','last_updated','DESC',0,1);
		foreach($query as $q){
			$col[] = $q;
		}
		return $col;
	}

} //End of pages class
?>