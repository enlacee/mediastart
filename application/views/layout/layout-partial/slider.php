
<?php if (isset($bannerSlide) && is_array($bannerSlide) && count($bannerSlide) > 0) : ?>
<!--Slider-->
            <div class="row clearfix">
                <div class="col-md-12" id="esliderWeb">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php $count = 0; foreach($bannerSlide as $array): $active = ($count == 0) ? 'active' : '';?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count ?>" class="<?php echo $active ?>"></li>
                            <?php $count++; endforeach; ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner borderRadiusButtom" id="esliderWeb">
                            <?php foreach ($bannerSlide as $array): ?>
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
                                <a href="#one" data-toggle="tab">SHOWREEL</a>
                            </li>
                            <li><a href="#two" data-toggle="tab">Populars</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="one">
<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <!--php logic-->
            <?php 
            $portfolios = app_getOnePortfolioByCategory(5);
            if (is_array($portfolios) && count($portfolios) > 0 ) : ?>
                <?php $numItem = 4; $block = ceil(count($portfolios)/$numItem);?>
                <?php for($i = 0; $i < $block; $i++) : 
                    $offset = $i * $numItem;
                    $arrayBase =  array_slice($portfolios, $offset, $numItem);
                    $activeClass = ($i == 0) ? 'active' : '';
                ?>
                <div class="item <?php echo $activeClass ?>">
                    <div class="row">
                    <?php foreach ($arrayBase as $array) : ?>
                        <?php                                     
                            $pathImagen = $portfolioPath; $width = 500; $height = 500;
                            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
                            $urlImg = $portfolioUrl . $imageNameThumb;                                    
                            if (!empty($array['url_image_link'])) {
                                $urlImg =  $array['url_image_link'];
                            }                               
                        ?>                        
                        <div class="col-sm-3"><a href="<?php echo base_url('portfolio/video/' . $array['id']) ?>"><img src="<?php echo $urlImg ?>" alt="Image" class="img-responsive"></a></div>
                <?php endforeach; ?>
                </div><!--/row-->
                </div><!--/item-->
                <?php endfor; ?>
            <?php else : ?>
            not found data.
            <?php endif; ?>                        
        <!--php logic-->                    
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div><!-- end carrusel-->      
                            </div>
                            
                            <div class="tab-pane" id="two">
<div id="myCarousel2" class="carousel slide">
    <div class="carousel-inner">
        <!--php logic-->
            <?php 
            $portfolios = app_getPortfolioTopView(5);
            if (is_array($portfolios) && count($portfolios) > 0 ) : ?>
                <?php $numItem = 4; $block = ceil(count($portfolios)/$numItem);?>
                <?php for($i = 0; $i < $block; $i++) : 
                    $offset = $i * $numItem;
                    $arrayBase =  array_slice($portfolios, $offset, $numItem);
                    $activeClass = ($i == 0) ? 'active' : '';
                ?>
                <div class="item <?php echo $activeClass ?>">
                    <div class="row">
                    <?php foreach ($arrayBase as $array) : ?>
                        <?php                                     
                            $pathImagen = $portfolioPath; $width = 500; $height = 500;
                            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
                            $urlImg = $portfolioUrl . $imageNameThumb;                                    
                            if (!empty($array['url_image_link'])) {
                                $urlImg =  $array['url_image_link'];
                            }                               
                        ?>                        
                        <div class="col-sm-3"><a href="<?php echo base_url('portfolio/video/' . $array['id']) ?>"><img src="<?php echo $urlImg ?>" alt="Image" class="img-responsive"></a></div>
                <?php endforeach; ?>
                </div><!--/row-->
                </div><!--/item-->
                <?php endfor; ?>
            <?php else : ?>
            not found data.
            <?php endif; ?>                        
        <!--php logic-->                    
    </div>
    <a class="left carousel-control" href="#myCarousel2" data-slide="prev">‹</a>
    <a class="right carousel-control" href="#myCarousel2" data-slide="next">›</a>
</div><!-- end carrusel-->
                                
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
            