<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_portfolio extends MY_ControllerAdmin {
    
    const PAGE_TITLE = 'Portfolio';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portfolio_model');
    }

    /*
    * List
    */
    public function index ($page = 1)
    {
      	$limit = MY_ControllerAdmin::LIMIT;
        $count = $this->Portfolio_model->listPorfolio('', '', '', '', '', true);        
        
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
        $data['data'] = $this->Portfolio_model->listPorfolio('', '', 'desc', $limit, $start, false);
        $this->layout->view('admin/portfolio/index', $data);
    }
    
    public function add($estatus = '')
    {    
        if( $this->input->post() && $estatus == 'true') {
            // update imagen of session
            /*$dataSession = $this->session->userdata('portfolio');
            $imgTmp = (isset($dataSession['img_tmp']) && is_array($dataSession['img_tmp'])) ? $dataSession['img_tmp'] : '';
            if (!empty($imgTmp)) {                                
                $targetFile = $this->load->get_var('portfolioPath') . $imgTmp['name'];
                if (!copy($imgTmp['path'], $targetFile)) { log_message("error", "failed to copy"); }
                $dataPost['url_image'] = $imgTmp['name'];
                $this->session->set_userdata('portfolio',''); // LIMPIAR IMAGEN
            }else{
                $dataPost['url_image'] = 'image.jpg';
            }*/

            $dataPost ['title'] = $this->input->post('title');
            $dataPost ['category_id'] = $this->input->post('category_id');
            $dataPost ['url_video'] = $this->input->post('url_video');
            $dataPost ['url_image_link'] = $this->input->post('url_image_link');
            $dataPost ['url_image'] = $this->input->post('url_image');
            $dataPost ['status'] = Portfolio_model::STATUS_TRUE;
            $dataPost ['created_at'] = date('Y-m-d H:i:s');
            $this->Portfolio_model->add($dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Added  correctly ".self::PAGE_TITLE);  
            redirect('admin_portfolio/index');
        } 

        $base_url = base_url("admin_portfolio/upload");
        $stringJs = <<<EOT
        $(function () {                
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
                url : "{$base_url}",                               
                //theme : 'bootstrap',
                multi : false,                
                allowedExtensions : "jpeg|jpg|png|gif",
                onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")},
                onFileSuccess : function (file, data) {}
            });
                
            // ----------- listener  00 key up -----------
            $( "#url_video" ).keyup(function() {                  
                var idVideo = $(this).val();
                getImageVimeo(idVideo);
            });
            function getImageVimeo(idVideo){
                console.log('idVideo',idVideo);
                if (idVideo.length == 8) {
                    $("#url_image_link").val('');
                    var url = 'http://vimeo.com/api/v2/video/'+idVideo+'.json';
                    $.getJSON( url, function( data ) {
                        data = data[0];
                        $("#url_image_link").val(data.thumbnail_large);
                    });
                }
            }                
                
                
        });

EOT;
        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;            
        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));
        $this->loadStatic(array("jstring" => $stringJs));
        
        $this->layout->view('admin/portfolio/add', $data);
    }    
    
    
    public function edit($id = '', $estatus = '')
    {
        if( $this->input->post() && !empty($id) && $estatus == 'true') {            
            // update imagen of session
            /*$dataSession = $this->session->userdata('portfolio');
            $imgTmp = (isset($dataSession['img_tmp']) && is_array($dataSession['img_tmp'])) ? $dataSession['img_tmp'] : '';
            if (!empty($imgTmp)) {                                
                $targetFile = $this->load->get_var('portfolioPath') . $imgTmp['name'];
                if (!copy($imgTmp['path'], $targetFile)) { log_message("error", "failed to copy"); }
                $dataPost['url_image'] = $imgTmp['name'];
                $this->session->set_userdata('portfolio',''); // LIMPIAR IMAGEN
            }*/
            
            $dataPost ['title'] = $this->input->post('title');
            $dataPost ['category_id'] = $this->input->post('category_id');            
            $dataPost ['url_video'] = $this->input->post('url_video');
            $dataPost ['url_image_link'] = $this->input->post('url_image_link');
            $dataPost ['url_image'] = $this->input->post('url_image');
            $dataPost ['status'] = $this->input->post('status');
            $dataPost ['updated_at'] = date('Y-m-d H:i:s');
            $this->Portfolio_model->update($id, $dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "updated correctly ".self::PAGE_TITLE.". Id (<b>$id</b>)");  
            redirect('admin_portfolio/index');
        }        
        
        $base_url = base_url("admin_portfolio/upload/{$id}");
        $stringJs = <<<EOT
        $(function () {                
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
                url : "{$base_url}",                                
                //theme : 'bootstrap',
                multi : false,                
                allowedExtensions : "jpeg|jpg|png|gif",
                onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")},
                onFileSuccess : function (file, data) { }
            });
                
            // ----------- listener  00 key up -----------
            $( "#url_video" ).keyup(function() {                  
                var idVideo = $(this).val();
                getImageVimeo(idVideo);
            });
            function getImageVimeo(idVideo){
                console.log('idVideo',idVideo);
                if (idVideo.length == 8) {
                    $("#url_image_link").val('');
                    var url = 'http://vimeo.com/api/v2/video/'+idVideo+'.json';
                    $.getJSON( url, function( data ) {
                        data = data[0];
                        $("#url_image_link").val(data.thumbnail_large);
                    });
                }
            } 
                
        });

EOT;
        
        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;
        if (!empty($id)) {
            $this->session->set_userdata('portfolio',''); // LIMPIAR IMAGEN
            $data['data'] = $this->Portfolio_model->get($id);
            
        }

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));

        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/portfolio/edit', $data);
    }
    
    public function del($id = '', $estatus = '')
    {   
        $data['page_title'] = self::PAGE_TITLE;
        $data['id'] = $id;
        if( !empty($id) && $estatus == 'true') {
            $this->Portfolio_model->del($id);
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Eliminated ".self::PAGE_TITLE.". Id (<b>$id</b>)");  
            redirect('admin_portfolio/index');
        }
        $this->layout->view('admin/portfolio/del', $data);        
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
    }
    
    private function uploadSave($id, $fileName, $path, $url)
    {
        $dataSession['portfolio']['img_tmp'] =  array(
            'id' => $id,
            'name' => $fileName,
            'path' =>  $path,
            'url' => $url
        );
        $this->saveSession($dataSession);
    }    
        
    

}