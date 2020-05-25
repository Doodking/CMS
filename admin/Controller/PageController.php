<?php

namespace Admin\Controller;

class PageController extends AdminController{

	public function listing(){
        $page_model = $this->load->model('Page');
        $data['pages'] = $page_model->repository->getPages();;
		    $this->view->render('pages/list', $data);
    }
    
    public function create(){
        $page_model = $this->load->model('Page');
		$this->view->render('pages/create', $data);
    }

    public function edit($id){
      $page_model = $this->load->model('Page');
      $this->data['page'] = $page_model->repository->getPage($id);
      $this->view->render('pages/edit', $this->data);
    }

    public function update(){
      $params = $this->request->post;

      if(isset($params['title'])){
        $page_model = $this->load->model('Page');
        $page_model->repository->updatePage($params);
      }
    }
    
    public function add(){
        $params = $this->request->post;

        if(isset($params['title'])){
          $page_model = $this->load->model('Page');
          $pageId = $page_model->repository->updatePage($params);
        }
        echo $pageId;
	}
}