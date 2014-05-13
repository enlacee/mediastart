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
        $limit = 9;        
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
        // Muestra video
        var idVideo = '';
        $(".porfolioCtnVideoShow img").click(function(){
            // -- Load video
            var img = $(this);
            idVideo = img.attr('data');
            
            var url = 'http://vimeo.com/api/v2/video/'+idVideo+'.json';
            $.getJSON( url, function( data ) {                
                data = data[0];                      
                var image = '<img class="btn" src="'+data.thumbnail_large+'" title="'+data.title+'" alt="'+data.title+'" >';                
                $("#porfolioCtnVideoIframeShow").html(image);

            });   
            // -- load modal    
            $('#videoPorfolio').modal({backdrop: true,show: true});                
        });
                
        $("#porfolioCtnVideoIframeShow").click(function(){
            // 02 video  <iframe src="//player.vimeo.com/video/91590180" width="500" height="281" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            var contenHtml = '<iframe ';
            contenHtml = contenHtml + 'src="//player.vimeo.com/video/'+ idVideo +'" ';
            contenHtml += 'width="500" height="281" frameborder="0" ';
            contenHtml += 'webkitallowfullscreen mozallowfullscreen allowfullscreen> ';
            contenHtml += '</iframe> ';
            $(this).html(contenHtml);
        });     
            
EOT;
        
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->setLayout('layout/layout_body');
        $this->layout->view('portfolio/category', $data);
    }
    
    public function video($id='')
    {
        if (!empty($id)) {
            $data = array(
                'portfolio' => $this->Portfolio_model->get($id, '',  Portfolio_model::STATUS_TRUE)
            );
            $this->Portfolio_model->countView($id);
            $this->cleanCache();
            $this->layout->setLayout('layout/layout_body');
            $this->layout->view('portfolio/video', $data);
        }
    }
    
}