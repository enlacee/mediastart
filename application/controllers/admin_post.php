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
        $limit = MY_ControllerAdmin::LIMIT;
        $count = $this->Post_model->listPost(Post_model::TIPO_POST,'', '', '', '',true);
        
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
        $data['data'] = $this->Post_model->listPost(Post_model::TIPO_POST, '', 'desc', $limit, $start, false);
        
        $this->layout->view('admin/post/post', $data);
    }
    
    public function postedit($id = '', $estatus = '')
    {
        if( $this->input->post() && !empty($id) && $estatus == 'true') {
            
            // update imagen of session
            $dataSession = $this->session->userdata('post'); //var_dump($dataSession); exit;
            $imgTmp = (isset($dataSession['img_tmp']) && is_array($dataSession['img_tmp'])) ? $dataSession['img_tmp'] : '';
            if (!empty($imgTmp)) {                                
                $targetFile = $this->load->get_var('latestNewsPath') . $imgTmp['name'];
                if (!copy($imgTmp['path'], $targetFile)) { /*echo "failed to copy";*/ }
                $dataPost['url_image'] = $imgTmp['name'];
                $this->session->set_userdata('post',''); // LIMPIAR IMAGEN
            }            
            

            $dataPost ['title'] = $this->input->post('nombre');
            $dataPost ['content'] = $this->input->post('editor');
            $dataPost ['status'] = $this->input->post('status');
            $dataPost ['updated_at'] = date('Y-m-d H:i:s');
            
            log_message('error','-- A GUARDAR--');
            log_message('error', print_r($dataPost,true));
            log_message('error','-- A GUARDAR fin--');

            $this->Post_model->update($id, Post_model::TIPO_POST, $dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "updated correctly last news. Id (<b>$id</b>)");  
            redirect('admin_post/post');
        }        
        
        $base_url = base_url("admin_post/upload/{$id}");
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
                submitHandler: function(form){
                    form.submit();
                },

                //Detecta los error y abre los span con los posibles errores
                errorPlacement: function(error, element){
                error.insertAfter(element);
                }
            });
                
            // 03 - img
            $("#file").pekeUpload({
                btnText : "Browse files...",
                url : "{$base_url}",
                data:{uno : "uno"},                
                //theme : 'bootstrap',
                multi : false,
                //showFilename : false,
                allowedExtensions : "jpeg|jpg|png|gif",
                onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")},
                onFileSuccess : function (file, data) {console.log('file',file); console.log('data',data); }
            });
                
                
        });

EOT;
        
        $data['data'] = '';
        $data['page_title'] = 'Last News';
        if (!empty($id)) {
            $this->session->set_userdata('post',''); // LIMPIAR IMAGEN
            $data['data'] = $this->Post_model->get($id, Post_model::TIPO_POST);
        }

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));
        
        $this->loadStatic(array('js' => '/editor/scripts/innovaeditor.js'));
        $this->loadStatic(array('js' => '/editor/scripts/innovamanager.js'));
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/post/postedit', $data);
    }
    
    public function postdel($id = '', $estatus = '')
    {   
        $data['page_title'] = 'Last News';
        $data['id'] = $id;
        if( !empty($id) && $estatus == 'true') {
            $this->Post_model->del($id, Post_model::TIPO_POST);
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Eliminated last news. Id (<b>$id</b>)");  
            redirect('admin_post/post');
        }
        $this->layout->view('admin/post/postdel', $data);        
    }    
    
    /**
     * 
     * @param String $estatus
     */
    public function postadd($estatus = '')
    {    
        if( $this->input->post() && $estatus == 'true') {            
            // update imagen of session
            $dataSession = $this->session->userdata('post');
            $imgTmp = (isset($dataSession['img_tmp']) && is_array($dataSession['img_tmp'])) ? $dataSession['img_tmp'] : '';
            if (!empty($imgTmp)) {                                
                $targetFile = $this->load->get_var('latestNewsPath') . $imgTmp['name'];
                if (!copy($imgTmp['path'], $targetFile)) { log_message("error", "failed to copy"); }
                $dataPost['url_image'] = $imgTmp['name'];
                $this->session->set_userdata('post',''); // LIMPIAR IMAGEN
            } else {
                $dataPost['url_image'] = 'image.jpg';
            }

            $dataPost ['title'] = $this->input->post('nombre');
            $dataPost ['content'] = $this->input->post('editor');
            $dataPost ['status'] = Post_model::STATUS_TRUE;
            $dataPost ['post_type'] = Post_model::TIPO_POST;            
            $dataPost ['created_at'] = date('Y-m-d H:i:s');
            $this->Post_model->add($dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Added  correctly Last News.");
            redirect('admin_post/post');
        } 

        $base_url = base_url('admin_post/upload');
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
                submitHandler: function(form){
                    form.submit();
                },

                //Detecta los error y abre los span con los posibles errores
                errorPlacement: function(error, element){
                error.insertAfter(element);
                }
            });
                
            // 03 - img
            $("#file").pekeUpload({
                btnText : "Browse files...",
                url : "{$base_url}",                               
                //theme : 'bootstrap',
                multi : false,                
                allowedExtensions : "jpeg|jpg|png|gif",
                onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")},
                onFileSuccess : function (file, data) { }
            });
                
                
        });

