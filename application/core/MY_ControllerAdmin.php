<?php

class MY_ControllerAdmin extends MY_Controller {
		
	// paginator
	const LIMIT = 5;
	
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
        $arrayControl = array('post', 'contact', 'work','partner','portfolio','banner');
        foreach ($arrayControl as $key) {
            if (array_key_exists($key, $dataSession)) {
                $dataSession[$key]['img_tmp']['path'] = $this->formatDirectoryIsWindows($dataSession[$key]['img_tmp']['path']);
                $this->session->set_userdata($dataSession); //$this->session->userdata('post');   
            }           
        }
    }


    // Bug in windows 
    private function formatDirectoryIsWindows($string)
    {
        if( strpos($string, ":")!==false){
            // windows
            $string = str_replace("\\", "/", $string);            
        }        
        return $string;
    }
    
}
