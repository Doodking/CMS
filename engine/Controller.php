<?php


namespace Engine;


abstract class Controller
{
    protected $di;

    protected $db;

    protected $view;

    protected $config;

    protected $request;

    protected $load;

    public function __construct($di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->request = $this->di->get('request');
        $this->view = $this->di->get('view');
        $this->config = $this->di->get('config');
        $this->load = $this->di->get('load');
    }
}