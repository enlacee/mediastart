<div class="col-md-12">
    <h1><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : '' ?></h1>
    <?php if (isset($data) && !empty($data) && is_array($data)) : ?>
    <form name="form" id="form" method="post" action="<?php echo base_url("admin_portfolio/edit/" . $data['id'] . "/true") ?>">
        <input type="hidden" name="flag" value="video">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>

                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Name:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="title" id="title" class="form-control" placeholder="title"
                                   value="<?php echo $data['title'] ?>">
                        </span>
                    </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Category:</td>
                  <td class="text-left">
                    <select name="category_id" id="category_id" class="form-control input-sm">
                    <option value="">-</option>
                    <?php if ($this->load->get_var('category')) : ?>
                        <?php foreach ($category as $array) : ?>
                        <?php $select = ($data['category_id'] == $array['id']) ? 'selected="selected"' : '';?>
                        <option <?php echo $select ?> value="<?php echo $array['id'] ?>"><?php echo $array['name'] ?></option>
                        <?php endforeach;?>
                    <?php endif; ?>
                    </select>
                  </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Video ID:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="url_video" id="url_video" class="form-control" value="<?php echo $data['url_video'] ?>" autocomplete="off"/>
                            <input type="text" name="url_image_link" id="url_image_link" class="form-control" value="<?php echo $data['url_image_link'] ?>" readonly="" />
                        </span>Ejm : https://vimeo.com/<b>81244498</b>
                    </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Status:</td>
                  <td class="text-left">
                    <select name="status" id="status" class="form-control input-sm">
                    <option value="">Select</option>
                    <option <?php echo ($data['status'] == Portfolio_model::STATUS_TRUE ) ? 'selected="selected"' : '';?> value="1">On</option>
                    <option <?php echo ($data['status'] == Portfolio_model::STATUS_FALSE ) ? 'selected="selected"' : '';?>value="0">Off</option>
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
