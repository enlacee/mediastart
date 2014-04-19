
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Bienvenido al panel de adminsitraci&oacute;n</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css"/>
        <link rel="stylesheet" type="text/css" href="css/start/jquery-ui-1.10.4.custom.min.css"/>

        <!--[if lt IE 9]>
        <script src="js/html5.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--Menu-->
        <link rel="stylesheet" type="text/css" href="menuElegante/css/menu.css">
        <link href="menuElegante/css/maps.css" rel="stylesheet" />
        <!--Menu-->


        <!--Editor-->
        <link rel="stylesheet" type="text/css" href="editor/bootstrap/bootstrap_extend.css">
        <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
        <!--Editor-->



        <!--Multimedia-->
        <link rel="stylesheet" href="uploader/assets/css/style.css">
        <link rel="stylesheet" href="uploader/assets/css/lightbox.css">
        <!--Multimedia--></head>

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
                            <div class="col-md-6">
                                <div class="logo">
                                    <a href="admin.php"><img src="images/logo.png" class="img-responsive" width="230" height="61" /></a>
                                </div>
                            </div>

                            <div class="col-md-6 pdTop5 text-right">
                                <p class="colorBlanco">Hola <strong style="text-transform:capitalize;">luis</strong>, Bienvenido!</p>
                                <p><a href="mi-cuenta.php">Mi Cuenta</a> <span class="colorBlanco">|</span> <a href="salir.php">Salir</a></p>
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
                            <li class="active"><a href="admin.php">Panel</a></li>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Item</a></li>
                            <li><a href="#">Item</a>
                                <ul>
                                    <li><a href="#">Item</a></li>
                                    <li><a href="#">Item</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:voice(0)" onclick="show_uploader();">Multimedia</a></li>
                            <li><a href="salir.php">Salir</a></li>
                            <li class="search">
                                <form name="buscar" id="buscar" method="post">

                                    <input type="text" name="search" class="search" placeholder="Buscar" />
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div></div>
        <!--End Menu-->









        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="content mgTop20 mgBottom30 pd10">



                        <!--Left-->
                        <div class="col-md-8">
                            <h1>Contenido</h1>
                            <div class="borderEfecto">
                                <p>Muy Pronto estaremos agregando funcionalidades a esta secci&oacute;n.</p>
                            </div>
                        </div>
                        <!--End Left-->





                        <!--Right-->
                        <div class="colRight">
                            <div class="col-md-4">
                                <h1>¿Necesitas Ayuda?</h1>

                                <div class="borderEfecto">
                                    <p><strong>Para resolver dudas o sugerencias!</strong></p>	
                                    <p><strong>Email:</strong></p> 
                                    <p>contacto@tb.com.ve - milindex@gmail.com</p>
                                    <p><strong>Tel&eacute;fonos:</strong></p>
                                    <p>+58 (0281) - 996.93.65</p>
                                </div>
                            </div>                </div>
                        <!--End Right--> 



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
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="source/jquery.fancybox.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>



        <!--Validador-->
        <script type="text/javascript" src="js/validate/jquery.validate.js"></script>
        <script type="text/javascript" src="js/validate/jquery.metadata.js"></script>
        <script type="text/javascript" src="js/validate/messages_es.js"></script>
        <!--Validador-->



        <!--Menu-->
        <script type="text/javascript" src="menuElegante/js/google.js"></script>
        <script type="text/javascript">
            $(function(){
            $().maps();
            });
        </script>
        <!--Menu-->


        <!--Editor-->
        <script src="editor/scripts/innovaeditor.js"></script>
        <script src="editor/scripts/innovamanager.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js" type="text/javascript"></script>
        <script src="scripts/common/webfont.js" type="text/javascript"></script>
        <!--Editor-->


        <!--Multimedia-->
        <script src="uploader/assets/js/fileupload.js"></script>
        <script src="uploader/assets/js/lightbox-2.6.min.js"></script>
        <script src="uploader/assets/js/script.js"></script>
        <!--Multimedia-->


        <!--FancyBox-->
        <script type="text/javascript">
            $(function() {
            $(".fancybox").fancybox({
            maxWidth	: 800,
            maxHeight	: 600,
            fitToView	: false,
            width		: '70%',
            height		: '70%',
            autoSize	: false,
            closeClick	: false,
            openEffect	: 'none',
            closeEffect	: 'none'
            });
            });
        </script>
        <!--FancyBox-->



    </body>
</html>

