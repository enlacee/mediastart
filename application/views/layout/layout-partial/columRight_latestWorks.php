
<?php  $work = app_getWork(); ?>
<h3 class="colorBlanco mayuscula">Latest works</h3>
         
<?php if(isset($work) 
        && count($work) > 0 
        && is_array($work)) : ?>
    <?php foreach ($work as $array) : ?>
    <?php 
        $pathImagen = $workPath . $array['url_image'];
        $width = 300;
        $height = 275;
        $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
        $urlImg = $workUrl . $imageNameThumb;
    ?>
        <!--Box OurTeam-->
        <div class="ourWorkBox">
            <div class="ourWorkImg">
                <img src="<?php echo $urlImg; ?>" width="300" height="275" class="img-responsive"
                     alt="<?php echo $array['title'] ?>" title="<?php echo $array['title'] ?>"/>
            </div>

            <div class="ourWorkCtn pdTop30">
                <h3><a href="<?php echo base_url('work/company/' . $array['id']) ?>"><?php echo $array['title'] ?></a></h3>
            </div>

        </div>
        <!--End Box OurTeam-->
    <?php endforeach; ?>        
<?php else : ?>
not found data.
<?php endif; ?>

