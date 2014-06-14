<div class="col-md-12">
    <h1><?php echo (isset($page_title)) ? $page_title : ''; ?></h1>

    <form name="form" id="form" method="post" action="<?php echo base_url("admin_post/postdel/{$id}/true") ?>">
        <p>Content</p>
        <div class="bg-danger pd10">
            <p class="fontBold mg0">This sure you want to delete this record? This option can not be undone!</p>
        </div>

        <input type="submit" name="aceptar" class="btn btn-danger" id="aceptar" value="Accept" />
        <input type="button" name="cancelar" class="btn btn-primary" id="cancelar" value="Cancel" onclick="javascript:history.back();" />
    </form>
</div>