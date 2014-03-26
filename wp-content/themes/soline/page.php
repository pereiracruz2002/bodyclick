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
get_header(); ?>
     <div id="conteudo">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" class="central">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
 
<?php endwhile; ?>
			  </div><!-- #central -->
        <?php get_sidebar(); ?>
		</div><!-- #conteudo -->
<?php include_once("menu.php"); ?>
<?php get_footer(); ?>
   </div>
</body>
</html>