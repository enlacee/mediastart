<div class="col-md-12">
    <h1><?php echo $page_title; ?> : <a href="<?php echo base_url('admin_category_portfolio/add') ?>" class="btn btn-primary">Add</a></h1>                        

        <table class="table table-hover table-striped table-condensed table-responsive table-bordered">
            <thead>    
                <tr>
                    <th width="3%" class="text-center">ID</th>
                    <th width="30%">Title</th>
                    <th width="10%" class="text-center">Accion</th>
                </tr>
            </thead>    

            <tbody>                            	
            <?php if (isset($data) && is_array($data) && count($data) > 0) : ?>
                <?php foreach ($data as $array) :?>
                    <tr>
                        <td class="text-center"><?php echo $array['id']?></td>
                        <td><?php echo $array['name'] ?></td>
                        <td class="text-center">
                            <a href="<?php echo base_url('admin_category_portfolio/edit/' . $array['id']) ?>"><img src="<?php echo getPublicUrl() ?>/images/actualizar.png" width="20" height="20" /></a>
                        &nbsp;
                        <a href="<?php echo base_url('admin_category_portfolio/del/' . $array['id']) ?>"><img src="<?php echo getPublicUrl() ?>/images/borrar.png" width="20" height="20" /></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>                                
            </tbody>

        </table>                        

        <!--Paginador-->
        <div class="text-center pdTop10" id="paginador">
            <ul class="pagination">
                <?php 
                //echo "<pre>"; print_r($pag); echo "</pre>";                
                $nextpage= $pag['page'] +1;
                $prevpage= $pag['page'] -1;
                ?>
                <?php if ($pag['page'] == 1) : ?>
                    <li class="disabled"><a href="#">&laquo; Previous</a></li>
                    <li class="active" ><a href="#">1</a></li>

                    <?php for ($i = $pag['page']+1; $i <= $pag['last_page']; $i++) : ?>
                    <li><a href="<?php echo base_url('admin_category_portfolio/index/' . $i) ?>"><?php echo $i;?></a></li>
                    <?php endfor; ?>                    

                    <?php if ($pag['last_page'] > $pag['page'] ) : ?>
                    <li class="next"><a href="<?php echo base_url('admin_category_portfolio/index/'. $nextpage) ?>" >Next &raquo;</a></li>
                    <?php else : ?>
                        <li class="disabled"><a href="#">Next &raquo;</a></li> 
                    <?php endif; ?>

                <?php else : ?>
                        <li class="previous"><a href="<?php echo base_url('/admin_category_portfolio/index/' . $prevpage) ?>">&laquo; Previous</a></li>                   

                    <?php for($i= 1; $i<= $pag['last_page'] ; $i++) : ?>
                        <?php  if($pag['page'] == $i) : ?>
                            <li class="active"><a href="#"><?php echo $i;?></a></li>
                        <?php else : ?>
                            <li><a href="<?php echo base_url('admin_category_portfolio/index/' . $i) ?>" ><?php echo $i;?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($pag['last_page'] > $pag['page']) : ?>
                        <li><a href="<?php echo base_url('admin_category_portfolio/index/' . $nextpage) ?>">Next &raquo;</a></li>
                    <?php else : ?>
                        <li class="disabled"><a href="#">Next &raquo;</a></li>
                    <?php endif; ?>     

                <?php endif; ?>
                <!-- code old -->

            </ul>
        </div>
        <!--End Paginador-->

</div>


<div class="col-md-12">
    <a href="javascript:voice(0);" class="btn btn-primary enlaceBlanco" onClick="javascript:history.back();">Back</a>
</div>