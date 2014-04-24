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
            'ourTeam' => $this->Our_team_model->listTeam(Our_team_model::STATUS_TRUE, 'desc',4));
        
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
            'latestNews' => $this->Post_model->get($id, 'post', Post_model::STATUS_TRUE),
        );        
        
        $this->layout->view('page/index', $data);
    }
    
    /**
     * LIST Only by category (page-about)
     * @param type $id
     */
    public function about($id)
    {
        $response = $this->Post_model->get($id, $post_type = 'page-about', Post_model::STATUS_TRUE);        
        $id_lang = $this->session->userdata('id_lang');  
        
        //  seting (language with  field db)
        if(!empty($id_lang) && $id_lang != false ) {
            $id = '';
            $language = $this->load->get_var('language');            
            
            for ($i = 0; $i < count($language); $i++) {
                if ($id_lang == $language[$i]['short_name'] && $id_lang != 'en') {
                   $id =  '_'. $language[$i]['id'];
                }
            }            
                        
            $response['title'] =  $response["title$id"];
            $response['content'] =  $response["content$id"];
        }

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
            'latestNews' => $this->Post_model->get($id, 'page', Post_model::STATUS_TRUE)
        );        
        
        $this->layout->view('page/admin', $data);
    }    
    
}
