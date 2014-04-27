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

