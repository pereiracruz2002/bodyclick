<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>

      <div id="conteudo">
          <div id="dest">
          <!--BANNER PRINCIPAL-->
<script language="JavaScript">
var quotes=new Array()
quotes[0]='<a href="http://www.solinemoveis.com.br/category/estacoes-de-trabalho/"><img alt="|Soline Móveis para Escritório" src="http://www.solinemoveis.com.br/images/moveis-para-escritorio1.jpg"/></a>'
quotes[1]='<a href="http://www.solinemoveis.com.br/category/estacoes-de-trabalho/"><img alt="|Soline Móveis para Escritório" src="http://www.solinemoveis.com.br/images/moveis-para-escritorio2.jpg"/></a>'
quotes[2]='<a href="http://www.solinemoveis.com.br/category/estacoes-de-trabalho/"><img alt="|Soline Móveis para Escritório" src="http://www.solinemoveis.com.br/images/moveis-para-escritorio3.jpg"/></a>'
quotes[3]='<a href="http://www.solinemoveis.com.br/category/estacoes-de-trabalho/"><img alt="|Soline Móveis para Escritório" src="http://www.solinemoveis.com.br/images/moveis-para-escritorio4.jpg"/></a>'
var whichquote=Math.floor(Math.random()*(quotes.length))
document.write(quotes[whichquote])
</script>
<!---->
</div>
          <h1>Soline Móveis para Escritório</h1>
          <p class="destaque">A Soline é especialista em Móveis para Escritório, atendemos  desde pessoas físicas até grandes corporações que exigem qualidade e bom preço para renovar seus móveis para escritório, nossa equipe de vendedores e atendentes detém todo o conhecimento necessário para bem atendê-lo e sanar qualquer dúvida que tenha. Nossa linha de móveis para escritório é abrangente e de altíssima qualidade, requinte, sofisticação e bom gosto.
Portanto, não importa se a sua necessidade é mobiliar o seu home office, ou a sua nova unidade corporativa; a Soline Moveis é o seu parceiro ideal. 
</p>

		  <ul class="destaque">
            <li><a href="<?=$base_url?>" title="Móveis para Escritório">Móveis para Escritório</a></li>
            <li><a href="<?=$base_url?>category/moveis-para-escritorio/cadeiras-para-escritorio/" title="Cadeiras para Escritório">Cadeiras para Escritório</a></li>
            <li><a href="<?=$base_url?>category/moveis-para-escritorio/mesas-para-escritorio/" title="Mesas para Escritório">Mesas para Escritório</a></li>
            <li><a href="<?=$base_url?>category/moveis-para-escritorio/estantes-para-escritorio/" title="Estante para Escritório">Estantes para Escritório</a></li>
            <li><a href="http://www.solinemoveis.com.br/poltronas-cadeiras/" title="Poltronas e Chaise">Poltronas e Chaise</a></li>
            <li><a href="<?=$base_url?>category/moveis-de-aco/armarios-de-aco/" title="Armários de Aço">Amários de Aço</a></li>
            <li><a href="<?=$base_url?>category/moveis-de-aco/arquivos-de-aco/" title="Arquivos de Aço">Arquivos de Aço</a></li>
            <li><a href="<?=$base_url?>projetos-especiais/" title="Móveis para Escritório">Projeto de Móveis para Escritório</a></li>
          </ul>
          <div id="produtoslista">
            <h4><a href="<? bloginfo("url") ?>/category/diversos/promocoes/" title="Promoções" >Promoções Móveis para Escritórios</a></h4>
            <ul class="produtos">
            <?php query_posts(array("post__in" =>get_option("sticky_posts"))); if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();?>
                     <li>
                        <img src="<?php 
                        $values = get_post_custom_values("thumb"); 
                        $imagem =imagem($values[0]); 
                        $explode = explode(".",$imagem);
                        $dimensao = "-199x214";
                        $img_redim =  $explode[3]."".$dimensao.".".$explode[4];
                        $img_caminho= "/".substr($img_redim,3,100);
                        $img_final = $_SERVER['DOCUMENT_ROOT']."".$img_caminho;
                
                        if(file_exists($img_final)){
                          echo get_bloginfo('url')."".$img_caminho;
                          $forcar_dimensao ="";
                        }else{
                          $img_sem_dim =  $explode[0].".".$explode[1].".".$explode[2].".".$explode[3].".".$explode[4];
                          echo $img_sem_dim;
                          $forcar_dimensao = " width='199px' height='214px' ";
                        }

                        ?>" <?=$forcar_dimensao?>  alt="<?=the_title()?>"
                        />
                        <p>
                          <strong><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>"><?=substr(get_the_title(),0,22); if(strlen(get_the_title())>22)echo"...";?></a></strong>
                          <span class="destaquepqn"><?php $values = get_post_custom_values("destaque"); echo $values[0]; ?></span>
                          <span class="codigo"><?php $values = get_post_custom_values("codigo"); echo $values[0]; ?></span>
                          <span class="link-detalhes"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">+ Detalhes</a></span>
                        </p>
                  </li>
                <?php endwhile; ?>
            <?php wp_reset_query(); endif; ?>
            </ul>
          </div>
          <?php get_sidebar(); ?>
          <div id="maistxt">
          <h3>Móveis para Escritório</h3>
