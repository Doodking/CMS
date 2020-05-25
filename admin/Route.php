<?php

$this->router->add('admin', '/admin', 'AdminPanelController/index');
$this->router->add('admin/login', '/admin/login', 'LoginController/login');
$this->router->add('admin/auth', '/admin/auth', 'LoginController/authAdmin', 'POST');
$this->router->add('logout', '/admin/logout', 'AdminController/logout');

$this->router->add('pages', '/admin/pages', 'PageController/listing');

$this->router->add('page-create', '/admin/pages/create', 'PageController/create');
$this->router->add('page-edit', '/admin/pages/edit/(id:int)', 'PageController/edit');

$this->router->add('page-add', '/admin/pages/add', 'PageController/add', 'POST');
$this->router->add('page-update', '/admin/pages/update', 'PageController/update', 'POST');
