<?php
class JobEnquiry {
	public static function category_name($id){
		$query = DB::select_query('job_enquiries',array( 'id=' => $id ));
		foreach($query as $q){ }
		return $q['name'];
	}

	public static function link($slug){
		$query = DB::select_query('job_enquiries',array('slug=' => $slug));
		foreach($query as $q){
			$row = $q['slug'];
		}
		$col = $row.'.html';
		return $col;
	}

	public static function description($slug){
		if($slug!=404){
			$query= DB::select_query('job_enquiries',array( 'slug=' => $slug ));
			foreach($query as $q){
				$page_content = $q['content'];
			}
			return $page_content;
		} else {
			return '';
		}
	}

	public static function title($slug){
		if($slug!=404){
			$query= DB::select_query('job_enquiries',array( 'slug=' => $slug ));
			foreach($query as $q){
				$page_name = $q['title'];
			}
		} else {
			$page_name = 'Private Jobs';
		}
		return $page_name;
	}
}
?>