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
        
        $data = array(
            //'columRight' => false,
            'work' => $this->Work_model->get($id),
        );

        $this->layout->view('work/company', $data);   
    }
    
    public function category($id)
    {   
        $category = $this->load->get_var('category');        
        
        $flagSearch = false;
        $data['columRight'] = false;
        
        if(is_array($category)) {
            foreach ($category as $array) {
                if ($id == $array['id'] ) {
                    $flagSearch = true;
                }
            }
            
            // list by category
            if ($flagSearch) {
                $this->load->model('Work_model');                
                $data['work'] = $this->Work_model->listWorkByCategory($id);
            }
            
        }else {
            
            echo "xNO ENCONRO categoria";
            
        }
        $this->layout->setLayout('layout/layout_body');
        $this->layout->view('work/category', $data);
    }

}