<div class="col-md-12">
    <h1><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : '' ?></h1>
    <?php if (isset($data) && !empty($data) && is_array($data)) : ?>
    <form name="form" id="form" method="post" action="<?php echo base_url("admin_lastwork/edit/" . $data['id'] . "/true") ?>">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>
                
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Title:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="title" id="title" class="form-control" placeholder="title"
                                   value="<?php echo $data['title'] ?>">
                        </span>
                    </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Enlace</td>
                  <td class="text-left">
                      <span class="pdRight20 center-block">
                        <input type="text" name="enlace" id="enlace" class="form-control" placeholder="Coloque su enlace" value="<?php echo $data['enlace'] ?>" />
                      </span>
                  </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Image:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="file" id="file" name="file" />
                        </span>
                        <div class="alert alert-danger mgTop10 mgBottom1">Image Size <strong>Width:</strong> 100px and <strong>Height:</strong> 100px</div>
                    </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Content:</td>
                  <td class="text-left"><label for="editor"></label>
                      <textarea class="" name="editor" id="editor"><?php echo $data['description'] ?></textarea></td>

                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Status:</td>
                  <td class="text-left">
                    <select name="status" id="status" class="form-control input-sm">
                    <option value="">Select</option>                    
                    <option <?php echo ($data['status'] == Work_model::STATUS_TRUE ) ? 'selected="selected"' : '';?> value="1">On</option>
                    <option <?php echo ($data['status'] == Work_model::STATUS_FALSE ) ? 'selected="selected"' : '';?>value="0">Off</option>
                    </select>
                  </td>
                </tr>                 
                
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">&nbsp;</td>
                    <td width="85%" class="text-left">
                        <input type="submit" name="guardar" id="guardar" class="btn btn-success" value="Save" />&nbsp;
                        <input type="button" name="cancelar" id="cancelar" class="btn btn-primary" onClick="javascript:history.back()" value="Back" />
                    </td>
                </tr>
                
            </tbody>  
        </table>
        </form>
    <?php endif; ?>
</div>

<div class="col-md-12">
    <a href="javascript:voice(0);" class="btn btn-primary enlaceBlanco" onClick="javascript:history.back();">Back</a>
</div>