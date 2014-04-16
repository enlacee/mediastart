<?php

class Portfolio extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portfolio_model');
    }
    
    /**
     * page of company by id
     */
    public function index($id)
    {      
        $data = array(
            'portfolio' => $this->Portfolio_model->get($id),
        );
        
        $this->layout->view('portfolio/index', $data);   
    }
    
    /**
     *  List by category
     * @param type $id
     */
    public function category($id)
    {   
        $category = $this->load->get_var('category');
        $flagSearch = false;
        $category_name = '';
        $data['columRight'] = false;
        
        if(is_array($category)) {
            foreach ($category as $array) {
                if ($id == $array['id']) {
                    $category_name = $array['name'];
                    $flagSearch = true;
                }
            }
            
            // list by category
            if ($flagSearch) {                
                $data['category_name'] = $category_name;                
                $data['portfolio'] = $this->Portfolio_model->listPortfolioByCategory($id);
            }
        }
        
        $this->layout->setLayout('layout/layout_body');
        $this->layout->view('portfolio/category', $data);
    }
    
    public function video($id)
    {
        $data = array(
            'portfolio' => $this->Portfolio_model->get($id)
        );
        $this->layout->setLayout('layout/layout_body');
        $this->layout->view('portfolio/video', $data);        
    }
    

    
}