<?php if (isset($banner) && count($banner) > 0) : ?>
<!--Slider-->
            <div class="row clearfix">
                <div class="col-md-12" id="esliderWeb">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php $count = 0; foreach($banner as $array): $active = ($count == 0) ? 'active' : '';?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count ?>" class="<?php echo $active ?>"></li>
                            <?php $count++; endforeach; ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner borderRadiusButtom" id="esliderWeb">
                            <?php foreach ($banner as $array): ?>
                            <?php 
                            $pathImagen = $bannerPath . $array['url_image'];
                            $width = 1001;
                            $height = 504;
                            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
                            $urlImg = $bannerUrl . $imageNameThumb;
                            ?>
                            <div class="item"><a href="<?php echo $array['link_image'] ?>" title="<?php echo $array['title']?>" target="_blank">
                                    <img title="<?php echo $array['title']?>" alt="<?php echo $array['title']?>" src="<?php echo $urlImg ?>" width="1001" height="504" /></a>
                            </div>
                            <?php endforeach;?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div><!--End Slider--> 

            <!--Tab Center-->
            <div class="row clearfix">
                <div class="col-md-12">

                    <div class="tabCustom">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="ulTab">
                            <li class="active" style="background:url(<?php echo getPublicUrl() ?>/images/tab/tab_border_right.jpg) right 10px no-repeat;">
                                <a href="#one" data-toggle="tab">Home</a>
                            </li>
                            <li><a href="#two" data-toggle="tab">Populars</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="one">
                                <?php
                                $portfolios = app_getOnePortfolioByCategory();
                                if (is_array($portfolios) && count($portfolios) > 0 ) : ?>
                                    <?php $count = 0; foreach ($portfolios as $array) : ?>
                                        <?php 
                                            if ($count == 4) { break; } 
                                            $pathImagen = $portfolioPath . $array['url_image'];
                                            $width = 218;
                                            $height = 200;
                                            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
                                            $urlImg = $portfolioUrl . $imageNameThumb;
                                        ?>
                                        <div class="tabShowRell"><a href="/portfolio/video/<?php echo $array['id']?>" title="<?php echo $array['title']?>" target="">
                                            <img src="<?php echo $urlImg ?>" alt="<?php echo $array['title'] ?>" title="<?php echo $array['title'] ?>" 
                                                 class="img-responsive" width="218" height="200" /></a>
                                        </div>                                
                                    <?php $count++; endforeach; ?>
                                <?php else : ?>                             
                                <?php endif; ?>
                            </div>
                            
                            <div class="tab-pane" id="two">
                                <?php $portfolios = app_getPortfolioTopView(); ?>
                                <?php $count = 0; foreach ($portfolios as $array) : ?>
                                    <?php
                                        if ($count == 4) { break; }
                                        $pathImagen = $portfolioPath . $array['url_image'];
                                        $width = 218;
                                        $height = 200;
                                        $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
                                        $urlImg = $portfolioUrl . $imageNameThumb;
                                    ?>
                                    <div class="tabShowRell"><a href="/portfolio/video/<?php echo $array['id']?>" title="<?php echo $array['title']?>" target="">
                                        <img src="<?php echo $urlImg ?>" alt="<?php echo $array['title'] ?>" title="<?php echo $array['title'] ?>" 
                                             class="img-responsive" width="218" height="200" /></a>
                                    </div>                                
                                <?php $count++; endforeach; ?>
                            </div>
                        </div>
                        <!-- END Nav tabs -->
                    </div>
                </div>
            </div>
            <!--End Tab Center--> 
<?php else :?>
not exist banner in db. 
<?php endif; ?>
            