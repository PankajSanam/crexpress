<?php
namespace Retina\Front;

class Search_Controller extends Base_Controller {
	public function __construct($page,$slug,$page_template){
		parent::__construct($page,$slug,$page_template);

		$this->model[$this->page_template] = \Autoload::front_model($this->page_template);
	}

	public function index(){

		$this->data['page_slug'] 		= 	$this->slug;

		$this->data['meta_title'] 		=	$this->model[$this->page_template]->meta_title('Search Career Ask');
		$this->data['meta_description'] = 	$this->model[$this->page_template]->meta_description('Search on Career Ask');
		$this->data['meta_keywords'] 	= 	$this->model[$this->page_template]->meta_keywords('search,career');

		$this->data['latest_page'] 		= 	$this->model[$this->page_template]->latest_page();
		\Autoload::front_view($this->page_template, $this->data, $this->library, $this->model);
	}
}

?>