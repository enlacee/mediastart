<?php

class page extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function contact()
    {
        $this->layout->view('page/contact');
    }
    
    public function index($id)
    {
        $this->load->model('Post_model');
        
       echo $id; exit;
        
        $data = array (
            'latestNews' => $this->Post_model->listPost('post', 'desc', 8),
        );
        
        //$this->layout->setLayout('layout/layout_main');
        //$this->layout->view('index/index', $data);        
        
    }
}
