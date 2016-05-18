<?php
namespace Retina\Front;

abstract class Base_Controller {

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
		$this->model['base'] = new Base_Model;
		$this->model['page'] = new Page_Model;
		$this->library['html'] = new \Html;
		$this->library['navigation'] = new \Navigation;
		$this->library['validation'] = new \Validation;

		$this->data['doc_type'] = $this->library['html']->doc_type();
		$this->data['lang'] =  $this->library['html']->lang();
		$this->data['content_type'] = $this->library['html']->content_type();
		$this->data['author'] = $this->library['html']->author();
		$this->data['revisit'] = $this->library['html']->revisit();
		$this->data['google_webmaster'] = $this->library['html']->google_webmaster('XVMhOtez7yO_68PWdI2EnLd3mVMFv7q-42-c71AlbYE');
		$this->data['styles'] = $this->library['html']->styles( array( 'style' => '' ) );
		$this->data['scripts'] = $this->library['html']->scripts(array(
									'jquery.min',
									'ddsmoothmenu',
									'contentslider',
									'jcarousellite_1.0.1',
									'jquery.easing.1.1',
									'cufon-yui',
									'DIN_500.font',
									'menu',
									'tabs',
									'jquery.mousewheel-3.0.4.pack',
									'jquery.fancybox-1.3.4.pack',
								));
	}

}

?>