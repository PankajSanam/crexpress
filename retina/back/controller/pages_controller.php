<?php
namespace Retina\Back;

class Pages_Controller extends Base_Controller {
	public function __construct($page){
		parent::__construct($page);

		$this->model[$this->page] = $this->core['autoload']->back_model($this->page);
		$this->library['validation']->admin_auth();
	}

	public function index(){

		$this->data['meta_title'] 	=	$this->model['base']->meta_title('Pages - GIT BOX');
		$this->data['pages']		=	$this->model[$this->page]->pages();
		$this->data['page_templates'] = $this->model[$this->page]->page_templates();

		$this->data['navigation']	=	top_navigation($this->library['encrypt'],$this->library['navigation']);
		$this->data['sub_header']	=	sub_header(ucfirst($this->page));
		$this->data['left_sidebar']	=	left_sidebar();



		if(isset($_GET['action']) AND isset($_GET['id'])){
			$this->data['edit_page']	= 	$this->model[$this->page]->edit_page($_GET['id']);
		} else {
			$this->data['edit_page'] 	=	$this->model[$this->page]->edit_page(1);
		}

		$this->core['autoload']->back_view($this->page, $this->data, $this->library, $this->model);
	}
}

?>