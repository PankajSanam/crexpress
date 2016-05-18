<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Meta
{
	public function __construct()
	{

	}

	public function title($table,$page,$useTable=true)
	{
		if($useTable)
		{
			$page = explode('.',$page);
			$page = $page[0];

			if(strrchr($page, '?'))
			{
				$page = explode('?', $page);
				$page = $page[0];
			}

			$db = new Db();
			$result = $db->select('*')
						->from($db->getT($table))
						->where("slug='$page' AND status = 1")
						->run('getRows');

			$meta_title = (count($result) > 0 ? $result[0]['meta_title'] : '404 - Not Found');
		}
		else
		{
			$meta_title = $page;
		}

		$meta_title = '<title>' . $meta_title . '</title>' . "\n";

		return $meta_title;
	}

	public function description($table, $page, $useTable=true)
	{
		$db = new Db();

		if($useTable)
		{
			$page = explode('.',$page);
			$page = $page[0];

			if(strrchr($page, '?'))
			{
				$page = explode('?', $page);
				$page = $page[0];
			}

			$result = $db->select('*')
				->from($db->getT($table))
				->where("slug='$page' AND status = 1")
				->run('getRows');

			$meta_description = (count($result) > 0 ? $result[0]['meta_description'] : 'Content Not found');
		}
		else
		{
			$meta_description = $page;
		}

		$meta_description = '<meta name="description" content="' . $meta_description . '" />' . "\n";

		return $meta_description;
	}

	public function keywords($table, $page, $useTable=true)
	{
		$db = new Db();

		if($useTable)
		{
			$page = explode('.',$page);
			$page = $page[0];

			if(strrchr($page, '?'))
			{
				$page = explode('?', $page);
				$page = $page[0];
			}

			$result = $db->select('*')
				->from($db->getT($table))
				->where("slug='$page' AND status = 1")
				->run('getRows');

			$meta_keywords = (count($result) > 0 ? $result[0]['meta_keywords'] : 'not found, 404 error');
		}
		else
		{
			$meta_keywords = $page;
		}

		$meta_keywords = '<meta name="keywords" content="' . $meta_keywords . '" />' . "\n";

		return $meta_keywords;
	}

	public function google_webmaster()
	{
		$db = new Db();
		$rows = $db->select('*')
					->from($db->getT('settings'))
					->where("name= = 'google_webmaster'")
					->run('getRows');

		return '<meta name="google-site-verification" content="'.$rows[0]['value'].'" />';
	}
}