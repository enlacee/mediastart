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
            'portfolio' => $this->Portfolio_model->get($id, '', Portfolio_model::STATUS_TRUE),
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
        $limit = 3;        
        $count = $this->Portfolio_model->listPorfolio($id, Portfolio_model::STATUS_TRUE, '', '', '', true);        

        if ($count > 0) {
            $total_pages = ceil($count/$limit);
        } else {
           $total_pages = 1; 
        }
        if ($page > $total_pages) { $page = $total_pages; }// $page = 0
        if ($page < 1) { $page = 1; }
        
        $start = $limit * $page - $limit;
        
        $data['pag']['limit'] = $limit;
        $data['pag']['page'] = $page;
        $data['pag']['last_page'] = $total_pages;
        $data['pag']['start'] = $start;
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
                $data['portfolio'] = $this->Portfolio_model->listPorfolio($id, Portfolio_model::STATUS_TRUE, 'desc', $limit, $start,false);
            }
        }
        
        $stringJs = <<<EOT
        //Muestra video
        $(".porfolioCtnVideoShow img").click(function(){
            // -- Load video
            var img = $(this);
            var urlVideo = img.attr('data');
            
            var contenHtml = '<iframe ';
            contenHtml = contenHtml + 'src="'+ urlVideo +'" ';
            contenHtml += 'width="500" height="281" frameborder="0" ';
            contenHtml += 'webkitallowfullscreen mozallowfullscreen allowfullscreen> ';
            contenHtml += '</iframe> ';

            $("#porfolioCtnVideoIframeShow").html(contenHtml);
   
            // -- load modal    
            $('#videoPorfolio').modal({
                    backdrop: true,
                    show: true
            });
                
        });                
EOT;
        
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->setLayout('layout/layout_body');
        $this->layout->view('portfolio/category', $data);
    }
    
    public function video($id)
    {
        $data = array(
            'portfolio' => $this->Portfolio_model->get($id, '',  Portfolio_model::STATUS_TRUE)
        );
        $this->layout->setLayout('layout/layout_body');
        $this->layout->view('portfolio/video', $data);        
    }
    

    
}