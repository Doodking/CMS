<?php

$this->router->add('home', '/', 'HomeController/index');
$this->router->add('homeId', '/home/(id:int)', 'HomeController/home');
$this->router->add('users', '/users/1', 'UserController/get');