<?php if (!defined('CREXO')) exit('No Trespassing!');

class Navigation
{
	public function buildMenu($parent, $menu,$ul_attr)
	{
		$html = "";
		if (isset($menu['parents'][$parent]))
		{
			$html .= "<ul $ul_attr>\n";
			foreach ($menu['parents'][$parent] as $itemId)
			{
				if(!isset($menu['parents'][$itemId]))
				{
					$html .= "<li>\n  <a href='".page_url($menu['items'][$itemId]['slug'])."'>".$menu['items'][$itemId]['title']."</a>\n</li> \n";
				}
				if(isset($menu['parents'][$itemId]))
				{
					$html .= "<li>\n  <a href='".page_url($menu['items'][$itemId]['slug'])."'>".$menu['items'][$itemId]['title']."</a> \n";
					$html .= $this->buildMenu($itemId, $menu,$ul_attr);
					$html .= "</li> \n";
				}
			}
			$html .= "</ul> \n";
		}
		return $html;
	}

	public function pageMenu($parent, $menu,$ul_attr)
	{
		$html = "";
		if (isset($menu['parents'][$parent]))
		{
			//$html .= "<ul $ul_attr>\n";
			foreach ($menu['parents'][$parent] as $itemId)
			{
				if(!isset($menu['parents'][$itemId]))
				{
					$html .= "<li class=".$this->current_menu($menu['items'][$itemId]['slug'],get_slug()).">\n  <a href='".page_url($menu['items'][$itemId]['slug'])."'>".$menu['items'][$itemId]['title']."</a>\n</li> \n";
				}
				if(isset($menu['parents'][$itemId]))
				{
					$html .= "<li>\n  <a href='".page_url($menu['items'][$itemId]['slug'])."'>".$menu['items'][$itemId]['title']."</a> \n";
					$html .= $this->pageMenu($itemId, $menu,$ul_attr);
					$html .= "</li> \n";
				}
			}
			//$html .= "</ul> \n";
		}
		return $html;
	}

	public function current_menu($page_slug,$compare='')
	{
		if(empty($compare))
		{
			if($page_slug == 'index.html' OR $page_slug=='')
				return 'current';
			else
				return '';
		}
		else
		{
			if($page_slug == $compare)
				return 'current';
			else
				return '';
		}
	}

	public function admin_current_menu($back,$slug){
		if($back == $slug)
			return 'active';
		else
			return '';
	}

	public function top_menus(){
		$Db = new Db;
		$cond = array(
			'status=' => 1,
			'menu_position LIKE' => '%top%',
			'page_category_id=' => 0,
			'menu_name<>' => '',
			'menu_sort_order<>' => 0,
		);
		$query = $Db->select('pages',$cond,'menu_sort_order','asc');
		return $query;
	}

	public function top_submenus($id){
		$Db = new Db;
		$cond = array(
			'page_category_id=' => $id,
			'status=' => 1,
			'menu_name<>' => '',
			'menu_position=' => 'top',
		);
		$query = $Db->select('pages',$cond);
		return $query;
	}

	public function submenus($id){
		$Db = new Db;
		$cond = array(
			'menu_name<>' => '',
			'status=' => 1,
			'page_category_id=' => $id,
		);
		$query = $Db->select('pages', $cond);
		return $query;
	}

	public function sub_submenus($id){
		$Db = new Db;
		$cond = array(
			'page_category_id=' => $id,
			'status=' => 1,
			'menu_name<>' =>'',
		);
		$query = $Db->select('pages',$cond);
		return $query;
	}

	public function bottom_menus(){
		$Db = new Db;
		$cond = array(
			'status=' => 1,
			'menu_position LIKE' => '%bottom%',
			'page_category_id=' => 0,
			'menu_name<>' => '',
		);
		$query = $Db->select('pages',$cond);
		return $query;
	}

	public function left_menus(){
		$Db = new Db;
		$cond = array(
			'status=' => 1,
			'menu_position LIKE' => '%left%',
			'page_category_id=' => 0,
			'menu_name<>' => '',
		);
		$query = $Db->select('pages',$cond);
		return $query;
	}
}