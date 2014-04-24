<div class="col-md-12">
    <h1><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : '' ?></h1>
    <?php if (isset($data) && !empty($data) && is_array($data)) : ?>
        <form name="form" id="form" method="post" action="/admin_post/pageabout/<?php echo $data['id'] ?>/true">
        <table class="table table-hover table-striped table-condensed table-responsive table-bordered" style="background-image:none !important;">
            <tbody>
                
                <tr>
                    <td width="15%" class="text-right tableBGTD fontBold">Title:</td>
                    <td width="85%" class="text-left">
                        <span class="pdRight20 center-block">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Name"
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
                  <td class="text-left">
                  <textarea class="editore" name="editor" id="editor"><?php echo $data['content'] ?></textarea>
                  </td>
                </tr>
                <tr>
                  <td class="text-right tableBGTD fontBold">Others</td>
                  <td class="text-left">Language</td>
                </tr>
                
                <!-- 01 -->                
                <?php for($i = 1; $i <= 9; $i++) : ?>
                    <tr>
                        <td width="15%" class="text-right tableBGTD fontBold">Title (<?php echo $i ?>):</td>
                        <td width="85%" class="text-left">
                            <span class="pdRight20 center-block">
                                <input type="text" name="nombre_<?php echo $i ?>" id="nombre_<?php echo $i ?>" class="form-control" placeholder="Name"
                                       value="<?php echo $data["title_$i"] ?>">
                            </span>
                        </td>
                    </tr>
                    <tr>
                      <td class="text-right tableBGTD fontBold">Content (<?php echo $i ?>):</td>
                      <td class="text-left">
                      <textarea name="editor_<?php echo $i ?>" id="editor_<?php echo $i ?>"><?php echo $data["content_$i"] ?></textarea>
                      </td>
                    </tr>
                <?php endfor; ?>
                
                
                
                
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