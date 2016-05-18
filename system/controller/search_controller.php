<?php if (!defined('CREXO')) exit('No Trespassing!');

class Search_Controller extends Crexo_Controller {
	
	public function front_index(){
		$this->data['styles'] = $this->library['html']->styles( array( 
			'style'	=>	'all',
			'initcarousel' => 'all',
			)
		);
		$this->data['scripts'] = $this->library['html']->scripts(array(
				'jquery1.7.2',
				'amazingcarousel',
				'initcarousel',
				'bjqs-1.3.min',
			)
		);

		$this->data['meta_title'] = $this->model[$this->page_template]->meta_title('Search');
		$this->data['meta_description'] = $this->model[$this->page_template]->meta_description('Search');
		$this->data['meta_keywords'] = $this->model[$this->page_template]->meta_keywords('search');
		
		$this->data['page_title'] = $this->model[$this->page_template]->page_title($this->slug);
		$this->data['page_content'] = $this->model[$this->page_template]->page_content($this->slug);

		$this->data['colleges'] = $this->model[$this->page_template]->colleges();
		$this->data['sliders'] = $this->model[$this->page_template]->sliders();
		$this->data['galleries'] = $this->model[$this->page_template]->galleries();
		
		parent::load();
	}
}