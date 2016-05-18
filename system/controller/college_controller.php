<?php if (!defined('CREXO')) exit('No Trespassing!');

class College_Controller extends Crexo_Controller {

	public function front_index(){
		$this->data['styles']			= 	Html::styles( array( 'style'	=>	'all' ) );
		$this->data['scripts']			= 	Html::scripts(array( ) );
		
		$this->data['meta_title']		= 	$this->model['retina']->meta_title($this->page);
		$this->data['meta_description'] = 	$this->model['retina']->meta_description($this->page);
		$this->data['meta_keywords'] 	= 	$this->model['retina']->meta_keywords($this->page);
		
		$this->data['page_title']		= 	$this->model[$this->page_template]->page_title($this->slug);
		$this->data['page_content'] 	= 	$this->model[$this->page_template]->page_content($this->slug);
		$this->data['colleges']			= 	$this->model[$this->page_template]->colleges($this->data['page_id']);

		parent::load();
	}
	
}