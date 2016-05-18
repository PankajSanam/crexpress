<?php
namespace Retina\Front;

class Contact_Controller extends Base_Controller {
	public $slug;
	public $page_template;
	public $page;

	public function __construct($page,$slug,$page_template){
		parent::__construct($page,$slug,$page_template);

		$this->model[$this->page_template] = \Autoload::front_model($this->page_template);
	}

	public function index(){

		$this->data['page_slug'] 		= 	$this->slug;

		$this->data['meta_title'] 		=	$this->library['html']->meta_title($this->page);
		$this->data['meta_description'] =	$this->library['html']->meta_description($this->page);
		$this->data['meta_keywords'] 	=	$this->library['html']->meta_keywords($this->page);

		$this->data['page_title'] 		= 	$this->model[$this->page_template]->page_title($this->slug);
		$this->data['page_content'] 	= 	$this->model[$this->page_template]->page_content($this->slug);
		$this->data['latest_page'] 		= 	$this->model[$this->page_template]->latest_page();

		\Autoload::front_view($this->page_template, $this->data, $this->library, $this->model);
	}
}

?>