<?php

namespace Admin\Controller;

class ErrorController extends AdminController{

	public function action404(){
		echo 'Такой страницы не существует';
	}
}