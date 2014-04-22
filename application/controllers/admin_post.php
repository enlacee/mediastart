<?php

$file = FCPATH . "application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_post extends MY_ControllerAdmin {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
    }

    /*
     * List all post
     */
    public function post($page = 1)
    {
        $limit = 3;
        $count = $this->Post_model->listPost(Post_model::TIPO_POST, '', '', '',true);
        
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
        
        $data['page_title'] = 'Last News';
        $data['data'] = $this->Post_model->listPost(Post_model::TIPO_POST, 'desc', $limit, $start, false);
        
        $this->layout->view('admin/post/post', $data);
    }
    
    public function postedit($id = '')
    {
        $data['data'] = '';        
        if (!empty($id)) {
            $data['data'] = $this->Post_model->get($id, Post_model::TIPO_POST);
        }        
        $this->layout->view('admin/post/postedit', $data);
    }
    
    public function postdel($id = '', $estatus = '')
    {        
        $data['id'] = $id;
        if( !empty($id) && $estatus == 'true') {
            $this->Post_model->del($id, Post_model::TIPO_POST);
            $this->clearCache();
            $this->session->set_flashdata('flashMessage', "Eliminated last news. Id (<b>$id</b>)");  
            redirect('admin_post/post');
        }
        $this->layout->view('admin/post/postdel', $data);        
    }    
    
    public function postadd()
    {
        $data = array();
        $this->layout->view('admin/post/postadd', $data);
    }     


    /*
     * List all Page
     */
    public function page() {
        $data = array();
        $this->layout->view('admin/post/page', $data);
    }

    /*
     * List all PageAbout
     */
    public function pageabout() {
        $data = array();
        $this->layout->view('admin/post/pageabout', $data);
    }

}
