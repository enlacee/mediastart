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
            $limit = MY_ControllerAdmin::LIMIT;
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
    
    
    public function commentedit($id = '', $estatus = '')
    {
        if( $this->input->post() && !empty($id) && $estatus == 'true') {
            
            $dataPost ['name'] = $this->input->post('name');
            $dataPost ['email'] = $this->input->post('email');
            $dataPost ['comment'] = $this->input->post('comment');
            $dataPost ['status'] = $this->input->post('status');
            $dataPost ['updated_at'] = date('Y-m-d H:i:s');
            $this->Comment_model->update($id, $dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Update ".self::PAGE_TITLE.". Id (<b>$id</b>)");   
            redirect('admin_post/post');
        }        
        
        $stringJs = <<<EOT
        $(function () {                
            // 02 - validate                
            $('#form').validate({
                rules: {
                    name: {required : true, minlength: 3, maxlength: 50}
                  },
                      
                //Detecta cuando se realiza el submit o se presiona el boton
                submitHandler: function(form){
                    form.submit();
                },

                //Detecta los error y abre los span con los posibles errores
                errorPlacement: function(error, element){
                error.insertAfter(element);
                }
            });
                
        });

EOT;
        
        
        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;
        if (!empty($id)) {
            $data['data'] = $this->Comment_model->get($id);            
        }

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));
        
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/comment/commentedit', $data);
    }    
    
}