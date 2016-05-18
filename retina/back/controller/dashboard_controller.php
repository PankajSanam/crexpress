<?php
namespace Retina\Back;

class Dashboard_Controller extends _Controller {

	public function __construct($page){
		parent::__construct($page);
		
		$this->model[$this->page] = $this->core['autoload']->back_model($this->page);
		$this->library['validation']->admin_auth();
	}

	public function index(){

		$this->data['meta_title'] 	=	$this->model['base']->meta_title('Dashboard - GIT BOX');
		$this->data['body_class']	=	'';
		$this->data['navigation']	=	top_navigation($this->library['encrypt'],$this->library['navigation']);
		$this->data['sub_header']	=	sub_header(ucfirst($this->page));
		$this->data['left_sidebar']	=	left_sidebar();
		
		$this->core['autoload']->back_view($this->page, $this->data, $this->library, $this->model);
	}
}

?>