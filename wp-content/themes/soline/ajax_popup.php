<?php
/**
 * Template Name: Ajax Template
 */
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head>
    <title><?php the_title(); ?></title>
  </head>
  <body>
    <?php the_content(); ?>
  </body>
</html>
<?php endwhile; ?>