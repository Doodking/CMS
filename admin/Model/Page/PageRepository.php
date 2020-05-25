<?php

namespace Admin\Model\Page;

use Engine\Model;

class PageRepository extends Model{

    public function getPages(){
        $sql = $this->queryBuilder
                    ->select()
                    ->from('page')
                    ->orderBy('id', 'ASC')
                    ->sql();
        
        return $this->db->query($sql);            
    }

    public function createPage($params){
        $page = new Page();
        $page->setTitle($params['title']);
        $page->setContent($params['content']);
        $pageId = $page->save();
        return $pageId;
    }

    public function getPage($id){
        $page = new Page($id);
        return $page->findOne();              
    }

    public function updatePage($params){
        if(isset($params['page_id'])){
            $page = new Page($params['page_id']);
            $page->setTitle($params['title']);
            $page->setContent($params['content']);
            $page->save();
        }
    }
}