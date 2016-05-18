<?php
namespace Retina\Front;

class College_detail_Controller extends _Controller {
	public $slug;
	public $page_template;
	public $page;

	public function __construct($page,$slug,$page_template){
		parent::__construct($page,$slug,$page_template);
	}

	public function header(){
		$this->data['styles'] = $this->library['html']->styles( array( 
				'style'	=>	'all',
				'tab'	=>	'all',
			)
		);
		$this->data['scripts'] = $this->library['html']->scripts(array( 
				'jquery-1.6.min',
				'jquery-ui.min',
				'skinable_tabs.min',
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
		$this->data['featured_image']	=	$this->model[$this->page_template]->featured_image($this->page,$width='200',$height='200',$class='');

		$this->data['about_us'] = $this->model[$this->page_template]->about_us($this->slug);
		$this->data['courses'] = $this->model[$this->page_template]->courses($this->slug);
		$this->data['contact_us'] = $this->model[$this->page_template]->contact_us($this->slug);
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