<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<title>
 <?php
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

	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );


  if ( is_home() || is_front_page() ): ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="ICBM" content="-23.54538,-46.64598" /> 
  <meta name="geo.position" content="-23.54538,-46.64598" /> 
  <meta name="geo.placename" content="Móveis Para Escritório - Soline Móveis para Escritório" /> 
  <meta name="geo.region" content="São Paulo-SP" /> 
  <meta name="robots" content="index,follow" /> 
  <meta name="googlebot" content="index,follow" /> 
  <meta name="msnbot" content="index,follow,all" /> 
  <meta name="inktomislurp" content="index,follow,all" /> 
  <meta name="unknownrobot" content="index,follow,all" /> 
  <meta name="author" content="http://www.todoz.net" />
  <meta name="DC.publisher" content="TODOZ Marketing Digital" />
  <meta name="DC.publisher.url" content="http://www.todoz.net" />
  <meta name="DC.title" content="TODOZ Marketing Digital" />
  <meta name="DC.identifier" content="http://www.todoz.net" />
  <meta name="DC.creator.name" content="Demetrio, Rodrigo" />
  <meta name="DC.creator" content="Demetrio, Rodrigo" />
  <meta name="DC.rights.rightsHolder" content="Rodrigo Demetrio" />		
  <meta name="DC.language" content="pt-BR" scheme="rfc1766" />
  <link rel="shortcut icon" href="<? bloginfo('url') ?>/favicon.ico" />
  <link rel="alternate" type="application/xml" title="Móveis para Escritório - Sitemap" href="http://www.solinemoveis.com.br/sitemap.xml" /> 
  <link rel="alternate" type="application/rss+xml" title="Móveis para Escritório - ROR" href="http://www.solinemoveis.com.br/ror.xml" /> 
  <? endif; ?>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>css/bootstrap.min.css" /> 
  <?php 
   $page = explode('/', $_SERVER['REQUEST_URI']);
   if ($page[1]=="soline-moveis-escritorio"):
  ?>
  <link rel="stylesheet" type="text/css" media="all" href="<?=bloginfo("template_url");?>/css/page.css" />
  <?php endif; ?>

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
  <script type="text/javascript" src="<?=bloginfo("template_url");?>/js/jquery-1.4.2.min.js"></script> 
  <!--fancybox -->
  <script type="text/javascript" src="<?=bloginfo("template_url");?>/fancybox/jquery.easing-1.3.pack.min.js"></script> 
  <script type="text/javascript" src="<?=bloginfo("template_url");?>/fancybox/jquery.fancybox-1.3.4.pack.min.js"></script> 
  <script type="text/javascript" src="<?=bloginfo("template_url");?>/fancybox/jquery.mousewheel-3.0.4.pack.min.js"></script> 
  <link rel="stylesheet" type="text/css" media="all" href="<?=bloginfo("template_url");?>/fancybox/jquery.fancybox-1.3.4.css" /> 
  <!--/fancybox -->
  
  <script type="text/javascript" src="http://www.solinemoveis.com.br/wp-content/themes/soline/js/jquery.pikachoose.min.js"></script> 
  <script type="text/javascript" src="<?=bloginfo("template_url");?>/js/form.min.js"></script> 
  <script type="text/javascript" src="<?=bloginfo("template_url");?>/js/jquery-custom.min.js"></script>
	<script type="text/javascript" src="<?=bloginfo("template_url");?>/js/jquery.colorbox.min.js"></script>
  <script type="text/javascript" src="<?=bloginfo("template_url");?>/js/jquery.simplemodal.js"></script>
  <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'pt-BR'}
</script>
</head>
<body <?php body_class(); ?>>
 <div class="container">
      <div class="row" style="margin-top: 10px;">
        <div class="col-md-5" id="logo">
          <a href="index.html" title="BodyClick">
            <img src="" alt="Body Click" class="img-responsive">
          </a>
        </div>
        <div class="col-md-7"  style="margin-top: 20px;">
          
           <form class="navbar-form pull-right hidden-xs" role="search">
                <div class="form-group">
                  <input type="text" class="form-control input-lg" placeholder="Digite a palavra...">
                </div>
                <button type="submit" class="btn btn-default turquesa">Buscar</button>
            </form>
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
                <li class="active"><a href="index.html">Inicial</a></li>
                <li><a href="#">Quem Somos</a></li>
                <li><a href="#">Como funcionamos</a></li>
                <li><a href="#">Artigos</a></li>
                <li><a href="#">Anuncie</a></li>
                <li><a href="#">Fale Conosco</a></li>
              </ul>
             
            </div><!--final navbar-collapse -->
          </div><!--final da navbar-->
        </div><!--final da coluna-->
      </div><!--final da linha-->