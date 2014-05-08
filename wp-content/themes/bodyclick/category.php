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
				<div class="page-header">
					<h1 class="archive-title"><?php single_cat_title( '', true ); ?></h1>
				</div>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post();?>
					<?php $preco = get_post_custom_values("preco");?>
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12">
								<a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail', array('class' => 'media-object img-rounded')); ?></a>
							</div>
							<div class="col-md-12">
								<h5><a class="nome_produto" href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
							</div>
							<div class="col-md-10 col-md-offset-2">
								<p class="verde"><strong><?php echo $preco[0];?><strong></p>
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

<?php wpbeginner_numeric_posts_nav(); ?>
 
<?php get_footer(); ?>
   </div>
</body>
</html>

