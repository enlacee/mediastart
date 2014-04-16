<!--Column-->
<div class="col-md-12">
    <div class="porfolioCtn pdTop10 pdRight10 pdBottom20 pdLeft10">

        <h1>Gallery: <?php echo (isset($category_name)) ? $category_name : ''; ?></h1>

        <?php if (isset($portfolio) && count($portfolio) > 0) : ?>
            <?php foreach ($portfolio as $array) : ?>
        <?php 
            $pathImagen = $portfolioPath . $array['url_image'];
            $width = 375;
            $height = 197;
            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
            $urlImg = $portfolioUrl . $imageNameThumb;
        ?>             
            <!--Box-->
            <div class="porfolioCtnVideo">
                <div class="porfolioCtnVideoShow">
                        <img src="<?php echo $urlImg ?>" width="375" height="197" class="img-responsive"
                             alt="<?php echo $array['title']?>" data="<?php echo $array['url_video']?>"/>
                    <div class="porfolioCtnVideoIframe hide">
                        hello word.
                        <!--<iframe src="//player.vimeo.com/video/81244498" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
                    </div>
                </div>
                <h3 class="porfolioCtnVideoTitulo">
                    <a href="/portfolio/video/<?php echo $array['id'] ?>"><?php echo $array['title']?></a>
                </h3>
            </div>
            <!--End Box-->            
        <?php endforeach; ?>
            
        <!--Paginador-->
        <div class="text-center pdTop10" id="paginador">
            <ul class="pagination">
                <?php 
                $urlPrev = '/portfolio/category/';
                $category = $category_id.'/';
                $pag = ($page>1) ? ($page-1) : $page;
                $urlPrev .= $category . $pag;
                ?>                
                <li class="disabledx"><a href="<?php echo $urlPrev ?>">« Previous</a></li>
                <!--<li class="active"><a title="Go to page 1 of 12" href="#">1</a></li>
                <li><a title="Go to page 2 of 12" href="/index.php?page=2&ipp=10">2</a></li>
                <li><a title="Go to page 3 of 12" href="/index.php?page=3&ipp=10">3</a></li>-->
                <?php 
                $urlNext = '/portfolio/category/';
                $category = $category_id.'/';
                $pag = ($page+1);
                $urlNext .= $category . $pag;
                ?>
                <li><a href="<?php echo $urlNext ?>">Next »</a></li>
            </ul>
        </div>
        <!--End Paginador-->            
        <?php else : ?>    
            Not found data.
        <?php endif; ?>

    </div>
</div>
<!--End Column-->


<div class="modal fade" id="videoPorfolio">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p id="porfolioCtnVideoIframeShow" class="videoCtn"></p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



