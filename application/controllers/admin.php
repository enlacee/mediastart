<?php

class Admin extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }    

    public function index()
    {   
        $data = array ();

        //$this->loadStatic(array('css' => '/css/anibal.css'));
        //$this->loadStatic(array('js' => '/js/anibal.js'));        
        //$this->loadStatic(array("jstring" => $string));
        $this->layout->setLayout('layout-admin/layout');
        $this->layout->view('admin/index', $data);
    }
}
