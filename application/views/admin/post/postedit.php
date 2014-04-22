<div class="col-md-12">
        <h1>Titulo</h1>

        <form name="form" id="form" method="post" action="">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>
                <tr>
                        <td width="15%" class="text-right tableBGTD fontBold">Nombre:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                                <input type="text" name="nombre" id="nombre" class="{required:true,minlength:4,maxlength:25} form-control" placeholder="Coloque su nombre">
                        </span>
                    </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Detalle:</td>
                  <td class="text-left"><label for="editor"></label>
                  <textarea class="{required:true,minlength:4,maxlength:25}" name="editor" id="editor"></textarea></td>
                </tr>
                <tr>
                        <td width="15%" class="text-right tableBGTD fontBold">&nbsp;</td>
                    <td width="85%" class="text-left">
                        <input type="submit" name="guardar" id="guardar" class="btn btn-success" value="Guardar Cambios" />&nbsp;
                        <input type="button" name="cancelar" id="cancelar" class="btn btn-primary" onClick="javascript:history.back()" value="P&aacute;gina Anterior" />
                    </td>
                </tr>
            </tbody>  
        </table>
        </form>
</div>


                <div class="col-md-12">
        <a href="javascript:voice(0);" class="btn btn-primary enlaceBlanco" onClick="javascript:history.back();">P&aacute;gina anterior</a>
</div>