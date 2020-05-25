<?php


namespace Engine\Core\Template;


class Theme
{
	const RULE_THEMES = [	
		'header' => 'header-%s.php',
		'footer' => 'footer-%s.php',
		'sidebar' => 'sidebar-%s.php',
	];

	public $url = '';

	protected $data = [];

	public function header($name = 'header'){
		if($name !== ''){
			$name = sprintf(self::RULE_THEMES['header'], $name);
			$this->getTemplateFile($name);
		}else{
			throw new \Exception(sprintf('This %s is not exist s %s', $name, $this->getTemplateFile($name)));
		}
	}

	public function footer($name = 'footer'){
		if($name !== ''){
			$name = sprintf(self::RULE_THEMES['footer'], $name);
			$this->getTemplateFile($name);
		}else{
			throw new \Exception(sprintf('This %s is not exist s %s', $name, $this->getTemplateFile($name)));
		}
	}

	public function sidebar($name = ''){
		if($name !== ''){
			$name = sprintf(self::RULE_THEMES['sidebar'], $name);
			$this->getTemplateFile($name);
		}else{
			throw new \Exception(sprintf('This %s is not exist', $name));
		}
	}

	public function block($name = '', $data = []){
		if($name !== ''){
			$this->getTemplateFile($name);
		}else{
			throw new \Exception(sprintf('This %s is not exist', $name));
		}
	}

	private function getTemplateFile($nameFile, $data = []){
		$file = ROOT_DIR .  '\\content\\themes\\' . $nameFile;

		if(ENV == 'Admin'){
			$file = ROOT_DIR .  '\\View\\' . $nameFile;
		}
		if(is_file($file)){
			extract(array_merge($data, $this->data));
			require_once $file;
		}else{
			throw new \Exception(sprintf('This %s is not exist in %s', $nameFile, $file));
		}
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}


}