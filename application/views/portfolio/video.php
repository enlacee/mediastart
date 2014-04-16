
<?php if (isset($portfolio) && is_array($portfolio) && count($portfolio) > 0) : ?>
<!--Column-->
<div class="col-md-12">

    <div class="porfolioCtn pdTop10 pdRight10 pdBottom20 pdLeft10">
            <h1><?php echo $portfolio['title']?></h1>
            <div class="videoCtn">
            <iframe src="<?php echo $portfolio['url_video']?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>

        <!--RedesSociales-->
        <p><?php //include "social.php"; ?></p>
        <!--End RedesSociales-->

    </div>
</div>
<!--End Column-->
<?php else : ?>
<div class="col-md-12">
    not found data.
</div>
<?php endif; ?>
