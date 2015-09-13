<!doctype html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <title>CodeIgniter : Ajax Image Upload</title>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/ci_image_upload/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/ci_image_upload/js/jquery.form.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/ci_image_upload/css/style.css"/>
        <script src="<?php echo getPublicUrl() ?>/ci_image_upload/js/jquery-ui.min.js"></script>
    </head>
    <body>
        <span id="err"></span>
        <div class="wrap">
            <div  id="asd" class="fdf"></div>
            <form id="imageform" class="common-app" method="post" enctype="multipart/form-data" action='<?php echo base_url(); ?>index.php/img_con/imageUploaing'>

                <div id="upload_btn">
                    <input  id="file" class="upload" type="file" name="photoimg">
                   <div id="imagePreview" class="err_msg">
                    <?php
                    echo '<img style="display:none" src=' . $this->config->item('base_url') . 'upload/ >';
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
            function delete_img(obj, img) {
                var src = img;
                var divid = $(obj).attr('class');
                var deletediv = "div#" + divid;
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "index.php/img_con/delete_img",
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
