
 
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Mais Vistos</h3>
  </div>
  <div class="panel-body">
  <ul class="media-list">
<?php
  $query_popular = new WP_Query(array(
      'v_sortby' => 'views', // Organiza os posts por visitas
      'v_orderby' => 'desc', // Ordena do mais visitado para o menos visitado.
      'posts_per_page' => 7, // Opicional
      'cat'=>4
    )
  );
  
  if($query_popular->have_posts()):while($query_popular->have_posts()):$query_popular->the_post();
?>
  <li class="media">
  <a class="pull-left" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(102, 149), array('class' => 'media-object img-rounded')); ?></a>
   <div class="media-body">
      <h4 class="media-heading"><?php the_title(); ?></h4>
    </div>
<?php endwhile; endif; wp_reset_query();  ?>
 </ul>
  </div>
</div>
<?php
if (is_category()):
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Filtrar Por Categoria</h3>
  </div>
  <div class="panel-body">
    <form role="form">
      <div class="checkbox">
    <?php
     $atual_cat = get_query_var('cat');
     $args = array('child_of'=>$atual_cat,'hide_empty'=>1,'hierarchical'=>1,'parent'=>$atual_cat);
     $my_categories = get_categories($args);
     if($my_categories):
       foreach( $my_categories as $category ):?>
          <label>
            <input class="filtro" type="checkbox" value="<?php echo $category->name;?>"> <?php echo $category->name;?>
          </label>
    <?php
       endforeach;
     endif;
    ?>
    
  </div>
    </form>
  </div>
</div>

<?php query_posts("cat={$atual_cat}");?>
<?php 
if (have_posts()): 
  $i=0;
  $array_posts = array();
  while (have_posts()) : the_post();
    $array_posts[]=$post->ID;
  endwhile;
  // Reset Query
  wp_reset_query();
endif;
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Filtrar Por Preço</h3>
  </div>
  <div class="panel-body">
    <form role="form">
      <div class="checkbox">
<?php
  foreach($array_posts as $chave =>$valor):
    $precos = get_post_custom_values("preco",$valor);
      foreach($precos as $preco):
?>
   <label>
      <input class="filtro" type="checkbox" value="<?php echo $preco;?>"> <?php echo $preco;?>
    </label>
    <br />
<?php
      endforeach;
  endforeach;
?>
  </div>
    </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Filtrar Por Marcas</h3>
  </div>
  <div class="panel-body">
    <form role="form">
      <div class="checkbox">
<?php
  foreach($array_posts as $chave =>$valor):
    $marcas = get_post_custom_values("marca",$valor);
      foreach($marcas as $marca):
?>
   <label>
      <input class="filtro" type="checkbox" value="<?php echo $marca;?>"> <?php echo $marca;?>
    </label>
    <br />
<?php
      endforeach;
  endforeach;
?>
  </div>
    </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Filtrar Por Peso</h3>
  </div>
  <div class="panel-body">
    <form role="form">
      <div class="checkbox">
<?php
  foreach($array_posts as $chave =>$valor):
    $pesos = get_post_custom_values("peso",$valor);
      foreach($pesos as $peso):
?>
   <label>
      <input class="filtro" type="checkbox" value="<?php echo $peso;?>"> <?php echo $peso;?>
    </label>
    <br />
<?php
      endforeach;
  endforeach;
?>
  </div>
    </form>
  </div>
</div>


<?php
endif;
?>