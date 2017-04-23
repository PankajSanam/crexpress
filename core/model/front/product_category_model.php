<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Product_Category_Model extends Model
{
	public function products()
	{
		$db = new Db();
		$rows = $db->select('product');
		foreach($rows as $row)
		{
			$col[] = $row;
		}
		return $col;
	}

	public function edit_data($action_id)
	{
		$db = new Db();
		$rows = $db->select('product',array('product_id=' => $action_id));
		foreach($rows as $row)
		{
			$col[] = $row;
		}
		return $col;
	}
	
	public function page_title($slug)
	{
		$db = new Db();
		$rows = $db->select('product',array( 'slug=' => $slug ));

		foreach($rows as $row)
		{
			$data = $row['title'];
		}

		if(!empty($data)) return $data; else return '';
	}
	
	public function page_content($slug)
	{
		$db = new Db();
		$rows = $db->select('product',array( 'slug=' => $slug ));

		foreach($rows as $row)
		{
			$data = $row['content'];
		}

		if(!empty($data)) return $data; else return '';
	}
	
	public function categories()
	{
		$db = new Db();
		$rows = $db->select('*')
					->from($db->getT('product'))
					->where("parent_id=0 AND is_product = 0")
					->run('getRows');

		return $rows;
	}

	public function category_id($slug)
	{
		$db = new Db();
		$query = $db->select('product',array( 'slug=' => $slug ));
		return $query[0]['product_id'];
	}
}