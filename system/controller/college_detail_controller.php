<?php if (!defined('CREXO')) exit('No Trespassing!');

class College_detail_Controller extends Crexo_Controller {

	public function front_index(){
		$this->data['styles'] = Html::styles( array( 
			'style'	=>	'all',
			'tab'	=>	'all',
		));
		$this->data['scripts'] = Html::scripts(array( 
			'jquery-1.6.min',
			'jquery-ui.min',
			'skinable_tabs.min',
		));

		$this->data['meta_title']			=	$this->model['retina']->meta_title($this->page);
		$this->data['meta_description']		= 	$this->model['retina']->meta_description($this->page);
		$this->data['meta_keywords']		= 	$this->model['retina']->meta_keywords($this->page);
		
		$this->data['page_title']		=	$this->model[$this->page_template]->page_title($this->slug);
		$this->data['page_content']		=	$this->model[$this->page_template]->page_content($this->slug);
		$this->data['colleges']			=	$this->model[$this->page_template]->colleges();
		$this->data['featured_image']	=	$this->model[$this->page_template]->featured_image($this->page,$width='200',$height='200',$class='');

		$this->data['about_us']		=	$this->model[$this->page_template]->about_us($this->slug);
		$this->data['courses']		=	$this->model[$this->page_template]->courses($this->slug);
		$this->data['contact_us']	=	$this->model[$this->page_template]->contact_us($this->slug);
		
		parent::load();
	}
}