<?php
class Page {
	public static function slug($page,$page_template){
		if($page_template=='private_job') {
			$count = Db::count('private_jobs', array('slug=' => $page, 'status=' => 1 ));
			$result = Db::select('private_jobs', array('slug=' => $page, 'status=' => 1 ));
		} else {
			$count = Db::count('pages', array('slug=' => $page, 'status=' => 1 ));
			$result = Db::select('pages', array('slug=' => $page, 'status=' => 1 ));
		}
		if($count > 0)
			return $result[0]['slug'];
		else
			return 404;
	}

	public static function template($page){
		$meta_tables = Db::check_meta();
		$count_tables = count($meta_tables);
		$cond = array(
			'slug=' => $page,
			'status=' => 1
		);
		
		for($i = 0 ; $i <= $count_tables-1; $i++){
			$result =  Db::select($meta_tables[$i], $cond);
			$count = Db::count($meta_tables[$i], $cond);

			if($count > 0){
				$page_template = Page::template_name($result[0]['page_template_id']);
				break;
			} else {
				$page_template = 'page';
			}
		}

		return $page_template;
	}

	public static function template_name($id){
		$cond = array( 'id=' => $id );
		$query = Db::select('page_templates',$cond);
		foreach($query as $q){ }
		return $q['template_name'];
	}

	public static function name($slug,$page_template=''){
		if($page_template == 'private_job') {
			$conditions = array( 'slug=' => $slug );
			$query= Db::select('private_jobs',$conditions);
			foreach($query as $q){
				$page_name = $q['title'];
			}
		} else {
			if($slug!=404){
				$conditions = array( 'slug=' => $slug );
				$query= Db::select('pages',$conditions);
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
			$query= Db::select('pages',$conditions);
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
			$query= Db::select('pages',$conditions);
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

	public static function thumb($slug,$width='',$height='',$class=''){
		if($slug!=404){
			$page_featured_image = '';
			$conditions = array( 'slug=' => $slug );
			$query= Db::select('pages',$conditions);
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

	public static function last_updated($slug) {
		if($slug!=404){
			$condition = array('slug=' => $slug);
			$query = Db::select('pages',$condition);
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
			$query = Db::select('pages',$condition);
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
		$query = Db::select('pages',$condition);
		foreach($query as $q){
			$row = $q['slug'];
		}
		$col = SITE_ROOT.'/'.$row.'.html';
		return $col;
	}

	public static function latest_page(){
		$query = Db::select('pages','','last_updated','DESC',0,1);
		foreach($query as $q){
			$col[] = $q;
		}
		return $col;
	}

} //End of pages class
?>