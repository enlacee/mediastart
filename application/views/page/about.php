
<?php if (isset($page) && is_array($page) && count($page) > 0) : ?>
    <?php
        $pathImagen = $latestNewsPath . $page['url_image'];
        $width = 970;
        $height = 470;
        $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
        $urlImg = $latestNewsUrl . $imageNameThumb;
    ?>
    <div class="overFlow">
        <img src="<?php echo $urlImg ?>" width="970" height="470" class="img-responsive" 
             alt="<?php echo $page['title'] ?>" title="<?php echo $page['title'] ?>"/>
    </div>

    <div class="leftCtn pd20">
        <h2><?php echo $page['title'] ?></h2>
        <p><?php echo $page['content'] ?></p>
    </div>
<?php else : ?>
<div class="leftCtn pd20">
    not found data.
</div>    
<?php endif; ?>
