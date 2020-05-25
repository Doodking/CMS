<?php


namespace Engine\Core\Router;


class DispatchedRoute{
	private $controllers;
	private $parameters;

	public function __construct($controllers, $parameters = []){
		$this->controllers = $controllers;
		$this->parameters = $parameters;
	}

	public function getController(){
		return $this->controllers;
	}

	public function getParameters(){
		return $this->parameters;
	}

}