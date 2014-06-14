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
    <?php require 'layout-partial/require_css.php'; ?>
    </head>

    <body>
        <?php require_once 'layout-partial/header.php'; ?>

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

        <?php require 'layout-partial/require_js.php';?>
    </body>
</html>
<?php else: ?>
    <?php require_once "salir.php"; ?>
<?php endif; ?>