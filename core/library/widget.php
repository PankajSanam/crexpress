<?php if (!defined('CREXO')) exit('No Trespassing!');

class Widget 
{
	public static function back($template,$data,$library,$model)
	{
		Widget::back_header($library,$model,$data);
		Widget::back_template($template,$data,$library,$model);
		Widget::back_footer($data,$library,$model);

		require_once WIDGET_PATH . 'footer_back_widget.php';
	}

	public static function back_template($template,$data,$library,$model)
	{
		extract($library);
		extract($model);
		extract($data);

		$widget = $template.'_back_template.php';

		include_once TEMPLATE_PATH . $widget;
	}

	public static function back_header($library,$model,$data)
	{
		extract($library);
		extract($model);
		extract($data);

		include_once WIDGET_PATH . 'header_back_widget.php';
	}

	public static function back_footer($data,$library,$model)
	{
		extract($library);
		extract($model);
		extract($data);

		include_once WIDGET_PATH . 'footer_back_widget.php';
	}

	/*public static function front_left()
	{
		@ob_start();

		include_once WIDGET_PATH . 'left_front_widget.php';
		
		$content = ob_get_contents();

		@ob_end_clean();
		
		return $content;
	}

	public static function front_right()
	{
		@ob_start();

		include_once WIDGET_PATH . 'right_front_widget.php';
		
		$content = ob_get_contents();

		@ob_end_clean();
		
		return $content;
	}*/

} // End of Widget class