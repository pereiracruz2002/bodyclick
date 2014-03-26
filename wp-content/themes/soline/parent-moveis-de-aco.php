<?php get_header(); ?>
     <div id="conteudo">
        <span class="breadcrumbs"><? if(function_exists('bcn_display')) bcn_display(); ?></span>
		    <h1><?php single_cat_title() ?></h1>
		    <div id="descricao-categoria">
		      <?php 
		        $category = get_the_category();
		        query_posts( 'tag=descricao_'.$category[0]->slug); 
		        while ( have_posts() ) : the_post();
		      ?>
		      <?php the_content(); ?>
          <?php endwhile; wp_reset_query(); ?>
        </div><!--#descricao-categoria -->
        <div id="produtoslista">
          <ul class="produtos">
          <? while ( have_posts() ) : the_post(); ?>
                <li>
                   <a href="<?php the_permalink(); ?>" title="<?=the_title_attribute( 'echo=0' )?>">
                   <img src="<?php $values = get_post_custom_values("thumb"); echo imagem($values[0]); ?>" alt="<?php the_title(); ?>" />
                     <p>
                        <strong><?=substr(get_the_title(),0,22); if(strlen(get_the_title())>22) echo "...";?></strong>
                        <span class="destaquepqn"><?php $values = get_post_custom_values("destaque"); echo $values[0]; ?></span>
                        <span class="codigo"><?php $values = get_post_custom_values("codigo"); echo $values[0]; ?></span>
                        <span class="link-detalhes">+ Detalhes</span>
                     </p>
                   </a>
                </li>
            <?php endwhile; // End the loop. Whew. ?>
            </ul>
          
			  </div><!-- #produtoslista -->
		</div><!-- #conteudo -->
<?php include_once("menu_aco.php"); ?>
<?php get_footer(); ?>
   </div>
</body>
</html>