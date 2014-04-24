
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>My Panel</title>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/admin/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/admin/style.css">

        <!--[if lt IE 9]>
        <script src="<?php echo getPublicUrl() ?>/js/html5.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <header>
            <div class="head-bg">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div style="text-align:center !important; width:100%; max-width:230px; margin:0 auto;">
                                <img src="<?php echo getPublicUrl() ?>/images/logo.png" class="img-responsive" width="230" height="61" />
                            </div>
                        </div>
                    </div>
                </div><!--End Container-->
            </div>
        </header>

        <div class="container mgTop30">
            <div class="row clearfix">
                <div class="col-md-12">
                    <h1 style="color:#0A9CCC; font-size:16px; font-weight:bold !important; text-align:center; width:100%; margin:0 0 20px 0;">Sistema de administración</h1>

                    <p style="font-size:13px; margin:0 0 20px 0; padding:0; display:block; width:100%; text-align:center;">
                        100% Seguro <img width="20" height="20" alt="Sistema de seguridad" src="<?php echo getPublicUrl() ?>/images/secure.png">
                    </p>

                    <div class="content mgTop20 mgBottom30 pd20" style="width:100%; max-width:400px; margin:0 auto !important;">
                        <!--Left-->
                        <div class="col-md-12 text-left">
                            <div id="mensajes" style="display:none"></div>
                            
                            <?php 
                            echo form_open(
                                    '/admin/login',
                                    array('name' => 'acceso', 'id' => 'acceso', 'method' => 'POST'),
                                    array('token' => $token));
                            ?>                            
                            <!--<form name="acceso" id="acceso" method="post" action="">-->
                                <fieldset id="datosForm">
                                    <legend>Acceso de Usuario</legend>
                                    <div class='row'>
                                        <div class='col-sm-12'>    
                                            <div class='form-group'>
                                                <label for="nombre">Usuario:</label>
                                                <input class="{required:true,minlength:4,maxlength:25} form-control" id="username" name="username" type="text" placeholder="Coloque su nombre de usuario" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class='col-sm-12'>
                                            <div class='form-group'>
                                                <label for="clave">Contrase&ntilde;a:</label>
                                                <input class="{required:true,minlength:1,maxlength:50} form-control" id="pass" name="pass" type="password" placeholder="Coloque su clave secreta" />
                                            </div>
                                        </div>
                                    </div><!--End Row-->

                                    <div class='row'>
                                        <div class='col-sm-12 text-left'>
                                            <input type="submit" name="entrar" class="btn btn-primary" id="entrar" value="Iniciar Sesi&oacute;n" />
                                            <input type="button" name="resetear" id="resetear" class="btn btn-danger" value="Recuperar Contrase&ntilde;a! " />
                                        </div>
                                    </div>
                                </fieldset>
                                <!--END TUS DATOS-->
                            </form>
                            
                            <form name="resetearForm" id="resetearForm" class="hide" method="post" action="">
                                <fieldset id="datosForm">
                                    <legend>Recuperar contrase&ntilde;a</legend>
                                    <div class='row'>
                                        <div class='col-sm-12'>    
                                            <div class='form-group'>
                                                <label for="nombre">Email:</label>
                                                <input class="{required:true,minlength:4,maxlength:25} form-control" id="email" name="email" type="text" placeholder="Coloque email o correo" />
                                            </div>
                                        </div>
                                    </div><!--End Row-->
                                    <div class='row'>
                                        <div class='col-sm-12 text-left'>
                                            <input type="submit" name="resetearClave" id="resetearClave" class="btn btn-success" value="Enviar Clave" />
                                            <input type="button" name="cancelar" id="cancelar" class="btn btn-primary" value="Cancelar" />
                                        </div>
                                    </div>
                                </fieldset>
                                <!--END TUS DATOS-->
                            </form>
                        </div>
                        <!--End Left-->

                    </div>
                </div>
            </div>
        </div>

        <footer class="footerBG"> </footer>

        <div class="container">
            <div class="row clearfix text-center mgTop20 mgBottom10 font11">
                <div style="color:#777777; text-align:center; width:100%;">Diseño y desarrollo exclusivo <a href="http://www.tb.com.ve" style="color:#0076AB !important;" target="_blank">www.tb.comve</a></div>
                <div style="color:#777777; text-align:center; width:100%;">&copy; 2014 - Todos los derechos reservados</div>
            </div>
        </div>    
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/bootstrap.min.js"></script>

        <!--Validador-->
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/jquery.metadata.js"></script>        
        <!--Validador-->

        <script type="text/javascript">
            $(function() {
                $('#resetearForm').valid();

                //Recuperar clave
                $("#resetear").click(function() {
                    $("#acceso").fadeOut("fast");
                    $("#resetearForm").fadeIn("fast", function() {
                        $("#resetearForm").removeClass("hide")
                    });
                });

                //Recuperar clave
                $("#cancelar").click(function() {
                    $("#resetearForm").fadeOut("fast", function() {
                        $("#acceso").fadeIn("fast", function() {
                            $("#acceso").removeClass("hide")
                        });
                    });
                });

            });// End Function Anonimus. 


            //Validar campos
            $(function() {

                $('#acceso').validate({
                    //Detecta cuando se realiza el submit o se presiona el boton
                    submitHandler: function(form) {
                        form.submit();
                    },
                    //Detecta los error y abre los span con los posibles errores
                    errorPlacement: function(error, element) {
                        error.insertAfter(element);
                    }
                });

            });// End Function Anonimus
        </script>
    </body>
</html>
