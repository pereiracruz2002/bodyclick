<?php
/*
Template name: semLaterais
*/

get_header(); ?>
     <div id="conteudo">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" class="central">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
        </div>
<?php endwhile; ?>
			  </div><!-- #central -->
		</div><!-- #conteudo -->
<?php get_footer(); ?>
   </div>
</body>
</html>