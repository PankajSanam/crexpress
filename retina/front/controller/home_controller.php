<?php
namespace Retina\Front;

class Home_Controller extends _Controller {

	public function __construct($page,$slug,$page_template){
		parent::__construct($page,$slug,$page_template);
		
		$this->model[$this->page_template] = \Autoload::front_model($this->page_template);
	}

	public function header(){
		$this->data['styles'] = $this->library['html']->styles( array( 
			'style'	=>	'all',
			'initcarousel' => 'all',
			)
		);
		$this->data['scripts'] = $this->library['html']->scripts(array(
				//'jquery1.7.2',
				//'jquery1.4.2.min',
				'jquery-2.0.3.min',
				'amazingcarousel',
				'initcarousel',
				'bjqs-1.3.min',
			)
		);

		$this->data['meta_title'] = $this->library['html']->meta_title($this->page);
		$this->data['meta_description'] = $this->library['html']->meta_description($this->page);
		$this->data['meta_keywords'] = $this->library['html']->meta_keywords($this->page);
	}

	public function content(){
		$this->data['page_title'] = $this->model[$this->page_template]->page_title($this->slug);
		$this->data['page_content'] = $this->model[$this->page_template]->page_content($this->slug);

		$this->data['colleges'] = $this->model[$this->page_template]->colleges();
		$this->data['sliders'] = $this->model[$this->page_template]->sliders();
		$this->data['galleries'] = $this->model[$this->page_template]->galleries();
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