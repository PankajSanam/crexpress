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

		$items = $db->select('m.*,p.slug')
			->from($db->getT('page_menu'),'m')
			->join($db->getT('page'),'p','m.page_id=p.page_id')
			->where("m.position LIKE '%0%' AND m.status=1 AND m.parent_id=0 AND m.title<> ''")
			->order('m.sort_order, m.title')
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
			$menu['items'][$item['page_menu_id']] = $item;
			// Creates entry into parents array. Parents array contains a list of all items with children
			$menu['parents'][$item['parent_id']][] = $item['page_menu_id'];
		}

		return $menu;
	}
}