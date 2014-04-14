
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    <meta name="description" content="">
        <meta name="author" content="">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/redmond/jquery-ui-1.10.4.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/source/jquery.fancybox.css">
        <!--[if lt IE 9]>
        <script src="<?php echo getPublicUrl() ?>/js/html5.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>


    <body>
        <div class="container">


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
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/es.png" width="18" height="12" /> Espa&ntilde;ol </a></li>
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/en.png" width="18" height="12" /> English </a></li>
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/fr.png" width="18" height="12" /> Français</a></li>
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/de.png" width="18" height="12" /> Deutsch</a></li>
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/it.png" width="18" height="12" /> Italiano</a></li>
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/pt-br.png" width="18" height="12" /> Português</a></li>
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/ru.png" width="18" height="12" /> Русский</a></li>
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/zh-hans.png" width="18" height="12" /> 简体中文</a></li>
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/ar.png" width="18" height="12" /> العربية</a></li>
                                        <li><a href="javascript:voice(0)"><img src="<?php echo getPublicUrl() ?>/images/iconos/ja.png" width="18" height="12" /> 日本語</a></li>
                                    </ul>

                                </div>
                            </span>

                        </div>
                    </div>
                </div>  </header><!--End Header-->







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
                                    <a href="#" class="navbar-brand"><img src="<?php echo getPublicUrl() ?>/images/menu/logo.png" class="img-responsive" width="221" height="79" /></a>
                                </div>

                                <div class="navbar-collapse collapse floatRight" style="height: auto; margin-right:0;">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="index.php">Home</a></li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">About US</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="about.php">What we do</a></li>
                                                <li><a href="how.php">How we do it</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Porfolio</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="showreel.php">Showreel</a></li>
                                                <li><a href="#">Action - Sport</a></li>
                                                <li><a href="#">Cars</a></li>
                                                <li><a href="#">Comedy</a></li>
                                                <li><a href="#">Corporate</a></li>
                                                <li><a href="#">Fashion</a></li>
                                                <li><a href="#">Storytelling</a></li>
                                                <li><a href="#">Trailers</a></li>
                                                <li><a href="#">Music Videos</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.php">Contacts</a></li>
                                    </ul>

                                </div><!--/.nav-collapse -->
                            </div><!--/.container-fluid -->
                        </div> 


                    </div><!--End Col-md-12-->
                </div><!--End Row--></section><!--End SectionMenu-->






            <!--Slider-->
            <div class="row clearfix">
                <div class="col-md-12" id="esliderWeb">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner borderRadiusButtom" id="esliderWeb">

                            <div class="item">
                                <img src="<?php echo getPublicUrl() ?>/images/banner/1.jpg" width="1001" height="504" />
                            </div>

                            <div class="item">
                                <img src="<?php echo getPublicUrl() ?>/images/banner/1.jpg" width="1001" height="504" />
                            </div>

                            <div class="item">
                                <img src="<?php echo getPublicUrl() ?>/images/banner/1.jpg" width="1001" height="504" />
                            </div>

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
                </div></div>
            <!--End Tab Center--> 












            <!--CtnBody-->
            <div class="row clearfix">
                <div class="col-md-12">

                    <div id="ctnBody">

                        <!--ColumnLef-->
                        <div class="col-md-8">
                            <div class="leftCtn pd10">
                                <h2>LATEST NEWS</h2>


                                <!--Box LatestNews-->
                                <div class="latesNewsBox">
                                    <div class="latesNewImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/latest-news/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="latesNewCtn">
                                        <p class="latesNewCtnFecha">07 de April del 2014</p>
                                        <h3>Lorem Ipsum es simplemente el texto de relleno</h3>
                                        <p class="font12">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.</p>
                                        <div class="readMoreComment">
                                            <span class="readMore"><a href="lastest-new.php" class="btn btn-tamam-ashxarh-ptut-eka-1 btn-xlarge font13">READ MORE</a></span>
                                            <span class="latesNewComment"><a href="javascript:voice(0)">0 comment(s)</a></span>
                                        </div>
                                    </div>

                                </div>
                                <!--End Box LatestNews-->
                                <!--Box LatestNews-->
                                <div class="latesNewsBox">
                                    <div class="latesNewImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/latest-news/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="latesNewCtn">
                                        <p class="latesNewCtnFecha">07 de April del 2014</p>
                                        <h3>Lorem Ipsum es simplemente el texto de relleno</h3>
                                        <p class="font12">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.</p>
                                        <div class="readMoreComment">
                                            <span class="readMore"><a href="lastest-new.php" class="btn btn-tamam-ashxarh-ptut-eka-1 btn-xlarge font13">READ MORE</a></span>
                                            <span class="latesNewComment"><a href="javascript:voice(0)">0 comment(s)</a></span>
                                        </div>
                                    </div>

                                </div>
                                <!--End Box LatestNews-->
                                <!--Box LatestNews-->
                                <div class="latesNewsBox">
                                    <div class="latesNewImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/latest-news/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="latesNewCtn">
                                        <p class="latesNewCtnFecha">07 de April del 2014</p>
                                        <h3>Lorem Ipsum es simplemente el texto de relleno</h3>
                                        <p class="font12">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.</p>
                                        <div class="readMoreComment">
                                            <span class="readMore"><a href="lastest-new.php" class="btn btn-tamam-ashxarh-ptut-eka-1 btn-xlarge font13">READ MORE</a></span>
                                            <span class="latesNewComment"><a href="javascript:voice(0)">0 comment(s)</a></span>
                                        </div>
                                    </div>

                                </div>
                                <!--End Box LatestNews-->
                                <!--Box LatestNews-->
                                <div class="latesNewsBox">
                                    <div class="latesNewImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/latest-news/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="latesNewCtn">
                                        <p class="latesNewCtnFecha">07 de April del 2014</p>
                                        <h3>Lorem Ipsum es simplemente el texto de relleno</h3>
                                        <p class="font12">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.</p>
                                        <div class="readMoreComment">
                                            <span class="readMore"><a href="lastest-new.php" class="btn btn-tamam-ashxarh-ptut-eka-1 btn-xlarge font13">READ MORE</a></span>
                                            <span class="latesNewComment"><a href="javascript:voice(0)">0 comment(s)</a></span>
                                        </div>
                                    </div>

                                </div>
                                <!--End Box LatestNews-->


                            </div>
                        </div>
                        <!--End ColumnLef-->



                        <!--ColumnRight-->
                        <div class="col-md-4" id="rightColBG">
                            <div class="rightCtn pdTop10">
                                <h3 class="colorBlanco mayuscula">Our team</h3>

                                <!--Box OurTeam-->
                                <div class="ourTeamBox">
                                    <div class="ourTeamImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/ourTeam/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="ourTeamCtn">
                                        <h3><a href="contact.php">Integrante del equipo</a></h3>
                                        <p>INTERNACIONAL
                                            <br />
                                            Coordinador
                                        </p>

                                    </div>

                                </div>
                                <!--End Box OurTeam-->
                                <!--Box OurTeam-->
                                <div class="ourTeamBox">
                                    <div class="ourTeamImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/ourTeam/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="ourTeamCtn">
                                        <h3><a href="contact.php">Integrante del equipo</a></h3>
                                        <p>INTERNACIONAL
                                            <br />
                                            Coordinador
                                        </p>

                                    </div>

                                </div>
                                <!--End Box OurTeam-->
                                <!--Box OurTeam-->
                                <div class="ourTeamBox">
                                    <div class="ourTeamImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/ourTeam/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="ourTeamCtn">
                                        <h3><a href="contact.php">Integrante del equipo</a></h3>
                                        <p>INTERNACIONAL
                                            <br />
                                            Coordinador
                                        </p>

                                    </div>

                                </div>
                                <!--End Box OurTeam-->
                                <!--Box OurTeam-->
                                <div class="ourTeamBox">
                                    <div class="ourTeamImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/ourTeam/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="ourTeamCtn">
                                        <h3><a href="contact.php">Integrante del equipo</a></h3>
                                        <p>INTERNACIONAL
                                            <br />
                                            Coordinador
                                        </p>

                                    </div>

                                </div>
                                <!--End Box OurTeam-->
                                <!--Box OurTeam-->
                                <div class="ourTeamBox">
                                    <div class="ourTeamImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/ourTeam/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="ourTeamCtn">
                                        <h3><a href="contact.php">Integrante del equipo</a></h3>
                                        <p>INTERNACIONAL
                                            <br />
                                            Coordinador
                                        </p>

                                    </div>

                                </div>
                                <!--End Box OurTeam-->
                                <!--Box OurTeam-->
                                <div class="ourTeamBox">
                                    <div class="ourTeamImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/ourTeam/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="ourTeamCtn">
                                        <h3><a href="contact.php">Integrante del equipo</a></h3>
                                        <p>INTERNACIONAL
                                            <br />
                                            Coordinador
                                        </p>

                                    </div>

                                </div>
                                <!--End Box OurTeam-->
                                <!--Box OurTeam-->
                                <div class="ourTeamBox">
                                    <div class="ourTeamImg">
                                        <img src="<?php echo getPublicUrl() ?>/images/ourTeam/image.jpg" width="300" height="275" class="img-responsive" />
                                    </div>

                                    <div class="ourTeamCtn">
                                        <h3><a href="contact.php">Integrante del equipo</a></h3>
                                        <p>INTERNACIONAL
                                            <br />
                                            Coordinador
                                        </p>

                                    </div>

                                </div>
                                <!--End Box OurTeam-->

                            </div>            </div>
                        <!--End ColumnRight-->

                    </div>

                </div>
            </div>
            <!--End CtnBody--> 





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
                                    <li><a href="agencies.php">Agencies</a></li>
                                    <li><a href="producers.php">Producers</a></li>
                                    <li><a href="directors.php">Directors</a></li>
                                    <li><a href="directors-of-photography.php">Directors of Photography</a></li>
                                    <li><a href="filmakers.php">Filmakers</a></li>
                                    <li><a href="post-production.php">Postproduction</a></li>
                                    <li><a href="photographer.php">Photographer</a></li>
                                    <li style="border:none;"><a href="other.php">Other</a></li>
                                </ul>
                                <p><a href="">READ MORE</a></p>
                            </div>
                        </div>
                        <!--End Box-->

                    </div>
                </div></div>
            <!--End Footer-->





        </div><!--End Container-->


        <div class="container">
            <div class="row clearfix text-center mgBottom10 font11">
                <span style="color:#777777;">&copy; 2014</span>
            </div>
        </div>    
        <script src="<?php echo getPublicUrl() ?>/js/jquery-1.11.0.min.js"></script>
        <script src="<?php echo getPublicUrl() ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo getPublicUrl() ?>/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="<?php echo getPublicUrl() ?>/js/jquery.ui.datepicker-es.min.js"></script>
        <script src="<?php echo getPublicUrl() ?>/source/jquery.fancybox.js"></script>

        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/jquery.metadata.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/messages_es.js"></script>


        <script type="text/javascript">
            $(function() {
                $("#fancyBox").fancybox({
                    maxWidth: 800,
                    maxHeight: 600,
                    fitToView: false,
                    width: '90%',
                    height: '90%',
                    autoSize: false,
                    closeClick: false,
                    openEffect: 'none',
                    closeEffect: 'none'
                });
            });

        </script>



        <script type="text/javascript">

            $(function() {

                //FechaBox
                $("#fecha").datepicker({
                    showButtonPanel: false
                });

                //Idiomas
                $('.dropdown-toggle').dropdown();


                //Tab
                $('#myTab a').click(function(e) {
                    e.preventDefault()
                    $(this).tab('show')
                });


                //Agrega clase al Slider para que pueda funcionar
                $('#esliderWeb div:last-child').addClass("active");


                //Menu
                $('ul.nav li.dropdown').hover(function() {
                    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
                }, function() {
                    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(100);
                });



            });
        </script>

        <script type="text/javascript">

        </script>

    </body>
</html>