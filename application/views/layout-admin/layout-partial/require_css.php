<link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/redmond/jquery-ui-1.10.4.custom.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/source/jquery.fancybox.css">

<?php if (isset($css)): ?>
    <?php foreach ($css as $key => $value): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() . $value; ?>" >
    <?php endforeach; ?>
<?php endif; ?>

<!--[if lt IE 9]>
<script src="<?php echo getPublicUrl() ?>/js/html5.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->        