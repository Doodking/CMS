<?php

namespace Cms\Controller;


class HomeController extends CmsController
{

	public function index(){
		$this->view->render('index', ['name' => 'World']);
	}

	public function home($id){
		echo 'Take user form db with id = ' . $id;
	}
}