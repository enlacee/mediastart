<div class="col-md-12">
    <h1>Titulo</h1>

    <form name="form" id="form" method="post" action="/admin_post/postdel/<?php echo $id ?>/true">
        <p>Contenido</p>
        <div class="bg-danger pd10">
            <p class="fontBold mg0">¿Esta Seguro que desea eliminar este registro? Esta opci&oacute;n no se puede deshacer!</p>
        </div>

        <input type="submit" name="aceptar" class="btn btn-danger" id="aceptar" value="Aceptar" />
        <input type="button" name="cancelar" class="btn btn-primary" id="cancelar" value="Cancelar" onclick="javascript:history.back();" />
    </form>
</div>