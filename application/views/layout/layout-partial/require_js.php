    
    <script src="<?php echo getPublicUrl() ?>/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo getPublicUrl() ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo getPublicUrl() ?>/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="<?php echo getPublicUrl() ?>/js/jquery.ui.datepicker-es.min.js"></script>
    <script src="<?php echo getPublicUrl() ?>/source/jquery.fancybox.js"></script>

    <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/jquery.metadata.js"></script>
    <script type="text/javascript" src="<?php echo getPublicUrl() ?>/js/validate/messages_es.js"></script>


    <script type="text/javascript">
        $(function() {
            $("#fancyBox").fancybox({
                maxWidth: 800,
                maxHeight: 600,
                fitToView: false,
                width: '90%',
                height: '90%',
                autoSize: false,
                closeClick: false,
                openEffect: 'none',
                closeEffect: 'none'
            });
        });

        // second script
        $(function() {
            //FechaBox
            $("#fecha").datepicker({
                showButtonPanel: false
            });                
            //Idiomas
            $('.dropdown-toggle').dropdown();                
            //Tab
            $('#myTab a').click(function(e) {
                e.preventDefault()
                $(this).tab('show')
            });
            //Agrega clase al Slider para que pueda funcionar
            $('#esliderWeb div:last-child').addClass("active");
            //Menu
            $('ul.nav li.dropdown').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
            }, function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(100);
            });
        });
    </script>

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