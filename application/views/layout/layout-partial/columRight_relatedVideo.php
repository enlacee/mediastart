
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
                    <?php if ($array['flag'] == 'video'): ?>
                        <?php
                            $imgVideo = !empty($array['url_image'])
                                ? json_decode($array['url_image'])[0]->href
                                : $array['url_image_link']; ?>
                        <img class="img-responsive" src="<?php echo $imgVideo ?>"
                        data="<?php echo $array['url_video']?>"
                        data-flag="<?php echo $array['flag']?>"/>
                    <?php elseif ($array['flag'] == 'image'): ?>
                        <?php $zip = json_decode($array['url_image']); ?>
                        <img class="img-responsive" src="<?php echo isset($zip[0]->href) ? $zip[0]->href : $bannerUrl. 'image.jpg' ?>"
                        data-json='<?php echo $array['url_image'] ?>'
                        data-flag="<?php echo $array['flag']?>"/>
                    <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <h3 class="colorBlanco mayuscula">not found related video</h3>
<?php endif; ?>
