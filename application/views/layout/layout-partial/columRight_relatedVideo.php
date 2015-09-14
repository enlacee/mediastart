
<?php if(isset($relatedVideo)
        && count($relatedVideo) > 0
        && is_array($relatedVideo)) : ?>
    <h3 class="colorBlanco mayuscula">related videos</h3>
    <?php foreach ($relatedVideo as $array) : ?>
        <div class="ourTeamBox">
            <div class="ourTeamCtn">
                <h3>
                    <a href="<?php echo base_url("portfolio/video/".$array['id']) ?>"> - <?php echo $array['title'] ?></a>
                </h3>
                <a href="<?php echo base_url("portfolio/video/".$array['id']) ?>">
                    <?php if (empty($array['url_image'])): ?>
                        <img class="img-responsive" src="<?php echo $array['url_image_link'] ?>" />
                    <?php else: ?>
                        <?php $zip = unserialize($array['url_image']); ?>
                        <img class="img-responsive" src="<?php echo $zip[0] ?>"/>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <h3 class="colorBlanco mayuscula">not found related video</h3>
<?php endif; ?>
