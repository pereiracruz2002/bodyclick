<?php
/*
function custom_search_where($where) {
    // put the custom fields into an array
    $customs = array('valor', 'custom_field2', 'custom_field3');

    foreach($customs as $custom) {
	$query .= " OR (";
	$query .= "(m.meta_key = '$custom')";
	$query .= " AND (m.meta_value  LIKE '{$n}{$term}{$n}')";
        $query .= ")";
    }

    $where = " AND ({$query}) AND ($wpdb->posts.post_status = 'publish') ";
    return($where);
}
add_filter('posts_where', 'custom_search_where');*/

add_theme_support('post-thumbnails', array('post','artigos','banners','adsense'));
register_taxonomy_for_object_type( 'tags', 'artigos' );

//add_theme_support('artigos-thumbnails', array('artigos'));

if (function_exists('register_sidebar')) {
     register_sidebar(array(
      'name' => 'Sidebar Widgets',
      'id'   => 'sidebar-widgets',
      'description'   => 'Widget Area',
      'before_widget' => '<div id="one" class="two">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>'
     ));
}

/*
add_action( 'init', 'create_post_type_artigos' );
function create_post_type_artigos() {
    register_post_type( 'artigos',
        array(
            'labels' => array(
                'name' => __( 'Artigos' ),
                'singular_name' => __( 'Artigos' )
            ),
            'public' => true,
            'supports' => array('title','editor','author','thumbnail','excerpt','comments'),
            'rewrite' => array('slug' => 'artigos', 'with_front' => false)
        )
    );
}

add_action( 'init', 'create_taxonomy_artigos_category' );
function create_taxonomy_artigos_category() {
    register_taxonomy( 'artigos_category', array( 'artigos' ), array(
        'hierarchical' => true,
        'label' => __( 'Categoria dos Artigos' ),
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
        'rewrite' => true,
        )
    );
}
*/
add_action( 'init', 'create_post_type_banners' );
function create_post_type_banners() {
    register_post_type( 'banners',
        array(
            'labels' => array(
                'name' => __( 'Banners' ),
                'singular_name' => __( 'Banner' )
            ),
            'public' => true,
            'supports' => array('title','editor','thumbnail')
        )
    );
}

add_action( 'init', 'create_post_type_adsense' );
function create_post_type_adsense() {
    register_post_type( 'adsense',
        array(
            'labels' => array(
                'name' => __( 'Adsense' ),
                'singular_name' => __( 'Adsense' )
            ),
            'public' => true,
            'supports' => array('title','editor','thumbnail')
        )
    );
}

function abreviaString($texto, $limite=100, $tres_p = '...'){
  $totalCaracteres = 0;
  $vetorPalavras = explode(" ",$texto);
  if(strlen($texto) <= $limite){
    $tres_p = "";
    $novoTexto = $texto;
  }else{
    $novoTexto = "";
    for($i = 0; $i <count($vetorPalavras); $i++){
      $totalCaracteres += strlen(" ".$vetorPalavras[$i]);
      if($totalCaracteres <= $limite)
        $novoTexto .= ' ' . $vetorPalavras[$i];
    }
  }
  return $novoTexto . $tres_p;
}

function wpbeginner_numeric_posts_nav() {

  if( is_singular() )
    return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
    return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
    $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="navigation"><ul>' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
    printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
      echo '<li>…</li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
      echo '<li>…</li>' . "\n";

    $class = $paged == $max ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
    printf( '<li>%s</li>' . "\n", get_next_posts_link() );

  echo '</ul></div>' . "\n";

}

function the_breadcrumb() {
    global $post;

    echo '<ol class="breadcrumb">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li> ');
            if (is_single()) {
                echo '</li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ol>';
}


