<div class="col-md-12">

    <div class="tabCustom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="ulTab">
          <li class="active" style="background:url(images/tab/tab_border_right.jpg) right 10px no-repeat;"><a href="#one" data-toggle="tab">Home</a></li>
          <li><a href="#two" data-toggle="tab">Populars</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="one">
          
            <?php for($i=1; $i <5; $i++){ ?>
            <!--Item Tab-->
            <div class="tabShowRell">
                <img src="images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
            </div>
            <!--End Item Tab-->
            <?php } ?>
            
          </div>
          <div class="tab-pane" id="two">
          
            <?php for($i=1; $i <5; $i++){ ?>
            <!--Item Tab-->
            <div class="tabShowRell">
                <img src="images/showreel/image.jpg" class="img-responsive" width="218" height="200" />
            </div>
            <!--End Item Tab-->
            <?php } ?>
          
          </div>
        </div>
        <!-- END Nav tabs -->
    </div>
</div>