<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); 
           $cat_pai = get_the_category($post->ID);
           $promocoes = false;
           foreach($cat_pai as $cat_atual):
              if($cat_atual->slug == "promocoes")
                $promocoes = true;
           endforeach;
?>
     <div id="conteudo" class="produto">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
                $todas_imagens   = get_post_custom_values("thumb");
                $array_images    = explode(",", $todas_imagens[0]);
                $primeira_imagem = $array_images[0];
                $class="class='latgrd'";
                if($primeira_imagem){
                  $varend = str_replace("http://www.solinemoveis.com.br/","/home/sol/public_html/",$primeira_imagem);
                  list($width, $height, $type, $attr) = getimagesize("$varend");
                  if($width > 199)
                    $class="class='lat'";
                }
        ?>
            <div class="centralProduto">
            <span><? if(function_exists('bcn_display'))bcn_display(); ?></span>
              <h1><?=the_title();?></h1>
                 <?php if(count($array_images)>1): ?>
                 		<script language="javascript">
                    <!--
                    $(document).ready(
                      function (){
                        $("#pikame").PikaChoose();

                      });
                    -->
                  </script>
                 <div class="pikachoose" style="width:<?=$width?>px">
                    <ul id="pikame" class="jcarousel-skin-pika">
                     <?php foreach($array_images as $foto):?>
                      <li><img src="<?=$foto?>"/></li>
                     <?php endforeach; ?>
                    </ul>
                 </div>
                 <?php else: ?>
                 <img src="<?=$primeira_imagem?>" alt="<?=the_title();?>"/>
                 <?php endif; ?>
                 <div <?=$class?>>
                   <? if($id<>1381): ?>
                   <?php if($promocoes): ?><img src="<?=bloginfo("template_url")?>/images/botao-ligar-centro.jpg" alt="Ligue e tire usas dúvidas" style="margin-top:10px;" />
                   <?php else: ?>
                   <img src="<?=bloginfo("template_url")?>/images/botao-ligar.jpg" alt="Ligue e tire usas dúvidas" style="margin-top:10px;" />
                   <?php endif; ?>
                   <a href="<? bloginfo("url");?>/contato/?produto=<? geturl() ?>" title="Clique Aqui para Fazer Orçamento" class="bt">
                   <img src="<? bloginfo("template_url")?>/images/botao-orcamento.jpg" alt="Clique Aqui para Fazer Orçamento"  />
                   </a>
                   <? endif; ?>
                   <? if($id==85):?>
                   <p style="font-family:georgia,arial;font-size:16px;font-style:italic;margin-top:50px; float:left;">Faça horas de trabalhos parecerem minutos</p>
                   <img src="<? bloginfo("template_url")?>/images/ergohuman-details.jpg" alt="Ergohuman Detalhes" style="margin-top:50px;" />  
                   <? elseif($id==1381): ?>
                   <p style="font-family:georgia,arial;font-size:16px;font-style:italic;margin-top:50px; float:left;">Suas festas nunca mais serão as mesmas.</p>
                   <a href="http://www.solinecofre.com.br/produto_info.php?id_produto=52&action=add_product" title="Comprar Champanheira" ><img src="http://www.solinemoveis.com.br/wp-content/uploads/2011/08/champanehira1.jpg" alt="Champanheira Comprar" style="margin-top:20px;margin-bottom:20px;" border="0px" /> 
                   </a>
                   <? else: ?>
                   <p style="width:343px;float:right; font-size:12px; margin-top:15px;margin-bottom:5px;">Consultar informações técnicas na hora da compra</p>
                   <? endif; ?>
                   <?php renderiza($id, get_post_custom_values("partes")); ?>
                   <div id="fb-root"></div><script src="http://connect.facebook.net/pt_BR/all.js#appId=171596476233449&amp;xfbml=1"></script><fb:like href="<?php the_permalink() ?>" send="true" width="450" show_faces="true" action="recommend" font=""></fb:like>
                   <p><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="solinemoveis" data-lang="pt">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></p>
                   
                   <?php if(get_post_custom_values("valor")): ?>
                   <p style="font-family:georgia,arial;font-size:16px;font-style:italic;margin-top:50px; float:left;">Valor:</p><p class="cifroes"><a href="http://www.solinemoveis.com.br/legenda-de-valores" class="fancybox"><?php echo cifrao_legenda(get_post_custom_values("valor")); ?></a></p>
                   <?php endif; ?>
                   
                 </div>
                
                
             </div>
             <div id="descProduto">
                <h4>Descrição do Produto</h4>
                <h3><? the_title();?></h3>
                    <? the_content();?>
             </div>
          <?php endwhile; // End the loop. Whew. ?>
          <? if($id<>85):?>
               <div id="produtosRelacionados">
               <?php 
               if($promocoes):  ?>
               <h4>Produtos Relacionados</h4>
                <ul class="produtos">
                  <?php 
                  query_posts('category_name=promocoes&posts_per_page=6&orderby=rand'); 
                  while ( have_posts() ) : the_post(); ?>
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
               <?php 
               else: 
                  wp_related_posts ();
               endif;wp_reset_query();
               ?>
               </div>
               <?php get_sidebar(); ?>
          <? endif; ?>
		</div><!-- #conteudo -->
<?php
    if ( in_category('moveis-de-aco') ) {
      include 'menu_aco.php';
    } else {
      include 'menu.php';
    }
    get_footer(); 
?>
   </div>
</body>
</html>
