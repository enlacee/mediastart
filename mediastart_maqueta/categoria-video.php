<?php require_once "class/class.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("headTop.php"); ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Muestra el video</title>
	<?php include("headBottom.php"); ?>
</head>


<body>
<?php include "body.php"; ?>
<div class="container">

    
<!--Header-->
<header>
<?php include "cabecera.php"; ?>
</header><!--End Header-->
    
        





<!--SectionMenu-->
<section>
<?php include "menu.php"; ?>
</section><!--End SectionMenu-->
    
   
   
   
   
   
<!--Slider-->
<?php //include "eslider.php"; ?>
<!--End Slider--> 
   
   
   
   
   
   
   
   
   
   
   
<!--Tab Center-->
<div class="row clearfix">
<?php //include "tabCenterSlider.php"; ?>
</div>
<!--End Tab Center--> 
   
   
   
   
   
  
  
  
  
  
  
  
<!--CtnBody-->
<div class="row clearfix">
    <div class="col-md-12">
    
    	<div id="ctnBody">
        
            <!--Column-->
            <div class="col-md-12">
            	
                <div class="porfolioCtn pdTop10 pdRight10 pdBottom20 pdLeft10">
                
                	<h1>TITULO DEL VIDEO</h1>
                	
                   	<div class="videoCtn">
                    	<iframe src="//player.vimeo.com/video/81244498" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                  	
                    
                    <!--RedesSociales-->
                    <p><?php include "social.php"; ?></p>
                    <!--End RedesSociales-->
                    
                    
                </div>
                
            </div>
            <!--End Column-->
            

         </div>
         
	</div>
</div>
<!--End CtnBody--> 
  
  
  
  

<!--Footer-->
<div class="row clearfix mgBottom10">
<?php include "footer.php"; ?>
</div>
<!--End Footer-->

   
   
    
    
</div><!--End Container-->
  
<?php include "modal.php"; ?>  

<?php include "copy.php"; ?>
    
<?php include "footerLib.php"; ?>

<script type="text/javascript">

//Muestra video
$(".porfolioCtnVideoShow img").click(function(){
	
	$('#videoPorfolio').modal({
		backdrop: true,
		show: true	
	});
		
	$("#porfolioCtnVideoIframeShow").html($(".porfolioCtnVideoIframe").html());
	
});

</script>


</body>
</html>