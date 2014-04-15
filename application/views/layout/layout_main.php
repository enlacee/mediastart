
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/redmond/jquery-ui-1.10.4.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/source/jquery.fancybox.css">
        <?php require 'layout-partial/require_css.php';?>
        <!--[if lt IE 9]>
        <script src="<?php echo getPublicUrl() ?>/js/html5.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container">
        <?php require_once 'layout-partial/header.php'; ?>

        <?php require_once 'layout-partial/slider.php'; ?>

            <!--CtnBody-->
            <div class="row clearfix">
                <div class="col-md-12">

                    <div id="ctnBody">
                        <!--ColumnLef-->
                        <div class="col-md-8">
                            <div class="leftCtn pd10">
                            <?php echo $content_for_layout; ?>                                
                            </div>
                        </div>
                        <!--End ColumnLef-->

                        <!--ColumnRight-->
                        <?php if (isset($columRight)) : ?>
                            <?php if(is_string($columRight)) : ?>
                            <div class="col-md-4" id="rightColBG">
                                <div class="rightCtn pdTop10">                                
                                <?php   require_once "layout-partial/columRight_{$columRight}.php"; ?>
                                </div>            
                            </div>                                
                            <?php endif;?>
                        <?php else : ?>
                            <div class="col-md-4" id="rightColBG">
                                <div class="rightCtn pdTop10">                                  
                           <?php    require_once "layout-partial/columRight_ourTeam.php"; ?>
                                </div>            
                            </div> 
                        <?php endif; ?>
                        <!--End ColumnRight-->
                    </div>

                </div>
            </div>
            <!--End CtnBody-->

        <?php require_once 'layout-partial/footer.php'; ?>
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
    
        <?php require 'layout-partial/require_js.php';?>
    </body>
</html>