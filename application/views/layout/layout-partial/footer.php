            <!--Footer-->
            <div class="row clearfix mgBottom10">
                <div class="col-md-12">
                    <div class="footerWeb">
                        <?php $pages = app_getPageFooter(); ?>
                        <?php if (is_array($pages) && count($pages) > 0) : ?>
                        <?php foreach ($pages as $array) : ?>
                        <?php
                            $pathImagen = $latestNewsPath . $array['url_image'];
                            $width = 206;
                            $height = 123;
                            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
                            $urlImg = $latestNewsUrl . $imageNameThumb;
                        ?>                        
                        <!--Box-->
                        <div class="col-md-3">
                            <div class="footerWebBox">
                                <h4><?php echo $array['title'] ?></h4>
                                <p><img src="<?php echo $urlImg; ?>" width="206" height="123" class="img-responsive"
                                        alt="<?php echo $array['title'] ?>"/></p>
                                <p><?php echo truncate_string($array['content'], 120, ' ', '')?></p>
                                <p><a href="<?php echo base_url('page/admin/' . $array['id']) ?>">READ MORE</a></p>
                            </div>
                        </div>
                        <!--End Box-->
                        <?php endforeach; ?>
                        <?php endif; ?>

                        <!--Box-->
                        <div class="col-md-3">
                            <div class="footerWebBox">
                                <h4>AREA DE CLIENTES</h4>
                                <p><img src="<?php echo getPublicUrl() ?>/images/latest-news/image.jpg" width="206" height="123" class="img-responsive" /></p>
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto relleno estándarpara paginas web.</p>
                                <p><a href="#link" target="_blank">LOG IN</a></p>
                            </div>
                        </div>
                        <!--End Box-->
                        
                        <!--Box-->
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <div class="footerWebBox" id="menuUlFooterCol4">
                                <h4>Social</h4>
                                <ul>
                                    <?php if (isset($categorySocial) && is_array($categorySocial) && count($categorySocial)>0) : ?>
                                        <?php $ultimate = count($categorySocial);
                                                foreach ($categorySocial as $array) : ?>    
                                            
                                                <?php if ($ultimate == $array['id']): ?>
                                    <li style="border:none;"><a href="<?php echo base_url('social/category/' . $array['id']) ?>"><?php echo $array['name'] ?></a></li>
                                                <?php else : ?>
                                    <li><a href="<?php echo base_url('social/category/' . $array['id']) ?>"><?php echo $array['name'] ?></a></li>
                                                <?php endif; ?>
                                            
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                    <li><a href="#">Not found data.</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <!--End Box-->
                        

                    </div>
                </div></div>
            <!--End Footer-->