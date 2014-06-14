        <header>
            <div class="head-bg">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="logo">
                                    <a href="<?php echo base_url('admin/dashboard') ?>"><img src="<?php echo getPublicUrl() ?>/images/logo.png" class="img-responsive" width="230" height="61" /></a>
                                </div>
                            </div>

                            <div class="col-md-6 pdTop5 text-right">
                                <p class="colorBlanco">Hello <strong style="text-transform:capitalize;"><?php echo $admin['name']?></strong>, Welcome!</p>
                                <p><a href="#">My Account</a> <span class="colorBlanco">|</span> <a href="<?php echo base_url('admin/logout') ?>">Logout</a></p>
                            </div>
                        </div>
                    </div>
                </div><!--End Container-->
            </div>
        </header>

        <!--Menu-->
        <div class="menuBG">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <ul class="venus-menu">
                            <li class="active"><a href="<?php echo base_url('admin/dashboard') ?>">Panel</a></li>
                            <li><a href="<?php echo base_url('admin_banner') ?>">Banner</a></li>
                            <li><a href="<?php echo base_url('admin_post/post') ?>">Last News</a></li>
                            <li><a href="#">Page-About</a>                                
                                <ul>
                                <?php $pagesAboutUs=$this->load->get_var('pagesAboutUs'); if (!empty($pagesAboutUs)) : ?>
                                    <?php foreach ($pagesAboutUs as $array) : ?>
                                        <li><a href="<?php echo base_url('admin_post/pageabout/' . $array['id']) ?>"><?php echo $array['title'] ?></a></li>                                            
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </ul>                                
                            </li>
                            <li><a href="#">AreaFooter</a>
                                <ul>
                                <?php $pages = $this->load->get_var('pages'); if (!empty($pages)) : ?>
                                    <?php foreach ($pages as $array) : ?>
                                    <li><a href="<?php echo base_url('admin_post/page/' . $array['id']) ?>"><?php echo $array['title'] ?></a></li>                                            
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </ul>
                            </li>                            

                            <li><a href="<?php echo base_url('admin_portfolio') ?>">Portfolio</a></li>
                            <li><a href="<?php echo base_url('admin_lastwork') ?>">Last work</a></li> 
                            <li><a href="<?php echo base_url('admin_contact') ?>">Contact</a></li>                             
                            <li><a href="<?php echo base_url('admin_partner') ?>">Partners</a></li>
                            <li><a href="<?php echo base_url('admin/clean') ?>" target="_blank">Clean Cache</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Menu-->
        
        <!-- flashMessage -->
        <div class="container">
            <?php $flashMessage= $this->load->get_var('flashMessage'); if(!empty($flashMessage)) : ?>   
            <div class="alert alert-warning fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $flashMessage; ?>
            </div>
            <?php endif; ?>
        </div>    