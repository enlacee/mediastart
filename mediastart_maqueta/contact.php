<?php require_once "class/class.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("headTop.php"); ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact</title>
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
                
                
                	<h2 class="mayuscula">Our team</h2>
                    <p>Descripción de Our team.</p>
                    
                	
                     <?php for($i=1; $i <=4; $i++) { ?>
                    <!--ourTeamContact-->
					<div class="ourTeamContact">
   
                        <div class="ourTeamContactImage">
                            <img src="images/ourTeam/image.jpg" width="274" height="251" class="img-responsive" />
                        </div>
                        
                        <div class="ourTeamContactImageNextCtn">
                            <h3>NOMBRE DEL INTEGRANTE</h3>
                            <p class="mayuscula">Cargo del integrante.</p>
                            <p>Telefono: +(00) 0000 - 000.00.00</p>
                            <p>email@email.com</p>
                            <p>Skyper: username</p>
                        </div>

                    </div>
                    <!--End ourTeamContact-->
                     <?php } ?>
                    
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