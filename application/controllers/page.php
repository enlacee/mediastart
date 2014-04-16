<?php

class Page extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function contact()
    {
        $this->load->model('Our_team_model');
        
        $data = array (
            'columRight' => 'latestWorks',
            'ourTeam' => $this->Our_team_model->listTeam('desc',4));
        
        $this->layout->view('page/contact', $data);
    }
    
    public function index($id)
    {
        $this->load->model('Banner_model');
        $this->load->model('Post_model');
        
        $data = array (
            'columRight' => false,            
            'latestNews' => $this->Post_model->get($id),
        );
        
        $this->layout->setLayout('layout/layout');
        $this->layout->view('page/index', $data);        
        
    }
    
    public function about($id)
    {
        
    }
}
