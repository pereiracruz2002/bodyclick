
 <ul class="media-list">
<?php
  $query_popular = new WP_Query(array(
      'v_sortby' => 'views', // Organiza os posts por visitas
      'v_orderby' => 'desc', // Ordena do mais visitado para o menos visitado.
      'posts_per_page' => 7 // Opicional
    )
  );
  
  if($query_popular->have_posts()):while($query_popular->have_posts()):$query_popular->the_post();
?>
  <li class="media">
  <a class="pull-left" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(102, 149), array('class' => 'media-object img-rounded')); ?></a>
   <div class="media-body">
      <h4 class="media-heading"><?php the_title(); ?></h4>
        <p><?php echo abreviaString(get_the_excerpt(),50); ?></p>
    </div>
<?php endwhile; endif; wp_reset_query();  ?>
 </ul>
<?php
if (is_category() || is_single()):
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
            <input type="checkbox"> <?php echo $category->name;?>
          </label>
    <?php
       endforeach;
     endif;
    ?>
    
  </div>
    </form>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Filtrar Por Preço</h3>
  </div>
  <div class="panel-body">
    <form role="form">
      <div class="checkbox">
<?php 
query_posts("showposts=1&cat={$atual_cat}");?>
<?php 
if (have_posts()): 
  $i=0;
  while (have_posts()) : the_post();
    $preco = get_post_custom_values("preco",$post->ID);
?>
   <label>
      <input type="checkbox"> <?php echo $preco[$i];?>
    </label>
<?php
  $i++;
  endwhile;
endif;
?>
  </div>
    </form>
  </div>
</div>
<?php
endif;
?>