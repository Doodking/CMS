<?php

namespace Admin\Model\User;

use Engine\Model;

class UserRepository extends Model{

    public function getUsers(){
        $sql = $this->queryBuilder
                    ->select()
                    ->from('user')
                    ->orderBy('id', 'DESC')
                    ->sql();
        
        return $this->db->query($sql);            
    }

    public function create(){
        $user = new User();
        $user->setEmail('admin@admin.stra');
        $user->setPassword(md5(rand(1, 10)));
        $user->setRole('user');
        $user->setHash('new');
        $user->save();
    }
}