<?php require_once "class/class.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("headTop.php"); ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home zzz</title>
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
<?php include "eslider.php"; ?>
<!--End Slider--> 
   
   
   
   
   
   
   
   
   
   
   
<!--Tab Center-->
<div class="row clearfix">
<?php include "tabCenterSlider.php"; ?>
</div>
<!--End Tab Center--> 
   
   
   
   
   
  
  
  
  
  
  
  
<!--CtnBody-->
<div class="row clearfix">
    <div class="col-md-12">
    
    	<div id="ctnBody">
        
            <!--ColumnLef-->
            <div class="col-md-8">
            	<div class="leftCtn pd10">
            		<h2>LATEST NEWS</h2>
                    
                    
                    <?php for($i=1; $i <=4; $i++) { ?>
                    <!--Box LatestNews-->
                    <div class="latesNewsBox">
                    	<div class="latesNewImg">
                        	<img src="images/latest-news/image.jpg" width="300" height="275" class="img-responsive" />
                        </div>
                        
                        <div class="latesNewCtn">
                        	<p class="latesNewCtnFecha">07 de April del 2014</p>
                        	<h3>Lorem Ipsum es simplemente el texto de relleno</h3>
                            <p class="font12">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.</p>
                            <div class="readMoreComment">
                            	<span class="readMore"><a href="lastest-new.php" class="btn btn-tamam-ashxarh-ptut-eka-1 btn-xlarge font13">READ MORE</a></span>
                            	<span class="latesNewComment"><a href="javascript:voice(0)">0 comment(s)</a></span>
                            </div>
                        </div>
                        
                    </div>
                    <!--End Box LatestNews-->
                    <?php } ?>
                    
                    
                </div>
            </div>
            <!--End ColumnLef-->
            
            
            
            <!--ColumnRight-->
            <div class="col-md-4" id="rightColBG">
            	<?php include "right.php"; ?>
            </div>
            <!--End ColumnRight-->
            
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
    

<?php include "copy.php"; ?>
    
<?php include "footerLib.php"; ?>


<script type="text/javascript">

</script>

</body>
</html>