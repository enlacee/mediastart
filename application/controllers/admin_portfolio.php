<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_portfolio extends MY_ControllerAdmin {
    
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * List all post
    */
    public function index()
	{
		$data = array();
		$this->layout->view('admin/portfolio/index', $data);
	}

}