<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); 
?>
<div class="row">
        <div class="col-md-3 hidden-phone">
          <h3>Mais Votadas</h3>
           <?php include_once("menu-votadas.php"); ?>
        </div>
        <div class="col-md-9">
           <div class="row">
            <div class="col-md-12">
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
			  </div>
			 </div>
			</div>
            
            
            
            
            </div>
          </div>
        </div>
      </div>


 
<?php get_footer(); ?>
   </div>
</body>
</html>

