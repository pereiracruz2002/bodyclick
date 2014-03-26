<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
     <div id="conteudo">
        <div id="produtoslista">
          <span class="breadcrumbs"><? if(function_exists('bcn_display'))bcn_display(); ?></span>
<?php if ( have_posts() ) : ?>
		      <h1>Resultado da busca por: "<?php print get_search_query() ?>"</h1>

            <ul class="produtos">
				<?php 
        $i=0;
        while ( have_posts() ) : the_post(); 
        if(get_the_ID() <> 5983):
        ?>
              <li>
                 <a href="<?php the_permalink(); ?>" title="<?=the_title_attribute( 'echo=0' )?>">
                 <img src="<?php 

                 $values = get_post_custom_values("thumb"); 

                   $img = $values[0];
                   $array = explode(",",$img);
                   $explode = $array[0];
                   $array_explode = explode(".",$img);
                   $formato = $array_explode[4];
                   $formato_final = explode(",",$formato);
                   $arquivo = $formato_final[0];
                   $img_redim = $array_explode[2].".".$array_explode[3]."-199x214".".".$arquivo;
                   $dimensao = "-199x214";
                   $img_caminho= "/".substr($img_redim,7,100);
                   $img_final = $_SERVER['DOCUMENT_ROOT']."".$img_caminho;

                  if(file_exists($img_final)){
                    $img_redim = $array_explode[0].".".$array_explode[1].".".$array_explode[2].".".$array_explode[3]."-199x214".".".$arquivo;
                    $forcar_dimensao =" ";
                  }else{
                    $img_redim = $array_explode[0].".".$array_explode[1].".".$array_explode[2].".".$array_explode[3]."".".".$arquivo;
                    $forcar_dimensao = " width='199px' height='214px' ";
                  }
                 echo $img_redim ?>" 
                   alt="<?php the_title(); ?>"  <?=$forcar_dimensao?> />
                   <p>
                      <strong><?=substr(get_the_title(),0,22); if(strlen(get_the_title())>22)echo"...";?></strong>
                      <span class="destaquepqn"><?php $values = get_post_custom_values("destaque"); echo $values[0]; ?></span>
                      <span class="codigo"><?php $values = get_post_custom_values("codigo"); echo $values[0]; ?></span>
                      <span class="link-detalhes">+ Detalhes</span>
                   </p>
                 </a>
              </li>
          <?php 
               $i++;
          endif;
     
          endwhile; // End the loop. Whew. ?>
          </ul>
          <?php wp_pagenavi(); ?>
<?php else: ?>
        <h1>Não encontramos nenhum produto com a pesquisa: "<?php print get_search_query() ?>", que tal efetuar outra busca?</h1>
<?php endif; ?>
			  </div><!-- #produtoslista -->
        <?php get_sidebar(); ?>
		</div><!-- #conteudo -->
		<?php include_once("menu.php"); ?>
<?php get_footer(); ?>
