<?php
namespace Retina\Back;

class Gallery_Controller extends Base_Controller {

	public function __construct($page){
		parent::__construct($page);
		
		$this->model[$this->page] = $this->core['autoload']->back_model($this->page);
		$this->library['validation']->admin_auth();
		$this->library['upload'] = new \Upload;
	}

	public function index(){

		$this->data['body_class']	=	'';
		$this->data['model'] 		=	\Autoload::back_model('gallery');
		$this->data['meta_title'] 	=	$this->model['base']->meta_title('Gallery - GIT BOX');
		$this->data['galleries']	=	$this->model[$this->page]->galleries();
		$this->data['categories']	=	$this->model[$this->page]->categories();
		$this->data['navigation']	=	top_navigation($this->library['encrypt'],$this->library['navigation']);
		$this->data['sub_header']	=	sub_header(ucfirst($this->page));
		$this->data['left_sidebar']	=	left_sidebar();

		if(isset($_GET['action']) AND isset($_GET['id'])){
			$this->data['edit_data'] = $this->model[$this->page]->edit_data($_GET['id']);
		} else {
			$this->data['edit_data'] = $this->model[$this->page]->edit_data(1);
		}

		$this->core['autoload']->back_view($this->page, $this->data, $this->library, $this->model);
	}
}

?>