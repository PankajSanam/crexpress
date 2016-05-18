<?php if (!defined('CREXO')) exit('No Trespassing!');

class Dashboard_Controller extends Crexo_Controller {

	public function __construct($slug){
	
		parent::__construct($slug);
		
		$this->model[$this->slug] = Route::back_model($this->slug);
		$this->library['validation']->admin_auth();
		$this->data['controller'] = ucfirst($slug);
		
		$styles = array(
			//Bootstrap
				'bootstrap.min.css' => '',
			//Bootstrap responsive
				'bootstrap-responsive.min.css' => '',
			//jQuery UI
				'plugins/jquery-ui/smoothness/jquery-ui.css' => '',
				'plugins/jquery-ui/smoothness/jquery.ui.theme.css' => '',
			//PageGuide
				'plugins/pageguide/pageguide.css' => '',
			//Fullcalendar
				'plugins/fullcalendar/fullcalendar.css' => '',
				'plugins/fullcalendar/fullcalendar.print.css' => 'print',
			//chosen
				'plugins/chosen/chosen.css' => '',
			//select2
				'plugins/select2/select2.css' => '',
			//icheck
				'plugins/icheck/all.css' => '',
			//Theme CSS
				'style.css' => '',
			//Color CSS
				'themes.css' => '',
		);
		
		$scripts = array(
			//jQuery
				'jquery.min.js',
			//Nice Scroll
				'plugins/nicescroll/jquery.nicescroll.min.js',
			//jQuery UI
				'plugins/jquery-ui/jquery.ui.core.min.js',
				'plugins/jquery-ui/jquery.ui.widget.min.js',
				'plugins/jquery-ui/jquery.ui.mouse.min.js',
				'plugins/jquery-ui/jquery.ui.draggable.min.js',
				'plugins/jquery-ui/jquery.ui.resizable.min.js',
				'plugins/jquery-ui/jquery.ui.sortable.min.js',
			//Touch enable for jquery UI
				'plugins/touch-punch/jquery.touch-punch.min.js',
			//slimScroll
				'plugins/slimscroll/jquery.slimscroll.min.js',
			//Bootstrap
				'bootstrap.min.js',
			//vmap
				'plugins/vmap/jquery.vmap.min.js',
				'plugins/vmap/jquery.vmap.world.js',
				'plugins/vmap/jquery.vmap.sampledata.js',
			//Bootbox
				'plugins/bootbox/jquery.bootbox.js',
			//Flot
				'plugins/flot/jquery.flot.min.js',
				'plugins/flot/jquery.flot.bar.order.min.js',
				'plugins/flot/jquery.flot.pie.min.js',
				'plugins/flot/jquery.flot.resize.min.js',
			//imagesLoaded
				'plugins/imagesLoaded/jquery.imagesloaded.min.js',
			//PageGuide
				'plugins/pageguide/jquery.pageguide.js',
			//FullCalendar
				'plugins/fullcalendar/fullcalendar.min.js',
			//Chosen
				'plugins/chosen/chosen.jquery.min.js',
			//select2
				'plugins/select2/select2.min.js',
			//icheck
				'plugins/icheck/jquery.icheck.min.js',
			//Theme framework
				'eakroko.min.js',
			//Theme scripts
				'application.min.js',
			//Just for demonstration
				'demonstration.min.js',
		);
		$this->data['styles']	=	$this->library['html']->styles($styles,1);
		$this->data['scripts'] = $this->library['html']->scripts($scripts,1);
	}

	public function back_index(){

		$this->data['meta_title'] 	=	meta_title('Dashboard - CrexPress');
		$this->data['body_class']	=	'';
		$this->data['breadcrumb']	=	'
			<li><a href="'.back_url('dashboard/').'">Dashboard</a></li>
		';
		
		parent::load('back');
	}
	
	public function front_index()
	{
		//
	}		
}