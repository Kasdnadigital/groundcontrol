<?php

// Register Custom Taxonomy
function solutions_taxonomy() {

	$labels = array(
		'name'                       => 'Solutions',
		'singular_name'              => 'Solution',
		'menu_name'                  => 'Solution',
		'all_items'                  => 'All Solutions',
		'parent_item'                => 'Parent Solution',
		'parent_item_colon'          => 'Parent Solution:',
		'new_item_name'              => 'New Solution Name',
		'add_new_item'               => 'Add New Solution',
		'edit_item'                  => 'Edit Solution',
		'update_item'                => 'Update Solution',
		'view_item'                  => 'View Solution',
		'separate_items_with_commas' => 'Separate solutions with commas',
		'add_or_remove_items'        => 'Add or remove solutions',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Solutions',
		'search_items'               => 'Search Solutions',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Solutions',
		'items_list'                 => 'Solutions list',
		'items_list_navigation'      => 'Solutions list navigation',
	);
	$rewrite = array(
		'slug'                       => 'product-solution',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_solutions', array( 'product' ), $args );

}
add_action( 'init', 'solutions_taxonomy', 0 );


// Register Custom Taxonomy
function markets_taxonomy() {

	$labels = array(
		'name'                       => 'Markets',
		'singular_name'              => 'Market',
		'menu_name'                  => 'Markets',
		'all_items'                  => 'All Markets',
		'parent_item'                => 'Parent Market',
		'parent_item_colon'          => 'Parent Market:',
		'new_item_name'              => 'New Market Name',
		'add_new_item'               => 'Add New Market',
		'edit_item'                  => 'Edit Market',
		'update_item'                => 'Update Market',
		'view_item'                  => 'View Market',
		'separate_items_with_commas' => 'Separate markets with commas',
		'add_or_remove_items'        => 'Add or remove markets',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Markets',
		'search_items'               => 'Search Markets',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Markets',
		'items_list'                 => 'Markets list',
		'items_list_navigation'      => 'Markets list navigation',
	);
	$rewrite = array(
		'slug'                       => 'product-market',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_markets', array( 'product' ), $args );

}
add_action( 'init', 'markets_taxonomy', 0 );

// Register Custom Taxonomy
function ranges_taxonomy() {

	$labels = array(
		'name'                       => 'Ranges',
		'singular_name'              => 'Range',
		'menu_name'                  => 'Ranges',
		'all_items'                  => 'All Ranges',
		'parent_item'                => 'Parent Range',
		'parent_item_colon'          => 'Parent Range:',
		'new_item_name'              => 'New Range Name',
		'add_new_item'               => 'Add New Range',
		'edit_item'                  => 'Edit Range',
		'update_item'                => 'Update Range',
		'view_item'                  => 'View Range',
		'separate_items_with_commas' => 'Separate ranges with commas',
		'add_or_remove_items'        => 'Add or remove ranges',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Ranges',
		'search_items'               => 'Search Ranges',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Ranges',
		'items_list'                 => 'Ranges list',
		'items_list_navigation'      => 'Ranges list navigation',
	);
	$rewrite = array(
		'slug'                       => 'product-range',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_ranges', array( 'product' ), $args );

}
add_action( 'init', 'ranges_taxonomy', 0 );

// Register Custom Taxonomy
function networks_taxonomy() {

	$labels = array(
		'name'                       => 'Networks',
		'singular_name'              => 'Network',
		'menu_name'                  => 'Networks',
		'all_items'                  => 'All Networks',
		'parent_item'                => 'Parent Network',
		'parent_item_colon'          => 'Parent Network:',
		'new_item_name'              => 'New Network Name',
		'add_new_item'               => 'Add New Network',
		'edit_item'                  => 'Edit Network',
		'update_item'                => 'Update Network',
		'view_item'                  => 'View Network',
		'separate_items_with_commas' => 'Separate networks with commas',
		'add_or_remove_items'        => 'Add or remove networks',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Networks',
		'search_items'               => 'Search Networks',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Networks',
		'items_list'                 => 'Networks list',
		'items_list_navigation'      => 'Networks list navigation',
	);
	$rewrite = array(
		'slug'                       => 'product-network',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'product_networks', array( 'product' ), $args );

}
add_action( 'init', 'networks_taxonomy', 0 );



function add_column_to_importer( $options ) {

	// column slug => column name
	$options['product_solutions'] = 'Product Solutions';
	$options['product_markets'] = 'Product Markets';
	$options['product_ranges'] = 'Product Ranges';
	$options['product_networks'] = 'Product Networks';

	return $options;
}
add_filter( 'woocommerce_csv_product_import_mapping_options', 'add_column_to_importer' );

/**
 * Add automatic mapping support for 'Custom Column'. 
 * This will automatically select the correct mapping for columns named 'Custom Column' or 'custom column'.
 *
 * @param array $columns
 * @return array $columns
 */
function add_column_to_mapping_screen( $columns ) {
	
	// potential column name => column slug
	$columns['Product Solutions'] = 'product_solutions';
	$columns['Product Markets'] = 'product_markets';
	$columns['Product Ranges'] = 'product_ranges';
	$columns['Product Networks'] = 'product_networks';
    unset($columns['Type']);

	return $columns;
}
add_filter( 'woocommerce_csv_product_import_mapping_default_columns', 'add_column_to_mapping_screen' );



function woocommerce_add_custom_taxonomy( $product, $data ) {
  
    // set a variable with your custom taxonomy slug
    $custom_taxonomies = array('product_solutions','product_markets','product_ranges','product_networks');

    foreach($custom_taxonomies as $custom_taxonomy){

        if ( is_a( $product, 'WC_Product' ) ) {
            if( ! empty( $data[ $custom_taxonomy ] ) ) {
                        $product->save();
                        $custom_taxonomy_values = $data[ $custom_taxonomy ];
                        $custom_taxonomy_values = explode(",", $custom_taxonomy_values);
                        $terms = array();
                        foreach($custom_taxonomy_values as $custom_taxonomy_value){
                            if(!get_term_by('name', $custom_taxonomy_value, $custom_taxonomy)){
                                    $custom_taxonomy_args= array(
                                        'cat_name' => $custom_taxonomy_value,
                                        'taxonomy' => $custom_taxonomy,
                                    );
                                    $custom_taxonomy_value_cat = wp_insert_category($custom_taxonomy_args);
                                    array_push($terms, $custom_taxonomy_value_cat);
                            }else{
                                    $custom_taxonomy_value_cat = get_term_by('name', $custom_taxonomy_value, $custom_taxonomy)->term_id;
                                    array_push($terms, $custom_taxonomy_value_cat);
                            }
                        }
                wp_set_object_terms( $product->get_id(),  $terms, $custom_taxonomy );
            }
        }

    }
  
      return $product;
  }
  add_filter( 'woocommerce_product_import_inserted_product_object', 'woocommerce_add_custom_taxonomy', 10, 2 );