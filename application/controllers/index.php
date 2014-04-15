<?php

class Index extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function img()
    {
        $u = FCPATH . 'public/images/banner/google.jpg';
        //$this->ZendImage->loadImage($u);
        
        $obj = new ZendImage();
        $obj->loadImage($u);
        //$obj->resize(218, 'width');
        $obj->crop(218,200);
        $obj->save(FCPATH . 'public/images/banner/otro.jpg');
        
        /*
        $u = FCPATH . 'public/images/banner/google.jpg';
        create_thumbnail($u, 100, 100);        
         */
    }
    /**
     * home principal login
     */
    public function index()
    {   
        $this->load->model('Banner_model');
        $this->load->model('Post_model');
        $data = array (
            'bannerPath' => FCPATH . 'public/images/banner/',
            'bannerUrl' => getPublicUrl() .'/images/banner/',
            'banner' => $this->Banner_model->listBanner(),
            'bannerPopular' => $this->Banner_model->listPopular(),
            
            'latestNews' => $this->Post_model->listPost('post', 'desc', 4),
            'latestNewsPath' => FCPATH . 'public/images/latest-news/',
            'latestNewsUrl' => getPublicUrl() .'/images/latest-news/');
        
        
        $string = <<<EOT
                
            $(function() {
                //FechaBox
                $("#fecha").datepicker({
                    showButtonPanel: false
                });                
                //Idiomas
                $('.dropdown-toggle').dropdown();                
                //Tab
                $('#myTab a').click(function(e) {
                    e.preventDefault()
                    $(this).tab('show')
                });
                //Agrega clase al Slider para que pueda funcionar
                $('#esliderWeb div:last-child').addClass("active");
                //Menu
                $('ul.nav li.dropdown').hover(function() {
                    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
                }, function() {
                    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(100);
                });
            });
EOT;
        //$this->loadStatic(array('css' => '/css/anibal.css'));
        //$this->loadStatic(array('js' => '/js/anibal.js'));        
        $this->loadStatic(array("jstring" => $string));
        $this->layout->setLayout('layout/layout_main');
        $this->layout->view('index/index', $data);
    }
}
