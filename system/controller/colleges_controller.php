<?php if (!defined('CREXO')) exit('No Trespassing!');

class Colleges_Controller extends Crexo_Controller {
	public function __construct($page){
		parent::__construct($page,'','colleges');

		$this->model[$this->page] = Route::back_model($this->page);
		$this->library['validation']->admin_auth();
		$this->library['upload'] = new Upload;

		$this->data['styles']			=	$this->library['html']->styles(array(
													//Bootstrap
														'bootstrap.min' => '',
													//Bootstrap responsive
														'bootstrap-responsive.min' => '',
													//jQuery UI
														'plugins/jquery-ui/smoothness/jquery-ui' => '',
														'plugins/jquery-ui/smoothness/jquery.ui.theme' => '',
													//Tagsinput
														'plugins/tagsinput/jquery.tagsinput' => '',
													//multi select
														'plugins/multiselect/multi-select' => '',
													//chosen
														'plugins/chosen/chosen' => '',
													//PageGuide
														'plugins/pageguide/pageguide' => '',
													//select2
														'plugins/select2/select2' => '',
													//icheck
														'plugins/icheck/all' => '',
													//timepicker
														'plugins/timepicker/bootstrap-timepicker.min' => '',
													//colorpicker
														'plugins/colorpicker/colorpicker' => '',
													//Datepicker
														'plugins/datepicker/datepicker' => '',
													//Daterangepicker
														'plugins/daterangepicker/daterangepicker' => '',
													//Plupload
														'plugins/plupload/jquery.plupload.queue' => '',
													//dataTables
														'plugins/datatable/TableTools' => '',
													//XEditable
														'plugins/xeditable/bootstrap-editable' => '',
													//Theme CSS
														'style' => '',
													//Color CSS
														'themes' => '',
													),1);

		$this->data['scripts'] = $this->library['html']->scripts(array(
													//jQuery
														'jquery.min',
													//Nice Scroll
														'plugins/nicescroll/jquery.nicescroll.min',
													//imagesLoaded
														'plugins/imagesLoaded/jquery.imagesloaded.min',
													//jQuery UI
														'plugins/jquery-ui/jquery.ui.core.min',
														'plugins/jquery-ui/jquery.ui.mouse.min',
														'plugins/jquery-ui/jquery.ui.resizable.min',
														'plugins/jquery-ui/jquery.ui.sortable.min',
														'plugins/jquery-ui/jquery.ui.selectable.min',
														'plugins/jquery-ui/jquery.ui.droppable.min',
														'plugins/jquery-ui/jquery.ui.draggable.min',
														'plugins/jquery-ui/jquery.ui.datepicker.min',
														'plugins/jquery-ui/jquery.ui.spinner',
														'plugins/jquery-ui/jquery.ui.slider',
													//slimScroll
														'plugins/slimscroll/jquery.slimscroll.min',
													//Bootstrap
														'bootstrap.min',
													//Bootbox
														'plugins/bootbox/jquery.bootbox',
														'plugins/form/jquery.form.min',
													//Touch enable for jquery UI
														'plugins/touch-punch/jquery.touch-punch.min',
													//vmap
														'plugins/vmap/jquery.vmap.min',
														'plugins/vmap/jquery.vmap.world',
														'plugins/vmap/jquery.vmap.sampledata',
													//dataTables
														'plugins/datatable/jquery.dataTables.min',
														'plugins/datatable/TableTools.min',
														'plugins/datatable/ColReorderWithResize',
														'plugins/datatable/ColVis.min',
														'plugins/datatable/jquery.dataTables.columnFilter',
														'plugins/datatable/jquery.dataTables.grouping',
													//imagesLoaded
														'plugins/imagesLoaded/jquery.imagesloaded.min',
													//PageGuide
														'plugins/pageguide/jquery.pageguide',
													//Masked inputs
														'plugins/maskedinput/jquery.maskedinput.min',
													//TagsInput
														'plugins/tagsinput/jquery.tagsinput.min',
													//Datepicker
														'plugins/datepicker/bootstrap-datepicker',
													//Daterangepicker
														'plugins/daterangepicker/daterangepicker',
														'plugins/daterangepicker/moment.min',
													//Timepicker
														'plugins/timepicker/bootstrap-timepicker.min',
													//Colorpicker
														'plugins/colorpicker/bootstrap-colorpicker',
													//MultiSelect
														'plugins/multiselect/jquery.multi-select',
													//CKEditor
														'plugins/ckeditor/ckeditor',
													//PLUpload
														'plugins/plupload/plupload.full',
														'plugins/plupload/jquery.plupload.queue',
													//Custom file upload
														'plugins/fileupload/bootstrap-fileupload.min',
														'plugins/mockjax/jquery.mockjax',
													//complexify
														'plugins/complexify/jquery.complexify-banlist.min',
														'plugins/complexify/jquery.complexify.min',
													//Mockjax
														'plugins/mockjax/jquery.mockjax',
													//Chosen
														'plugins/chosen/chosen.jquery.min',
													//select2
														'plugins/select2/select2.min',
													//icheck
														'plugins/icheck/jquery.icheck.min',
													//Validation
														'plugins/validation/jquery.validate.min',
														'plugins/validation/additional-methods.min',
													//Sparkline
														'plugins/sparklines/jquery.sparklines.min',
													//XEditable
														//'plugins/momentjs/jquery.moment',
														//'plugins/mockjax/jquery.mockjax',
														//'plugins/xeditable/bootstrap-editable.min',
														//'plugins/xeditable/demo',
														//'plugins/xeditable/address',
													//Theme framework
														'eakroko.min',
													//Theme scripts
														'application.min',
													//Just for demonstration
														'demonstration.min',
												),1);
	}

	public function back_index(){
		$this->data['body_class']	=	'';
		$this->data['meta_title'] 	=	$this->model['colleges']->meta_title('Colleges - GIT BOX');
		$this->data['colleges']		=	$this->model[$this->page]->colleges();
		$this->data['college_pages']=	$this->model[$this->page]->college_pages();

		if(isset($_GET['action']) AND $_GET['action'] == 'edit'){
			$this->data['edit_data']	= 	$this->model[$this->page]->edit_data($_GET['id']);
		} else {
			$this->data['edit_data'] 	= 	$this->model[$this->page]->edit_data(1);
		}

		parent::load('back');
	}
}