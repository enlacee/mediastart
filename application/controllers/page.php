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
    
    /*
     * list only post by category(post)
     */
    public function index($id)
    {
        $this->load->model('Banner_model');
        $this->load->model('Post_model');
        
        $data = array (
            'columRight' => false,            
            'latestNews' => $this->Post_model->get($id),
        );        
        
        $this->layout->view('page/index', $data);
    }
    
    /**
     * LIST Only by category (page-about)
     * @param type $id
     */
    public function about($id)
    {
        $response = $this->Post_model->get($id, $post_type = 'page-about');        
        $id_lang = $this->session->userdata('id_lang');  
        
        if(!empty($id_lang) && $id_lang != false) {         
            $response['content'] =  $response["content_$id_lang"];
        }
        
        //var_dump($response);exit;
        $data = array('page' => $response);
        $this->layout->setLayout('layout/layout_contact');
        $this->layout->view('page/about', $data);  
    }
    
    /**
     * List only post by category (page)
     * @param type $id
     */
    public function admin($id = '')
    {   
        $this->load->model('Post_model');
        
        $data = array (
            'columRight' => false,            
            'latestNews' => $this->Post_model->get($id, 'page')
        );        
        
        $this->layout->view('page/admin', $data);
    }    
    
}
