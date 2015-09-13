<script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/bootstrap.min.js"></script>

<!--Menu-->
<script type="text/javascript" src="<?php echo getPublicUrl() ?>/menuElegante/js/google.js"></script>
<script type="text/javascript">
    $(function(){
        $().maps();
    });
</script>
<!--Menu-->

<!-- file UPLOAD -->
<script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/admin/pekeUpload.min.js"></script>

<?php if (isset($js)) : ?><?php foreach ($js as $key => $value): ?>
<script type="text/javascript" src="<?php echo getPublicUrl() . $value; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<?php if (isset($jstring)) : ?>
    <?php foreach ($jstring as $key => $value): ?>
<script type="text/javascript"><?php echo $value; ?></script>
    <?php endforeach; ?>
<?php endif; ?>
