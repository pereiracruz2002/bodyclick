<? get_header(); 
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
                   <?php if($promocoes): ?><img src="<?=bloginfo("template_url")?>/images/botao-ligar-centro.jpg" alt="Ligue e tire usas dúvidas" style="margin-top:10px;" />
                   <?php else: ?>
                   <img src="<?=bloginfo("template_url")?>/images/botao-ligar.jpg" alt="Ligue e tire usas dúvidas" style="margin-top:10px;" />
                   <?php endif; ?>
                   <a href="<? bloginfo("url");?>/contato/?produto=<? geturl() ?>" title="Clique Aqui para Fazer Orçamento" class="bt">
                   <img src="<? bloginfo("template_url")?>/images/botao-orcamento.jpg" alt="Clique Aqui para Fazer Orçamento"  />                
                   </a>
                   <p style="width:343px;float:right; font-size:12px; margin-top:15px;margin-bottom:5px;">Consultar informações técnicas na hora da compra</p>
           
                 </div>
                </a>
             </div>
             <div id="descProduto">
                <h4>Descrição do Produto</h4>
                <h3><? the_title();?></h3>
                    <? the_content();?>
             </div>
          <?php endwhile; // End the loop. Whew. ?>
        <?php get_sidebar(); ?>
		</div><!-- #conteudo -->
<?php include_once("menu.php"); ?>
<?php get_footer(); ?>
   </div>
</body>
</html>