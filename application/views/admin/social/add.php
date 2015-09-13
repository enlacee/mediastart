<div class="col-md-12">
    <h1><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : '' ?></h1>

    <form name="form" id="form" method="post" action="<?php echo base_url("admin_social/add/true") ?>">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>

                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Title:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="name" id="name" class="form-control" placeholder="name"
                                   value="">
                        </span>
                    </td>
                </tr>
                <tr>
                  <td width="15%" class="text-right tableBGTD fontBold">Iconos:</td>
                  <td width="85%" class="text-left">
                    <span class="pdRight20 center-block">
                        <ul class="social_copy">
                            <?php $ps2 = getPublicUrl() . '/images/iconos/social2/'; ?>
                            <li><a target="_blank" href="<?php echo $ps2 ?>amazon.png"><img src="<?php echo $ps2 ?>amazon.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>android.png"><img src="<?php echo $ps2 ?>android.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>appstore.png"><img src="<?php echo $ps2 ?>appstore.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>blogger.png"><img src="<?php echo $ps2 ?>blogger.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>bluetooth.png"><img src="<?php echo $ps2 ?>bluetooth.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>camera.png"><img src="<?php echo $ps2 ?>camera.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>fb.png"><img src="<?php echo $ps2 ?>fb.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>flickr.png"><img src="<?php echo $ps2 ?>flickr.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>foursquare.png"><img src="<?php echo $ps2 ?>foursquare.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>gmail.png"><img src="<?php echo $ps2 ?>gmail.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>google-buzz.png"><img src="<?php echo $ps2 ?>google-buzz.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>google-plus.png"><img src="<?php echo $ps2 ?>google-plus.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>instagram.png"><img src="<?php echo $ps2 ?>instagram.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>line.png"><img src="<?php echo $ps2 ?>line.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>linkedin.png"><img src="<?php echo $ps2 ?>linkedin.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>notepad.png"><img src="<?php echo $ps2 ?>notepad.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>skype.png"><img src="<?php echo $ps2 ?>skype.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>twitter.png"><img src="<?php echo $ps2 ?>twitter.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>utorrent.png"><img src="<?php echo $ps2 ?>utorrent.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>vimeo.png"><img src="<?php echo $ps2 ?>vimeo.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>whatsapp.png"><img src="<?php echo $ps2 ?>whatsapp.png"></a></li>
                            <li><a target="_blank" href="<?php echo $ps2 ?>youtube.png"><img src="<?php echo $ps2 ?>youtube.png"></a></li>
                        </ul>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">URL IMAGE:</td>
                  <td class="text-left">
                    <span class="pdRight20 center-block">
                      <input type="text" name="url_image" id="url_image" class="form-control required"/>
                    </span>
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
