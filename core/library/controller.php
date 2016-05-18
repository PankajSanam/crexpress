<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

abstract class Controller
{
	protected $slug;
	protected $page_template;
	protected $template;

	public function __construct($slug,$page_template='')
	{
		$this->page_template = ($page_template == '' ? $slug : $page_template);
		$this->slug = $slug;
		$this->setupSmarty();
	}

	public function setupSmarty()
	{
		/**
		 * Setting up smarty 3.1.20 template engine for our app
		 */
		$this->template = new Smarty();
		$this->template->setTemplateDir('core/view/front/');
		$this->template->setCompileDir('content/temp/');
		$this->template->setConfigDir('content/config/');
		$this->template->setCacheDir('content/cache/');

		//turn this on for smarty debugging
		$this->template->debugging = false;
	}

	public function load()
	{
		$this->template->display('header.tpl.php');
		$this->template->display($this->page_template.'.tpl.php');
		$this->template->display('footer.tpl.php');
	}
}