<?php
add_action('wp_head', 'custom_prod_badge_css');
function custom_prod_badge_css () { ?>
	<style type="text/css">
		.woocommerce-shop ul.products li a .gc-product-badge-section { position: absolute; top: 0; width: auto; height: auto; padding: 5px 5px 5px 5px; }
		.single-product .gc-product-badge-section { position: absolute; top: 0px; width: auto; height: auto; padding: 5px 5px 5px 5px; z-index: 1; }
		.gc_badge-1 { left: 0; }
		.gc_badge-2 { right: 0; }
		.gc-product-badge-section p { display: inline; text-align: center; line-height: 30px; color: #fff; }
	</style>
	<?php 
}

// Creating menu in woocommerce settings page on Product Tab
add_filter( 'woocommerce_get_sections_products' , 'gc_custom_custom_product_badge_option' );
function gc_custom_custom_product_badge_option( $settings_tab ){
	$settings_tab['gc_custom_product_badge'] = __( 'Custom Product Badge' );
	return $settings_tab;
}

add_filter( 'woocommerce_get_settings_products' , 'gc_custom_custom_product_badge_option_field' , 10, 2 );
function gc_custom_custom_product_badge_option_field( $settings, $current_section ) {
         
	$custom_settings = array();

	if( 'gc_custom_product_badge' == $current_section ) {

		$custom_settings =  array(
			array(
	        	//'name' => __( 'Custom Product Badge ' ),
		        'type' => 'checkbox',
		        'desc' => __( 'Enable custom product badge for all products' ),
		        'id'   => 'enable_gc_cpb_opt' 
			)
		);
		return $custom_settings;
    } else {
		return $settings;
	}
}

/*
 * Tab
 */
add_filter('woocommerce_product_data_tabs', 'misha_product_settings_tabs' );
function misha_product_settings_tabs( $tabs ){
 
	//unset( $tabs['inventory'] );
 
	$tabs['misha'] = array(
		'label'    => 'Product Badge',
		'target'   => 'gc_product_badge_data',
		//'class'    => array('show_if_virtual'),
		'priority' => 70,
	);
	return $tabs;
 
}
 
/*
 * Tab content
 */
add_action( 'woocommerce_product_data_panels', 'gc_custom_product_badge_options' );
function gc_custom_product_badge_options(){
 
	echo '<div id="gc_product_badge_data" class="panel woocommerce_options_panel hidden">';
	
	echo '<style>';
	echo '#gc_product_badge_data h3 { padding-left: 12px; }';
	echo '</style>';

	echo '<h3>Product Badge 1</h3>';

	woocommerce_wp_text_input( array(
		'id'                => 'gc_pbttl_one',
		'value'             => get_post_meta( get_the_ID(), 'gc_pbttl_one', true ),
		'label'             => 'Badge Title',
		'description'       => ''
		)
	);
	woocommerce_wp_text_input( array(
		'id'                => 'gc_pbclr_one',
		'value'             => get_post_meta( get_the_ID(), 'gc_pbclr_one', true ),
		'label'             => 'Badge Color',
		'class' 			=> 'gc_pbclr_box',
		'description'       => 'This will show as Background Color of Badge'
		)
	);

	echo '<hr>';
 
	echo '<h3>Product Badge 2</h3>';
	woocommerce_wp_text_input( array(
		'id'                => 'gc_pbttl_two',
		'value'             => get_post_meta( get_the_ID(), 'gc_pbttl_two', true ),
		'label'             => 'Badge Title',
		'description'       => ''
		)
	);
	woocommerce_wp_text_input( array(
		'id'                => 'gc_pbclr_two',
		'value'             => get_post_meta( get_the_ID(), 'gc_pbclr_two', true ),
		'label'             => 'Badge Color',
		'class' 			=> 'gc_pbclr_box',
		'description'       => 'This will show as Background Color of Badge'
		)
	);
 

 	echo '<script>';
 		echo 'jQuery(document).ready(function(){';
 			echo "jQuery('.gc_pbclr_box').prop('type', 'color');";
 			//echo "jQuery('.gc_pbclr_box').attr('value','#323552');";
 		echo '});';
 	echo '</script>';
	echo '</div>';
 
}

add_action( 'woocommerce_process_product_meta', 'gc_custom_product_badge_save', 10, 2 );
function gc_custom_product_badge_save( $post_id ){
 	
 	$product = wc_get_product($post_id);


 	$product->update_meta_data('gc_pbttl_one', sanitize_text_field($_POST['gc_pbttl_one']));
 	$product->update_meta_data('gc_pbclr_one', sanitize_text_field($_POST['gc_pbclr_one']));
 	$product->update_meta_data('gc_pbttl_two', sanitize_text_field($_POST['gc_pbttl_two']));
 	$product->update_meta_data('gc_pbclr_two', sanitize_text_field($_POST['gc_pbclr_two']));
 	$product->save();
}

// Remove "Sale" badge from shop page
add_filter('woocommerce_sale_flash', 'lw_hide_sale_flash');
function lw_hide_sale_flash()
{ return false; }


function gc_custom_product_badges () {
	$enable_gc_cpb_opt = get_option( 'enable_gc_cpb_opt' );

	$product_id = get_the_ID();
	$gc_pbttl_one = get_post_meta( $product_id, 'gc_pbttl_one', true );
	$gc_pbclr_one = get_post_meta( $product_id, 'gc_pbclr_one', true );

	$gc_pbttl_two = get_post_meta( $product_id, 'gc_pbttl_two', true );
	$gc_pbclr_two = get_post_meta( $product_id, 'gc_pbclr_two', true );

	if ($enable_gc_cpb_opt == "yes") { ?>
	
		<?php if (!empty($gc_pbttl_one)): ?>
		<div class="gc-product-badge-section gc_badge-1" style="background-color: <?php echo $gc_pbclr_one; ?>;">
			<p><?php echo $gc_pbttl_one; ?></p>
		</div>
		<?php endif; ?>

		<?php if (!empty($gc_pbttl_two)): ?>
		<div class="gc-product-badge-section gc_badge-2" style="background-color: <?php echo $gc_pbclr_two; ?>;">
			<p><?php echo $gc_pbttl_two; ?></p>
		</div>
		<?php endif; ?>

		<?php
	}
}
add_filter('woocommerce_before_shop_loop_item_title', 'gc_custom_product_badges');

?>