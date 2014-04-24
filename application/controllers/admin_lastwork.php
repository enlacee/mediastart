<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_lastwork extends MY_ControllerAdmin {
    
    const PAGE_TITLE = 'Last Work';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Work_model');
    }

    public function index($page = 1)
    {
      	$limit = MY_ControllerAdmin::LIMIT;
        $count = $this->Work_model->listWork('', '', '', '', true);
        
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
        $data['data'] = $this->Work_model->listWork('', 'desc', $limit, $start, false);
        
        $this->layout->view('admin/lastwork/index', $data);
    }
    
    /**
     * Double function
     * @param type $id
     * @param type $estatus
     */
    public function add($estatus = '')
    {  
        
        if( $this->input->post() && $estatus == 'true') {            
            // update imagen of session
            $dataSession = $this->session->userdata('work');
            $imgTmp = is_array($dataSession['img_tmp']) ? $dataSession['img_tmp'] : '';
            if (!empty($imgTmp)) {                                
                $targetFile = $this->load->get_var('ourTeamPath') . $imgTmp['name'];
                if (!copy($imgTmp['path'], $targetFile)) { log_message("error", "failed to copy"); }
                $dataPost['url_image'] = $imgTmp['name'];
                $this->session->set_userdata('work',''); // LIMPIAR IMAGEN
            }else{
                $dataPost['url_image'] = 'image.jpg';
            }

            $dataPost ['title'] = $this->input->post('title');
            $dataPost ['description'] = $this->input->post('editor');
            $dataPost ['status'] = Work_model::STATUS_TRUE;
            $dataPost ['created_at'] = date('Y-m-d H:i:s');
            $this->Work_model->add($dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "updated correctly Work.");  
            redirect('admin_lastwork/index');
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
                    title: {required : true, minlength: 3, maxlength: 50}
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
                url : "/admin_lastwork/upload",                              
                //theme : 'bootstrap',
                multi : false,                
                allowedExtensions : "jpeg|jpg|png|gif",
                onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")},
                onFileSuccess : function (file, data) { }
            }); 
                
        });

EOT;
        
        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;
        if (!empty($id)) {
            $this->session->set_userdata('work',''); // LIMPIAR IMAGEN
            $data['data'] = $this->Work_model->get($id);
        }

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));        
        
        $this->loadStatic(array('js' => '/editor/scripts/innovaeditor.js'));
        $this->loadStatic(array('js' => '/editor/scripts/innovamanager.js'));
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/lastwork/add', $data);
    }    
    
    /**
     * Double function
     * @param type $id
     * @param type $estatus
     */
    public function edit($id = '', $estatus = '')
    {
        if( $this->input->post() && !empty($id) && $estatus == 'true') {            
            // update imagen of session
            $dataSession = $this->session->userdata('work');
            $imgTmp = is_array($dataSession['img_tmp']) ? $dataSession['img_tmp'] : '';
            if (!empty($imgTmp)) {                                
                $targetFile = $this->load->get_var('ourTeamPath') . $imgTmp['name'];
                if (!copy($imgTmp['path'], $targetFile)) { log_message("error", "failed to copy"); }
                $dataPost['url_image'] = $imgTmp['name'];
                $this->session->set_userdata('work',''); // LIMPIAR IMAGEN
            }

            $dataPost ['title'] = $this->input->post('title');
            $dataPost ['description'] = $this->input->post('editor');
            $dataPost ['status'] = $this->input->post('status');
            $dataPost ['updated_at'] = date('Y-m-d H:i:s');
            $this->Work_model->update($id, $dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "updated correctly Work. Id (<b>$id</b>)");  
            redirect('admin_lastwork/index');
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
                    title: {required : true, minlength: 3, maxlength: 50}
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
                url : "/admin_lastwork/upload/$id",                              
                //theme : 'bootstrap',
                multi : false,                
                allowedExtensions : "jpeg|jpg|png|gif",
                onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")},
                onFileSuccess : function (file, data) { }
            }); 
                
        });

EOT;
        
        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;
        if (!empty($id)) {
            $this->session->set_userdata('work',''); // LIMPIAR IMAGEN
            $data['data'] = $this->Work_model->get($id);
        }

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));        
        
        $this->loadStatic(array('js' => '/editor/scripts/innovaeditor.js'));
        $this->loadStatic(array('js' => '/editor/scripts/innovamanager.js'));
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/lastwork/edit', $data);
    }
    
    public function del($id = '', $estatus = '')
    {   
        $data['page_title'] = self::PAGE_TITLE;
        $data['id'] = $id;
        if( !empty($id) && $estatus == 'true') {
            $this->Work_model->del($id);
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Eliminated work. Id (<b>$id</b>)");  
             redirect('admin_lastwork/index');
        }
        $this->layout->view('admin/lastwork/del', $data);        
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
        $dataSession['work']['img_tmp'] =  array(
            'id' => $id,
            'name' => $fileName,
            'path' =>  $path,
            'url' => $url
        );
        $this->saveSession($dataSession);
    }    

}