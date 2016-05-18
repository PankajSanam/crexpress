<?php
namespace Retina\Back;

class Index_Controller extends Base_Controller {

	public function __construct($page){
		parent::__construct($page);
		
		$this->model[$this->page] = $this->core['autoload']->back_model($this->page);
	}

	public function index(){

		$this->data['meta_title'] 	=	$this->model['base']->meta_title('Login - GIT BOX');
		$this->data['page_title'] 	=	ucfirst($this->page);
		$this->data['body_class']	=	'login';

		$this->core['autoload']->back_view($this->page, $this->data, $this->library, $this->model);
	}
}

?>