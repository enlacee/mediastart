<div class="col-md-12">
    <h1><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : '' ?></h1>
    <?php $this->load->view('admin/portfolio/_gallery.php', array('data' => array())) ?>

    <form name="form" id="form" method="post" action="<?php echo base_url("admin_portfolio/add/true") ?>">
        <input type="hidden" name="flag" value="video">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Gallery:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="url_image" id="url_image" class="form-control"
                            readonly>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Name:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="title" id="title" class="form-control required" placeholder="Name"
                            minlength="3" maxlength="50" value="">
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
                        <option value="<?php echo $array['id'] ?>"><?php echo $array['name'] ?></option>
                        <?php endforeach;?>
                    <?php endif; ?>
                    </select>
                  </td>
                </tr>
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Video ID:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="url_video" id="url_video" class="form-control" value="" autocomplete="off"/>
                            <input type="text" name="url_image_link" id="url_image_link" class="form-control" value="" readonly="" />
                        </span>Ejm : https://vimeo.com/<b>81244498</b>
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
