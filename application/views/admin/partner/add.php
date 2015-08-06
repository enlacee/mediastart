<div class="col-md-12">
    <h1><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : '' ?></h1>
    
    <form name="form" id="form" method="post" action="<?php echo base_url("admin_partner/add/true") ?>">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>
                
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Name:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="name" id="name" class="form-control" placeholder="name"
                                   value="">
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Image:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="file" id="file" name="file" />
                        </span>
                        <div class="alert alert-danger mgTop10 mgBottom1">Image Size <strong>Width:</strong> 180px and <strong>Height:</strong> 120px</div>
                    </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Category:</td>
                  <td class="text-left">
                    <select name="category_id" id="category_id" class="form-control input-sm">
                    <option value="">-</option>
                    <?php if ($this->load->get_var('categoryPartner')) : ?>
                        <?php foreach ($categoryPartner as $array) : ?>                        
                        <option value="<?php echo $array['id'] ?>"><?php echo $array['name'] ?></option>
                        <?php endforeach;?>                        
                    <?php endif; ?>
                    </select>
                  </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">URL:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="link_image" id="link_image" class="form-control" value=""/>
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
    
</div>

<div class="col-md-12">
    <a href="javascript:voice(0);" class="btn btn-primary enlaceBlanco" onClick="javascript:history.back();">Back</a>
</div>