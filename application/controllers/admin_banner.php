<?php

$file = FCPATH . "application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_banner extends MY_ControllerAdmin {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $data = array();
        
        $stringJs = <<<EOT
    $(document).ready(function(){
        $("#file5").pekeUpload({
            btnText : "Browse files...",
            //url : "/admin_banner/upload",
            url : "upload.php",                
            theme : 'bootstrap',
            allowedExtensions : "jpeg|jpg|png|gif",
            onFileError: function(file,error){alert("error on file: "+file.name+" error: "+error+"")}
        });

    });         
EOT;
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/banner/index', $data);
    }
    
    public function upload()
    {/*
        // Define a destination
        $targetFolder = 'uploads/'; // Relative to the root

        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = dirname(__FILE__) . '/' . $targetFolder;
            $targetFile = rtrim($targetPath,'/') . '/' . $_FILES['file']['name'];

            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
            $fileParts = pathinfo($_FILES['file']['name']);

            if (in_array($fileParts['extension'],$fileTypes)) {
                    move_uploaded_file($tempFile,$targetFile);
                    echo '1';
            } else {
                    echo 'Invalid file type.';
            }
        }*/        
    }

}
