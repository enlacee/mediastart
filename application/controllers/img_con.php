<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class img_con extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('image_upload_model');
        $this->load->library('image_lib');
        $this->load->helper(array('form', 'url'));
        $this->load->library('image_moo');
    }

    public function index() {
        $this->load->view('img_view');
    }

    // This Function For View Front Page For All Functionality.
    public function upload() {
        $this->load->view('uploadimage');
    }

    // This Image Uploading Function Works For Image Upload, Drag and Drop,and Sort Functionality.
    public function imageUploaing() {
        $path = './upload/';
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
                            $imgPath = $this->config->item('base_url') . "upload/" . $name;
                            $an_imgPath = 'this,"' . $imgPath . '"';

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
        $img_url = $this->input->post('src_url');
        $img_path = str_replace("http://localhost/", "C:/wamp/www/", $img_url);
        //$img_path =  str_replace("http://www.aorank.com/", "/var/www/", $img_url);
        unlink($img_path);
        $result = $this->image_upload_model->delete_image($img_url);
        echo "delete";
    }

    //Function For Image Sort.
    public function img_Sorting() {
        $this->load->view('img_view_sorting');
    }

    //function for image water mark
    public function image_upload_watermark() {
        $this->load->view('ci_watermark_view');
    }

    // This Function Call From Ajax to Store Image in Folder and after View.
    public function img_watermark() {
        $path = './upload/original/';
        $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "PNG", "JPG", "JPEG", "GIF", "BMP", "PNG");
        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            $name = time() . '_' . $_FILES['photoimg']['name'];
            $name = str_replace(' ', '_', $name);
            $size = $_FILES['photoimg']['size'];
            if (strlen($name)) {
                list($txt, $ext) = explode(".", $name);
                if (in_array($ext, $valid_formats)) {
                    if ($size < (1024 * 1024 * 2)) {
                        $tmp = $_FILES['photoimg']['tmp_name'];
                        if (move_uploaded_file($tmp, $path . $name)) {
                            $original_Path = $this->config->item('base_url') . "upload/original/" . $name;

                            // Call Water_marking Function
                            $data = array('name' => $name, 'path' => $original_Path);
                            $watermark_img = $this->water_marking($data);
                            $imgPath = $watermark_img['watermark_path'];
                            $an_imgPath = 'this,"' . $imgPath . '"';

                            // Store Original Image Path and Size in Database.
                            $img_data = array('original_image_path' => $original_Path, 'image_size' => $size, 'watermark_img_path' => $imgPath);
                            $id = $this->image_upload_model->insert_watermark_image($img_data);
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

    // Water Mark Manipulation.
    public function water_marking($image_data) {
        $path = $image_data['path'];
        $img = $image_data['name'];
        $original = str_replace("http://localhost/", "C:/wamp/www/", $path);
        $config['image_library'] = 'gd2';
        $config['source_image'] = $original;
        $config['wm_text'] = "FormGet.com All rights reserved.";
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './system/fonts/texb.ttf';
        $config['wm_font_size'] = '14';
        $config['wm_font_color'] = '#ffffff';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_vrt_alignment'] = 'middle';
        $config['new_image'] = './upload/watermark/' . $img;
        $this->image_lib->initialize($config);
        $src = $config['new_image'];
        $data['watermark_image'] = substr($src, 2);
        $data['watermark_path'] = base_url() . $data['watermark_image'];
        // Call watermark function in image library.
        $this->image_lib->watermark();
        // Return new image contains above properties and also store in "upload/watermark" folder.
        return $data;
    }

    // Delete Watermark Image and Original Image From its Folder and Database.
    public function watermark_delete_img() {
        $img_url = $this->input->post('src_url');
        $orignal_path = str_replace("watermark", "original", $img_url);
        $img_path = str_replace("http://localhost/", "C:/wamp/www/", $img_url);
        unlink($img_path);
        $orignal_img = str_replace("http://localhost/", "C:/wamp/www/", $orignal_path);
        unlink($orignal_img);
        // Database Delete Function
        $result = $this->image_upload_model->watermark_image_delete($img_url);
        echo "delete";
    }

    //Function for Image Rotation.
    public function image_upload_rotate() {
        $this->load->view('ci_rotate_view');
    }

    // This Function Call From Ajax to Store Image in Folder and View.
    public function image_rotate() {
        $path = './upload/original_r/';
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
                            $imgPath = $this->config->item('base_url') . "upload/original_r/" . $name;
                            $an_imgPath = 'this,"' . $imgPath . '"';
                            $attr_this = 'this,"';
                            $attr_name = '","' . $name . '"';
                            $img_data = array('original_image_path' => $imgPath, 'image_size' => $size);
                            $id = $this->image_upload_model->rotate_image_insert($img_data);
                            $data = uniqid();
                            echo "<script>var img=$('<div id= $data class=preview><img id = dynamic class=$data src=$imgPath width=100px height=100px/><a id=close class= $data onclick=rotate_delete_img(" . $an_imgPath . ");></a><a id=rotate_img class= $data onclick=rotate_img(" . $attr_this . $imgPath . $attr_name . ");></a></div>');
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

    // Rotate Manipulation.
    public function rotate() {
        $img_name = $this->input->post('name');
        $img_path = $this->input->post('path');
        $img_path = str_replace("http://localhost/", "C:/wamp/www/", $img_path);
        $config['image_library'] = 'gd2';
        $config['source_image'] = $img_path;
        $config['rotation_angle'] = 90;
        $config['quality'] = "90%";
        $config['new_image'] = './upload/rotate/' . $img_name;
        //send config array to image_lib's  initialize function
        $this->image_lib->initialize($config);
        $src = $config['new_image'];
        $data['rot_image'] = substr($src, 2);
        $data['rot_image'] = base_url() . $data['rot_image'];
        // Call rotate function in image library.
        $this->image_lib->rotate();
        // Return new image contains above properties and also store in "upload/rotate" folder.
        $rotate = $data['rot_image'];
        $original_path = str_replace("rotate", "original_r", $rotate);
        $data = array('original_image_path' => $original_path, 'rotate_image_path' => $rotate);

        // Update rotate image in Database
        $this->image_upload_model->rotate_image($original_path, $data);
        echo $rotate;
    }

    // Delete Rotate and Original Image From its Folder and Database.
    public function rotate_delete_img() {
        $img_url = $this->input->post('src_url');
        $rotate_path = str_replace("original_r", "rotate", $img_url);
        // Database Delete Function
        $this->image_upload_model->rotate_image_delete($img_url);
        $img_path = str_replace("http://localhost/", "C:/wamp/www/", $img_url);
        unlink($img_path);
        $rotate_img = str_replace("http://localhost/", "C:/wamp/www/", $rotate_path);
        unlink($rotate_img);
    }

    //Functions for Image Rotation.

    public function ci_crop_image() {
        $this->load->view('ci_crop_view');
    }

    public function update_crop_image() {
        if ($this->input->post("submit")) {
// Use "upload" library to select image, and image will store in root directory "uploads" folder.
            $config = array(
                'upload_path' => "upload/original_crop/",
                'upload_url' => base_url() . "upload/original_crop/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf"
            );
            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
//If image upload in folder, set also this value in "$image_data".
                $image_data = $this->upload->data();
            }
        }

        $file_name = $this->input->post('userfile', TRUE);
        if (isset($image_data)) {
            $resize_img = $this->resize($image_data);
        } else {
            $image_data = array(
                'file_name' => 'default.png',
                'file_type' => 'image/jpeg',
                'file_path' => 'C:/wamp/www/ci_image_upload/upload/original_crop/',
                'full_path' => 'C:/wamp/www/ci_image_upload/upload/original_crop/default.png',
                'raw_name' => 'default',
                'orig_name' => 'default.png',
                'client_name' => 'default.png',
                'file_ext' => '.png'
            );
            $resize_img = $this->resize($image_data);
        }
        // Store Image Path and Size in Database.
        $original_path = str_replace("C:/wamp/www/", "http://localhost/", $image_data['full_path']);
        $img_data = array('original_img_path' => $original_path);
        $this->image_upload_model->crop_image_insert($img_data);

        $x1 = $this->input->post('X1', TRUE);
        $y1 = $this->input->post('Y1', TRUE);
        $width = $this->input->post('W', TRUE);
        $height = $this->input->post('H', TRUE);

        $crop_img = $this->crop($resize_img, $x1, $y1, $width, $height);

        $this->load->view('ci_crop_view', $crop_img);
    }

    // crop manipulation
    public function crop($resize_img, $x1, $y1, $width, $height) {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $resize_img['new_image'];
        $config['x_axis'] = $x1;
        $config['y_axis'] = $y1;
        $config['maintain_ratio'] = false;
        $config['width'] = $width;
        $config['height'] = $height;
        $config2['quality'] = 100;
        $config['new_image'] = './upload/crop/' . $resize_img['name'];

        //send config array to image_lib's  initialize function
        $this->image_lib->initialize($config);
        $src = $config['new_image'];
        $data['crop_image'] = substr($src, 2);
        $data['crop_image'] = base_url() . $data['crop_image'];

        // Call crop function in image library.
        $this->image_lib->crop();

        // Update rotate image in Database

        $orignal_path = str_replace("resize_crop", "original_crop", $resize_img['new_image']);
        $orignal_path = base_url() . $orignal_path;
        $update_data = array('original_img_path' => $orignal_path, 'crop_img_path' => $data['crop_image']);
        $this->image_upload_model->crop_image_update($orignal_path, $update_data);
        return $data;
    }

    // Resize Manipulation for exact crop.
    public function resize($image_data) {
        $img = $image_data['file_name'];
        $config['image_library'] = 'gd2';
        $config['source_image'] = $image_data['full_path'];
        $config['new_image'] = './upload/resize_crop/' . $img;
        $config['width'] = 300;
        $config['height'] = 300;
        $config['maintain_ratio'] = FALSE;
//send config array to image_lib's  initialize function
        $this->image_lib->initialize($config);
        $src = $config['new_image'];
        $data['new_image'] = substr($src, 2);
        $data['img_src'] = base_url() . $data['new_image'];
        $data['name'] = $img;
// Call resize function in image library.
        $this->image_lib->resize();
// Return new image contains above properties and also store in "uplods" folder.
        return $data;
    }

    //Function for Image Rotation.
    public function ci_resize_image() {
        $this->load->view('ci_resize_view');
    }

    // Resize manipulation.
    public function resize_image() {
        if ($this->input->post("submit")) {
            $config = array(
                'upload_path' => "upload/original_resize/",
                'upload_url' => base_url() . "upload/original_resize/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf"
            );
            $this->load->library('upload', $config);
            if ($this->upload->do_upload()) {
          //If image upload in folder, set also this value in "$image_data".
                $image_data = $this->upload->data();
            }

            if (isset($image_data)) {

            } else {
                $image_data = array(
                    'file_name' => 'default.png',
                    'file_type' => 'image/jpeg',
                    'file_path' => 'C:/wamp/www/ci_image_upload/upload/original_resize/',
                    'full_path' => 'C:/wamp/www/ci_image_upload/upload/original_resize/default.png',
                    'raw_name' => 'default',
                    'orig_name' => 'default.png',
                    'client_name' => 'default.png',
                    'file_ext' => '.png'
                );
            }

            // Store Image Path and Size in Database.
            $original_path = str_replace("C:/wamp/www/", "http://localhost/", $image_data['full_path']);
            $img_data = array('original_img_path' => $original_path);
            $this->image_upload_model->resize_image_insert($img_data);
            $file_name = $this->input->post('userfile', TRUE);
            $width = $this->input->post('width');
            $height = $this->input->post('height');
            $width = str_replace('px', '', $width);
            $height = str_replace('px', '', $height);

            $img = $image_data['file_name'];
            $config['image_library'] = 'gd2';
            $config['source_image'] = $image_data['full_path'];
            $config['new_image'] = './upload/resize/' . $img;
            $config['width'] = $width;
            $config['height'] = $height;
            $config['maintain_ratio'] = FALSE;
//send config array to image_lib's  initialize function
            $this->image_lib->initialize($config);
            $src = $config['new_image'];
            $data['new_image'] = substr($src, 2);
            $data['img_src'] = base_url() . $data['new_image'];
            $data['name'] = $img;
// Call resize function in image library.
            $this->image_lib->resize();

            // Update rotate image in Database

            $update_data = array('original_img_path' => $original_path, 'resize_img_path' => $data['img_src']);
            $this->image_upload_model->resize_image_update($original_path, $update_data);

            $this->load->view('ci_resize_view', $data);
        }
    }

}

?>
