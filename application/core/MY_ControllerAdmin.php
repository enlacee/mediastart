<?php

class MY_ControllerAdmin extends MY_Controller {
		
	// paginator
	const LIMIT = 3;
	
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
        $pages['pages'] = $this->Post_model->listPost('page', Post_model::STATUS_TRUE, 'desc', 2);
        $this->load->vars($pages);
        
        // load cargos for Contact (ours teams)
        $this->load->model('Cargo_model');
        $cargos['cargos'] = $this->Cargo_model->listCargo();
        $this->load->vars($cargos);
        
    }
    
    /**
     * Clear cache (option CRUD in db)
     */ 
    protected function cleanCache()
    {   
        $this->load->driver('cache');
        $this->cache->file->clean();
    }
    
    /**
     * Funtion General save Session (controller)
     */
    protected function saveSession($dataSession = array())
    {        
        $arrayControl = array('post', 'contact', 'work','partner','portfolio');
        foreach ($arrayControl as $key) {
            if (array_key_exists($key, $dataSession)) {
                $this->session->set_userdata($dataSession); //$this->session->userdata('post');   
            }           
        }
    }
    
}
