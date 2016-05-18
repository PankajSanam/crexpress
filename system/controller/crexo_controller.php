<?php if (!defined('CREXO')) exit('No Trespassing!');

abstract class Crexo_Controller {

	protected $slug;
	protected $page_template;
	protected $page;

	protected $data 	= 	array();
	protected $model	= 	array();
	protected $library 	= 	array();
	
	protected $core 	=	array();

	public function __construct($page,$slug='',$page_template=''){
		$this->slug = $slug;
		$this->page = $page;
		$this->page_template = $page_template;

		$this->model();
		$this->library();
		$this->data();
	}

	public function model(){
		$this->model = array(
			$this->page_template	=>	Route::front_model($this->page_template),
			'retina'				=>	new Crexo_Model,
			'page'					=>	new Page_Model,
		);
	}

	public function library(){
		$this->library['sanitize']		= 	new Sanitize();
		$this->library['navigation'] 	= 	new Navigation();
		$this->library['validation'] 	= 	new Validation();
		$this->library['sms'] 			= 	new Sms();
		$this->library['mail']			=	new Mail();
		$this->library['social']		=	new Social();
		$this->library['html'] 			=	new Html();
		$this->library['encrypt'] 		= 	new Encrypt();
	}

	public function data(){
		/* Important initializations */
		$this->data['page_id']	=	$this->model['retina']->page_id($this->slug);
		$this->data['home_url']	=	SITE_PATH;
		$this->data['slug']		=	$this->slug;

		/* Sidebars */
		$this->data['left_widget']	=	Widget::front_left($this->library['navigation'], $this->data['page_id']);
		$this->data['right_widget']	=	Widget::front_right($this->data['page_id']);

		$this->data['logo']			=	Html::img('logo.png');
		$this->data['fb_like_box']	=	$this->library['social']->fb_like_Box();
		$this->data['email']		=	$this->model['retina']->email();
		$this->data['landline']		=	$this->model['retina']->landline();
		$this->data['mobile']		=	$this->model['retina']->mobile();
		$this->data['address']		=	$this->model['retina']->address();
		$this->data['about']		=	$this->model['retina']->about();
	}

	public function load($face=''){
		if($face == 'back') {
			Widget::back($this->page_template, $this->data, $this->library, $this->model);
		} else {
			Widget::front($this->page_template, $this->data, $this->library, $this->model);
		}
		
	}
}