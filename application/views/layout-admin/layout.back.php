
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Acceso de Administrador My Panel</title>
        <?php require 'layout-partial/require_css.php'; ?>

        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/styleAdmin.css">
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/source/jquery.fancybox.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/start/jquery-ui-1.10.4.custom.min.css"/>

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



        <!--Multimedia-->
        <link rel="stylesheet" href="<?php echo getPublicUrl() ?>/uploader/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo getPublicUrl() ?>/uploader/assets/css/lightbox.css">
        <!--Multimedia-->
    </head>

    <body>

        <input type="hidden" id="object_id" value="1">
        <input type="hidden" id="user_id" value="1">
        <input type="hidden" id="type_id" value="1">

        <!-- The template to display files available for upload -->
        <script id="template-upload" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <li class="template-upload fade">
            <span class="preview"></span>
            {% if (file.error) { %}
            <span class="label label-danger">Error</span>
            {% } %}
            {% if (!o.files.error) { %}
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
            </div>
            {% } %}
            </li>
            {% } %}
        </script>

        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <li class="template-download fade {% if (file.image) { %}image{% } %}" id="sort_{%=file.id%}" data-file="{%=file.name%}">
            {% if (file.error) { %}
            <span class="label label-danger">Error</span>
            {% } %}
            {% if (!file.error) { %}
            <span class="preview" title="{%=file.title%}">
            {% if (file.image) { %}
            <a href="{%=file.url%}" title="{%=file.title%}" data-lightbox="gallery-{%=file.object_id%}"><img src="{%=file.thumbnailUrl%}" width="80" height="80"></a>
            {% } else { %}
            <span class="filetype {%=file.filetype%}"></span>
            {% } %}
            </span>
            <div class="description">{%=file.description%}</div>            
            <div class="actions">
            <i class="glyphicon glyphicon-edit edit-file" title="Edit"></i>
            {% if (file.image) { %}
            <i class="glyphicon glyphicon-picture crop-image" data-url="{%=file.url%}" data-width="{%=file.width%}" data-height="{%=file.height%}" title="Crop Thumbnail"></i>
            {% } %}
            <i class="glyphicon glyphicon-trash delete-file" title="Delete"></i>
            </div>
            {% } %}
            </li>
            {% } %}
        </script>

        <!-- Upload Modal -->
        <div class="modal fade" id="uploadModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Upload Files</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden alert message -->
                        <div class="alert alert-danger upload-max">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            You have exceeded the limit of uploaded images.
                        </div>
                        <div id="fileupload">   
                            <!-- Images list -->
                            <ul class="files images"></ul>
                            <br clear="all">

                            <!-- Attachments list -->
                            <ul class="files attachments"></ul>
                            <br clear="all">

                            <div class="loading-files"></div>

                            <div class="fileupload-buttonbar">
                                <!-- Upload files button -->
                                <span class="btn btn-sm btn-success fileinput-button"><i class="glyphicon glyphicon-upload"></i> <span>Subir</span><input type="file" name="files[]" multiple></span>
                                <!-- Webcam snaphots -->
                                <span class="btn btn-sm btn-info webcam-snap"><i class="glyphicon glyphicon-camera"></i> <span>Webcam</span></span>
                                <!-- Delete all files button -->
                                <button type="button" class="btn btn-sm btn-danger delete-all"><i class="glyphicon glyphicon-trash"></i> <span>Eliminar Todo</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="loading"></span>
                        <button type="button" class="btn btn btn-info" data-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit file Modal -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Editar Imagen</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea class="form-control" id="description"></textarea>
                        </div>
                        <input type="hidden" id="file_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary save">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crop image Modal -->
        <div class="modal fade" id="cropModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Marcar Miniatura</h4>
                    </div>
                    <div class="modal-body">
                        <div id="crop"></div>
                        <input type="hidden" id="x1">
                        <input type="hidden" id="y1">
                        <input type="hidden" id="w">
                        <input type="hidden" id="h">
                    </div>
                    <div class="modal-footer">
                        <span class="loading"></span>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary save">Marcar & Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crop image Modal -->
        <div class="modal fade" id="webcamModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Webcam Captura</h4>
                    </div>
                    <input type="hidden" id="webcam-image">
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <span class="loading"></span>
                        <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary capture" onclick="imgSelect.webcamSnap()">Capturar</button>
                        <button type="button" class="btn btn-info new" onclick="imgSelect.webcam();">Nuevo</button>
                        <button type="button" class="btn btn-success save">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
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

                            <form name="acceso" id="acceso" method="post" action="">
                                <fieldset id="datosForm">
                                    <legend>Acceso de Usuario</legend>


                                    <div class='row'>

                                        <div class='col-sm-12'>    
                                            <div class='form-group'>
                                                <label for="nombre">Usuario:</label>
                                                <input class="{required:true,minlength:4,maxlength:25} form-control" id="username" name="username" type="text" placeholder="Coloque su nombre de usuario" />
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



        <footer class="footerBG">
        </footer>


        <div class="container">
            <div class="row clearfix text-center mgTop20 mgBottom10 font11">
                <div style="color:#777777; text-align:center; width:100%;">Diseño y desarrollo exclusivo <a href="http://www.tb.com.ve" style="color:#0076AB !important;" target="_blank">www.tb.comve</a></div>
                <div style="color:#777777; text-align:center; width:100%;">&copy; 2014 - Todos los derechos reservados</div>
            </div>
        </div>    
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/source/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/jquery-ui-1.10.4.custom.min.js"></script>



        <!--Validador-->
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/jquery.metadata.js"></script>
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/messages_es.js"></script>
        <!--Validador-->



        <!--Menu-->
        <script type="text/javascript" src="<?php echo getPublicUrl() ?>/menuElegante/js/google.js"></script>
        <script type="text/javascript">
            $(function() {
            $().maps();
            });
        </script>
        <!--Menu-->


        <!--Editor-->
        <script src="<?php echo getPublicUrl() ?>/editor/scripts/innovaeditor.js"></script>
        <script src="<?php echo getPublicUrl() ?>/editor/scripts/innovamanager.js"></script>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js" type="text/javascript"></script>-->
        <!--Editor-->


        <!--Multimedia-->
        <script src="<?php echo getPublicUrl() ?>/uploader/assets/js/fileupload.js"></script>
        <script src="<?php echo getPublicUrl() ?>/uploader/assets/js/lightbox-2.6.min.js"></script>
        <script src="<?php echo getPublicUrl() ?>/uploader/assets/js/script.js"></script>
        <!--Multimedia-->


        <!--FancyBox-->
        <script type="text/javascript">
            $(function() {
            $(".fancybox").fancybox({
            maxWidth: 800,
            maxHeight: 600,
            fitToView: false,
            width: '70%',
            height: '70%',
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none'
            });
            });
        </script>
        <!--FancyBox-->




        <script type="text/javascript">
            $(function() {

            function getID(url) {

            var Marcador = url.lastIndexOf("=");
            if (Marcador > 0 && url.length - 1 != Marcador) {

            return url.substring(Marcador + 1);
            }
            }

            //Obtiene el ID
            if (getID(window.location.href)) {

            //Si el usuario no es valido
            if (getID(window.location.href) == 0) {
            setTimeout(function() {
            $("#mensajes").slideUp("slow");
            }, 6000);
            $("#mensajes").html('<p class="alert-danger">El usuario no existe en nuestra base de datos.</p>')
            $("#mensajes").slideDown(600);
            $("#mensajes").css("display", "block");
            }

            //Si la clave no es valida
            if (getID(window.location.href) == 1) {
            setTimeout(function() {
            $("#mensajes").slideUp("slow");
            }, 6000);
            $("#mensajes").html('<p class="alert-danger">La contraseña ingresada es incorrecta.</p>')
            $("#mensajes").slideDown(600);
            $("#mensajes").css("display", "block");
            }


            //Si la clave no es valida
            if (getID(window.location.href) == 3) {
            setTimeout(function() {
            $("#mensajes").slideUp("slow");
            }, 6000);
            $("#mensajes").html('<p class="alert-danger">La información que ingresó no es correcta.</p>')
            $("#mensajes").slideDown(600);
            $("#mensajes").css("display", "block");
            }


            //Si el email no existe para resetear la contraseña
            if (getID(window.location.href) == 4) {
            setTimeout(function() {
            $("#mensajes").slideUp("slow");
            }, 6000);
            $("#mensajes").html('<p class="alert-danger">El email no existe en nuestra base de datos.</p>')
            $("#mensajes").slideDown(600);
            $("#mensajes").css("display", "block");
            }



            //Mensaje de email enviado para resetear contraseñaSolicitud 
            if (getID(window.location.href) == 5) {
            setTimeout(function() {
            $("#mensajes").slideUp("slow");
            }, 6000);
            $("#mensajes").html('<p class="alert-success">Revise su correo, le hemos enviado todos los pasos a seguir para resetear su contraseña.</p>')
            $("#mensajes").slideDown(600);
            $("#mensajes").css("display", "block");
            }


            // Mensaje cuando el usaurio cambia su contraseña
            if (getID(window.location.href) == 6) {
            setTimeout(function() {
            $("#mensajes").slideUp("slow");
            }, 10000);
            $("#mensajes").html('<p class="alert-success">Su clave se reseteo correctamente! Revise su correo, le hemos enviado su nueva clave, una vez que haya ingresado la puede cambiar.</p>')
            $("#mensajes").slideDown(600);
            $("#mensajes").css("display", "block");
            }

            }


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

            });




            //Validar campos
            $(function() {

            $('#acceso').validate({
            //Detecta cuando se realiza el submit o se presiona el boton
            submitHandler: function() {

            $("#entrar").attr("type", "button");
            $("#acceso").submit();
            return false;
            },
            //Detecta los error y abre los span con los posibles errores
            errorPlacement: function(error, element) {
            error.insertAfter(element);
            }
            });

            });



            });
        </script>



    </body>
</html>