<p>Seus projetos e ideias são sempre bem vindos à Soline Móveis, nossa experiência em móveis para escritório soma mais de 12 anos de mercado, que trazem a segurança que sua empresa precisa; sabemos que móveis não são apenas objetos com uma simples funcionalidade, móveis para escritório bem estruturados e projetados, dão um novo ar ao ambiente, as cores realçam sentimentos, trazem harmonia para a empresa ou residência.Hoje as maiores corporações se preocupam muito com sua identidade visual, e costumam destacar não só as fachadas de suas empresas, mas também procuram realçar as recepções, é por isso que a Soline trabalha com móveis corporativos de altíssima qualidade, acabamento e exclusividade, para dar uma nova cara a recepção de sua empresa.
Contamos também com uma diversificada gama de móveis de aço, bem trabalhados e com a mesma qualidade de nossos móveis para escritório, os móveis corporativos Soline são duráveis e são adequados para todo tipo de empresas ou residência, pois os móveis de aço da Soline Móveis tem boa usabilidade para qualquer tipo de ambiente.
</p>
		  
		  </div>
          <div id="blog">
          <? 
         
         /*aKBoKslXDN4*/
          /*
          $db_name = 'solinemoveis01';
          $db_user = 'solinemoveis01';
       
          $db_password = 'aKBoKslXDN4';
          $db_host = 'mysql03-farm19.uni5.net';
          
          $link = mysql_connect($db_host, $db_user, $db_password); 
          $db   = mysql_select_db($db_name, $link);

          $sql = "Select post_title, ID, post_name, post_content, meta_key, meta_value from wp_posts 
                  inner join wp_postmeta on post_id = ID
                  where post_status = 'publish' and post_type = 'post'  and meta_key = 'image' order by post_date desc limit 0,4";
          
          $qry = mysql_query($sql,$link);
          $cont = 1;
          */
           $sql = "Select post_title, ID, post_name, post_content, meta_key, meta_value,post_excerpt from bl_posts 
                  inner join bl_postmeta on post_id = ID
                  where post_status = 'publish' and post_type = 'post'  and meta_key = 'image' order by post_date desc limit 0,4";
          $result = $wpdb->get_results($sql);
          ?>
            <h4><a href="<? bloginfo("url") ?>/blog/" title="Novidades no Blog" >Blog Móveis para Escritório</a></h4>
            <ul>
              <?php foreach ( $result as $row ):?>
              <li <? echo ($cont==2)?"class='last'":"";?>><a href="http://www.solinemoveis.com.br/blog/<?=$row->post_name?>" title="<?=$row->post_title?>" class="title" ><?=$row->post_title?></a>
                  <a href="http://www.solinemoveis.com.br/blog/<?=$row->post_name?>" title="<?=$row->post_title?>"><img src="<?=$row->meta_value?>" alt="<?=$row->post_title?>" /></a>
                  <?=WordLimiter(nl2br($row->post_excerpt),48)?></li>
              <? $cont++;  endforeach; ?>
            </ul>
          </div> <!-- fecha blog -->
          <div id="chamadas">
                 <?php if(!is_category()): ?>
                 <div>
                    <h4>Formas de Pagamento</h4>
                    <img src="<? bloginfo("template_url") ?>/images/forma-pgto.jpg" alt="Forma de Pagamento" />
                 </div>
                 <?php endif; ?>
          </div>
      </div><!-- fecha conteúdo -->
      <?php include_once("menu.php"); ?>
      <?php get_footer(); ?>
   </div>
</body>
</html>	

