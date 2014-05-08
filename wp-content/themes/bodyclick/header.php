
<!DOCTYPE html>
<html lang="pt">
  <head>
    <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
	?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/bootstrap.min.css" /> 
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/jquery.jqzoom.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
      <script src="/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body <?php body_class(); ?>>
   <div class="container">
      <div class="row cinza">
        <div class="col-md-2" style="margin-top: 10px; margin-bottom: 10px;" id="logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="BodyClick">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Body Click" class="img-responsive">
          </a>
        </div>
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-12" style="margin-top: 20px;">
                <div class="row" style="margin-bottom: 20px;">
                  <div class="col-md-9">
                    <h4 class="pull-right"><strong>Receber Ofertas</strong></h4>
                  </div>
                  <div class="col-md-3">
                    <ul class="list-inline">
                      <li class="pull-left"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-face.png" alt="Facebook" class="img-responsive"></a></li>
                      <li class="pull-left"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-twitter.png" alt="Twitter" class="img-responsive"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            <div class="col-md-12" >
                <?php get_search_form(); ?> 
            </div>
          </div> 
        </div>
      </div>

      <div class="row cinza" style="margin-bottom: 20px;">
        <div class="col-md-12">
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse turquesa">
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicial</a></li>
                <li><a href="<?php echo get_bloginfo('url');?>/quem-somos">Quem Somos</a></li>
                <li><a href="<?php echo get_bloginfo('url');?>/como-funcionamos">Como funcionamos</a></li>
                <li><a href="<?php echo get_bloginfo('url');?>/artigos">Artigos</a></li>
                <li><a href="<?php echo get_bloginfo('url');?>/anuncie">Anuncie</a></li>
                <li><a href="<?php echo get_bloginfo('url');?>/fale-conosco">Fale Conosco</a></li>
              </ul>
             
            </div><!--final navbar-collapse -->
          </div><!--final da navbar-->
        </div><!--final da coluna-->
      </div><!--final da linha-->
      <?php the_breadcrumb(); ?>