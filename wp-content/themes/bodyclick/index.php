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

      <div class="row">
        <div class="col-md-8">
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
          <?php
            global $wp_query;
            $args = array_merge( $wp_query->query_vars, array( 'post_type' => 'banners' ) );
            query_posts( $args );
            $i = 0;
          ?>
          <?php while ( have_posts() ) : the_post();?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>"></li>
          <?php
            $i++;
            endwhile;
            // Reset Query
            wp_reset_query();
            ?>
            <!--<li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>-->
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
          <?php
            global $wp_query;
            $args = array_merge( $wp_query->query_vars, array( 'post_type' => 'banners' ) );
            query_posts( $args );
            $i = 0;
          ?>
          <?php while ( have_posts() ) : the_post();?>
          <?php $banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'big' ); ?>
            <div class="<?php if($i==0){ echo "active";}?> item"><a href="<?php echo the_permalink();?>"><img class="media-object img-rounded img-responsive" src="<?php echo $banner[0];?>"></a></div>
            <!--<div class="item"><img class="media-object img-rounded img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/slide.jpg"></div>
            <div class="item"><img class="media-object img-rounded img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/slide.jpg" ></div>-->
            <?php
            $i++;
            endwhile;
            // Reset Query
            wp_reset_query();
            ?>
          </div>
          <!-- Carousel navegação -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
          </a>
        </div>
      </div>
      <div class="col-md-4">
      <div class="row">
        
         <?php
            global $wp_query;
            $args = array_merge( $wp_query->query_vars, array( 'post_type' => 'adsense' ) );
            query_posts( $args );
            $i = 0;
          ?>
          <?php while ( have_posts() ) : the_post();?>
          <?php if($i<2){ $style=' style="margin-bottom: 5px;"';}else{ $style='';}?>
          <div class="col-md-12" <?php echo $style;?>>
          <?php $banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
          <a href="<?php echo the_permalink();?>"><img class="media-object img-rounded img-responsive" src="<?php echo $banner[0];?>"></a>
          </div>
          <?php
            $i++;
            endwhile;
            // Reset Query
            wp_reset_query();
            ?>
        
        <!--<div class="col-md-12" style="margin-bottom: 5px;">
          <img src="<?php echo get_template_directory_uri(); ?>/img/static1.jpg">
        </div>
        <div class="col-md-12">
          <img src="<?php echo get_template_directory_uri(); ?>/img/static1.jpg">
        </div>-->
      </div>
    </div>
    </div>
    
    <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <h3>Encontre seu suplemento e saiba como funciona e pague mais barato</h3>
    </div>
    </div>
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-3">
          <h3 class="turquesa bordaRedonda"><strong>Categorias</strong></h3> 
        <?php
           $args = array('child_of'=>4,'hide_empty'=>1,'hierarchical'=>1,'parent'=>4);
           $my_categories = get_categories($args);
        ?>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 400px;">
          <?php foreach( $my_categories as $category ):?>
            <li class="dropdown-submenu">
              <a tabindex="-1" href="<?php echo get_category_link($category->term_id);?>"><?php echo $category->name;?></a>
              
               <?php
                  $args_sub = array('child_of'=>$category->term_id,'hide_empty'=>1,'hierarchical'=>1,'parent'=>$category->term_id);
                  $my_subcategories = get_categories($args_sub);
                ?>
                <?php if(count($my_subcategories)>0):?>
                <ul class="dropdown-menu">
                <?php foreach( $my_subcategories as $subcategory ):?>
                  <li class="dropdown-submenu">
                    <a href="<?php echo get_category_link($subcategory->term_id);?>"><?php echo $subcategory->name;?></a>
                      <?php
                        $args_sub_leve3 = array('child_of'=>$subcategory->term_id,'hide_empty'=>1,'hierarchical'=>1,'parent'=>$subcategory->term_id);
                        $my_subcategories_leve3 = get_categories($args_sub_leve3);
                      ?>
                      <?php if(count($my_subcategories_leve3)>0):?>
                      <ul class="dropdown-menu">
                        <?php foreach( $my_subcategories_leve3 as $leve3 ):?>
                            <li><a href="<?php echo get_category_link($leve3->term_id);?>"><?php echo $leve3->name;?></a></li>
                        <?php endforeach;?>
                      </ul>
                      <?php endif;?>
                  </li>
                <?php endforeach;?>
              </ul>
              <?php endif;?>
            </li>
          <?php endforeach;?>
        </ul>
        <!--<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 400px;">
          <li class="dropdown-submenu">
            <a tabindex="-1" href="#">More options</a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a href="#">More..</a>
                <ul class="dropdown-menu">
                  <li><a href="#">3rd level</a></li>
                  <li><a href="#">3rd level</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="divider"></li>
          <li class="dropdown-submenu">
            <a tabindex="-1" href="#">More options2</a>
            <ul class="dropdown-menu">
              <li><a tabindex="-1" href="#">Second level</a></li>
                <li class="dropdown-submenu">
                  <a href="#">More..</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">3rd level</a></li>
                    <li><a href="#">3rd level</a></li>
                  </ul>
                </li>
              <li><a href="#">Second level</a></li>
              <li><a href="#">Second level</a></li>
            </ul>
          </li>
        </ul>-->           


        </div>
        <div class="col-md-9">
          <div class="row">
            <?php
            $args = array('category' => 6,
                    'orderby' => 'post_date',
                    'order'=> 'DESC',
                    'numberposts'     => 2);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ) :  setup_postdata($post);
            ?>
            <div class="col-md-12">
              <div class="panel panel-danger">
  			         <div class="panel-heading turquesa"><h4><?php echo the_title();?></h4></div>
			             <div class="panel-body">
                   <?php //if ( has_post_thumbnail() ):
                    //the_post_thumbnail();
                    //endif;
                   $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
			    	          <img src="<?php echo $image[0];?>" class="flutuar-img">
                       <a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail', array('class' => 'flutuar-img')); ?></a>
			    	          <?php echo the_excerpt();?>
                      <p><a class="btn" href="<?php echo the_permalink();?>">Mais Detalhes &raquo;</a></p>
			              </div>
              </div>
            </div>
            <?php
            endforeach;

            // Reset Query
            wp_reset_query();
            ?>
            <!--
            <div class="col-md-12">
              <div class="panel panel-danger">
  			        <div class="panel-heading turquesa"><h4>10 dicas para você crescer mais</h4></div>
			          <div class="panel-body">
			    	      <img src="<?php echo get_template_directory_uri(); ?>/img/ginastica.png" class="flutuar-img">
			    	      <p class="col-md-10">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                  <p><a class="btn" href="post.html">Mais Detalhes &raquo;</a></p>
			         </div>
              </div>
            </div>-->

             <div class="row">
            <div class="col-md-12">
            <?php
            $args = array('category' => 5,
                    'orderby' => 'post_date',
                    'order'=> 'DESC',
                    'numberposts'     => 3);
            $myposts = get_posts( $args );
            foreach( $myposts as $post ) :  setup_postdata($post);
            ?>
              <div class="col-md-4">
                <div class="panel panel-danger">
                  <div class="panel-heading turquesa"><h4 class="text-center"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4></div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail', array('class' => 'media-object img-rounded')); ?></a>
                    </div>
                    <div class="col-md-6">
                      <p><span class="label label-info">Novo</span></p>
                      <p>Preço</p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach;?>
            </div>
			  <div class="col-md-4">
				<div class="panel panel-danger">
  			      <div class="panel-heading turquesa"><h4>Produto</h4></div>
			      <div class="panel-body">
			        <div class="row">
			         <div class="col-md-6">
			    	   <img src="<?php echo get_template_directory_uri(); ?>/img/whey.jpg" class="img-responsive">
			         </div>
			         <div class="col-md-6">
				    	 <p><span class="label label-info">Novo</span></p>
	                      <p>Preço</p>
	                </div>
	               </div>
			     </div>
                </div>
			  </div>
			  <div class="col-md-4">
				<div class="panel panel-danger">
  			      <div class="panel-heading turquesa"><h4>Produto</h4></div>
			      <div class="panel-body">
			        <div class="row">
			         <div class="col-md-6">
			    	   <a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/whey.jpg" class="img-responsive"></a>
			         </div>
			         <div class="col-md-6">
				    	 <p><span class="label label-info">Novo</span></p>
	                      <p>Preço</p>
	                </div>
	               </div>
			     </div>
                </div>
			  </div>
            </div>

             

                
      
            </div>
          </div>
       </div>
      </div>

      

      <hr>

      <?php get_footer(); ?>
   </div>
</body>
</html>	

