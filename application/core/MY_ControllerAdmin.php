<?php

class MY_ControllerAdmin extends MY_Controller {

    public $adminSession;
    public $idAdmin;
    
    public function __construct()
    {
        parent::__construct();
        $this->validateUser();
        $this->layout->setLayout('layout-admin/layout');
        $this->loadVariable();
    }
    
    /*
     * Validate Admin session
     */
    public function validateUser()
    {
        $user = $this->session->userdata('admin');        
        if (!empty($user) && isset($user['id'])) {
            $this->idAdmin = $user['id'];            
            $this->adminSession = true;
        } else {
            $this->adminSession = false;
        }
    }
    
    
    private function loadVariable()
    {
        //load pages (footer)
        $this->load->model('Post_model');
        $pages = array();
        $pages['pages'] = $this->Post_model->listPost(
                $post_type = 'page',
                $order = 'desc',
                $limit = 2);
        $this->load->vars($pages);
    }
    
    /**
     * Clear cache (option CRUD in db)
     */ 
    protected function clearCache()
    {   
        $this->load->driver('cache');
        $this->cache->file->clean();
    }             
    
}
