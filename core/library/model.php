<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Model
{
	public function __construct()
	{

	}

	public function product_navigation()
	{
		$db = new Db();

		$items = $db->select('product_id, parent_id, is_product, slug, title, sort_order, status')
					->from($db->getT('product'))
					->where("is_product = 0 AND status=1")
					->order('parent_id, sort_order, title')
					->run('getRows');

		// Create a multidimensional array to contain a list of items and parents
		$menu = array(
			'items' => array(),
			'parents' => array()
		);
		// Builds the array lists with data from the menu table
		foreach($items as $item)
		{
			// Creates entry into items array with current menu item id ie. $menu['items'][1]
			$menu['items'][$item['product_id']] = $item;
			// Creates entry into parents array. Parents array contains a list of all items with children
			$menu['parents'][$item['parent_id']][] = $item['product_id'];
		}

		return $menu;
	}

	public function pages_navigation()
	{
		$db = new Db();

		$items = $db->select('status, menu_position, page_category_id, slug, menu_name as title, menu_sort_order, id')
			->from($db->getT('pages'))
			->where("menu_position LIKE '%top%' AND status=1 AND page_category_id=0 AND menu_name<> '' AND menu_sort_order<>0")
			->order('page_category_id, menu_sort_order, menu_name')
			->run('getRows');

		// Create a multidimensional array to contain a list of items and parents
		$menu = array(
			'items' => array(),
			'parents' => array()
		);
		// Builds the array lists with data from the menu table
		foreach($items as $item)
		{
			// Creates entry into items array with current menu item id ie. $menu['items'][1]
			$menu['items'][$item['id']] = $item;
			// Creates entry into parents array. Parents array contains a list of all items with children
			$menu['parents'][$item['page_category_id']][] = $item['id'];
		}

		return $menu;
	}
}