<!--Column-->
<div class="col-md-12">

    <div class="porfolioCtn pdTop10 pdRight10 pdBottom20 pdLeft10">

        <h1>Gallery: <?php echo (isset($category_name)) ? $category_name : ''; ?></h1>

        <?php if(isset($work) && count($work)>0) : ?>
            <?php foreach ($work as $array) : ?>
        <?php 
            $pathImagen = $workPath . $array['url_image'];
            $width = 375;
            $height = 197;
            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
            $urlImg = $workUrl . $imageNameThumb;
        ?>             
            <!--Box-->
            <div class="porfolioCtnVideo">
                <div class="porfolioCtnVideoShow">
                        <img src="<?php echo $urlImg ?>" width="375" height="197" class="img-responsive"
                             alt="<?php echo $array['title']?>"/>
                    <div class="porfolioCtnVideoIframe hide">
                        <iframe src="//player.vimeo.com/video/81244498" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>
                <h3 class="porfolioCtnVideoTitulo">
                    <a href="categoria-video.php"><?php echo $array['title']?></a>
                </h3>
            </div>
            <!--End Box-->            
        <?php endforeach; ?>
            
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
        <?php else : ?>    
            Not found data.
        <?php endif; ?>
        
        



    </div>

</div>
<!--End Column-->