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
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();?>
				<div class="col-md-12">
					<div class="panel panel-danger">
						<div class="panel-heading turquesa"><h4><?php echo the_title();?></h4></div>
							<div class="panel-body">
                       			<a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail', array('class' => 'flutuar-img')); ?></a>
			    	        <?php echo the_excerpt();?>
                      			<p><a class="btn" href="<?php echo the_permalink();?>">Mais Detalhes &raquo;</a></p>
			              	</div>
              			</div>
            		</div>
				<?php endwhile;?>
			<?php else: ?>
				<div class="alert alert-danger"><strong>Nenhum registro encontrado</strong></div>
			<?php endif;?>
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

