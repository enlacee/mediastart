
<?php if (isset($portfolio) && is_array($portfolio) && count($portfolio) > 0) : ?>
<!--Column-->
<div class="col-md-12">

    <div class="porfolioCtn pdTop10 pdRight10 pdBottom20 pdLeft10">
            <h1><?php echo $portfolio['title']?></h1>
            <div class="videoCtn">
            <iframe src="//player.vimeo.com/video/<?php echo $portfolio['url_video']?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>

        <!--RedesSociales-->
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
        <!--End RedesSociales-->

    </div>
</div>
<!--End Column-->
<?php else : ?>
<div class="col-md-12">
    not found data.
</div>
<?php endif; ?>
