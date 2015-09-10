
<?php if (isset($portfolio) && is_array($portfolio) && count($portfolio) > 0) : ?>
    <?php if (empty($portfolio['url_image'])): ?>
        <div class="overFlow">
            <div class="videoCtn">
                <iframe src="//player.vimeo.com/video/<?php echo $portfolio['url_video']?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>

        <div class="leftCtn pd20">
            <h2><?php echo $portfolio['title']?></h2>
            <!--RedesSociales-->
                <p>
                   <div data-url="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" class="mxshared" data-networks="facebook,google,twitter,linkedin" data-open="true" data-orientation="line" data-angle="0"></div>
                    <?php /*?><a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/facebook.png" width="40" height="40" /></a>
                    <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/twitter.png" width="40" height="40" /></a>
                    <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/myspace.png" width="40" height="40" /></a>
                    <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/yahoo.png" width="40" height="40" /></a>
                    <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/linkedin.png" width="40" height="40" /></a>
                    <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/delicious.png" width="40" height="40" /></a>
                    <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/orkut.png" width="40" height="40" /></a>
                    <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/digg.png" width="40" height="40" /></a> <?php */?>
                </p>
        </div>
    <?php else: ?>
        <div class="overFlow">
            <div class="videoCtn">
                <img src="<?php echo $portfolio['url_image'] ?>" class="img-thumbnail" data-toggle="modal" data-target="#myModal"/>
            </div>
        </div>

        <div class="leftCtn pd20">
            <h2><?php echo $portfolio['title']?></h2>
            <!--RedesSociales-->
                <p>
                   <div data-url="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" class="mxshared" data-networks="facebook,google,twitter,linkedin" data-open="true" data-orientation="line" data-angle="0"></div>
                </p>
        </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <img src="<?php echo $portfolio['url_image'] ?>" class="img-responsive_" width="100%"/>
      </div>
    </div>
  </div>
</div>
    <?php endif; ?>
<?php else : ?>
<div class="col-md-12">
    not found data.
</div>
<?php endif; ?>
