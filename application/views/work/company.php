
<?php if(isset($work) 
        && is_array($work)
        && count($work) > 0) : ?>   
    <div class="latestNews">
        <h1 class="mayuscula"><?php echo $work['title'] ?></h1>
        <?php 
            $pathImagen = $workPath . $work['url_image'];
            $width = 300;
            $height = 275;
            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
            $urlImg = $workUrl . $imageNameThumb;
        ?> 
        <div class="latestNewsImage">
            <img width="300" height="275" class="img-responsive" src="<?php echo $urlImg ?>"
                 alt="<?php echo $work['title'] ?>" title="<?php echo $work['title'] ?>">
        </div>

        <div class="latestNewsDescripcion">
            <p><?php echo $work['description'] ?></p>
        </div>

        <!--RedesSociales-->
        <p><?php //include "social.php"; ?></p>
        <!--End RedesSociales-->
    </div>
<?php else: ?>
not found latestNew.
<?php endif; ?>