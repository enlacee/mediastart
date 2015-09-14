
<?php if (isset($portfolio) && is_array($portfolio) && count($portfolio) > 0) : ?>
    <?php if (empty($portfolio['url_image'])): // VIDEO ?>
        <?php
            $array = preg_split('#\/#', $portfolio['url_video']);
            $idVimeo = $array[(count($array)-1)];
        ?>
        <div class="overFlow">
            <div class="videoCtn">
                <iframe src="//player.vimeo.com/video/<?php echo $idVimeo ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>

        <div class="leftCtn pd20">
            <h2><?php echo $portfolio['title']?></h2>
            <!--RedesSociales-->
            <p>
               <div data-url="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" class="mxshared" data-networks="facebook,google,twitter,linkedin" data-open="true" data-orientation="line" data-angle="0"></div>
            </p>
        </div>
    <?php else: // IMAGE GALLERY ?>
        <div class="overFlow">
            <div class="videoCtn">
                <img src="image.jpg" class="img-thumbnail"/>
            </div>
        </div>

        <div class="leftCtn pd20">
            <h2><?php echo $portfolio['title']?></h2>
            <!--RedesSociales-->
                <p>
                   <div data-url="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" class="mxshared" data-networks="facebook,google,twitter,linkedin" data-open="true" data-orientation="line" data-angle="0"></div>
                </p>
        </div>

    <?php endif; ?>
<?php else : ?>
<div class="col-md-12">
    not found data.
</div>
<?php endif; ?>
aaaaa
