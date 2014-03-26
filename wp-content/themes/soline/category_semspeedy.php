<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header();
$cat = "";
if(is_category()){
  $cat         = get_query_var('cat');
  $current_cat = get_category($cat);
  $slug        =  $current_cat->slug;
  $categorias_com_sub = array("cadeiras-para-escritorio", 
                              "moveis-para-escritorio",
                              "moveis-de-aco",
                              "estacoes-de-trabalho",
                              "arquivos-de-aco",
                              "diversos",
                              "promocoes",
                              "mesas-para-escritorio");
  $cat_pai = get_category_parents($cat);
  $categorias_pai = explode("/",$cat_pai);
  $promocoes = false;
  if(in_array("Promoções", $categorias_pai))
    $promocoes = true;

  $count_total = 0;

  if(in_array($slug,$categorias_com_sub)){
      $cat_filhas  = "<p class='filtro'>Você pode Filtrar por:</p>";
      $cat_filhas .= "<ul class='subcategorias'>";
      $categories=  get_categories(array("child_of"   =>$cat,
                                         "pad_counts" =>1) );
      $parents = array();
      foreach ($categories as $category) {
        array_push($parents,$category->term_id);
        if(!in_array($category->parent,$parents)){

          $cat_filhas .= "<li><a href='".get_bloginfo("url")."/category/$slug/{$category->slug}' ".$class.">";
          $cat_filhas .= $category->cat_name;
          $cat_filhas .= '('.$category->category_count.')';
          $cat_filhas .= '</a></li>';
          $count_total = $count_total + $category->category_count;
        }
     }
     $cat_filhas .= "</ul>";
  }else{
     $count_total = $current_cat->category_count;
  }
}
?>
     <div id="conteudo">
          <span class="breadcrumbs"><? if(function_exists('bcn_display'))bcn_display(); ?></span>
		      <h1><?php single_cat_title() ?></h1>
          <?php if($promocoes): ?><img src="<?=bloginfo("template_url")?>/images/botao-ligar-centro.jpg" alt="Ligue e tire suas dúvidas" style="margin-top:10px; float:right;" />
          <?php endif; ?>
          <small>Foram Encontrados <?=$count_total?> <?php single_cat_title() ?></small>
          <?=$cat_filhas?>
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
				<?php while ( have_posts() ) : the_post(); ?>
              <li>
                 <a href="<?php the_permalink(); ?>" title="<?=the_title_attribute( 'echo=0' )?>">
                 <img src="<?php $values = get_post_custom_values("thumb"); echo imagem($values[0]); ?>" alt="<?php the_title(); ?>" />
                   <p>
                      <strong><?=substr(get_the_title(),0,22); if(strlen(get_the_title())>22)echo"...";?></strong>
                      <span class="destaquepqn"><?php $values = get_post_custom_values("destaque"); echo $values[0]; ?></span>
                      <span class="codigo"><?php $values = get_post_custom_values("codigo"); echo $values[0]; ?></span>
                      <span class="link-detalhes">+ Detalhes</span>
                   </p>
                 </a>
              </li>
          <?php endwhile; // End the loop. Whew. ?>
          </ul>
          <?php wp_pagenavi(); ?>
			  </div><!-- #central -->
        <?php get_sidebar(); ?>
		</div><!-- #conteudo -->
    <? 
    
       $acos = array(93,4,227,138,386);
       if(in_array($id,$acos))
          include_once("menu_aco.php");
       else
          include_once("menu.php");
       get_footer(); ?>
   </div>
</body>
</html>