    <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/admin/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/css/admin/style.css">

    <!--[if lt IE 9]>
            <script src="<?php echo getPublicUrl() ?>/js/html5.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Menu-->
    <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/menuElegante/css/menu.css">
    <link href="<?php echo getPublicUrl() ?>/menuElegante/css/maps.css" rel="stylesheet" />
    <!--Menu-->

    <!--Editor-->
    <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() ?>/editor/bootstrap/bootstrap_extend.css">
            <!--<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>-->
    <!--Editor-->
    
    <!-- file UPLOAD -->
    <link href="<?php echo getPublicUrl() ?>/css/admin/custom.css" rel="stylesheet"> 
    
<?php if (isset($css)): ?>
    <?php foreach ($css as $key => $value): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo getPublicUrl() . $value; ?>" >
    <?php endforeach; ?>
<?php endif; ?>
      