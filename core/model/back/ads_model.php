<?php if (!defined('CREXO')) exit('No Trespassing!');

class Ads_Model extends Crexo_Model
{
	public function records()
	{
		$db = new Db;
		$rows = $db->select('ads');
		foreach($rows as $row)
		{
			$col[] = $row;
		}

		if(!empty($col)) return $col; else return;
	}

	public function deleteRecord()
	{
		$db = new Db;
		$encrypt = new Encrypt;

		$id = $encrypt->unlock( get('delete') );
		$db->delete('ads',array( 'id=' => $id ));

		$url = back_url( 'ads/' );
        redirect($url);
	}
	
	public function getRecord($id)
	{
		$db = new Db;
		$rows = $db->select('ads',array('id=' => $id));

		foreach($rows as $row)
		{
			$col[] = $row;
		}

		if(!empty($col)) return $col; else return;
	}

	public function activePages()
	{
		$db = new Db;
		$rows = $db->select('pages', array('status=' => 1));

		foreach($rows as $row)
		{
			$col[] = $row;
		}

		if(!empty($col)) return $col; else return;
	}

	public function removeImage()
	{
		$db = new Db;
		$db->update('ads',array( 'image' => '' ), array( 'id=' => get('edit') ));
	}

	public function addRecord()
	{
		$image = $upload->image($_FILES['image'], DATA_PATH.'/banners/');
		//$old_image_path = DATA_PATH.'/gallery/' . $image;
		//$new_image_path = DATA_PATH.'/gallery/thumbnail/' . $image;
		//$image->resize('max',$old_image_path,$new_image_path,140,140);
		if(!$image) $image = '';

		$db = new Db;
		$db->insert('ads', array(
			'date'		=>	today(),
			'pages'		=>	implode(',',$_POST['pages']),
			'position'	=>	$_POST['position'],
			'duration'	=>	$_POST['duration'],
			'title'		=>	$_POST['title'],
			'image'		=>	$image,
			'link'		=>	$_POST['link'],
			'status'	=>	$_POST['status']
		));
	}

	public function updateRecord()
	{
		if(!empty($_FILES['image']['name']))
		{
			$image = $upload->image($_FILES['image'], DATA_PATH.'/banners/');
			//$old_image_path = DATA_PATH.'/gallery/' . $gallery_image;
			//$new_image_path = DATA_PATH.'/gallery/thumbnail/' . $gallery_image;
			//$image->resize('max',$old_image_path,$new_image_path,140,140);
			$values['image'] = $image;
		}
		$values = array(
			'date'		=>	time(),
			'pages'		=>	implode(',',$_POST['pages']),
			'position'	=>	$_POST['position'],
			'duration'	=>	$_POST['duration'],
			'title'		=>	$_POST['title'],
			'link'		=>	$_POST['link'],
			'status'	=>	$_POST['status']
		);
		$db = new Db;
		$db->update('ads', $values,	array('id=' => get('edit') ));
	}
}