<?php require_once "class/class.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("headTop.php"); ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Nosotros</title>
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
        
            <!--ColumnLef-->
            <div class="col-md-8 pd0">
            
            	<div class="overFlow">
                	<img src="images/bannerSeccionBody/imagen.jpg" width="970" height="470" class="img-responsive" />
                </div>
                
            	<div class="leftCtn pd20">
            		<h2>LA EMPRESA</h2>
                    <p>Descripción Español</p>
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




</body>
</html>