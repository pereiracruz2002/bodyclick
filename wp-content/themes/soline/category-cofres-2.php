<?php
/*
Template Name: Cofre
*/
get_header();
?>
<div id="conteudo">
  <div id="breadcrumbs">
    <span class="breadcrumbs"><? if(function_exists('bcn_display'))bcn_display(); ?></span>
  </div><!--breadcrumbs-->
  <div id="esquerda">
    <h3>Cofres de Segurança</h3>
<?php echo '<iframe name="Promoções Soline" src="http://www.soline.com.br/carousel/carousel.html" width="975" height="200"border="0" frameborder="0" height="488"> 
</iframe>'?>
    
      <p class="cofre-titulo">A soline oferece várias opção de cofres para sua necessidade, junto dela a proteção devida aos seus valores. Você pode escolher os melhores cofres com os melhores segredos.<a href="/category/cofres-2/cofres/cofres-digitais-eletronicos/">Veja mais cofres</a></p>
     
      <img class="destaque-cofre" src="<?php echo get_template_directory_uri(); ?>/images/img-cofre-soline.jpg" alt="cofre" />
      
    <h5>O que guardar?</h5>
    <div id="bloco-geral">
      <ul id="bloco1">
        <li><span>&bull;</span>Segurança de documentos</li>
        <li><span>&bull;</span>Quantias altas de dinheiro em espécie</li>
        <li><span>&bull;</span>Objetos considerados com grande importancia</li>
        <li><span>&bull;</span>Jóias</li>
      </ul>
      <ul id="bloco2">
      	<li><span>&bull;</span>Hd Externos,</li>
        <li><span>&bull;</span>Computadores notebook</li>
        <li><span>&bull;</span>Mídias digitais</li>
      </ul>
     </div><!--bloco-geral-->
    <h5>Tipo de Cofres</h5>
    <div id="bloco-esq">
    <h4>Variedade de cofres</h4>
      <p>A inovação cresce a cada dia que passa, ao lado das opção de acordo com a escolha do futuro proprietário e dono do cofre. A escolha do tamanho e modo
      de abertura é completamente a partir dos interesses do comprador. É bom ter a certeza do que guardar para pensar sempre no espaço disponível. A Soline Móveis, por exemplo,
      tem inúmeros modelos. Tem cofres Cash Box (Porta Valores), Contra Fogo, Biométricos, Digitais, Eletrônicos, Mecânicos, Mini cofres e cofres "disface"
      como Cofre Livro e Cofre Tomada </p>
    </div>
    <div id="bloco-dir">
      <h4>Navegue abaixo pelas categorias</h4>
      <ul>
        <li><a href="/category/cofres-2/cofre-livro/">Cofres "Disfarce"</a>
        <li><a href="/category/cofres-2/cofres-tomadas/">Cofres de embutir </a>
        <li><a href="/category/cofres-2/cofres_contra_fogo/">Cofres contra fogo</a>
        <li><a href="/category/cofres-2/cofres-biometricos/">Cofres Biométricos</a>
        <li><a href="/category/cofres-2/cofres/cofres-mecanicos/">Cofres Mecânicos</a>
        <li><a href="/category/cofres-2/mini-cofre/">Mini Cofre</a>
        <li><a href="/category/cofres-2/cofres/cofres-digitais-eletronicos/">Cofre Digital Eletrônico</a>
            
      </ul>
    </div><!--bloco-dir-->
  </div><!--direita-->
  <div id="direita">
    <h4>Curiosidade sobre a origem do cofre do porquinho</h4>
    <img src="<?php echo get_template_directory_uri(); ?>/images/img-cofre-porquinho.jpg"  alt="cofre porquinho" /></p>
    <p>O cofre de porquinho nasceu na Inglaterra por engano</p>
    <p>Um ceramista recebeu um pedido para desenvolver um cofre usando um tipo de argila chamada Pygg, não muito familiarizado com o termo entendeu PIG
    (Traduzido para o português: Porco) e entregou o cofre com o formato de "Porquinho", o que se tornou o maior sucesso</p>
  </div><!--direita-->

</div><!--conteudo-->
<?php include_once("menu.php");?>
<?php get_footer(); ?>
   </div>
</body>
</html>