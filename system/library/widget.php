<?php if (!defined('CREXO')) exit('No Trespassing!');

class Widget {

	public static function front($template,$data,$library,$model){

		Widget::front_header($library,$model,$data);
		Widget::front_template($template,$data,$library,$model);
		Widget::front_footer($data,$library,$model);

		require_once FRONT_WIDGET_PATH . 'footer_widget.php';
	}

	public static function back($template,$data,$library,$model){

		Widget::back_header($library,$model,$data);
		Widget::back_template($template,$data,$library,$model);
		Widget::back_footer($data,$library,$model);

		require_once BACK_WIDGET_PATH . 'footer_widget.php';
	}

	public static function front_template($template,$data,$library,$model){
		extract($library);
		extract($model);
		extract($data);

		$widget = $template.'_template.php';

		include_once FRONT_TEMPLATE . $widget;

	}

	public static function back_template($template,$data,$library,$model){
		extract($library);
		extract($model);
		extract($data);

		$widget = $template.'_template.php';

		include_once BACK_TEMPLATE . $widget;

	}

	public static function front_header($library,$model,$data){
		extract($library);
		extract($model);
		extract($data);

		$widget = 'header_widget.php';

		include_once FRONT_WIDGET_PATH . $widget;

	}
	
	public static function back_header($library,$model,$data){
		extract($library);
		extract($model);
		extract($data);

		$widget = 'header_widget.php';

		include_once BACK_WIDGET_PATH . $widget;

	}

	public static function front_footer($data,$library,$model){
		extract($library);
		extract($model);
		extract($data);

		$widget = 'footer_widget.php';

		include_once FRONT_WIDGET_PATH . $widget;

	}
	
	public static function back_footer($data,$library,$model){
		extract($library);
		extract($model);
		extract($data);

		$widget = 'footer_widget.php';

		include_once BACK_WIDGET_PATH . $widget;

	}

	public static function front_left($navigation,$page_id){

		$widget = 'left_widget.php';
		
		@ob_start();

		include_once FRONT_WIDGET_PATH . $widget;
		
		$content = ob_get_contents();

		@ob_end_clean();
		
		return $content;

	}

	public static function front_right($page_id){

		$widget = 'right_widget.php';
		
		@ob_start();

		include_once FRONT_WIDGET_PATH . $widget;
		
		$content = ob_get_contents();

		@ob_end_clean();
		
		return $content;

	}
	
	public static function top_navigation($navigation,$page_id){

		global $_back;

//		extract($library);
//		extract($model);
//		extract($data);
//
//		$widget = 'header_widget.php';
//
//		include_once BACK_WIDGET_PATH . $widget;
		
		$widget = 'top_navigation_widget.php';
		
		@ob_start();

		include_once BACK_WIDGET_PATH . $widget;
		
		$content = ob_get_contents();

		@ob_end_clean();
		
		return $content;

	}

} // End of Widget class