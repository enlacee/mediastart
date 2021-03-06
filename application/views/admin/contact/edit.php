<div class="col-md-12">
    <h1><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : '' ?></h1>
    <?php if (isset($data) && !empty($data) && is_array($data)) : ?>
    <form name="form" id="form" method="post" action="<?php echo base_url("admin_contact/edit/" . $data['id'] . "/true") ?>">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>
                
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Name:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="name" id="nombre" class="form-control" placeholder="name"
                                   value="<?php echo $data['name'] ?>">
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Additional:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="additional" id="additional" class="form-control" placeholder="Optional"
                                   value="<?php echo $data['additional'] ?>">
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Image:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="file" id="file" name="file" />
                        </span>
                        <div class="alert alert-danger mgTop10 mgBottom1">Image Size <strong>Width:</strong> 175px and <strong>Height:</strong> 170px</div>
                    </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Cargo:</td>
                  <td class="text-left">
                    <span class="pdRight20 center-block">
                    <input type="text" name="cargo" id="cargo" class="form-control" value="<?php echo $data['cargo'] ?>"/>
                    </span>
                  </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Phone:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $data['phone'] ?>"/>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Email:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $data['email'] ?>"/>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Skype:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="skype" id="skype" class="form-control" value="<?php echo $data['skype'] ?>"/>
                        </span>
                    </td>
                </tr>                
                <tr>
                  <td class="text-right tableBGTD fontBold">Status:</td>
                  <td class="text-left">
                    <span class="pdRight20 center-block">
                        <select name="status" id="status" class="form-control input-sm">
                        <option value="">Select</option>                    
                        <option <?php echo ($data['status'] == Our_team_model::STATUS_TRUE ) ? 'selected="selected"' : '';?> value="1">On</option>
                        <option <?php echo ($data['status'] == Our_team_model::STATUS_FALSE ) ? 'selected="selected"' : '';?>value="0">Off</option>
                        </select>
                    </span>
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