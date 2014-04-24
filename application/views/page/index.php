
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

            <p>
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/facebook.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/twitter.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/myspace.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/yahoo.png" width="40" height="40" /></a>  
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/linkedin.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/delicious.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/orkut.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/digg.png" width="40" height="40" /></a> 
            </p>            
        </div>


        <!--RedesSociales-->
        <p><?php //include "social.php"; ?></p>
        <!--End RedesSociales-->
    </div>
<?php else: ?>
not found latestNew.
<?php endif; ?>