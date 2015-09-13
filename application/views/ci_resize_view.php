<html>
    <head><title>CodeIgniter Image Upload</title>
    <head>

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
        <script src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>

    </head>



    <body>
        <script>
            $(function() {
                $("#slider-range-min-width").slider({
                    range: "min",
                    value: 100,
                    min: 1,
                    max: 300,
                    slide: function(event, ui) {
                        $("#width").val(ui.value + "px");
                        $("#photo").attr('width', ui.value + "px");
                    }
                });
                $("#width").val($("#slider-range-min-width").slider("value") + "px");
            });

            $(function() {
                $("#slider-range-min-height").slider({
                    range: "min",
                    value: 100,
                    min: 1,
                    max: 300,
                    slide: function(event, ui) {
                        $("#height").val(ui.value + "px");
                        $("#photo").attr('height', ui.value + "px");
                    }
                });
                $("#height").val($("#slider-range-min-height").slider("value") + "px");
            });
        </script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#photo')
                                .attr('src', e.target.result);

                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <?php if (!isset($img_src)) { ?>
            <div id="img_area" >
                <form  method="post" enctype="multipart/form-data" action='<?php echo base_url(); ?>index.php/img_con/resize_image'>

                    <img src="<?php echo base_url(); ?>images/default.png" id="photo" width="100px" height="100px" />
            </div>
            <div id="img_info">
                <a href="#" onclick="document.getElementById('fileID').click();
               return false;" /><img src="<?php echo base_url(); ?>images/browse.png"/></a>
            <input type="file" id="fileID" name="userfile" style="visibility: hidden;" onchange="readURL(this);" />
            <p>
                <label for="width">Width:</label>
                <input name="width" type="text" id="width" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>

            <div id="slider-range-min-width"></div>

            <p>
                <label for="height">Height:</label>
                <input name="height" type="text" id="height" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>

            <div id="slider-range-min-height"></div>
            <div id="save_img">
                <input type="submit"  class="fg-button blue" id="submit" name="submit" value="Resize Image"/>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <div id="crop_img"><img src="<?php echo $img_src; ?>"/>

        </div>
        <div id="crop_back"><a href="<?php echo base_url() ?>index.php/img_con/ci_resize_image" class="fg-button blue">Resize Another</a></div>
    <?php } ?>
</body>
</html>