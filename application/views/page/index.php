
<?php if(isset($latestNews)) : ?>   
    <div class="latestNews">
        <h1 class="mayuscula"><?php echo $latestNews['title'] ?></h1>
        <?php 
            $pathImagen = $latestNewsPath . $latestNews['url_image'];
            $width = 300;
            $height = 275;
            $imageNameThumb = create_thumbnail($pathImagen, $width, $height);
            $urlImg = $latestNewsUrl . $imageNameThumb;
        ?> 
        <div class="latestNewsImage">
            <img width="300" height="275" class="img-responsive" src="<?php echo $urlImg ?>"
                 alt="<?php echo $latestNews['title'] ?>" title="<?php echo $latestNews['title'] ?>">
        </div>        
        
        <div class="latestNewsDescripcion">
            <p><?php echo $latestNews['content'] ?></p>
            <p class="clearfix"></p>
                       
            <h2 >Comment</h2>     
            <?php if (validation_errors()):?>
            <div class="alert alert-danger">
            <?php echo validation_errors();?>
            </div>
            <?php endif;?>
         
            <?php 
            echo form_open(
                    '',
                    array('name' => 'comment', 'id' => 'comment', 'method' => 'POST', 'class' => 'form-horizontal'),
                    array('token' => $token, 'id_post' => $latestNews['id']));
            ?>            
            <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-4">
                    <input type="text" name="name" id="name" class="form-control input-sm" value="<?php echo set_value('name'); ?>">        
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                    <input type="text" name="email" id="email" class="form-control input-sm" value="<?php echo set_value('email'); ?>" autocomplete="off">        
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Comment</label>
                <div class="col-sm-4">
                    <textarea name="comment" id="comment" class="form-control input-sm" cols="45" rows="8"><?php echo set_value('comment'); ?></textarea>                          
                </div>
            </div>  
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Captcha</label>
                <div class="col-sm-4">
                    <span class="col-sm-6"><?php echo $captcha_image ?>&nbsp;</span>
                    <span class="col-sm-6">
                        <input type="text" name="captcha" id="captcha" class="form-control input-sm" value="" autocomplete="off"/>
                        <input type="hidden" name="captcha_word" id="captcha_word" value="<?php echo $captcha_word ?>"/>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary input-sm">Post Comment</button>
                </div>        
            </div>
            </form>
           
        </div>
        
        <?php if (is_array($latestNewsComment)&& count($latestNewsComment)>0) : ?>
        <h2>Comment Post (<?php echo count($latestNewsComment) ?>)</h2>
        <div>
            <ul>
            <?php foreach ($latestNewsComment as $array) : ?>
            <li class="comment">
                <article class="comment-body">
                    <footer class="comment-meta">
                        <div class="comment-author vcard">                                
                            <img alt="" src="<?php echo getPublicUrl() ?>/images/avatar.png" height="34" width="34"/>
                            <b class="fn"><?php echo $array['name'] ?></b>
                        </div>
                        <div class="label label-default"><?php echo $array['created_at'] ?></div>
                    </footer>

                    <div class=""><?php echo $array['comment'] ?></div>
                </article>
            </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>        


        <!--RedesSociales-->
            <br/>
            <p class="clearfix"> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/facebook.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/twitter.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/myspace.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/yahoo.png" width="40" height="40" /></a>  
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/linkedin.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/delicious.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/orkut.png" width="40" height="40" /></a> 
                <a href="#"><img src="<?php echo getPublicUrl() ?>/images/iconos/social/digg.png" width="40" height="40" /></a> 
            </p>             
            <br/>
        <!--End RedesSociales-->
    </div>
<?php else: ?>
not found latestNew.
<?php endif; ?>