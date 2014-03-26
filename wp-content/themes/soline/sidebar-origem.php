<?php
      $bla = $_SERVER['REQUEST_URI'];
      $url = explode("/",$bla);
      $prefixo = "http://www.solinemoveis.com.br/wp-content/uploads/2010/09/";
      $cases = array("eurofarma.jpg",
                     "decolar.jpg",
                     "agroceres.jpg",
                     "brooser.jpg",
                     "consulgaldobrasil.jpg",
                     "grupompe.jpg",
                     "dutyfree.jpg",
                     "setepla.jpg",
                     "Holcim.jpg",
                     "teldobrasil.jpg",
                     "usprice.jpg",
                     "voicetecnolog.jpg",
                     "zeppini.jpg",
                     "telefonica.jpg",
                     "ajinomoto.jpg",
                     "dextra.jpg",
                     "leadership.jpg",
                     "yazigi.jpg",
                     "usiquimica.jpg",
                     "peleimoveis.jpg",
                     "unimed.jpg",
                     "HT.jpg",
                     "betimquimica.jpg",
                     "techcolor.jpg",
                     "wamart.jpg",
                     "nissin.jpg",
                     "unesp.jpg",
                     "hospital-pilar.jpg",
                     "transamerica-10.jpg",
                     "são-camilo..jpg",
                     "spook.jpg",
                     "sinales.jpg",
                     "pextron.jpg",
                     "infraero.jpg",
                     "House-Gift-Fair.jpg",
                     "hospital-pilar.jpg",
                     "fifa.jpg",
                     "Shintori.jpg",
                     "atlantica-hoteis.jpg");
      shuffle($cases);

      $destaques = array("projete-seu-escritorio.jpg","abnt.png");

      shuffle($destaques);
?>
      <div id="banner">
        <?php if(is_singular() && !is_page()): ?>
            <h4>Aceitamos</h4>
            <img src="<? bloginfo("template_url") ?>/images/formas-de-pagamento.jpg" alt="Forma de Pagamento" />
       <?php endif; ?>
       <?php if(!is_singular() or is_page()): ?>
       <?php
       if(is_home()){
            if($destaques[0]=='projete-seu-escritorio.jpg'){
            $alt ='Projete seu Escritório';
            $link = 'projetos-especiais/';
          }else{
            $alt = 'ABNT';
            $link = 'norma-abnt/';
          }
       }else{
          $destaques = array("abnt.png");
          $alt = 'ABNT';
          $link = 'norma-abnt/';
       }
         
      
       ?>
        <h4>Destaques</h4>
        <ul>
          <li><a href="<?=bloginfo("url")?>/<?=$link?>"><img src="<?=bloginfo("template_url")?>/images/<?=$destaques[0]?>" alt="<?=$alt?>"/></a></li>
          <? if(!is_home()){ ?>
          <li><a href="<?=bloginfo("url")?>/category/<?=$banners_red[0]?>/"><img src="<?=bloginfo("template_url")?>/images/<?=$banners_red[0]?>.jpg" alt="<?=$banners_red[0]?>" /></a></li>
          <? } ?>
          <li><a href="<?=bloginfo("url")?>/category/<?=$banners_orange[0]?>/"><img src="<?=bloginfo("template_url")?>/images/<?=$banners_orange[0]?>.jpg" alt="<?=$banners_orange[0]?>" /></a></li>
        </ul>
        <?php endif; ?>
        <?php if(is_category() or is_page() or is_home()): ?>
        <h4>Alguns Clientes</h4>
        <ul>
          <?php for($i=0;$i<2;$i++): ?>
            <li style="margin-left:-3px;"><a href="http://www.solinemoveis.com.br/cases/"><img src="<?=$prefixo.$cases[$i]?>" alt="<?=substr($cases[$i],o,-3)?>" /></a></li>
          <?php endfor;?>
        </ul>
        <?php endif; ?>
        <?php if(is_category() or is_page() or is_home()): ?>
        <ul>
            <li style="margin-left:-3px; margin-bottom:5px;"><img src="<?=bloginfo("template_url")?>/images/crea-finish.png" alt="CREA" /></li>
        </ul>
        <?php endif; ?>
        <?php if(is_category()): ?>
            <h4>Aceitamos</h4>
            <img src="<? bloginfo("template_url") ?>/images/formas-de-pagamento.jpg" alt="Forma de Pagamento" />
       <?php endif; ?>
        <h4>Soline na Rede</h4>
        <ul><?php if(!is_singular() or is_page()): ?>
            <li style="margin-left:-3px;">
              <a href="http://www.twitter.com/solinemoveis/" title="Nosso Twitter"><img src="<? bloginfo("template_url")?>/images/twitter-lateral.jpg" alt="Nosso Twitter" /></a>
            </li>
            <?php endif; ?>
            <li style="margin-left:-3px;">
              <a href="http://www.solinemoveis.com.br/blog/" title="Nosso Blog"><img src="<? bloginfo("template_url")?>/images/blog-lateral.jpg" alt="Nosso Blog" /></a>
            </li>
             <li style="margin-left:-3px;">
              <a href="http://www.facebook.com/solinemoveis" title="Soline no Facebook"><img src="<? bloginfo("template_url")?>/images/face_link.png" alt="Soline no Facebook" /></a>
            </li>
           <!--<div class="fb-like-box" data-href="http://www.facebook.com/solinemoveis" data-width="150" data-show-faces="true" data-stream="false" data-header="false"></div>-->
        </ul>
        <!--
        <h4>Google +1</h4>
        <p>Gostou do Conteúdo do nosso site? Indique clicando no botão abaixo:</p>
        <div align="center"><g:plusone></g:plusone></div>-->
         <p>
          <a href="http://validator.w3.org/check?uri=referer">
            <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
          </a>
        </p>
      </div>