            <!--Footer-->
            <div class="row clearfix mgBottom10">
                <div class="col-md-12">
                    <div class="footerWeb">

                        <!--Box-->
                        <div class="col-md-3">
                            <div class="footerWebBox">
                                <h4>TITULO PYMES</h4>
                                <p><img src="<?php echo getPublicUrl() ?>/images/footer/image.jpg" width="206" height="123" class="img-responsive" /></p>
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web.</p>
                                <p><a href="pymes.php">READ MORE</a></p>
                            </div>
                        </div>
                        <!--End Box-->

                        <!--Box-->
                        <div class="col-md-3">
                            <div class="footerWebBox">
                                <h4>POPULAR</h4>
                                <p><img src="<?php echo getPublicUrl() ?>/images/footer/image.jpg" width="206" height="123" class="img-responsive" /></p>
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web.</p>
                                <p><a href="popular.php">READ MORE</a></p>
                            </div>
                        </div>
                        <!--End Box-->

                        <!--Box-->
                        <div class="col-md-3">
                            <div class="footerWebBox">
                                <h4>AREA DE CLIENTES</h4>
                                <p><img src="<?php echo getPublicUrl() ?>/images/footer/image.jpg" width="206" height="123" class="img-responsive" /></p>
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web.</p>
                                <p><a href="#estonoesenlazable">LOG IN</a></p>
                            </div>
                        </div>
                        <!--End Box-->

                        <!--Box-->
                        <div class="col-md-3">
                            <div class="footerWebBox" id="menuUlFooterCol4">
                                <h4>Partners</h4>
                                <ul>
                                    <?php if (isset($categoryPartner) && is_array($categoryPartner) && count($categoryPartner)>0) : ?>
                                        <?php $ultimate = count($categoryPartner);
                                                foreach ($categoryPartner as $array) : ?>    
                                            
                                                <?php if ($ultimate == $array['id']): ?>
                                                    <li style="border:none;"><a href="/partner/category/<?php echo $array['id'] ?>"><?php echo $array['name'] ?></a></li>
                                                <?php else : ?>
                                                    <li><a href="/partner/category/<?php echo $array['id'] ?>"><?php echo $array['name'] ?></a></li>
                                                <?php endif; ?>
                                            
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                    <li><a href="#">Not found data.</a></li>
                                    <?php endif; ?>
                                </ul>
                                <p><a href="">READ MORE</a></p>
                            </div>
                        </div>
                        <!--End Box-->

                    </div>
                </div></div>
            <!--End Footer-->