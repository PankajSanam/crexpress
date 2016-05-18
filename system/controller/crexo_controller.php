<?php if (!defined('CREXO')) exit('No Trespassing!');

abstract class Crexo_Controller 
{

	protected $slug;
	protected $page_template;

	protected $data 	= 	array();
	protected $model	= 	array();
	protected $library 	= 	array();
	
	protected $core 	=	array();

	public function __construct($slug,$page_template='')
	{
		if($page_template == '')
		{
			$this->page_template = $slug;
		}
		else
		{
			$this->page_template = $page_template;
		}

		$this->slug = $slug;

		$this->model();
		$this->library();
		$this->data();
	}

	public function model()
	{
		$this->model = array(
			$this->page_template	=>	Route::front_model($this->page_template),
			'crexo'					=>	new Crexo_Model,
			'page'					=>	new Page_Model,
		);
	}

	public function library()
	{
		$this->library['sanitize']		= 	new Sanitize();
		$this->library['navigation'] 	= 	new Navigation();
		$this->library['validation'] 	= 	new Validation();
		$this->library['sms'] 			= 	new Sms();
		$this->library['mail']			=	new Mail();
		$this->library['social']		=	new Social();
		$this->library['html'] 			=	new Html();
		$this->library['encrypt'] 		= 	new Encrypt();
	}

	public function data()
	{
		$this->data['home_url']	=	SITE_PATH;
		$this->data['slug']		=	$this->slug;

		/* Sidebars */
		$this->data['left_widget']	=	Widget::front_left();
		$this->data['right_widget']	=	Widget::front_right();
		
		$this->data['latest_news'] = $this->model['crexo']->latest_news(90);
	}

	public function load($face='')
	{
		if($face == 'back') {
			Widget::back($this->page_template, $this->data, $this->library, $this->model);
		} else {
			Widget::front($this->page_template, $this->data, $this->library, $this->model);
		}
		
	}
}