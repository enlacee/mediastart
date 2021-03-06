<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_portfolio extends MY_ControllerAdmin {

    const PAGE_TITLE = 'Portfolio Video';

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
        $count = $this->Portfolio_model
            ->listPorfolio(Portfolio_model::FLAG_VIDEO,'', '', '', '', '', true);

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
            ->listPorfolio(Portfolio_model::FLAG_VIDEO,'', '', 'desc', $limit, $start, false);
        $this->layout->view('admin/portfolio/index', $data);
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
            $dataPost ['flag'] = $this->input->post('flag');
            $this->Portfolio_model->add($dataPost);
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Added  correctly ".self::PAGE_TITLE);
            redirect('admin_portfolio/index');
        }

        $base_url = base_url("admin_portfolio/upload");
        $baseLoading = getPublicUrl() .'/ci_image_upload/images/loading.gif';
        $stringJs = <<<EOT
        $(function () {
            // 02 - validate
            $('#form').validate({
                submitHandler: function(form){
                    saveImagesToInput();
                    form.submit();
                }
            });

            // ----------- listener  00 key up -----------
            $( "#url_video" ).keyup(function() {
                var idVideo = $(this).val();
                var res = idVideo.split("/");
                getImageVimeo(res[(res.length-1)]);
            });
            function getImageVimeo(idVideo){
                if (idVideo.length > 0) {
                    $("#url_image_link").val('');
                    var url = 'http://vimeo.com/api/v2/video/'+idVideo+'.json';
                    $.getJSON( url, function( data ) {
                        data = data[0];
                        $("#url_image_link").val(data.thumbnail_large);
                    });
                }
            }

            // load gallery
            $('#file').on('change', function(e) {
                if (counterImages == 0) {
                    e.preventDefault();
                    document.getElementById('imagePreview').innerHTML =
                        '<img src="{$baseLoading}">';
                    var options = {
                        target: '#imagePreview',
                        success: function(rs) {
                            if (rs == 'Invalid file format.') {counterImages--;}
                        }
                    };
                    $("#imageform").ajaxForm(options).submit();
                    counterImages++;
                } else {
                    alert("Solo puedes subir 1 imagen.");
                }
            });

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

        $this->layout->view('admin/portfolio/add', $data);
    }


    public function scriptAddEdit() {


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
            redirect('admin_portfolio/index');
        }

        $baseLoading = getPublicUrl() .'/ci_image_upload/images/loading.gif';
        $base_url = base_url("admin_portfolio/upload/{$id}");
        $stringJs = <<<EOT
        $(function () {
            // 02 - validate
            $('#form').validate({
                submitHandler: function(form){
                    saveImagesToInput();
                    form.submit();
                }
            });

            // ----------- listener  00 key up -----------
            $( "#url_video" ).keyup(function() {
                var idVideo = $(this).val();
                var res = idVideo.split("/");
                getImageVimeo(res[(res.length-1)]);
            });
            function getImageVimeo(idVideo){
                if (idVideo.length == 8) {
                    $("#url_image_link").val('');
                    var url = 'http://vimeo.com/api/v2/video/'+idVideo+'.json';
                    $.getJSON( url, function( data ) {
                        data = data[0];
                        $("#url_image_link").val(data.thumbnail_large);
                    });
                }
            }
            // load gallery
            $('#file').on('change', function(e) {
                if (counterImages == 0) {
                    e.preventDefault();
                    document.getElementById('imagePreview').innerHTML =
                        '<img src="{$baseLoading}">';
                    var options = {
                        target: '#imagePreview',
                        success: function(rs) {
                            if (rs == 'Invalid file format.') {counterImages--;}
                        }
                    };
                    $("#imageform").ajaxForm(options).submit();
                    counterImages++;
                } else {
                    alert("Solo puedes subir 1 imagen.");
                }
            });
        });

EOT;

        $this->load->model('image_upload_model');

        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;
        $data['dataImages'] = $this->image_upload_model->getAll();

        if (!empty($id)) {
            $this->session->set_userdata('portfolio','');
            $data['data'] = $this->Portfolio_model->get($id);
        }
        // plugin images
        $this->loadStatic(array('js' => '/ci_image_upload/js/jquery.form.js'));
        $this->loadStatic(array('js' => '/ci_image_upload/js/jquery-ui.min.js'));
        $this->loadStatic(array('css' => '/ci_image_upload/css/style.css'));

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
}
