<?php

class Partner extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function category($id)
    {
        $this->load->model('Partner_model');       
        $category = $this->load->get_var('categoryPartner');
        $flagSearch = false;
        $category_name = '';
        $data = array();
        //$data['columRight'] = false;

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
                $data['category_id'] = $id;
                //$data['portfolioCount'] = $this->Portfolio_model->listPortfolioByCategory($id, 'desc', $limit, $start,true);
                $data['partners'] = $this->Partner_model->listCategory($category_name, 18);
            }
        }        
        
        $this->layout->view('partner/category', $data);
    }
    
}