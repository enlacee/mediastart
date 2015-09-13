<!doctype html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <title>CodeIgniter : Ajax Image Upload</title>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>js/jquery.form.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url'); ?>css/style.css"   />
        <script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
        <style type="text/css">
            #rotate_img{
                display: block;
                float:right;
                position: relative;
                background:url("http://localhost/ci_image_upload/images/rotate.png") no-repeat;
                background-size: 16px 16px;
                cursor: pointer;
            }
            #dynamic{
                margin-left: -1px;
                margin-top: -20px;
            }

        </style>
    </head>
    <body>

        <span id="err"></span>
        <div class="wrap">
            <div  id="asd" class="fdf"></div>
            <form id="imageform" class="common-app" method="post" enctype="multipart/form-data" action='<?php echo base_url(); ?>index.php/img_con/image_rotate'>

                <div id="upload_btn">
                    <input  id="file" class="upload" type="file" name="photoimg">
                    <div id="imagePreview" class="err_msg">
                        <?php
                        echo '<img style="display:none" src=' . $this->config->item('base_url') . 'upload/original_r/ >';
                        ?> 
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript" >
            $(document).ready(function() {
                var browser;
                if ($.browser.msie) {
                    $('#file').live('click', function(e) {
                        e.preventDefault();
                        document.getElementById('imagePreview').innerHTML = '<img src="<?php echo $this->config->item('base_url') ?>images/loading.gif">';
                        $("#imageform").ajaxForm({
                            target: '#imagePreview'
                        }).submit();
                        document.getElementById('ImageStatus').value = 'browse';
                    });
                }
                else {
                    $('#file').live('change', function(e) {
                        e.preventDefault();
                        document.getElementById('imagePreview').innerHTML = '<img src="<?php echo $this->config->item('base_url') ?>images/loading.gif">';
                        $("#imageform").ajaxForm({
                            target: '#imagePreview'
                        }).submit();
                        document.getElementById('ImageStatus').value = 'browse';
                    });
                }
            });
        </script>

        <script>
            function rotate_img(obj, img_path, img) {
                var src = img;
                var path = img_path;
                var divid = $(obj).attr('class');
                var rotate = "img." + divid;
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "index.php/img_con/rotate",
                    data: {name: src, path: path},
                    success: function(res) {
                        if (res)
                        {
                            var resdata= res+"?data="+Math.random();
                           
                            $(rotate).attr("src", resdata);
                            var new_path = "rotate_img(this," + "'" + res + "'," + "'" + img + "'" + ")";
                            
                            $(obj).attr("onclick", new_path);
                            $(obj).attr("class", divid);
                        }
                    }
                });
            }
 function rotate_delete_img(obj, img) {
                var src = img;
                var divid = $(obj).attr('class');
                var deletediv = "div#" + divid;
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "index.php/img_con/rotate_delete_img",
                    data: {src_url: src},
                    success: function(res) {
                        if (res)
                        {
                            $(deletediv).hide();
                        }
                    }
                });
            }

        </script>

    </body>

</html>