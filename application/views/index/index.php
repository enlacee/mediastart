<h2>LATEST NEWS</h2>
    <!--Box LatestNews-->
    <?php if (isset($latestNews) && count($latestNews) > 0) : ?>
        <?php foreach ($latestNews as $array) : ?>
        <?php 
            $pathImagen = $latestNewsPath . $array['url_image'];
            $width = 300;
            $height = 275;
            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
            $urlImg = $latestNewsUrl . $imageNameThumb;
        ?>    
        <div class="latesNewsBox">
            <div class="latesNewImg"><a href="<?php echo base_url('page/index/' . $array['id']) ?>" title="<?php echo $array['title']?>" target="">
                    <img src="<?php echo $urlImg ?>" width="300" height="275" class="img-responsive"
                         title="<?php echo $array['title']?>"/></a>
            </div>

            <div class="latesNewCtn">
                <p class="latesNewCtnFecha"><?php echo date_standar($array['created_at']); ?></p>
                <h3><?php echo $array['title']?></h3>
                <p class="font12"><?php echo truncate_string($array['content'], 100, ' ', '')?></p>
                <div class="readMoreComment">
                    <span class="readMore"><a href="<?php echo base_url('page/index/' . $array['id']) ?>" class="btn btn-tamam-ashxarh-ptut-eka-1 btn-xlarge font13">READ MORE</a></span>
                    <span class="latesNewComment"><a href="javascript:voice(0)"><?php echo $array['comment_count']?> comment(s)</a></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <!--End Box LatestNews-->