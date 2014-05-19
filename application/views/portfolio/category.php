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
            
            if (!empty($array['url_image_link'])) {
               $urlImg =  $array['url_image_link'];
            }
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
                    <a href="<?php echo base_url('portfolio/video/' . $array['id']) ?>"><?php echo $array['title']?></a>
                </h3>
            </div>
            <!--End Box-->            
        <?php endforeach; ?>
            
        <!--Paginador-->
        <div class="text-center pdTop10" id="paginador">
            <ul class="pagination">
                <?php 
                //echo "<pre>"; print_r($pag); echo "</pre>";                
                $nextpage= $pag['page'] +1;
                $prevpage= $pag['page'] -1;
                ?>
                <?php if ($pag['page'] == 1) : //SI ES LA PRIMERA PÁGINA DESHABILITO EL BOTON DE PREVIOUS, MUESTRO EL 1 COMO ACTIVO Y MUESTRO EL RESTO DE PÁGINAS ?>
                    <li class="disabled"><a href="#">&laquo; Previous</a></li>
                    <li class="active" ><a href="#">1</a></li>
                    
                    <?php for ($i = $pag['page']+1; $i <= $pag['last_page']; $i++) : ?>
                    <li><a href="<?php echo base_url('portfolio/category/'. $category_id . '/'. $i) ?>"><?php echo $i;?></a></li>
                    <?php endfor; ?>                    
                    
                    <?php if ($pag['last_page'] > $pag['page'] ) : //Y SI LA ULTIMA PÁGINA ES MAYOR QUE LA ACTUAL MUESTRO EL BOTON NEXT O LO DESHABILITO ?>
                        <li class="next"><a href="<?php echo base_url('portfolio/category/' . $category_id . '/' . $nextpage) ?>" >Next &raquo;</a></li>
                    <?php else : ?>
                        <li class="disabled"><a href="#">Next &raquo;</a></li> 
                    <?php endif; ?>
                    
                <?php else : //EN CAMBIO SI NO ESTAMOS EN LA PÁGINA UNO HABILITO EL BOTON DE PREVIUS Y MUESTRO LAS DEMÁS ?>
                        <li class="previous"><a href="<?php echo base_url('portfolio/category/' . $category_id . '/' . $prevpage) ?>">&laquo; Previous</a></li>                   
                
                    <?php for($i= 1; $i<= $pag['last_page'] ; $i++) : ?>
                        <?php  if($pag['page'] == $i) :  //COMPRUEBO SI ES LA PÁGINA ACTIVA O NO ?>
                            <li class="active"><a href="#"><?php echo $i;?></a></li>
                        <?php else : ?>
                            <li><a href="<?php echo base_url('portfolio/category/' . $category_id . '/' . $i) ?>" ><?php echo $i;?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                            
                    <?php if ($pag['last_page'] > $pag['page']) : //Y SI NO ES LA ÚLTIMA PÁGINA ACTIVO EL BOTON NEXT ?>
                            <li><a href="<?php echo base_url('portfolio/category/' . $category_id . '/' . $nextpage) ?>">Next &raquo;</a></li>
                    <?php else : ?>
                        <li class="disabled"><a href="#">Next &raquo;</a></li>
                    <?php endif; ?>     
                    
                <?php endif; ?>
                <!-- code old -->

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
        <div id="porfolioCtnVideoIframeShow" class="videoCtn"></div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



