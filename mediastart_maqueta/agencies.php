<?php require_once "class/class.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("headTop.php"); ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agencies</title>
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
            <div class="col-md-8">
            
            	<div class="leftCtn pd10">
                
                	<h2 class="mayuscula">Agencies</h2>
                    
                    <div class="agenciesCtn">
						<?php for($i=1;$i<=15;$i++) { ?>
                        <div class="agenciesCtnImg">
                            <a href="#paginaEsterna" target="_blank"><img src="images/partners/agencies/image.jpg" width="180" height="120" class="img-responsive" /></a>
                        </div>
                        <?php } ?>
                    </div>
                    
                </div>
 
            </div>
            <!--End ColumnLef-->
            
            
            
            
            
            <!--ColumnRight-->
            <div class="col-md-4" id="rightColBG">
            	<div class="rightCtn pdTop10">
            		<?php include "lates_work.php"; ?>
                </div>
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