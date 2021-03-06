<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class admin_portfolio_image extends MY_ControllerAdmin {

    const PAGE_TITLE = 'Portfolio Images';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portfolio_model');
        $this->load->model('image_upload_model');
    }

    /*
    * List
    */
    public function index ($page = 1)
    {
      	$limit = MY_ControllerAdmin::LIMIT;
        $count = $this->Portfolio_model
            ->listPorfolio(Portfolio_model::FLAG_IMAGE,'', '', '', '', '', true);

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
        $data['data'] = $this->Portfolio_model
            ->listPorfolio(Portfolio_model::FLAG_IMAGE, '', '', 'desc', $limit, $start, false);
        $this->layout->view('admin/portfolio_image/index', $data);
    }

    public function add($estatus = '')
    {
        if( $this->input->post() && $estatus == 'true') {

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
            redirect('admin_portfolio_image/index');
        }

        $baseLoading = getPublicUrl() .'/ci_image_upload/images/loading.gif';
        $stringJs = <<<EOT
        $(function () {
            $('#form').validate({
                submitHandler: function(form){
                    saveImagesToInput();
                    form.submit();
                }
            });
             
            // load gallery
            $('#file').on('change', function(e) {
                e.preventDefault();
                document.getElementById('imagePreview').innerHTML = 
                    '<img src="{$baseLoading}">';
                $("#imageform").ajaxForm({target: '#imagePreview'}).submit();
            });
            //               
                
        });
EOT;
        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;
        // plugin images
        $this->loadStatic(array('js' => '/ci_image_upload/js/jquery.form.js'));
        $this->loadStatic(array('js' => '/ci_image_upload/js/jquery-ui.min.js'));
        $this->loadStatic(array('css' => '/ci_image_upload/css/style.css'));
        // extra
        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));
        $this->loadStatic(array("jstring" => $stringJs));        
        
        $this->layout->view('admin/portfolio_image/add', $data);
    }


    public function edit($id = '', $estatus = '')
    {
        if( $this->input->post() && !empty($id) && $estatus == 'true') {
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
            redirect('admin_portfolio_image/index');
        }

        $baseLoading = getPublicUrl() .'/ci_image_upload/images/loading.gif';
        $stringJs = <<<EOT
        $(function () {
            // 02 - validate
            $('#form').validate({
                submitHandler: function(form){
                    form.submit();
                }
            });
                
            // load gallery
            $('#file').on('change', function(e) {
                e.preventDefault();
                document.getElementById('imagePreview').innerHTML = 
                    '<img src="{$baseLoading}">';
                $("#imageform").ajaxForm({target: '#imagePreview'}).submit();
            });
            //

        });

EOT;

        $this->load->model('image_upload_model');

        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;
        $data['dataImages'] = $this->image_upload_model->getAll();

        if (!empty($id)) {
            $this->session->set_userdata('portfolio',''); // LIMPIAR IMAGEN
            $data['data'] = $this->Portfolio_model->get($id);
        }
        // plugin images
        $this->loadStatic(array('js' => '/ci_image_upload/js/jquery.form.js'));
        $this->loadStatic(array('js' => '/ci_image_upload/js/jquery-ui.min.js'));
        $this->loadStatic(array('css' => '/ci_image_upload/css/style.css'));

        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));

        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/portfolio_image/edit', $data);
    }

    public function del($id = '', $estatus = '')
    {
        $data['page_title'] = self::PAGE_TITLE;
        $data['id'] = $id;
        if( !empty($id) && $estatus == 'true') {
            $this->Portfolio_model->del($id);
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Eliminated ".self::PAGE_TITLE.". Id (<b>$id</b>)");
            redirect('admin_portfolio_image/index');
        }
        $this->layout->view('admin/portfolio_image/del', $data);
    }
}
