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
    public function category($id, $page=1)
    {   
        $category = $this->load->get_var('category');
        $flagSearch = false;
        $category_name = '';
        $data['columRight'] = false;
        
        // ----- init pagination
        //$page = 1;
        $limit = 9;        
        $count = $this->Portfolio_model->listPortfolioByCategory($id, '', '', '',true);

        if ($count > 0) {
            $total_pages = ceil($count/$limit);
        } else {
           $total_pages = 1; 
        }
        if ($page > $total_pages) { $page = $total_pages; }// $page = 0
        $start = $limit * $page - $limit;
        
        $data['limit'] = $limit;
        $data['page'] = $page;
        // ----- end pagination        
        
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
                $data['portfolio'] = $this->Portfolio_model->listPortfolioByCategory($id, 'desc', $limit, $start,false);
            }
        }
        //echo "<pre>"; print_r($data); exit;
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