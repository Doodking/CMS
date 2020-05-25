<?php


namespace Engine;
use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRoute;
/**
 * 
 */
class Cms 
{
	
	private $di;

	public $router;

	public function __construct($di)
	{
		$this->di = $di;
		$this->router = $di->get('router');
	}

	public function run(){
		try{
			require_once __DIR__ . '/../' . ENV . '/Route.php';
			$routerDispacth = $this->router->dispatch(Common::getMethod(), Common::getUri());
			if($routerDispacth == null){
				$routerDispacth = new DispatchedRoute('ErrorController/action404');
			}
			list($class, $action) = explode('/', $routerDispacth->getController(), 2);
			$controller = '\\' . ENV . '\\Controller\\' . $class;
            if(method_exists($controller, $action)) {
				$parameters = $routerDispacth->getParameters();
                call_user_func_array([new $controller($this->di), $action], $parameters);
            }else{
                echo 'Такого метода не существует';
            }
		}catch(\Exception $e){
			echo 'Что-то пошло не так';
			exit;
		}

	}
}