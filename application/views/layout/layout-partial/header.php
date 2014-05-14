        <!-- flashMessage -->
        <div class="container">
            <?php $flashMessage= $this->load->get_var('flashMessage'); if(!empty($flashMessage)) : ?>   
            <div class="alert alert-warning fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $flashMessage; ?>
            </div>
            <?php endif; ?>
        </div>
        
        <!--Header-->
            <header>
                <div class="row clearfix">
                    <div class="col-md-12 mgTop20">
                        <div class="floatRight">
                            <span class="ft_Oswald mayuscula color_ft414447 mgRight10">
                                <a href="">Client Zone</a>
                            </span>
                            <span class="selectIdioma">
                                <div class="dropdown floatRight fuenteOswald mayuscula color_ft414447">
                                    <a data-toggle="dropdown" href="#">Idioma</a>
                                    <ul class="menuClass dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <?php $language = $this->load->get_var('language'); if(!empty($language) && count($language) > 0) : ?>
                                            <?php foreach ($language as $array) : ?>
                                                <li><a href="/language/set/<?php echo $array['short_name']?>"><img src="<?php echo getPublicUrl() ?>/images/iconos/<?php echo $array['short_name']?>.png" width="18" height="12" /><?php echo $array['name'] ?></a></li>
                                            <?php endforeach; ?> 
                                        <?php else : ?>                                              
                                            <li><a href="#"><img src="" width="18" height="12" />Not found data.</a></li>                                                
                                        <?php endif;?>
                                    </ul>

                                </div>
                            </span>

                        </div>
                    </div>
                </div>
            </header><!--End Header-->

            <!--SectionMenu-->
            <section>
                <div class="row clearfix">
                    <div class="col-md-12 mgTop20" id="menuOpenHover">
                        
                        <div role="navigation" class="navbar navbar-default menuStyle">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a href="/" class="navbar-brand"><img src="<?php echo getPublicUrl() ?>/images/menu/logo.png" class="img-responsive" width="221" height="79" /></a>
                                </div>

                                <div class="navbar-collapse collapse floatRight" style="height: auto; margin-right:0;">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="/">Home</a></li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">About US</a>
                                            <ul class="dropdown-menu">
                                                <?php $pagesAboutUs = $this->load->get_var('pagesAboutUs'); if(!empty($pagesAboutUs) && count($pagesAboutUs) > 0) : ?>
                                                    <?php foreach ($pagesAboutUs as $array) : ?>
                                                <li><a href="<?php echo base_url_lang("page/about/".$array['id'])?>"><?php echo $array['title'] ?></a></li>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <li><a href="#">no found data</a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Porfolio</a>
                                            <ul class="dropdown-menu">
                                                <?php $category=$this->load->get_var('category'); if (!empty($category) && count($category) > 0) : ?>
                                                <?php foreach ($category as $array) : ?>
                                                <li><a href="/portfolio/category/<?php echo $array['id'] ?>"><?php echo $array['name'] ?></a></li>
                                                <?php endforeach;?>
                                                <?php else :?>
                                                <li><a href="#">no found data</a></li>
                                                <?php endif;?>
                                            </ul>
                                        </li>
                                        <li><a href="/page/contact">Contacts</a></li>
                                    </ul>

                                </div><!--/.nav-collapse -->
                            </div><!--/.container-fluid -->
                        </div>

                    </div><!--End Col-md-12-->
                </div><!--End Row--></section><!--End SectionMenu-->