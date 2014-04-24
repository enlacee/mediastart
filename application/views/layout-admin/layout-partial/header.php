        <header>
            <div class="head-bg">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="logo">
                                    <a href="/admin/dashboard"><img src="<?php echo getPublicUrl() ?>/images/logo.png" class="img-responsive" width="230" height="61" /></a>
                                </div>
                            </div>

                            <div class="col-md-6 pdTop5 text-right">
                                <p class="colorBlanco">Hello <strong style="text-transform:capitalize;"><?php echo $admin['name']?></strong>, Welcome!</p>
                                <p><a href="#">My Account</a> <span class="colorBlanco">|</span> <a href="/admin/logout">Logout</a></p>
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
                            <li class="active"><a href="/admin/dashboard">Panel</a></li>
                            <li><a href="/admin_banner">Banner</a></li>
                            <li><a href="/admin_post/post">Last News</a></li>
                            <li><a href="#">Page-About</a>                                
                                <ul>
                                <?php if (!empty($this->load->get_var('pagesAboutUs'))) : ?>
                                    <?php foreach ($pagesAboutUs as $array) : ?>
                                        <li><a href="/admin_post/pageabout/<?php echo $array['id'] ?>"><?php echo $array['title'] ?></a></li>                                            
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </ul>                                
                            </li>
                            <li><a href="#">Page</a>
                                <ul>
                                <?php if (!empty($this->load->get_var('pages'))) : ?>
                                    <?php foreach ($pages as $array) : ?>
                                        <li><a href="/admin_post/page/<?php echo $array['id'] ?>"><?php echo $array['title'] ?></a></li>                                            
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </ul>
                            </li>                            

                            <li><a href="/admin_portfolio">Portfolio</a></li>
                            <li><a href="/admin_lastwork" >Last work</a></li> 
                            <li><a href="/admin_contact" >Contact</a></li>                             
                            <li><a href="/admin_partner" >Partners</a></li>  
                            
                            <li class="search">
                                <form name="buscar" id="buscar" method="post">
                                    <input type="text" name="search" class="search" placeholder="Buscar" />
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Menu-->
        
        <!-- flashMessage -->
        <div class="container">
            <?php if(!empty($this->load->get_var('flashMessage'))) : ?>   
            <div class="alert alert-warning fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <?php echo $flashMessage; ?>
            </div>
            <?php endif; ?>
        </div>    