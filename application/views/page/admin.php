
<?php if(isset($latestNews)) : ?>   
    <div class="latestNews">
        <h1 class="mayuscula"><?php echo $latestNews['title'] ?></h1>
        <?php 
            $pathImagen = $latestNewsPath . $latestNews['url_image'];
            $width = 300;
            $height = 275;
            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
            $urlImg = $latestNewsUrl . $imageNameThumb;
        ?> 
        <div class="latestNewsImage">
            <img width="300" height="275" class="img-responsive" src="<?php echo $urlImg ?>"
                 alt="<?php echo $latestNews['title'] ?>" title="<?php echo $latestNews['title'] ?>">
        </div>

        <div class="latestNewsDescripcion">
            <p><?php echo $latestNews['content'] ?></p>
        </div>

        <!--RedesSociales-->
        <p><?php //include "social.php"; ?></p>
        <!--End RedesSociales-->
    </div>
<?php else: ?>
not found latestNew.
<?php endif; ?>