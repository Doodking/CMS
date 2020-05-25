<?php

namespace Engine\Core\Auth;

use Engine\Helper\Cookie;

class Auth implements AuthInterface{
    public $authorized = false;
    protected $hash_user;

    public function authorized(){
        return $this->authorized;
    }

    public function hashUser(){
        return Cookie::get('auth_user');
    }

    public function authorize($hash_user){
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $hash_user);
        $this->authorized = true; 
        $this->hash_user = $hash_user;
    }

    public function unAuthorize(){
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
        $this->authorized = false; 
        $this->hash_user = null;
    }

    public static function salt(){
        return (string) rand(10000000, 99999999);
    }

    public static function encryptPassword($password, $salt = ''){
        return hash('sha256', $password . $salt);
    }
}