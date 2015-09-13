<div class="col-md-12">

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

            function delete_img2(obj, img) {
                delete_img(obj, img);
                obj.parentNode.style.display='none'
            }
        </script>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>All Images</h2>
            <div class="" style="height: 200px; border:2px solid gray;display: flex;flex-wrap: wrap;overflow-y: scroll; padding:5px 0">
                <?php if (isset($data) && is_array($data) && count($data) > 0) : ?>
                    <?php foreach($data as $array) : ?>
                    <div class="items" style="margin:5px; display:block;">
                        <?php $imgInfo = pathinfo($array['image_path']); ?>
                        <a id="close" onclick="delete_img2(this, '<?php echo  $imgInfo['basename'] ?>');"></a>
                        <img src="<?php echo $array['image_path'] ?>" width="100px" height="100px" />
                    </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Not founds images.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
