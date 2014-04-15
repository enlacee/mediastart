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
                            <div class="item">
                                <img title="<?php echo $array['title']?>" alt="<?php echo $array['title']?>" src="<?php echo $urlImg ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" />
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
                            <li class="active" style="background:url(<?php echo getPublicUrl() ?>/images/tab/tab_border_right.jpg) right 10px no-repeat;"><a href="#one" data-toggle="tab">Home</a></li>
                            <li><a href="#two" data-toggle="tab">Populars</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="one">

                                <!--Item Tab-->
                                <div class="tabShowRell">
                                    <img src="<?php echo getPublicUrl() ?>/images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
                                </div>
                                <!--End Item Tab-->
                                <!--Item Tab-->
                                <div class="tabShowRell">
                                    <img src="<?php echo getPublicUrl() ?>/images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
                                </div>
                                <!--End Item Tab-->
                                <!--Item Tab-->
                                <div class="tabShowRell">
                                    <img src="<?php echo getPublicUrl() ?>/images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
                                </div>
                                <!--End Item Tab-->
                                <!--Item Tab-->
                                <div class="tabShowRell">
                                    <img src="<?php echo getPublicUrl() ?>/images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
                                </div>
                                <!--End Item Tab-->

                            </div>
                            <div class="tab-pane" id="two">

                                <!--Item Tab-->
                                <div class="tabShowRell">
                                    <img src="<?php echo getPublicUrl() ?>/images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
                                </div>
                                <!--End Item Tab-->
                                <!--Item Tab-->
                                <div class="tabShowRell">
                                    <img src="<?php echo getPublicUrl() ?>/images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
                                </div>
                                <!--End Item Tab-->
                                <!--Item Tab-->
                                <div class="tabShowRell">
                                    <img src="<?php echo getPublicUrl() ?>/images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
                                </div>
                                <!--End Item Tab-->
                                <!--Item Tab-->
                                <div class="tabShowRell">
                                    <img src="<?php echo getPublicUrl() ?>/images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
                                </div>
                                <!--End Item Tab-->

                            </div>
                        </div>
                        <!-- END Nav tabs -->
                    </div>
                </div>
            </div>
            <!--End Tab Center--> 