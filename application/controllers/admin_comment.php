<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_comment extends MY_ControllerAdmin {
    
    const PAGE_TITLE = 'Comments';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Comment_model');
        $this->load->model('Post_model');
    }

    /*
    * List all comment by IDPOST
    */
    public function comment ($idPost='', $page = 1)
    {   
        if (!empty($idPost) && is_int( (int)$idPost)) {
            $limit = 2; //MY_ControllerAdmin::LIMIT;
            $count = $this->Comment_model->listComment($idPost, '', '', '', '', true);

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

            $data['page_title'] = self::PAGE_TITLE;        
            $data['data'] = $this->Comment_model->listComment($idPost, '', '', $limit, $start, false);
            $data['idPost'] = $idPost;
            $data['post'] = $this->Post_model->get($idPost, $post_type = Post_model::TIPO_POST, $status='');

            $this->layout->view('admin/comment/comment', $data);            
        }
    }
        
    public function commentdel($id = '', $estatus = '')
    {   
        $data['page_title'] = self::PAGE_TITLE;
        $data['id'] = $id;
        if( !empty($id) && $estatus == 'true') {
            $this->Comment_model->del($id);
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Eliminated ".self::PAGE_TITLE.". Id (<b>$id</b>)");  
            redirect('admin_post/post');
        }        
        $this->layout->view('admin/comment/commentdel', $data);    
       
    }
    
    public function commentedit($id='')
    {
        echo "comment edit"; exit;
        
    }
}