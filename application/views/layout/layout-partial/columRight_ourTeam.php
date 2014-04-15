<?php 
$ourTeam = app_getOurTeam();
?>

<h3 class="colorBlanco mayuscula">Our team</h3>

<?php if(isset($ourTeam) && count($ourTeam) > 0) : ?>
    <?php foreach ($ourTeam as $array) : ?>
    <?php 
        $pathImagen = $ourTeamPath . $array['url_image'];
        $width = 300;
        $height = 275;
        $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
        $urlImg = $ourTeamUrl . $imageNameThumb;
    ?>            
    <!--Box OurTeam-->
    <div class="ourTeamBox">
        <div class="ourTeamImg">
            <img src="<?php echo $urlImg; ?>" width="300" height="275" class="img-responsive" 
                 alt="<?php echo $array['name'] ?>" title="<?php echo $array['name'] ?>"/>
        </div>

        <div class="ourTeamCtn">
            <h3><a href="/page/contact"><?php echo $array['name'] ?></a></h3>
            <p>INTERNACIONAL
                <br />
                <?php echo $array['cargo'] ?>
            </p>

        </div>

    </div>
    <!--End Box OurTeam-->
    <?php endforeach; ?>
<?php else : ?>
not found data.
<?php endif; ?>    