EOT;
        $data['data'] = '';
        $data['page_title'] = 'Last News';          
        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));
        
        $this->loadStatic(array('js' => '/editor/scripts/innovaeditor.js'));
        $this->loadStatic(array('js' => '/editor/scripts/innovamanager.js'));
        $this->loadStatic(array("jstring" => $stringJs));       
        
        $this->layout->view('admin/post/postadd', $data);
    }
    
    /**
     * 
     * @param type $id
     */
    public function upload($id = '')
    {
        $path = $this->load->get_var('tmpPath');
        $url = $this->load->get_var('tmpUrl');         
        
        if (!empty($path) && !empty($url)) {            
            $targetFolder = $path;
            if (!empty($_FILES)) {                
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = uniqueFileName($_FILES['file']['name']);
                
                $targetFile = rtrim($targetFolder,'/') . '/' . $fileName;
                $targetFileUrl = rtrim($url,'/') .'/'.$fileName;
                // Validate the file type
                $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
                $fileParts = pathinfo($_FILES['file']['name']);

                if (in_array($fileParts['extension'], $fileTypes)) {
                    move_uploaded_file($tempFile,$targetFile);
                    $this->uploadSave($id, $fileName, $targetFile, $targetFileUrl);
                    echo '1';
                } else {
                    echo 'Invalid file type.';
                }
            }
        }
        //$this->output->set_content_type('application/json');
        //$this->output->set_output(json_encode($responce));        
    }
    
    private function uploadSave($id, $fileName, $path, $url)
    {
        $dataSession['post']['img_tmp'] =  array(
            'id' => $id,
            'name' => $fileName,
            'path' =>  $path,
            'url' => $url
        );
        $this->saveSession($dataSession);
    }

    /**
     * 
     *  ------------------ PAGE ------------------
     * 
     * 
     */
    public function page($id='', $status='')
    {
        if( $this->input->post() && !empty($id) && $status == 'true') {            
            // update imagen of session
            $dataSession = $this->session->userdata('post'); //var_dump($dataSession); exit;
            $imgTmp = (isset($dataSession['img_tmp']) && is_array($dataSession['img_tmp'])) ? $dataSession['img_tmp'] : '';
            if (!empty($imgTmp)) {                                
                $targetFile = $this->load->get_var('latestNewsPath') . $imgTmp['name'];
                if (!copy($imgTmp['path'], $targetFile)) { log_message('error','failed to copy'); }
                $dataPost['url_image'] = $imgTmp['name'];
                $this->session->set_userdata('post',''); // LIMPIAR IMAGEN
            }

            $dataPost ['title'] = $this->input->post('nombre');
            $dataPost ['content'] = $this->input->post('editor');            
            $dataPost ['updated_at'] = date('Y-m-d H:i:s');

            $this->Post_model->update($id, Post_model::TIPO_PAGE, $dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "updated correctly Page. Id (<b>$id</b>)");  
            redirect('admin/dashboard');
        }       
        
        $base_url = base_url("admin_post/upload/{$id}");
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
                submitHandler: function(form){
                    form.submit();
                },

                //Detecta los error y abre los span con los posibles errores
                errorPlacement: function(error, element){
                error.insertAfter(element);
                }
            });
                
            // 03 - img
            $("#file").pekeUpload({
                btnText : "Browse files...",
                url : "{$base_url}",                               
                //theme : 'bootstrap',
                multi : false,                
                allowedExtensions : "jpeg|jpg|png|gif",
                onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")},
                onFileSuccess : function (file, data) { }
            }); 
                
        });
