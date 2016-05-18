<?php
namespace Retina\Back;

abstract class Base_Controller {

	protected $page;
	protected $core 	=	array();
	protected $data 	= 	array();
	protected $model	= 	array();
	protected $library 	= 	array();

	public function __construct($page){
		$this->page = $page;
		
		$this->model['base'] = new Base_Model;
		$this->core['autoload'] = new \Autoload;

		$this->library['html'] 			=	new \Html;
		$this->library['navigation'] 	= 	new \Navigation;
		$this->library['validation'] 	= 	new \Validation;
		$this->library['encrypt'] 		= 	new \Encrypt;
		$this->library['sanitize'] 		= 	new \Sanitize;

		$this->data['doc_type'] 		= 	$this->library['html']->doc_type();
		$this->data['lang'] 			=	$this->library['html']->lang();
		$this->data['content_type'] 	=	$this->library['html']->content_type();
		$this->data['author']			=	$this->library['html']->author();
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
													//Theme framework
														'eakroko.min',
													//Theme scripts
														'application.min',
													//Just for demonstration
														'demonstration.min',
												),1);

	}

}

?>