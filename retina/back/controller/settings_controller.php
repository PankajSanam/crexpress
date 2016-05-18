<?php
namespace Retina\Back;

class Settings_Controller extends _Controller {
	public function __construct($page){
		parent::__construct($page);

		$this->model[$this->page] = $this->core['autoload']->back_model($this->page);
		$this->library['validation']->admin_auth();
		$this->library['upload'] = new \Upload;
		$this->library['image'] = new \Image;
	}

	public function index(){

		$this->data['meta_title'] 	=	$this->model['base']->meta_title('Settings - GIT BOX');

		$this->data['navigation']	=	top_navigation($this->library['encrypt'],$this->library['navigation']);
		$this->data['sub_header']	=	sub_header(ucfirst($this->page));
		$this->data['left_sidebar']	=	left_sidebar();

		$this->data['email']				=	$this->model[$this->page]->email();
		$this->data['landline']				=	$this->model[$this->page]->landline();
		$this->data['mobile']				=	$this->model[$this->page]->mobile();
		$this->data['address']				=	$this->model[$this->page]->address();
		$this->data['google_analytics']		=	$this->model[$this->page]->google_analytics();
		$this->data['google_webmaster']		=	$this->model[$this->page]->google_webmaster();
		$this->data['favicon']				=	$this->model[$this->page]->favicon();
		$this->data['logo']					=	$this->model[$this->page]->logo();
		$this->data['about']				=	$this->model[$this->page]->about();

		$this->core['autoload']->back_view($this->page, $this->data, $this->library, $this->model);
	}
}

?>