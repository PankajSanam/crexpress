<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Contact_Model extends Model
{
	public function __construct()
	{

	}

	public function page_title($slug)
	{
		$db = new Db();
		$rows = $db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row)
		{
			$data = $row['title'];
		}
		return $data;
	}

	public function page_content($slug)
	{
		$db = new Db();
		$rows = $db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row)
		{
			$data = $row['content'];
		}

		return $data;
	}
}