EOT;
        
        $data['data'] = '';
        $data['page_title'] = 'Page';
        if (!empty($id)) {
            $this->session->set_userdata('post',''); // LIMPIAR IMAGEN
            $data['data'] = $this->Post_model->get($id, Post_model::TIPO_PAGE);
            $data['page_title'] = $data['data']['title'];
        }

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));        
        
        $this->loadStatic(array('js' => '/editor/scripts/innovaeditor.js'));
        $this->loadStatic(array('js' => '/editor/scripts/innovamanager.js'));
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/post/page', $data);
    }
    
    
    
    

    /**
     * 
     *  ------------------ PAGE ABOUT------------------
     * 
     * 
     */    
    public function pageabout($id='', $status='')
    {
        if( $this->input->post() && !empty($id) && $status == 'true') {            
            // update imagen of session
            $dataSession = $this->session->userdata('post');
            $imgTmp = (isset($dataSession['img_tmp']) && is_array($dataSession['img_tmp'])) ? $dataSession['img_tmp'] : '';
            if (!empty($imgTmp)) {                                
                $targetFile = $this->load->get_var('latestNewsPath') . $imgTmp['name'];
                if (!copy($imgTmp['path'], $targetFile)) { log_message('error','failed to copy'); }
                $dataPost['url_image'] = $imgTmp['name'];
                $this->session->set_userdata('post',''); // LIMPIAR IMAGEN
            }

            $dataPost ['title'] = $this->input->post('nombre');
            $dataPost ['content'] = $this->input->post('editor');
            $dataPost ['content_1'] = $this->input->post('editor_1');
            $dataPost ['content_2'] = $this->input->post('editor_2');
            $dataPost ['content_3'] = $this->input->post('editor_3');
            $dataPost ['content_4'] = $this->input->post('editor_4');
            $dataPost ['content_5'] = $this->input->post('editor_5');
            $dataPost ['content_6'] = $this->input->post('editor_6');
            $dataPost ['content_7'] = $this->input->post('editor_7');
            $dataPost ['content_8'] = $this->input->post('editor_8');
            $dataPost ['content_9'] = $this->input->post('editor_9');
            
            $dataPost ['title_1'] = $this->input->post('nombre_1');
            $dataPost ['title_2'] = $this->input->post('nombre_2');
            $dataPost ['title_3'] = $this->input->post('nombre_3');
            $dataPost ['title_4'] = $this->input->post('nombre_4');
            $dataPost ['title_5'] = $this->input->post('nombre_5');
            $dataPost ['title_6'] = $this->input->post('nombre_6');
            $dataPost ['title_7'] = $this->input->post('nombre_7');
            $dataPost ['title_8'] = $this->input->post('nombre_8');
            $dataPost ['title_9'] = $this->input->post('nombre_9');            
            $dataPost ['updated_at'] = date('Y-m-d H:i:s');

            $this->Post_model->update($id, Post_model::TIPO_PAGE_ABOUT, $dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "updated correctly Page About. Id (<b>$id</b>)");  
            redirect('admin/dashboard');
        }        
        
        $base_url = base_url("admin_post/upload/{$id}");
        $stringJs = <<<EOT
        ;$(function () {
            // 01 - img
            $("#file").pekeUpload({
                btnText : "Browse files...",
                url : "{$base_url}",                               
                //theme : 'bootstrap',
                multi : false,                
                allowedExtensions : "jpeg|jpg|png|gif",
                onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")},
                onFileSuccess : function (file, data) { }
            });
                
            // 02 plugin editor nicEditors
            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
            
        });
EOT;
        
        $data['data'] = '';
        $data['page_title'] = 'Page About';
        if (!empty($id)) {
            $this->session->set_userdata('post',''); // LIMPIAR IMAGEN
            $data['data'] = $this->Post_model->get($id, Post_model::TIPO_PAGE_ABOUT);
            $data['page_title'] = $data['data']['title'];
        }

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));

        $this->loadStatic(array('js' => '/js/nicEdit/nicEdit.js'));
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/post/pageabout', $data);
    }
    
}
