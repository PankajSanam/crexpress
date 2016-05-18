<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Home_Model extends Model
{
	private $db;
	
	public function __construct()
	{
		$this->db = new Db();
	}

	public function page_title($slug) {
		$rows = $this->db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['title'];
		}

		return $data;
	}

	public function page_content($slug) {
		$rows = $this->db->select('pages',array( 'slug=' => $slug ));

		foreach($rows as $row){
			$data = $row['content'];
		}

		return $data;
	}

	public function galleries(){
		$rows = $this->db->select('gallery',array('status=' => 1));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function sliders(){
		$sliders = $this->db->select('sliders',array( 'status='=> 1 ));
		return $sliders;
	}

	public function colleges(){
		$from = (isset($_GET['from']) ? $_GET['from'] : 0);
		$to = (isset($_GET['to']) ? $_GET['to'] : 5);

		$rows = $this->db->select('colleges',array('status=' => 1),'id','asc',$from,$to);
		foreach($rows as $row){
			$col[] = $row;
		}
		if(!empty($col)) return $col; else return array();
	}
}