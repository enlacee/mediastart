<div class="row">
    <div class="col-md-12">
        <p>add images<p>
    <span id="err"></span>
    <div class="wrap">
        <div  id="asd" class="fdf"></div>
        <form id="imageform21"></form>

        <form id="imageform" class="common-app" method="post" enctype="multipart/form-data" action='<?php echo base_url(); ?>index.php/img_con/imageUploaing'>
            <div id="upload_btn">
                <input  id="file" class="upload" type="file" name="photoimg">
                <div id="imagePreview" class="err_msg">
                    <?php echo '<img style="display:none" src=' . getPublicUrl() . '/ci_image_upload/upload/ >';?>
                </div>
            </div>
        </form>
    </div>

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
                    if (res) {
                        $(deletediv).remove();
                        saveImagesToInput()
                    }
                }
            });
        }

        function delete_img2(obj, img) {
            delete_img(obj, img);
            $(obj).parent().remove();
        }

        // read images in enviroment
        function saveImagesToInput() {
            var data = [];
            var images = document.getElementById('asd').children;
            addData(images);

            var ele = document.getElementById('asd_edit');
            if ($('#asd_edit').length) {
                var imagesEdit = document.getElementById('asd_edit').children;
                addData(imagesEdit);
            }

            document.getElementById('url_image').value = (data.length>0) ? JSON.stringify(data) : '';
            //priavate
            function addData(images) {
                for(var i=0; i < images.length; i++) {
                    var img = images[i].children[1];
                    data.push({id: img.getAttribute('data-id'), href: img.getAttribute('src')});
                }
            }
        }
    </script>
    </div>
</div>


<?php if (!empty($data)) : ?>
<?php $decode = (json_decode($data));
    $data = (array) $decode;
?>
    <div class="row">
        <div class="col-md-12">
            <p>Images uploads</p>
            <div id="asd_edit" style="height: 130px; border:2px solid gray;display: flex;flex-wrap: wrap;overflow-y: scroll; padding:5px 0">
                <?php if (isset($data) && is_array($data) && count($data) > 0) : ?>
                    <?php foreach($data as $array) : ?>
                    <div class="items" style="margin:5px; display:block;">
                        <?php $imgInfo = pathinfo($array->href); ?>
                        <a id="close" onclick="delete_img2(this, '<?php echo  $imgInfo['basename'] ?>');"></a>
                        <img src="<?php echo $array->href ?>" width="100px" height="100px" />
                    </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Not founds images.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>
