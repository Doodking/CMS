<?php

namespace Cms\Controller;

class ErrorController extends CmsController{

	public function action404(){
		echo 'Такой страницы не существует';
	}
}