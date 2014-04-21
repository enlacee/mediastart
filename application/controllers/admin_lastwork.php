<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_lastwork extends MY_ControllerAdmin {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$data = array();
		$this->layout->view('admin/lastwork/index', $data);
	}

}