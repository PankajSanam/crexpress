<?php
class Pages {
	public static function page_slug($page,$page_template){
		if($page_template=='private_job') {
			$count = DB::count_query('private_jobs', array('job_slug=' => $page, 'status=' => 1 ));
			$result = DB::select_query('private_jobs', array('job_slug=' => $page, 'status=' => 1 ));

			if($count > 0)
				$page_slug = $result[0]['job_slug'];
			else
				$page_slug = 404;
		} else {
			$count = DB::count_query('pages', array('page_slug=' => $page, 'status=' => 1 ));
			$result = DB::select_query('pages', array('page_slug=' => $page, 'status=' => 1 ));

			if($count > 0)
				$page_slug = $result[0]['page_slug'];
			else
				$page_slug = 404;
		}

		return $page_slug;
	}

	public static function page_template($page){
		$result1 = DB::select_query('pages', array('page_slug=' => $page, 'status=' => 1 ));
		$count1 = DB::count_query('pages', array('page_slug=' => $page, 'status=' => 1 ));
		
		$result2 = DB::select_query('private_jobs', array('job_slug=' => $page, 'status=' => 1 ));
		$count2 = DB::count_query('private_jobs', array('job_slug=' => $page, 'status=' => 1 ));

		if($count1 > 0 ) {
			$page_template = Pages::page_template_name($result1[0]['page_template_id']);
		} else {
			if($count2 > 0) {
				$page_template = Pages::page_template_name($result2[0]['page_template_id']);
			} else {
				$page_template = 'page';	
			}
		}
		return $page_template;
	}

	public static function page_template_name($id){
		$cond = array( 'id=' => $id );
		$query = DB::select_query('page_templates',$cond);
		foreach($query as $q){ }
		return $q['template_name'];
	}

	public static function page_name($slug,$page_template=''){
		if($page_template == 'private_job') {
			$conditions = array( 'job_slug=' => $slug );
			$query= DB::select_query('private_jobs',$conditions);
			foreach($query as $q){
				$page_name = $q['job_title'];
			}
		} else {
			if($slug!=404){
				$conditions = array( 'page_slug=' => $slug );
				$query= DB::select_query('pages',$conditions);
				foreach($query as $q){
					$page_name = $q['page_name'];
				}
			} else {
				$page_name = '404 - Page Not Found';
			}
		}
		return $page_name;
	}

	public static function page_content($slug,$page_template=''){
		if($slug!=404){
			$conditions = array( 'page_slug=' => $slug );
			$query= DB::select_query('pages',$conditions);
			foreach($query as $q){
				$page_content = $q['page_content'];
			}
		} else {
			$page_content = 'Page you are looking for does not exist or has been moved';
		}

		return $page_content;
	}

	public static function page_featured_image($slug,$width='',$height='',$class=''){
		if($slug!=404){
			$conditions = array( 'page_slug=' => $slug );
			$query= DB::select_query('pages',$conditions);
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if($page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="uploads/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			} else {
				$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
			}
		} else {
			$featured_image = '<img class="'.$class.'" src="uploads/general/404.png" width="'.$width.'" height="'.$height.'" />';
		}

		return $featured_image;
	}

	public static function page_last_updated($slug) {
		if($slug!=404){
			$condition = array('page_slug=' => $slug);
			$query = DB::select_query('pages',$condition);
			foreach($query as $q){
				$page_last_updated = $q['last_updated'];
			}
		} else {
			$page_last_updated = date("Y-m-d");
		}

		return $page_last_updated;
	}

	public static function page_id($slug) {
		if($slug!=404){
			$condition = array('page_slug=' => $slug);
			$query = DB::select_query('pages',$condition);
			foreach($query as $q){
				$row = $q['id'];
			}
		} else {
			$row = 1234567890123456789;
		}

		return $row;
	}

	public static function page_link($slug){
		$condition = array('page_slug=' => $slug);
		$query = DB::select_query('pages',$condition);
		foreach($query as $q){
			$row = $q['page_slug'];
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