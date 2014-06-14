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
                                <a href="#">Client Zone</a>
                            </span>
                            <span class="selectIdioma">
                                <div class="dropdown floatRight fuenteOswald mayuscula color_ft414447">
                                    <a data-toggle="dropdown" href="#">Idioma</a>
                                    <!-- flag language -->
                                    <?php $id_lang = $this->load->get_var('id_lang'); if(!empty($id_lang) && isset($id_lang)) : ?>
                                    <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/<?php echo $id_lang ?>.png" width="18" height="12" /><?php echo $id_lang ?></a>
                                    <?php endif; ?>

                                    <ul class="menuClass dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <?php $language = $this->load->get_var('language'); if(!empty($language) && count($language) > 0) : ?>
                                            <?php foreach ($language as $array) : ?>
                                        <li><a href="<?php echo base_url('language/set/'.$array['short_name']) ?>"><img src="<?php echo getPublicUrl() ?>/images/iconos/<?php echo $array['short_name']?>.png" width="18" height="12" /><?php echo $array['name'] ?></a></li>
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
                                  <a href="<?php echo base_url() ?>" class="navbar-brand"><img src="<?php echo getPublicUrl() ?>/images/menu/logo.png" class="img-responsive" width="221" height="79" /></a>
                                </div>

                                <div class="floatRight nav-main" style="height: auto; margin-right:0;">
                                  <ul class="nav navbar-nav">
                                    <li class="<?php echo selectActive('index'); ?>"><a href="<?php echo base_url() ?>">Home</a></li>
                                    
                                    <li class="dropdown <?php echo selectActive('about'); ?>">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">About US</a>
                                        <ul class="dropdown-menu col-xs-12 col-sm-12" role="menu" aria-labelledby="dLabel">
                                            <?php $pagesAboutUs = $this->load->get_var('pagesAboutUs'); if(!empty($pagesAboutUs) && count($pagesAboutUs) > 0) : ?>
                                                <?php foreach ($pagesAboutUs as $array) : ?>
                                                    <li><a href="<?php echo base_url_lang("page/about/".$array['id'])?>"><?php echo $array['title'] ?></a></li>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <li><a href="#">no found data</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>

                                    <li class="dropdown <?php echo selectActive('portfolio'); ?>">
                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Portfolio
                                            <ul class="dropdown-menu col-xs-12 col-sm-12" role="menu" aria-labelledby="dLabel">
                                                <?php $category=$this->load->get_var('category'); if (!empty($category) && count($category) > 0) : ?>
                                                <?php foreach ($category as $array) : ?>
                                                <li><a href="<?php echo base_url('portfolio/category/' . $array['id']) ?>"><?php echo $array['name'] ?></a></li>
                                                <?php endforeach; ?>
                                                <?php else : ?>
                                                    <li><a href="#">no found data</a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </a>
                                    </li>
                                    
                                    <li class="<?php echo selectActive('contact'); ?>"><a href="<?php echo base_url('page/contact') ?>">Contacts</a></li>                                    
                                  </ul>
                                </div><!--/.nav-collapse -->

                                  <!-- reponsive menu -->
                                <div class="navbar-collapse collapse floatRight col-xs-12 responsive-main" style="height: auto; margin-right:0;">
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="<?php echo base_url() ?>">Home</a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">About</a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <?php $pagesAboutUs = $this->load->get_var('pagesAboutUs'); if(!empty($pagesAboutUs) && count($pagesAboutUs) > 0) : ?>
                                                        <?php foreach ($pagesAboutUs as $array) : ?>
                                                            <a href="<?php echo base_url_lang('page/about/' . $array['id']) ?>"><?php echo $array['title'] ?></a>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <a href="#">no found data</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsethree">Portfolio</a>
                                                </h4>
                                            </div>
                                            <div id="collapsethree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <?php $category=$this->load->get_var('category'); if (!empty($category) && count($category) > 0) : ?>
                                                    <?php foreach ($category as $array) : ?>
                                                    <a href="<?php echo base_url('portfolio/category/' . $array['id']) ?>"><?php echo $array['name'] ?></a>
                                                    <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <a href="#">no found data</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="" data-parent="#accordion" href="<?php echo base_url('page/contact') ?>">Contact</a>
                                                </h4>
                                              </div>
                                        </div>
                                    </div>
                                </div><!-- reponsive menu -->
                            </div><!--/.container-fluid -->
                        </div>

                    </div><!--End Col-md-12-->
                </div><!--End Row-->
            </section><!--End SectionMenu-->