<?php
namespace Retina\Front;

abstract class _Controller {

	protected $slug;
	protected $page_template;
	protected $page;
	
	protected $data 	= 	array();
	protected $model	= 	array();
	protected $library 	= 	array();

	public function __construct($page,$slug,$page_template){
		$this->slug = $slug;
		$this->page = $page;
		$this->page_template = $page_template;

		self::core();
		self::model();
		self::library();
		self::data();
	}

	public function core(){
		$this->core['autoload'] = new \Autoload;
	}

	public function model(){
		$this->model[$this->page_template] = $this->core['autoload']->front_model($this->page_template);
		$this->model['base'] = new _Model;
		$this->model['page'] = new Page_Model;
	}

	public function library(){
		$this->library['html'] 			= 	new \Html;
		$this->library['sanitize']		= 	new \Sanitize;
		$this->library['navigation'] 	= 	new \Navigation;
		$this->library['validation'] 	= 	new \Validation;
		$this->library['sms'] 			= 	new \Sms;
		$this->library['mail']			=	new \Mail;
		$this->library['social']		=	new \Social;
	}

	public function data(){
		/* Important initializations */
		$this->data['page_id']	=	$this->model['base']->page_id($this->slug);
		$this->data['home_url']	=	SITE_ROOT;
		$this->data['slug']		=	$this->slug;

		/* Header tags*/
		$this->data['doc_type'] 		= 	$this->library['html']->doc_type();
		$this->data['lang'] 			=  	$this->library['html']->lang();
		$this->data['content_type'] 	= 	$this->library['html']->content_type();
		$this->data['author'] 			= 	$this->library['html']->author();
		$this->data['robots']			=	$this->library['html']->robots();
		$this->data['canonical'] 		= 	$this->library['html']->canonical();
		$this->data['alexa'] 			= 	$this->library['html']->alexa('ENTER YOUR ALEXA ID HERE');
		$this->data['google_webmaster']	= 	$this->model['base']->google_webmaster('ENTER YOUR SITE VERIFICATION CODE');
		$this->data['favicon'] 			= 	$this->library['html']->favicon();

		/* Sidebars */
		$this->data['left_sidebar']		=	left_sidebar($this->library['navigation'],$this->library['html'], $this->data['page_id']);
		$this->data['right_sidebar']	=	right_sidebar($this->library['html'], $this->data['page_id']);

		$this->data['logo']			=	$this->library['html']->img('logo.png');
		$this->data['fb_like_box']	=	$this->library['social']->fb_like_Box();
		$this->data['email']		=	$this->model['base']->email();
		$this->data['landline']		=	$this->model['base']->landline();
		$this->data['mobile']		=	$this->model['base']->mobile();
		$this->data['address']		=	$this->model['base']->address();
		$this->data['about']		=	$this->model['base']->about();
		$this->data['copyright']	=	copyright();
		$this->data['designed_by']	=	designed_by();
	}

	public function load(){
		$this->core['autoload']->front_view($this->page_template, $this->data, $this->library, $this->model);
	}

}

?>