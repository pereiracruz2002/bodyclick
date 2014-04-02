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