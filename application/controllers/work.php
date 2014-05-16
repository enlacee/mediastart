<?php

class Work extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * page of company by id
     */
    public function company($id)
    {
        $this->load->model('Work_model');        

        $data['work'] = $this->Work_model->get($id);
        $data['title'] = isset($data['work']['title']) ? $data['work']['title'] : NULL;
        
        $this->layout->view('work/company', $data);   
    }    
}