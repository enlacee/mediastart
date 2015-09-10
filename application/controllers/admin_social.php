<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_social extends MY_ControllerAdmin {

    const PAGE_TITLE = 'SOCIAL';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Social_model');
        $this->load->model('Category_model');
    }

    /*
    * List all post
    */
    public function index ($page = 1)
    {
      	$limit = MY_ControllerAdmin::LIMIT;
        $count = $this->Social_model->listPartner('', '', '', '', true);

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
        $data['data'] = $this->Social_model->listPartner('', 'desc', $limit, $start, false);

        $this->layout->view('admin/social/index', $data);
    }

    /**
     *
     * @param String $estatus
     */
    public function add($estatus = '')
    {
        if( $this->input->post() && $estatus == 'true') {

            $dataPost['name'] = $this->input->post('name');
            $dataPost['url_image'] = $this->input->post('url_image');
            $dataPost['link_image'] = $this->input->post('link_image');
            $dataPost['status'] = Social_model::STATUS_TRUE;
            $dataPost['created_at'] = date('Y-m-d H:i:s');
            $this->Social_model->add($dataPost);
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Added  correctly ".self::PAGE_TITLE);
            redirect('admin_social/index');
        }

        $base_url = base_url("admin_partner/upload");
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
        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/social/add', $data);
    }

    /**
     * Double function
     * @param type $id
     * @param type $estatus
     */
    public function edit($id = '', $estatus = '')
    {
        if( $this->input->post() && !empty($id) && $estatus == 'true') {
            $dataPost['name'] = $this->input->post('name');
            $dataPost['link_image'] = $this->input->post('link_image');
            $dataPost['status'] = $this->input->post('status');
            $dataPost['updated_at'] = date('Y-m-d H:i:s');

            $dataPost['url_image'] = $this->input->post('url_image');
            $this->Social_model->update($id, $dataPost);
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "updated correctly " . strtolower(Admin_social::PAGE_TITLE) . ". Id (<b>$id</b>)");
            redirect('admin_social/index');
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
            $this->session->set_userdata('partner',''); // LIMPIAR IMAGEN
            $data['data'] = $this->Social_model->get($id);

        }

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));
        $this->loadStatic(array('js' => '/js/validate/messages_es.js'));

        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/social/edit', $data);
    }

    public function del($id = '', $estatus = '')
    {
        $data['page_title'] = self::PAGE_TITLE;
        $data['id'] = $id;
        if( !empty($id) && $estatus == 'true') {
            $this->Social_model->del($id);
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Eliminated ".self::PAGE_TITLE.". Id (<b>$id</b>)");
            redirect('admin_social/index');
        }
        $this->layout->view('admin/social/del', $data);
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
        $dataSession['partner']['img_tmp'] =  array(
            'id' => $id,
            'name' => $fileName,
            'path' =>  $path,
            'url' => $url
        );
        $this->saveSession($dataSession);
    }





}
