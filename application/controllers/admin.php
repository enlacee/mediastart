<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin extends MY_ControllerAdmin {
    
    public function __construct()
    {
        parent::__construct();
    }    

    public function index()
    {   
        $data = array();
        //$this->loadStatic(array('css' => '/css/anibal.css'));
        //$this->loadStatic(array('js' => '/js/anibal.js'));        
        //$this->loadStatic(array("jstring" => $string));        
        $this->load->view('admin/index', $data);
    }
    
    public function dashboard()
    {        
        $data = array();
        $this->layout->setLayout('layout-admin/layout');
        $this->layout->view('admin/dashboard', $data);        
    }
    
    
}
