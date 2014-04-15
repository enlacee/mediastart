<?php if (isset($css)): ?>
    <?php foreach ($css as $key => $value): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() . $value; ?>" >
    <?php endforeach; ?>
<?php endif; ?>