
<?php if (isset($portfolio) && is_array($portfolio) && count($portfolio) > 0) : ?>
    <?php if ($portfolio['flag'] == 'video'): // VIDEO ?>
        <?php
            $array = preg_split('#\/#', $portfolio['url_video']);
            $idVimeo = $array[(count($array)-1)];
        ?>
        <!--Add code-->
        <div id="sticky-anchor"></div>
        <!--/ Add code-->

        <div class="st_stick video">
            <div class="st_stick_ctn">
                <div class="overFlow">
                    <div class="videoCtn" id="id_videoCtn">
                        <iframe src="//player.vimeo.com/video/<?php echo $idVimeo ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <!-- js -->
                    <div class="row" style="display:none" data="extra" id="portfolio_js">
                        <?php $this->load->view('portfolio/_gallery.php') ?>
                    </div>
                </div>
            </div>

            <div>
                <?php $this->load->view('portfolio/_partial.video.content.php',  $portfolio) ?>
            </div>
        </div>

    <?php elseif ($portfolio['flag'] == 'image'): ?>
        <?php $array = json_decode($portfolio['url_image']); ?>

        <?php if (count($array) > 0): ?>
            <!-- html-CARRUSEL-INICIO-->
            <!--Add code-->
            <div id="sticky-anchor"></div>
            <!--/ Add code-->
            <div class="st_stick st_image">
              <div class="st_stick_ctn">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators" id="carousel-indicators">
                    <?php foreach ($array as $key => $value) : ?>
                        <li data-target="#carousel-example-generic"
                        data-slide-to="<?php echo $key ?>" class="<?php ($key==0)? 'active' : '' ?>"></li>
                    <?php endforeach; ?>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" id="carousel-inner" role="listbox">
                      <?php foreach ($array as $key => $value) : ?>
                          <div class="item <?php echo ($key==0) ? 'active' : '' ?>">
                            <img src="<?php echo $value->href ?>" >
                            <div class="carousel-caption">
                              ...
                            </div>
                          </div>
                      <?php endforeach; ?>
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

                <!-- js -->
                <div class="row" style="display:none" data="extra" id="portfolio_js">
                    <div class="videoCtn" id="id_videoCtn">
                    <iframe src="//player.vimeo.com/video/<?php echo $idVimeo ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>

              </div>

                <div>
                    <?php $this->load->view('portfolio/_partial.video.content.php',  $portfolio) ?>
                </div>
            </div>
            <!-- html-CARRUSEL-FIN-->
        <?php else: ?>
            <p>No found image.</p>
        <?php endif; ?>
    <?php endif; ?>
<?php else : ?>
<div class="col-md-12">
    not found data.
</div>
<?php endif; ?>