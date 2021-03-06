<div class="col-md-12">
    <h1><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : '' ?></h1>
    <?php if (isset($data) && !empty($data) && is_array($data)) : ?>
        <form name="form" id="form" method="post" action="/admin_comment/commentedit/<?php echo $data['id'] ?>/true">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>
                
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Author:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                   value="<?php echo $data['name'] ?>">
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Email:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="email" id="email" class="form-control" placeholder="email@email.com"
                                   value="<?php echo $data['email'] ?>">
                        </span>
                    </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Content:</td>
                  <td class="text-left">
                      <textarea class="form-control" name="comment"  id="comment"><?php echo $data['comment'] ?></textarea>
                  </td>
                </tr>
               <tr>
                  <td class="text-right tableBGTD fontBold">Status:</td>
                  <td class="text-left">
                    <select name="status" id="status" class="form-control input-sm">
                    <option value="">Select</option>                    
                    <option <?php echo ($data['status'] == Post_model::STATUS_TRUE ) ? 'selected="selected"' : '';?> value="1">approved On</option>
                    <option <?php echo ($data['status'] == Post_model::STATUS_FALSE ) ? 'selected="selected"' : '';?>value="0">approved Off</option>
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