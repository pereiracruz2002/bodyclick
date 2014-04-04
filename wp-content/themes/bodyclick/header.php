
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
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/bootstrap.min.css" /> 
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/jquery.jqzoom.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
      <script src="/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body <?php body_class(); ?>>
   <div class="container">
      <div class="row" style="margin-top: 10px;">
        <div class="col-md-5" id="logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="BodyClick">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo-bclick2--para-web" alt="Body Click" class="img-responsive">
          </a>
        </div>
        <div class="col-md-7"  style="margin-top: 20px;">
          
           <!--<form class="navbar-form pull-right hidden-xs" role="search">
                <div class="form-group">
                  <input type="text" class="form-control input-lg col-md-7" placeholder="Digite a palavra...">
                </div>
                <button type="submit" class="btn btn-default turquesa">Buscar</button>
            </form>-->
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets') ) : ?>
      <?php endif; ?>
      </div>
    </div>

      <div class="row" style="margin-top: 20px;">
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
                <li><a href="http://localhost/bodyclick/?page_id=4">Quem Somos</a></li>
                <li><a href="<?php echo get_bloginfo('url');?>?page_id=4">Como funcionamos</a></li>
                <li><a href="#">Artigos</a></li>
                <li><a href="#">Anuncie</a></li>
                <li><a href="#">Fale Conosco</a></li>
              </ul>
             
            </div><!--final navbar-collapse -->
          </div><!--final da navbar-->
        </div><!--final da coluna-->
      </div><!--final da linha-->