<?php

namespace Admin\Controller;

class AdminPanelController extends AdminController{
    
    public function index(){
        $user_model = $this->load->model('User');
        $this->view->render('dashboard');
    }
}