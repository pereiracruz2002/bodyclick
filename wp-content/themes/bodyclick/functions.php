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