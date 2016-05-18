<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Gallery_Controller extends Controller
{
	public $back_page;
	public function __construct($slug){
		$this->slug = $slug;
	}

	public function back_index(){
		parent::__construct($this->slug,'','gallery');
		
		$this->model[$this->slug] = Route::back_model($this->slug);
		$this->library['validation']->admin_auth();
		$this->library['upload'] = new Upload;
		$this->library['image'] = new Image;
		$this->data['controller'] = ucfirst($this->slug);
		
		$this->data['styles']	=	$this->library['html']->styles(array(
													//Bootstrap
														'bootstrap.min.css' => '',
													//Bootstrap responsive
														'bootstrap-responsive.min.css' => '',
													//jQuery UI
														'plugins/jquery-ui/smoothness/jquery-ui.css' => '',
														'plugins/jquery-ui/smoothness/jquery.ui.theme.css' => '',
													//Tagsinput
														'plugins/tagsinput/jquery.tagsinput.css' => '',
													//multi select
														'plugins/multiselect/multi-select.css' => '',
													//chosen
														'plugins/chosen/chosen.css' => '',
													//PageGuide
														'plugins/pageguide/pageguide.css' => '',
													//select2
														'plugins/select2/select2.css' => '',
													//icheck
														'plugins/icheck/all.css' => '',
													//timepicker
														'plugins/timepicker/bootstrap-timepicker.min.css' => '',
													//colorpicker
														'plugins/colorpicker/colorpicker.css' => '',
													//Datepicker
														'plugins/datepicker/datepicker.css' => '',
													//Daterangepicker
														'plugins/daterangepicker/daterangepicker.css' => '',
													//Plupload
														'plugins/plupload/jquery.plupload.queue.css' => '',
													//dataTables
														'plugins/datatable/TableTools.css' => '',
													//XEditable
														'plugins/xeditable/bootstrap-editable.css' => '',
													//Theme CSS
														'style.css' => '',
													//Color CSS
														'themes.css' => '',
													),1);

		$this->data['scripts'] = $this->library['html']->scripts(array(
													//jQuery
														'jquery.min.js',
													//Nice Scroll
														'plugins/nicescroll/jquery.nicescroll.min.js',
													//imagesLoaded
														'plugins/imagesLoaded/jquery.imagesloaded.min.js',
													//jQuery UI
														'plugins/jquery-ui/jquery.ui.core.min.js',
														'plugins/jquery-ui/jquery.ui.mouse.min.js',
														'plugins/jquery-ui/jquery.ui.resizable.min.js',
														'plugins/jquery-ui/jquery.ui.sortable.min.js',
														'plugins/jquery-ui/jquery.ui.selectable.min.js',
														'plugins/jquery-ui/jquery.ui.droppable.min.js',
														'plugins/jquery-ui/jquery.ui.draggable.min.js',
														'plugins/jquery-ui/jquery.ui.datepicker.min.js',
														'plugins/jquery-ui/jquery.ui.spinner.js',
														'plugins/jquery-ui/jquery.ui.slider.js',
													//slimScroll
														'plugins/slimscroll/jquery.slimscroll.min.js',
													//Bootstrap
														'bootstrap.min.js',
													//Bootbox
														'plugins/bootbox/jquery.bootbox.js',
														'plugins/form/jquery.form.min.js',
													//Touch enable for jquery UI
														'plugins/touch-punch/jquery.touch-punch.min.js',
													//vmap
														'plugins/vmap/jquery.vmap.min.js',
														'plugins/vmap/jquery.vmap.world.js',
														'plugins/vmap/jquery.vmap.sampledata.js',
													//dataTables
														'plugins/datatable/jquery.dataTables.min.js',
														'plugins/datatable/TableTools.min.js',
														'plugins/datatable/ColReorderWithResize.js',
														'plugins/datatable/ColVis.min.js',
														'plugins/datatable/jquery.dataTables.columnFilter.js',
														'plugins/datatable/jquery.dataTables.grouping.js',
													//imagesLoaded
														'plugins/imagesLoaded/jquery.imagesloaded.min.js',
													//PageGuide
														'plugins/pageguide/jquery.pageguide.js',
													//Masked inputs
														'plugins/maskedinput/jquery.maskedinput.min.js',
													//TagsInput
														'plugins/tagsinput/jquery.tagsinput.min.js',
													//Datepicker
														'plugins/datepicker/bootstrap-datepicker.js',
													//Daterangepicker
														'plugins/daterangepicker/daterangepicker.js',
														'plugins/daterangepicker/moment.min.js',
													//Timepicker
														'plugins/timepicker/bootstrap-timepicker.min.js',
													//Colorpicker
														'plugins/colorpicker/bootstrap-colorpicker.js',
													//MultiSelect
														'plugins/multiselect/jquery.multi-select.js',
													//CKEditor
														'plugins/ckeditor/ckeditor.js',
													//PLUpload
														'plugins/plupload/plupload.full.js',
														'plugins/plupload/jquery.plupload.queue.js',
													//Custom file upload
														'plugins/fileupload/bootstrap-fileupload.min.js',
														'plugins/mockjax/jquery.mockjax.js',
													//complexify
														'plugins/complexify/jquery.complexify-banlist.min.js',
														'plugins/complexify/jquery.complexify.min.js',
													//Mockjax
														'plugins/mockjax/jquery.mockjax.js',
													//Chosen
														'plugins/chosen/chosen.jquery.min.js',
													//select2
														'plugins/select2/select2.min.js',
													//icheck
														'plugins/icheck/jquery.icheck.min.js',
													//Validation
														'plugins/validation/jquery.validate.min.js',
														'plugins/validation/additional-methods.min.js',
													//Sparkline
														'plugins/sparklines/jquery.sparklines.min.js',
													//XEditable
														//'plugins/momentjs/jquery.moment.js',
														//'plugins/mockjax/jquery.mockjax.js',
														//'plugins/xeditable/bootstrap-editable.min.js',
														//'plugins/xeditable/demo.js',
														//'plugins/xeditable/address.js',
													//Theme framework
														'eakroko.min.js',
													//Theme scripts
														'application.min.js',
													//Just for demonstration
														'demonstration.min.js',
												),1);
		
		$this->data['body_class']	=	'';
		$this->data['model'] 		=	Route::back_model('gallery');
		$this->data['meta_title'] 	=	$this->model['gallery']->meta_title('Gallery - GIT BOX');
		$this->data['galleries']	=	$this->model[$this->slug]->galleries();
		$this->data['categories']	=	$this->model[$this->slug]->categories();
		$this->data['breadcrumb'] = '
			<li><a href="gallery.html">Gallery Management</a><i class="icon-angle-right"></i></li>
			<li><a href="gallery.html?category">Gallery Categories</a><i class="icon-angle-right"></i></li>
			<li><a href="gallery.html?action=add">Add Gallery</a></li>
		';

		if(isset($_GET['action']) AND isset($_GET['id'])){
			$this->data['edit_data'] = $this->model[$this->slug]->edit_data($_GET['id']);
		} else {
			$this->data['edit_data'] = $this->model[$this->slug]->edit_data(1);
		}

		parent::load('back');
	}
	
	public function front_index(){
		parent::__construct($this->slug,$this->slug,'gallery');

		$this->model['crexo'] = new Crexo_Model;
		$this->data['styles'] = Html::styles( array( 
			'bootstrap.css'	=>	'all',
			'bootstrap.min.css' => 'all',
			'style.css' => 'all',
			//contains the *essential* css needed for the slider to work
			'bjqs.css' => 'all',
			'initcarousel.css' => 'all',
			//contains additional styles used to set up this demo page - not required for the slider
			'demo.css' => 'all',
			'lightbox.css' => 'screen',
		));

		$this->data['scripts'] = Html::scripts(array(
			'jquery-1.10.2.min.js',
			'lightbox-2.6.min.js',
			'modernizr.custom.js',
		));

		$this->data['meta_title']		= 	$this->model['crexo']->meta_title($this->slug);
		$this->data['meta_description'] = 	$this->model['crexo']->meta_description($this->slug);
		$this->data['meta_keywords'] 	= 	$this->model['crexo']->meta_keywords($this->slug);
		
		$this->data['page_title'] = $this->model[$this->page_template]->page_title($this->slug);
		$this->data['page_content'] = $this->model[$this->page_template]->page_content($this->slug);
		
		$this->data['galleries'] = $this->model[$this->page_template]->galleries($this->slug);

		parent::load();
	}
}