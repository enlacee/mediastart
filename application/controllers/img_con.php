<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class img_con extends MY_ControllerAdmin {

    const PAGE_TITLE = 'GALLERY';

    function __construct() {
        parent::__construct();
        $this->load->model('image_upload_model');
        $this->load->library('image_lib');
        $this->load->helper(array('form', 'url'));
        $this->load->library('image_moo');
    }

    public function index() {

        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;
        //$this->loadStatic(array('js' => '/ci_image_upload/js/jquery.min.js'));
        $this->loadStatic(array('js' => '/ci_image_upload/js/jquery.form.js'));
        $this->loadStatic(array('js' => '/ci_image_upload/js/jquery-ui.min.js'));
        $this->loadStatic(array('css' => '/ci_image_upload/css/style.css'));
        //$this->loadStatic(array("jstring" => $stringJs));

        $data['data'] = $this->image_upload_model->getAll();

        $this->layout->view('admin/gallery/index', $data);
    }

    // This Function For View Front Page For All Functionality.
    public function upload() {
        $this->load->view('uploadimage');
    }

    // This Image Uploading Function Works For Image Upload, Drag and Drop,and Sort Functionality.
    public function imageUploaing() {
        //
        $path = FCPATH .'public/ci_image_upload/upload/';
        $pathUrl = getPublicUrl() . "/ci_image_upload/upload/";
        //

        //$path = './upload/';
        $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP", "PNG");
        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" and ( $_FILES)) {
            $name = time() . '_' . $_FILES['photoimg']['name'];
            $name = str_replace(' ', '_', $name);
            $size = $_FILES['photoimg']['size'];
            if (strlen($name)) {
                list($txt, $ext) = explode(".", $name);
                if (in_array($ext, $valid_formats)) {
                    if ($size < (1024 * 1024 * 2)) {
                        $tmp = $_FILES['photoimg']['tmp_name'];
                        if (move_uploaded_file($tmp, $path . $name)) {
                            $imgPath = $pathUrl. $name; //$this->config->item('base_url') . "upload/" . $name;

                            $an_imgPath = 'this,"' . $name . '"';

                            // Store Image Path and Size in Database.
                            $img_data = array('image_path' => $imgPath, 'image_size' => $size);
                            $id = $this->image_upload_model->insert_image($img_data);

                            $data = uniqid();
                            echo "<script>var img=$('<div id= $data class=preview><a id=close class= $data onclick=delete_img(" . $an_imgPath . ");></a><img id = dynamic src=$imgPath width=100px height=100px/></div>');
     $(document.createElement('img'));
     img.appendTo('#asd').slideUp(400, function() {
        $(this).show();
    });
     </script>";
                        } else
                            echo "Image Upload Failed.";
                    } else
                        echo "Maximum Image size should be 2MB.";
                } else
                    echo "Invalid file format.";
            }
            exit;
        }
    }

    // This Delete Function Works For Image Upload, Drag and Drop,and Sort Functionality.
    public function delete_img() {
        $src_url = $this->input->post('src_url');
        $path = FCPATH .'public/ci_image_upload/upload/';
        $path_url = getPublicUrl() . "/ci_image_upload/upload/";

        $img_path = $path . $this->input->post('src_url');
        unlink($img_path);
        $result = $this->image_upload_model->delete_image($path_url . $src_url);
        echo "delete";
    }
}

?>
