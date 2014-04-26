<?php

class Index extends MY_Controller {
    
    const NUM_BANNER_HOME = 5;
    const NUM_LAST_NEW = 5;


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
        $this->load->model('Our_team_model');
        
        $banner = $this->Banner_model->listBanner(Banner_model::STATUS_TRUE, 'desc', self::NUM_BANNER_HOME);
        $latestNews = $this->Post_model->listPost('post', Post_model::STATUS_TRUE, 'desc', self::NUM_LAST_NEW);
        
        
        $data = array (
            'bannerSlide' => $banner,          
            'latestNews' => $latestNews
        );


        //$this->loadStatic(array('css' => '/css/anibal.css'));
        //$this->loadStatic(array('js' => '/js/anibal.js'));        
        //$this->loadStatic(array("jstring" => $string));
        $this->layout->setLayout('layout/layout_main');
        $this->layout->view('index/index', $data);
    }
}
