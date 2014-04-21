<?php

class MY_ControllerAdmin extends MY_Controller {

    public $adminSession;
    public $idAdmin;
    
    public function __construct()
    {
        parent::__construct();
        $this->validateUser();
        $this->layout->setLayout('layout-admin/layout');
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
    
}
