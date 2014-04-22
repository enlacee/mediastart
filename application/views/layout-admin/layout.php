<?php if (isset($admin) && is_array($admin)) : ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Panel</title>
    <?php //require 'layout-partial/require_css.php'; ?>

    <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/admin/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/admin/style.css">

    <!--[if lt IE 9]>
            <script src="<?php echo getPublicUrl() ?>/js/html5.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Menu-->
    <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/menuElegante/css/menu.css">
    <link href="<?php echo getPublicUrl() ?>/menuElegante/css/maps.css" rel="stylesheet" />
    <!--Menu-->

    <!--Editor-->
    <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/editor/bootstrap/bootstrap_extend.css">
            <!--<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>-->
    <!--Editor-->

    </head>

    <body>
        <header>
            <div class="head-bg">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="logo">
                                    <a href="admin.php"><img src="<?php echo getPublicUrl() ?>/images/logo.png" class="img-responsive" width="230" height="61" /></a>
                                </div>
                            </div>

                            <div class="col-md-6 pdTop5 text-right">
                                <p class="colorBlanco">Hello <strong style="text-transform:capitalize;"><?php echo $admin['name']?></strong>, Welcome!</p>
                                <p><a href="mi-cuenta.php">My Account</a> <span class="colorBlanco">|</span> <a href="/admin/logout">Logout</a></p>
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
                            <li><a href="/admin_post/pageabout">Page-About</a>                                
                                <ul>
                                <?php if (!empty($this->load->get_var('pagesAboutUs'))) : ?>
                                    <?php foreach ($pagesAboutUs as $array) : ?>
                                        <li><a href="/admin_post/pageabout/index/<?php echo $array['id'] ?>"><?php echo $array['title'] ?></a></li>                                            
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </ul>                                
                            </li>
                            <li><a href="/admin_post/page">Page</a>
                                <ul>
                                <?php if (!empty($this->load->get_var('pages'))) : ?>
                                    <?php foreach ($pages as $array) : ?>
                                        <li><a href="/admin_post/page/index/<?php echo $array['id'] ?>"><?php echo $array['title'] ?></a></li>                                            
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </ul>
                            </li>                            
                            
                            <li><a href="/admin_portfolio">Portfolio</a></li>
                            <li><a href="/admin_contact" >Contact</a></li>
                            <li><a href="/admin_lastwork" >Last work</a></li>
                            <li><a href="/admin/logout">Salir</a></li>
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

        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="content mgTop20 mgBottom30 pd10">
                    <?php echo $content_for_layout; ?>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footerBG"></footer>

        <div class="container">
            <div class="row clearfix text-center mgTop20 mgBottom10 font11">
                <div style="color:#777777; text-align:center; width:100%;">Diseño y desarrollo exclusivo <a href="http://www.tb.com.ve" style="color:#0076AB !important;" target="_blank">www.tb.comve</a></div>
                <div style="color:#777777; text-align:center; width:100%;">&copy; 2014 - Todos los derechos reservados</div>
            </div>
        </div>
       
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/bootstrap.min.js"></script>
 
        <!--Menu-->
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/menuElegante/js/google.js"></script>
        <script type="text/javascript">
            $(function(){
                $().maps();
            });
        </script>
        <!--Menu-->
    </body>
</html>
<?php else: ?>
    <?php require_once "salir.php"; ?>
<?php endif; ?>