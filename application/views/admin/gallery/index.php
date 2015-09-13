<div class="col-md-12" style="border:1px solid red">

    <div class="row">
        <div class="col-md-12">
        <h1><?php echo $page_title; ?> : add images</h1>
        <span id="err"></span>
        <div class="wrap">
            <div  id="asd" class="fdf"></div>
            <form id="imageform" class="common-app" method="post" enctype="multipart/form-data" action='<?php echo base_url(); ?>index.php/img_con/imageUploaing'>

                <div id="upload_btn">
                    <input  id="file" class="upload" type="file" name="photoimg">
                   <div id="imagePreview" class="err_msg">
                    <?php
                    echo '<img style="display:none" src=' . getPublicUrl() . '/upload/ >';
                    ?>
                </div>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/jquery-1.11.0.min.js">

        </script>
        <script type="text/javascript" >
            $(document).ready(function() {
                var browser;
                if (true) {
                    $('#file').on('change', function(e) {
                        e.preventDefault();
                        document.getElementById('imagePreview').innerHTML = '<img src="<?php echo getPublicUrl() ?>/ci_image_upload/images/loading.gif">';
                        $("#imageform").ajaxForm({
                            target: '#imagePreview'
                        }).submit();
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
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            abc
        </div>
    </div>

</div>
