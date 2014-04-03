<!--<ul class="media-list">
            <li class="media">
              <a class="pull-left" href="#">
                <img class="media-object img-rounded" src="http://placehold.it/64x64">
              </a>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>
              </div>
            </li>
            <li class="media">
              <a class="pull-left" href="#">
                <img class="media-object img-rounded" src="http://placehold.it/64x64">
              </a>
              <div class="media-body">
                <h4 class="media-heading img-rounded">Media heading</h4>
                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>
              </div>
            </li>
            <li class="media">
              <a class="pull-left" href="#">
                <img class="media-object img-rounded" src="http://placehold.it/64x64">
              </a>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>
              </div>
            </li>
          </ul>-->
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