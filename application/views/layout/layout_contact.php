
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $title ?></title>
        <?php require 'layout-partial/require_css.php';?>
    </head>

    <body>
        <div class="container">
        <?php require_once 'layout-partial/header.php'; ?>

            <!--CtnBody-->
            <div id="ctnBody">        
              <div class="row">

                <!--ColumnLef-->
                <div class="col-md-8 col col_1">
                  <div class="ctn">
                    <?php echo $content_for_layout; ?>
                  </div>
                </div>
                <!--End ColumnLef-->

                <!--ColumnRight-->
                <div class="col-md-4 col col_2">
                  <div class="ctn">
                    <div class="rightCtn">
                      <?php if (isset($columRight)) : // columRight_ourTeam.php ?>
                          <?php require_once "layout-partial/columRight_{$columRight}.php"; ?>
                      <?php else :?>
                          <?php require_once "layout-partial/columRight_ourTeam.php"; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <!--End ColumnRight-->

              </div>
            </div>
            <!--End CtnBody-->

        <?php require_once 'layout-partial/footer.php'; ?>
        </div><!--End Container-->

        <div class="container">
            <div class="row clearfix text-center mgBottom10 font11">
                <span style="color:#777777;">&copy; 2015</span>
            </div>
        </div>

        <?php require 'layout-partial/require_js.php';?>
    </body>
</html>
