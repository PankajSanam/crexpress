<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Team_Model extends Model
{
	public function page_title($slug)
	{
		$data = null;

		$slug = explode('.',$slug);
		$slug = $slug[0];

		$db = new Db();
		$rows = $db->select('*')
					->from($db->getT('pages'))
					->where("slug='$slug'")
					->run('getRows');

		if(!empty($rows))
		{
			foreach($rows as $row)
			{
				$data = $row['title'];
			}
		}
		else
		{
			$data = 'Not Found';
		}

		return $data;
	}

	public function page_content($slug)
	{
		$data = null;

		$slug = explode('.',$slug);
		$slug = $slug[0];

		$db = new Db();
		$rows = $db->select('*')
			->from($db->getT('pages'))
			->where("slug='$slug'")
			->run('getRows');

		if(!empty($rows))
		{
			foreach($rows as $row)
			{
				$data = $row['content'];
			}
		}
		else
		{
			$data = 'Page not found!';
		}

		return $data;
	}

	public function name($slug,$page_template='')
	{
		$page_name = null;
		if($slug!=404)
		{
			$db = new Db();
			$query = $db->select('*')
							->from($db->getT('pages'))
							->where("slug='$slug'")
							->run('getRows');

			foreach($query as $q)
			{
				$page_name = $q['title'];
			}
		}
		else
		{
			$page_name = '404 - Page Not Found';
		}

		return $page_name;
	}

	public function content($slug,$page_template='')
	{
		$page_content = null;
		if($slug!=404)
		{
			$db = new Db();
			$query = $db->select('*')
				->from($db->getT('pages'))
				->where("slug='$slug'")
				->run('getRows');

			foreach($query as $q)
			{
				$page_content = $q['content'];
			}
		}
		else
		{
			$page_content = 'The page you are looking for does not exist or has been moved';
		}

		return $page_content;
	}

	public function link($slug)
	{
		$row = null;

		$db = new Db();
		$query = $db->select('*')
			->from($db->getT('pages'))
			->where("slug='$slug'")
			->run('getRows');

		foreach($query as $q)
		{
			$row = $q['slug'];
		}
		$col = SITE_PATH.'/'.$row.'.html';

		return $col;
	}

	public function thumb($slug,$width='',$height='',$class='')
	{
		if($slug!=404)
		{
			$page_featured_image = '';
			$db = new Db();
			$query = $db->select('*')
				->from($db->getT('pages'))
				->where("slug='$slug'")
				->run('getRows');

			foreach($query as $q)
			{
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!='')
			{
				$featured_image = '<img class="'.$class.'" src="'.DATA_VIEW.'/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			}
			else
			{
				$featured_image = '<img class="'.$class.'" src="'.DATA_VIEW.'/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
			}
		}
		else
		{
			$featured_image = '<img class="'.$class.'" src="'.DATA_VIEW.'/general/404.png" width="'.$width.'" height="'.$height.'" />';
		}

		return $featured_image;
	}

	public function id($slug)
	{
		if($slug!=404)
		{
			$row = null;
			$db = new Db();
			$query = $db->select('*')
				->from($db->getT('pages'))
				->where("slug='$slug'")
				->run('getRows');

			foreach($query as $q)
			{
				$row = $q['id'];
			}
		}
		else
		{
			$row = 1234567890123456789;
		}

		return $row;
	}

	public function featured_image($slug,$width='',$height='',$class='')
	{
		if($slug!=404)
		{
			$page_featured_image = '';
			$db = new Db();
			$query = $db->select('*')
				->from($db->getT('pages'))
				->where("slug='$slug'")
				->run('getRows');

			foreach($query as $q)
			{
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!='')
			{
				$featured_image = '<img class="'.$class.'" src="'.DATA_VIEW.'/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			}
			else
			{
				$featured_image = '';
			}
		}
		else
		{
			$featured_image = '<img class="'.$class.'" src="'.DATA_VIEW.'/general/404.png" width="'.$width.'" height="'.$height.'" />';
		}

		return $featured_image;
	}
}