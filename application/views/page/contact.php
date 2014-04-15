    <h2 class="mayuscula">Our team</h2>
    <p>Descripción de Our team.</p>

<?php if(isset($ourTeam) && count($ourTeam) > 0 ): ?>

    <?php foreach ($ourTeam as $array) : ?>
    <?php 
        $pathImagen = $ourTeamPath . $array['url_image'];
        $width = 274;
        $height = 251;
        $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
        $urlImg = $ourTeamUrl . $imageNameThumb;
    ?>      
    <!--ourTeamContact-->
    <div class="ourTeamContact">
        <div class="ourTeamContactImage">
            <img src="<?php echo $urlImg ?>" width="274" height="251" class="img-responsive"
                 alt="<?php echo $array['name'] ?>" title="<?php echo $array['name'] ?>"/>
        </div>

        <div class="ourTeamContactImageNextCtn">
            <h3><?php echo $array['name'] ?></h3>
            <p class="mayuscula"><?php echo $array['cargo'] ?></p>
            <p>Telefono: <?php echo $array['phone'] ?></p>
            <p><?php echo $array['email'] ?></p>
            <p>Skyper: <?php echo $array['skype'] ?></p>
        </div>
    </div>
    <!--End ourTeamContact-->
    <?php endforeach; ?>
<?php else : ?>
    not found data.
<?php endif; ?>    
