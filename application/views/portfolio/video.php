
<?php if (isset($portfolio) && is_array($portfolio) && count($portfolio) > 0) : ?>
    <?php if (empty($portfolio['url_image'])): // VIDEO ?>
        <?php
            $array = preg_split('#\/#', $portfolio['url_video']);
            $idVimeo = $array[(count($array)-1)];
        ?>
        <div class="overFlow">
            <div class="videoCtn">
                <iframe src="//player.vimeo.com/video/<?php echo $idVimeo ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>

        <div class="leftCtn pd20">
            <h2><?php echo $portfolio['title']?></h2>
            <!--RedesSociales-->
            <p>
               <div data-url="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" class="mxshared" data-networks="facebook,google,twitter,linkedin" data-open="true" data-orientation="line" data-angle="0"></div>
            </p>
        </div>
    <?php elseif (is_array($portfolio['url_image']) && count($portfolio['url_image'])>0): ?>
        <?php $array = $portfolio['url_image']; ?>

        <!-- html-CARRUSEL-INICIO-->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
                <?php foreach ($array as $key => $value) : ?>
                    <li data-target="#carousel-example-generic"
                    data-slide-to="<?php echo $key ?>" class="<?php ($key==0)? 'active' : '' ?>"></li>
                <?php endforeach; ?>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
              <?php foreach ($array as $key => $value) : ?>
                  <div class="item <?php echo ($key==0) ? 'active' : '' ?>">
                    <img src="<?php echo $value ?>" alt="...">
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
        <!-- html-CARRUSEL-FIN-->

    <?php endif; ?>
<?php else : ?>
<div class="col-md-12">
    not found data.
</div>
<?php endif; ?>
