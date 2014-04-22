<div class="col-md-12">
    <h1><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : '' ?></h1>
    <?php if (isset($data) && !empty($data) && is_array($data)) : ?>
        <form name="form" id="form" method="post" action="/admin_post/postedit/<?php echo $data['id'] ?>/true">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>
                
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Title:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="nombre" id="nombre" class="{required:true,minlength:4,maxlength:25} form-control" placeholder="Coloque su nombre"
                                   value="<?php echo $data['title'] ?>">
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Image:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="file" id="file" name="file" />
                        </span>
                    </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Content:</td>
                  <td class="text-left"><label for="editor"></label>
                  <textarea class="{required:true,minlength:4,maxlength:25}" name="editor" id="editor"><?php echo $data['content'] ?></textarea></td>
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
    <?php endif; ?>
</div>


                <div class="col-md-12">
        <a href="javascript:voice(0);" class="btn btn-primary enlaceBlanco" onClick="javascript:history.back();">P&aacute;gina anterior</a>
</div>