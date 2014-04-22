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
    
    public function postedit($id = '', $estatus = '')
    {
        if( $this->input->post() && !empty($id) && $estatus == 'true') {            
            $dataPost = array(
                'title' => $this->input->post('nombre'),
                'content' => $this->input->post('editor'),
            );
            $this->Post_model->update($id, Post_model::TIPO_POST, $dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "updated correctly last news. Id (<b>$id</b>)");  
            redirect('admin_post/post');
        }        
        
        $stringJs = <<<EOT
        $(function () {
            // 01 - editor
            $('#editor').liveEdit({
                height: 350,
                css: ['editor/bootstrap/css/bootstrap.min.css', 'editor/bootstrap/bootstrap_extend.css'] /* Apply bootstrap css into the editing area */,
                groups: [
                    ["group1", "", ["Bold", "Italic", "Underline", "ForeColor", "RemoveFormat"]],
                    ["group2", "", ["Bullets", "Numbering", "Indent", "Outdent"]],
                    ["group3", "", ["Paragraph", "FontSize", "FontDialog", "TextDialog"]],
                    ["group4", "", ["LinkDialog", "ImageDialog", "TableDialog", "Emoticons", "Snippets"]],
                    ["group5", "", ["Undo", "Redo", "FullScreen", "SourceDialog"]]
                    ] /* Toolbar configuration */
            });
            $('#editor').data('liveEdit').startedit();
                
            // 02 - validate                
            $('#form').validate({
                rules: {
                    nombre: {required : true, minlength: 3, maxlength: 100}
                  },
                      
                //Detecta cuando se realiza el submit o se presiona el boton
                submitHandler: function(){
                    $("#guardar").attr("type","button");
                    $( "#form" ).submit();
                    return false;
                },

                //Detecta los error y abre los span con los posibles errores
                errorPlacement: function(error, element){
                error.insertAfter(element);
                }
            });
                
            // 03 - img
            $("#file").pekeUpload({
                btnText : "Browse files...",
                //url : "/admin_banner/upload",
                url : "upload.php",                
                theme : 'bootstrap',
                allowedExtensions : "jpeg|jpg|png|gif",
                onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")}
            });
                
                
        });

EOT;
        
        $data['data'] = '';
        $data['page_title'] = 'Last News';
        if (!empty($id)) {
            $data['data'] = $this->Post_model->get($id, Post_model::TIPO_POST);
        }

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));
        $this->loadStatic(array('js' => '/js/validate/messages_es.js'));
        
        $this->loadStatic(array('js' => '/editor/scripts/innovaeditor.js'));
        $this->loadStatic(array('js' => '/editor/scripts/innovamanager.js'));
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/post/postedit', $data);
    }
    
    public function postdel($id = '', $estatus = '')
    {        
        $data['id'] = $id;
        if( !empty($id) && $estatus == 'true') {
            $this->Post_model->del($id, Post_model::TIPO_POST);
            $this->cleanCache();
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
