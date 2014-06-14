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
   
   
   
   
   
   
   
   
   

   
   
  
  
  
  
  
  
  
<!--CtnBody-->
<div class="row clearfix">
    <div class="col-md-12">
    
    	<div id="ctnBody">
        
            <!--Column-->
            <div class="col-md-12">
            	
                <div class="porfolioCtn pdTop10 pdRight10 pdBottom20 pdLeft10">
                
                	<h1>Gallery: Showreel</h1>
                	
                    <?php for($i=0;$i<9;$i++) { ?>
                    
                    <!--Box-->
                    <div class="porfolioCtnVideo">
                    	<div class="porfolioCtnVideoShow">
                        	<img src="images/porfolio/image.jpg" width="375" height="197" class="img-responsive" />
                            <div class="porfolioCtnVideoIframe hide">
                            	<iframe src="//player.vimeo.com/video/81244498" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                        </div>
                        <h3 class="porfolioCtnVideoTitulo">
                        	<a href="categoria-video.php">Titulo del video</a>
                        </h3>
                    </div>
                    <!--End Box-->
                    
                    <?php } ?>
                    
                    <!--Paginador-->
                    <div class="text-center pdTop10" id="paginador">
                        <ul class="pagination">
                            <li class="disabled"><a href="#">« Previous</a></li>
                            <li class="active"><a title="Go to page 1 of 12" href="#">1</a></li>
                            <li><a title="Go to page 2 of 12" href="/index.php?page=2&ipp=10">2</a></li>
                            <li><a title="Go to page 3 of 12" href="/index.php?page=3&ipp=10">3</a></li>
                            <li><a href="/index.php?page=2&ipp=10">Next »</a></li>
                        </ul>
                    </div>
					<!--End Paginador-->
                    
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