<?php


namespace Engine\Core\Template;

use Engine\Core\Template\Theme;

class View
{
	protected $theme;

	public function __construct()
	{
		$this->theme = new Theme();
	}

	public function render($template, $vars = []){
		$templatePath = $this->getTemplatePath($template, ENV);
		if(!is_file($templatePath)){
			throw new Exception("Template %s doesn't exist", $template);
		}
		$this->theme->setData($vars);
		extract($vars);
		ob_start();
		ob_implicit_flush(0);

		try{
			require $templatePath;

		}catch(\Exception $e){
			ob_end_clean();
			echo $e->getMessage();
		}

		echo ob_get_clean();
	}

	public function getTemplatePath($template, $env = null){
		switch($env){
			case 'Admin':
				return ROOT_DIR . '/View/' . $template . '.php';
				break;
			case 'Cms':
				return ROOT_DIR . '/content/themes/' . $template . '.php';
				break;
			default:
				return ROOT_DIR . $env . '/View/' . $template . '.php';		
		}
	}

}