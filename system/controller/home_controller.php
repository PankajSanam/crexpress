<?php if (!defined('CREXO')) exit('No Trespassing!');


class Home_Controller extends Crexo_Controller {

	public function front_index(){
		$this->data['styles'] = Html::styles( array( 
			'style'	=>	'all',
			'initcarousel' => 'all',
			)
		);
		$this->data['scripts'] = Html::scripts(array(
				'jquery1.7.2',
				//'jquery1.4.2.min',
				//'jquery-2.0.3.min',
				'amazingcarousel',
				'initcarousel',
				'bjqs-1.3.min',
			)
		);

		$this->data['meta_title'] = $this->model['retina']->meta_title($this->page);
		$this->data['meta_description'] = $this->model['retina']->meta_description($this->page);
		$this->data['meta_keywords'] = $this->model['retina']->meta_keywords($this->page);
		
		$this->data['page_title'] = $this->model[$this->page_template]->page_title($this->slug);
		$this->data['page_content'] = $this->model[$this->page_template]->page_content($this->slug);

		$this->data['colleges'] = $this->model[$this->page_template]->colleges();
		$this->data['sliders'] = $this->model[$this->page_template]->sliders();
		$this->data['galleries'] = $this->model[$this->page_template]->galleries();

		parent::load();
	}

}