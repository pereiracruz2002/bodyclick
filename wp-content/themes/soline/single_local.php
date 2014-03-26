<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

global $more;
$more = 0;
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
                $explode_img = explode("/",$primeira_imagem);
                $final = explode(".",$explode_img[7]);
                $caminho_img = $_SERVER['DOCUMENT_ROOT']."/".$explode_img[3]."/".$explode_img[4]."/".$explode_img[5]."/".$explode_img[6]."/".$final[0]."-400x400.".$final[1];
                if(file_exists($caminho_img)){
                   $imagem = $explode_img[0]."/".$explode_img[1]."/".$explode_img[2]."/".$explode_img[3]."/".$explode_img[4]."/".$explode_img[5]."/".$explode_img[6]."/".$final[0]."-400x400.".$final[1];
                }else{
                  $imagem = $explode_img[0]."/".$explode_img[1]."/".$explode_img[2]."/".$explode_img[3]."/".$explode_img[4]."/".$explode_img[5]."/".$explode_img[6]."/".$final[0].".".$final[1];
                }
                
                
                $todas_imagens_gd   = get_post_custom_values("imagem-grande");
                $array_images_gd    = explode(",", $todas_imagens_gd[0]);
                $primeira_imagem_gd = $array_images_gd[0];
								

                $class="class='latgrd'";
                if($primeira_imagem){
                  $varend = str_replace("http://localhost/soline/","",$primeira_imagem);
                  list($width, $height, $type, $attr) = getimagesize("$varend");
                  if($width > 199)
                    $class="class='lat'";
                }
        ?>
            <div class="centralProduto">
            <span><? if(function_exists('bcn_display'))bcn_display(); ?></span>
              <h1><?=the_title();?></h1>
                 
                 		<script type="text/javascript">

										 <!--
										 

										 
                    $(document).ready(function() {
                     	$('.foto').click(function(event){
												event.preventDefault();
												var novo_link = $(this).attr("alt");
												var link_normal = $(this).attr("src");
	
												$('.pikachoose img:first').remove();
												$('<img />')
												.attr('src', $(this).attr('src'))
												.css('opacity', '0.3')
												.appendTo('.pikachoose .colorbox')
												.animate({opacity: 1 }, 2000);
												if(novo_link.length===0)
													  $('.pikachoose .colorbox').attr('href',link_normal);
												else
												  $('.pikachoose .colorbox').attr('href',novo_link);
										 });
											
											
										 $(".colorbox").live("click", function () {
										 var link = $(this).attr("href")
										 $.fn.colorbox({href: link, 
										 })
    
										 return false
										 })
											
											setInterval(animar, 3000);

                     });
                    -->
                  </script>
									<?php if(count($array_images)>1): $i=0; ?>
                 <div class="pikachoose" style="width:320px">
										 <div class="pika-image">
										 <?php
												 $filename = $array_images_gd[0];
												
												 if(strlen($filename)>0):
												?>
												 <a class="colorbox" href="<?=$array_images_gd[0]?>"><img src="<?=$imagem?>" alt="<?=the_title();?>"/></a>
												<? else: ?>
												 <a class="colorbox" href="<?=$primeira_imagem?>"><img src="<?=$imagem?>" alt="<?=the_title();?>"/></a>
												<? endif;?>
										 </div>
                    <ul id="pikame" class="jcarousel-skin-pika pika-thumbs">
                     <?php foreach($array_images as $foto):?>
                      <li><div class="clip"><a href="#"><img src="<?=$foto?>" alt="<?=$array_images_gd[$i]?>" class="foto"/></a></div></li>
                     <?php $i++;endforeach; ?>
                    </ul>
                 </div>
                 <?php else: ?>
									<div class="pikachoose" style="width:400px">
										 <div class="pika-image">
												<?php
												$filename = $array_images_gd[0];
												
												 if(strlen($filename)>0):
												?>
												 <a class="colorbox" href="<?=$array_images_gd[0]?>"><img src="<?=$imagem?>" alt="<?=the_title();?>"/></a>
												<? else: ?>

												 <a class="colorbox" href="<?=$primeira_imagem?>"><img src="<?=$imagem?>" alt="<?=the_title();?>"/></a>
												<? endif;?>
												
										 </div>
									</div>
                 <?php endif; ?>
                 <div <?=$class?>>
                   <? if($id<>1381): ?>
                     <? $faixa = get_post_custom_values("faixa");
                        $valor = get_post_custom_values("valor");
						
						if(isset($faixa) and isset($valor)): ?>
                     <div class="faixa-preco">
                        <strong><?php $value = get_post_custom_values("faixa"); echo $value[0];?></strong>
                        <span><?php $value = get_post_custom_values("valor"); echo $value[0];?></span>
                    
					
					 </div>
					 
                     <? endif; ?>
                     <a href="<? bloginfo("url");?>/contato/?produto=<? geturl() ?>" title="Clique Aqui para Fazer Orçamento" class="bt-novo"><span>Clique Aqui e</span> solicite seu orçamento</a>
                     <? echo the_excerpt(); ?> 
                   <? endif; ?>
				   
				  
				   <? if($id==1381): ?>
                   <p style="font-family:georgia,arial;font-size:16px;font-style:italic;margin-top:50px; float:left;">Suas festas nunca mais serão as mesmas.</p>
                   <a href="http://www.solinecofre.com.br/produto_info.php?id_produto=52&action=add_product" title="Comprar Champanheira" ><img src="http://www.solinemoveis.com.br/wp-content/uploads/2011/08/champanehira1.jpg" alt="Champanheira Comprar" style="margin-top:20px;margin-bottom:20px;" border="0px" /> 
                   </a>
                   <? else: ?>
				   <p style="font-family:georgia,arial;font-size:16px;font-style:italic;margin-top:50px; float:left;">
            <? $urlimg = get_post_custom_values("imagem-lateral");
               if(!empty($urlimg)):
            ?>
						<img src=" echo $urlimg[0]; ?>" alt="Imagem Lateral" />
            <?php
            endif;
            ?>
				   </p>
                   <p style="width:343px;float:right; font-size:12px; margin-top:15px;margin-bottom:5px;">Consultar informações técnicas na hora da compra</p>
				   <? endif; ?>
				 <br></br>

					
                   <?php renderiza($id, get_post_custom_values("partes")); ?>
                   <!--<div class="fb-like" data-send="true" data-width="450" data-show-faces="false" data-action="recommend"></div>
                   <div class="fb-send" data-href="<?php the_permalink() ?>"></div>-->
                   <!--<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=false&width=580&action=recommend&colorscheme=light&height=50" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:580px; height:50px;" allowtransparency="true"></iframe>-->
                   <div id="fb-root"></div><script type="text/javascript" src="http://connect.facebook.net/pt_BR/all.js#appId=171596476233449&amp;xfbml=1"></script><fb:like href="<?php the_permalink() ?>" send="true" width="450" show_faces="true" action="recommend" font=""></fb:like>
                   <p><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="solinemoveis" data-lang="pt">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></p>
                   
                   <a href="http://www.solinemoveis.com.br/zchat/chat.php" target="_blank"><img src="<? bloginfo("template_url")?>/images/soline-duvidas.gif" alt="duvidas" /></a>
                   
                 </div>
                
                
             </div>
             <div id="descProduto">
                <h4>Descrição do Produto</h4>
                <h3><? the_title();?></h3>
                    <? the_content();?>
             </div>
          <?php endwhile; // End the loop. Whew. ?>
          <? if($id<>85):
          ?>
               <div id="produtosRelacionados">
               <?php 
               if($promocoes):  ?>
               <h4>Produtos Relacionados</h4>
                <ul class="produtos">
                  <?php 
                  query_posts('category_name=promocoes&posts_per_page=6&orderby=rand'); 
                  while ( have_posts() ) : the_post(); 
                  ?>
                        <li>
                           <a href="<?php the_permalink(); ?>" title="<?=the_title_attribute( 'echo=0' )?>">

                            <?php 
                           $todas_imagens   = get_post_custom_values("thumb");
                           $array_images    = explode(",", $todas_imagens[0]);
                           $primeira_imagem = $array_images[0];
                           $explode_img = explode("/",$primeira_imagem);
                           $final = explode(".",$explode_img[7]);

                          $caminho_img = $_SERVER['DOCUMENT_ROOT']."/".$explode_img[3]."/".$explode_img[4]."/".$explode_img[5]."/".$explode_img[6]."/".$final[0]."-199x214.".$final[1];
                          if(file_exists($caminho_img)){
                             $imagem = $explode_img[0]."/".$explode_img[1]."/".$explode_img[2]."/".$explode_img[3]."/".$explode_img[4]."/".$explode_img[5]."/".$explode_img[6]."/".$final[0]."-199x214.".$final[1];
                             $forcar_dimensao =" ";
                          }else{
                            $imagem = $explode_img[0]."/".$explode_img[1]."/".$explode_img[2]."/".$explode_img[3]."/".$explode_img[4]."/".$explode_img[5]."/".$explode_img[6]."/".$final[0].".".$final[1];
                            $forcar_dimensao = " width='199px' height='214px' ";
                          }
                           ?>


                           <!--<img src="<?php $values = get_post_custom_values("thumb"); echo imagem($values[0]); ?>" alt="<?php the_title(); ?>" />-->
                           <img src="<?=$imagem?>" alt="<?php the_title(); ?>" <?=$forcar_dimensao?>  />
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
               endif;
			   wp_reset_query();
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
