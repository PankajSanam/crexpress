<?php if (!defined('CREXO')) exit('No Trespassing!');

class Settings_Controller extends Crexo_Controller {
	public function __construct($slug){
		parent::__construct($slug);

		$this->model[$this->slug] = Route::back_model($this->slug);
		$this->library['validation']->admin_auth();
		$this->library['upload'] = new Upload;
		$this->library['image'] = new Image;
		$this->data['controller'] = ucfirst($slug);
		
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
	}

	public function back_index(){
		$this->data['meta_title'] 	=	$this->model['settings']->meta_title('Settings - GIT BOX');
		$this->data['breadcrumb'] = '<li><a href="settings.html">Settings</a></li>';

		$this->data['email']				=	$this->model[$this->slug]->email();
		$this->data['landline']				=	$this->model[$this->slug]->landline();
		$this->data['mobile']				=	$this->model[$this->slug]->mobile();
		$this->data['address']				=	$this->model[$this->slug]->address();
		$this->data['google_analytics']		=	$this->model[$this->slug]->google_analytics();
		$this->data['google_webmaster']		=	$this->model[$this->slug]->google_webmaster();
		$this->data['favicon']				=	$this->model[$this->slug]->favicon();
		$this->data['logo']					=	$this->model[$this->slug]->logo();
		$this->data['about']				=	$this->model[$this->slug]->about();

		parent::load('back');
	}
}