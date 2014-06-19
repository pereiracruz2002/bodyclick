<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); 

?>
<div class="row">
        <div class="col-md-3 hidden-phone">
          <h3>Mais Votadas</h3>
           <?php include_once("menu-votadas.php"); ?>
        </div>
        <div class="col-md-9">
          <div class="post">
            <!--<div class="btn-group pull-right hidden-xs">
              <button class="btn btn-default">E-mail</button>
              <button class="btn btn-default">Imprimir</button>
              <button class="btn btn-default">Curtir</button>
            </div>-->
           
            <?php
            $categoria = get_the_category( $id );
            $cat = $categoria[0]->name;
            if($cat=="Artigos"):?>
            <div id="post-<?php the_ID(); ?>" class="central">
          <h1><?php the_title(); ?></h1>
            <div class="info-post">
              <span class="data-post">Data da Publicação: <?php the_time('j \d\e F \d\e Y') ?></span>
              - <span class="categoria-post">Categoria: <a href="#"><?php $categoria = get_the_category( $id ); echo $categoria[0]->name; ?></a></span>
            </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col-md-12">
                  <?php the_post_thumbnail('thumbnail', array('class' => 'flutuar-img')); ?>
                   <?php the_content(); ?>
                </a>
              </div>
             
            </div>
            <?php else:?> 
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" class="central">
					<h1><?php the_title(); ?></h1>
            <div class="info-post">
              <span class="data-post">Data da Publicação: <?php the_time('j \d\e F \d\e Y') ?></span>
              - <span class="categoria-post">Categoria: <a href="#"><?php $categoria = get_the_category( $id ); echo $categoria[0]->name; ?></a></span>
            </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col-md-5">
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
                  <?php $image_gd = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'big' ); ?>
                 <a href="<?php echo $image_gd[0]; ?>" class="link_zoom" title="<?php the_title(); ?>" >
                <img src="<?php echo $image[0]; ?>"  title="<?php the_title(); ?>"/>
                </a>
              </div>
              <div class="col-md-7" style="margin-bottom: 20px;">
                <?php the_content(); ?>

                <?php //echo get_post_custom_values("preco")[0];?>
                <?php //echo get_post_custom_values("tamanho")[0];?>
              </div>
            </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col-md-12">
					       <?php //the_content(); ?>
                 <div class="row" style="margin-top: 20px;">
                   <div class="col-md-12">
                    <h3>Lojas Disponíveis</h3>
                    <?php 
                    $loja = get_post_custom_values("loja");
                    $sites = get_post_custom_values("url_site");
                    $preco = get_post_custom_values("preco");
  
                    ?>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Site</th>
                            <th>Preço</th>
                            <th>Ir para a loja</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($loja as $lojaindice=>$lojavalue):?>
                          <tr>
                            <td><?php echo $lojavalue;?></td>
                            <td><?php echo $preco[$lojaindice];?></td>
                            <td><a href="<?php echo $sites[$lojaindice];?>" class="btn btn-success" />Ir para o site<a></td>
                          </tr>
                        <?php endforeach;?>
                        </tbody>
                      </table>
                   </div>
                 </div>
              </div>
            </div>

 
<?php endwhile; ?>
<?php endif; ?>

            <br>

            <!--<div class="btn-group hidden-xs">
              <button class="btn btn-info"><img src="img/twitter2.png" class="flutuar-ico"> Publicar no Twitter</button>
              <button class="btn btn-info"><img src="img/facebook.png" class="flutuar-ico"> Publicar no Facebook</button>
            </div>
            <div class="btn-group visible-xs">
              <button class="btn btn-info"><img src="img/twitter2.png" class="flutuar-ico">Twitter</button>
              <button class="btn btn-info"><img src="img/facebook.png" class="flutuar-ico">Facebook</button>
              <button class="btn btn-info">&rarr;</button>
            </div>-->
            <div class="clearfix"></div>
            <?php comments_template( '', true ); ?>
            
          </div>
        </div>
      </div>


     <div id="conteudo">
			  </div><!-- #central -->
		</div><!-- #conteudo -->
<?php get_footer(); ?>
   </div>
   <script type="text/javascript">
$(document).ready(function(){
   var zoom = { 
              zoomType: 'standard',
              alwaysOn:false,  
              zoomWidth: 300,  
              zoomHeight: 250,  
              showEffect : 'fadein',  
              hideEffect: 'fadeout'   
          };  

          $('.link_zoom').jqzoom(zoom);  
});
</script>
</body>

</html>