<?php

namespace Engine\Core\Config;

class Config{
	private $link;

	public function __construct(){
		$this->connect();
	}

	public static function item($key, $group = 'main'){
        $group_items = static::file($group);
        return isset($group_items) ? $group_items[$key] : null;
    }
    
    public static function file($group){
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . ENV . '/Config/' . $group . '.php';
        if(file_exists($path)){
            $items = require_once $path;
            if($items !== null){
                return $items;
            }else{
                throw new \Exception(sprintf('%s is not array', $items));
            }
        }else{
            throw new \Exception(sprintf('This file by path(%s) doesn\'t exist', $path));
        }
        return false;

    }
}