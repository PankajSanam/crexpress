<?php
namespace Retina\Back;

class Error_Controller extends _Controller {
	public $page;

	public function __construct($page){
		parent::__construct($page);

		$this->model['error'] = \Autoload::back_model('error');
		$this->library['validation']->admin_auth();
	}

	public function index(){

		$this->data['meta_title']	=	$this->model['base']->meta_title('404 Not Found - GIT BOX');
		$this->data['body_class']	=	'';
		$this->data['navigation']	=	top_navigation($this->library['encrypt'],$this->library['navigation']);
		$this->data['sub_header']	=	sub_header(ucfirst($this->page));
		$this->data['left_sidebar']	=	left_sidebar();

		$this->core['autoload']->back_view('404', $this->data, $this->library, $this->model);
	}
}

?>