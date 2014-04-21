<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_post extends MY_ControllerAdmin {
    
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * List all post
    */
    public function post()
	{
		$data = array();
		$this->layout->view('admin/post/post', $data);
	}

	// section
    public function lastnew()
	{
		$data = array();
		$this->layout->view('admin/post/lastnew', $data);
	}
	// section
    public function page()
	{
		$data = array();
		$this->layout->view('admin/post/page', $data);
	}

	// section
    public function pageabout()
	{
		$data = array();
		$this->layout->view('admin/post/pageabout', $data);
	}

	


}