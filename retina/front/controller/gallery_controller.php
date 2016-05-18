<?php
namespace Retina\Front;

class Gallery_Controller extends _Controller {
	public function __construct($page,$slug,$page_template){
		parent::__construct($page,$slug,$page_template);
	}

	public function header(){
		$this->data['styles'] = $this->library['html']->styles( array( 'style'	=>	'all' ) );
		$this->data['scripts'] = $this->library['html']->scripts(array( ) );

		$this->data['meta_title'] = $this->library['html']->meta_title($this->page);
		$this->data['meta_description'] = $this->library['html']->meta_description($this->page);
		$this->data['meta_keywords'] = $this->library['html']->meta_keywords($this->page);
	}

	public function content(){
		$this->data['page_title'] = $this->model[$this->page_template]->page_title($this->slug);
		$this->data['page_content'] = $this->model[$this->page_template]->page_content($this->slug);
		$this->data['page_alt']	= $this->model[$this->page_template]->page_alt($this->slug);

		$this->data['html_portfolio'] 		= 	$this->model[$this->page_template]->portfolio(2);
		$this->data['php_portfolio'] 		= 	$this->model[$this->page_template]->portfolio(5);
		$this->data['opencart_portfolio']	= 	$this->model[$this->page_template]->portfolio(3);
		$this->data['wordpress_portfolio'] 	= 	$this->model[$this->page_template]->portfolio(4);
	}

	public function footer(){
		//
	}

	public function index(){
		self::header();
		self::content();
		self::footer();
		parent::load();
	}
}