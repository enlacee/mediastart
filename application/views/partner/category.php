<h2 class="mayuscula"><?php echo (isset($category_name)) ? $category_name : '' ?></h2>

<?php if (isset($partners) && is_array($partners) && count($partners) > 0 ): ?>
<div class="agenciesCtn">
    <?php foreach ($partners as $array) :?>
    <?php 
        $pathImagen = $partnerPath . $array['url_image'];
        $width = 180;
        $height = 120;
        $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
        $urlImg = $partnerUrl . $imageNameThumb;
    ?>      
    <div class="agenciesCtnImg">
        <a href="<?php echo $array['link_image']?>" target="_blank"><img src="<?php echo $urlImg ?>" width="180" height="120" class="img-responsive" /></a>
    </div>
    <?php endforeach; ?>
</div>
<?php else : ?>
<div class="agenciesCtn">Not found data.</div>
<?php endif; ?>
