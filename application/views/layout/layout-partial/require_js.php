<?php if (isset($js)) : ?>
    <?php foreach ($js as $key => $value): ?>
        <script type="text/javascript" src="<?php echo getPublicUrl() . $value; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<?php if (isset($jstring)) : ?>
    <?php foreach ($jstring as $key => $value): ?>
        <script type="text/javascript"><?php echo $value; ?></script>
    <?php endforeach; ?>        
<?php endif; ?>