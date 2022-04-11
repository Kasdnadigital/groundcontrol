<?php 
// Adding Theme  Options to Custom Fields Options
function grod_acf_options_page_settings($settings) {
    $settings['title'] = __('Theme Option','acf');
    $settings['menu'] = __('Theme Option','acf');
    $settings['pages'] = array('General Setting');

    return $settings;
}
add_filter('acf/options_page/settings', 'grod_acf_options_page_settings');

function grod_resgister_post_init() {
   
   /* Market Custom Post Type */ 

    $lbl_mkt = array(
        'name'                  => _x( 'Markets Pages', 'Post type general name', 'twentytwenty' ),
        'singular_name'         => _x( 'Market', 'Post type singular name', 'twentytwenty' ),
        'menu_name'             => _x( 'Markets Pages', 'Admin Menu text', 'twentytwenty' ),
        'name_admin_bar'        => _x( 'Markets', 'Add New on Toolbar', 'twentytwenty' ),
        'add_new'               => __( 'Add New', 'twentytwenty' ),
        'add_new_item'          => __( 'Add New Market', 'twentytwenty' ),
        'new_item'              => __( 'New Market', 'twentytwenty' ),
        'edit_item'             => __( 'Edit Market', 'twentytwenty' ),
        'view_item'             => __( 'View Market', 'twentytwenty' ),
        'all_items'             => __( 'All Market', 'twentytwenty' ),
        'search_items'          => __( 'Search Markets', 'twentytwenty' ),
        'parent_item_colon'     => __( 'Parent Markets:', 'twentytwenty' ),
        'not_found'             => __( 'No markets found.', 'twentytwenty' ),
        'not_found_in_trash'    => __( 'No markets found in Trash.', 'twentytwenty' ),
       
    );     
    $args_mkt = array(
        'labels'             => $lbl_mkt,
        'description'        => 'Markets',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'markets' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ,'page-attributes'),
        'show_in_rest'       => true
    );
      
    register_post_type( 'markets', $args_mkt );

   

    /* Solutions Custom Post Type */ 
    $lbl_sol = array(
        'name'                  => _x( 'Solutions Pages', 'Post type general name', 'twentytwenty' ),
        'singular_name'         => _x( 'Solution', 'Post type singular name', 'twentytwenty' ),
        'menu_name'             => _x( 'Solutions Pages', 'Admin Menu text', 'twentytwenty' ),
        'name_admin_bar'        => _x( 'Solutions', 'Add New on Toolbar', 'twentytwenty' ),
        'add_new'               => __( 'Add New', 'twentytwenty' ),
        'add_new_item'          => __( 'Add New Solution', 'twentytwenty' ),
        'new_item'              => __( 'New Solution', 'twentytwenty' ),
        'edit_item'             => __( 'Edit Solution', 'twentytwenty' ),
        'view_item'             => __( 'View Solution', 'twentytwenty' ),
        'all_items'             => __( 'All Solution', 'twentytwenty' ),
        'search_items'          => __( 'Search Solution', 'twentytwenty' ),
        'parent_item_colon'     => __( 'Parent Solution:', 'twentytwenty' ),
        'not_found'             => __( 'No solutions found.', 'twentytwenty' ),
        'not_found_in_trash'    => __( 'No solutions found in Trash.', 'twentytwenty' ),
       
    );     
    $args_sol = array(
        'labels'             => $lbl_sol,
        'description'        => 'Solutions',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'solutions' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail','page-attributes' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'solutions', $args_sol );




    /* Products Custom Post Type */ 

    $lbl_prod = array(
        'name'                  => _x( 'Products Pages', 'Post type general name', 'twentytwenty' ),
        'singular_name'         => _x( 'Products', 'Post type singular name', 'twentytwenty' ),
        'menu_name'             => _x( 'Products Pages', 'Admin Menu text', 'twentytwenty' ),
        'name_admin_bar'        => _x( 'Products', 'Add New on Toolbar', 'twentytwenty' ),
        'add_new'               => __( 'Add New', 'twentytwenty' ),
        'add_new_item'          => __( 'Add New Products', 'twentytwenty' ),
        'new_item'              => __( 'New Products', 'twentytwenty' ),
        'edit_item'             => __( 'Edit Products', 'twentytwenty' ),
        'view_item'             => __( 'View Products', 'twentytwenty' ),
        'all_items'             => __( 'All Products', 'twentytwenty' ),
        'search_items'          => __( 'Search Products', 'twentytwenty' ),
        'parent_item_colon'     => __( 'Parent Products:', 'twentytwenty' ),
        'not_found'             => __( 'No Products found.', 'twentytwenty' ),
        'not_found_in_trash'    => __( 'No Products found in Trash.', 'twentytwenty' ),
       
    );     
    $args_prod = array(
        'labels'             => $lbl_prod,
        'description'        => 'Products',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'products' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail','page-attributes','excerpt' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'products', $args_prod );

    /* Knowledge Custom Post Type */
    $lbl_knwl = array(
        'name'                  => _x( 'Knowledge Pages', 'Post type general name', 'twentytwenty' ),
        'singular_name'         => _x( 'Knowledge', 'Post type singular name', 'twentytwenty' ),
        'menu_name'             => _x( 'Knowledge Pages', 'Admin Menu text', 'twentytwenty' ),
        'name_admin_bar'        => _x( 'Knowledge', 'Add New on Toolbar', 'twentytwenty' ),
        'add_new'               => __( 'Add Knowledge', 'twentytwenty' ),
        'add_new_item'          => __( 'Add New Knowledge', 'twentytwenty' ),
        'new_item'              => __( 'New Knowledge', 'twentytwenty' ),
        'edit_item'             => __( 'Edit Knowledge', 'twentytwenty' ),
        'view_item'             => __( 'View Knowledge', 'twentytwenty' ),
        'all_items'             => __( 'All Knowledge', 'twentytwenty' ),
        'search_items'          => __( 'Search Knowledge', 'twentytwenty' ),
        'parent_item_colon'     => __( 'Parent Knowledge:', 'twentytwenty' ),
        'not_found'             => __( 'No knowledge found.', 'twentytwenty' ),
        'not_found_in_trash'    => __( 'No knowledge found in Trash.', 'twentytwenty' ),
       
    );     
    $args_knwl = array(
        'labels'             => $lbl_knwl,
        'description'        => 'Knowledge',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'knowledge' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail','page-attributes','excerpt' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'knowledge', $args_knwl );

    $lbl_knwl_cat = array(
        'name'                       => _x( 'knowledge Category', 'taxonomy general name', 'twentytwenty' ),
        'singular_name'              => _x( 'knowledge Category', 'taxonomy singular name', 'twentytwenty' ),
        'search_items'               => __( 'Search knowledge Category', 'twentytwenty' ),
        'popular_items'              => __( 'Popular knowledge Category', 'twentytwenty' ),
        'all_items'                  => __( 'All knowledge Category', 'twentytwenty' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit knowledge Category', 'twentytwenty' ),
        'update_item'                => __( 'Update knowledge Category', 'twentytwenty' ),
        'add_new_item'               => __( 'Add New knowledge Category', 'twentytwenty' ),
        'new_item_name'              => __( 'New knowledge Category Name', 'twentytwenty' ),
        'separate_items_with_commas' => __( 'Separate knowledge category with commas', 'twentytwenty' ),
        'add_or_remove_items'        => __( 'Add or remove knowledge category', 'twentytwenty' ),
        'not_found'                  => __( 'No knowledge category found.', 'twentytwenty' ),
        'menu_name'                  => __( 'knowledge Category', 'twentytwenty' ),
    );
 
    $args_knwl_cat = array(
        'hierarchical'          => true,
        'labels'                => $lbl_knwl_cat,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'knowledge_cat' ),
    );
 
    register_taxonomy( 'knowledge_cat', 'knowledge', $args_knwl_cat );

    $lbl_knwltags_cat = array(
        'name'                       => _x( 'Filters', 'taxonomy general name', 'twentytwenty' ),
        'singular_name'              => _x( 'Filters', 'taxonomy singular name', 'twentytwenty' ),
        'search_items'               => __( 'Search Filters', 'twentytwenty' ),
        'popular_items'              => __( 'Popular Filters', 'twentytwenty' ),
        'all_items'                  => __( 'All Filters', 'twentytwenty' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Filters', 'twentytwenty' ),
        'update_item'                => __( 'Update Filters', 'twentytwenty' ),
        'add_new_item'               => __( 'Add New Filters', 'twentytwenty' ),
        'new_item_name'              => __( 'New Filters Name', 'twentytwenty' ),
        'separate_items_with_commas' => __( 'Separate filters with commas', 'twentytwenty' ),
        'add_or_remove_items'        => __( 'Add or remove filters', 'twentytwenty' ),
        'not_found'                  => __( 'No filters found.', 'twentytwenty' ),
        'menu_name'                  => __( 'Filters', 'twentytwenty' ),
    );
 
    $args_knwltags_cat = array(
        'hierarchical'          => true,
        'labels'                => $lbl_knwltags_cat,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'casestudy_filters' ),
    );
 
    register_taxonomy( 'casestudy_filters', 'knowledge', $args_knwltags_cat );

}
add_action( 'init', 'grod_resgister_post_init' );

/* Partner Logo Function */

function Partner_Logos_Fn($post_id)
{
    if(get_field("fbs_partner_slider",$post_id))
    {
        echo '<section class="footer-module horizontal-logos section">';
            echo '<div class="wrapper">';
                echo '<div class="inner">';
                    if(get_field("partner_add_logo_image",$post_id))
                    {
                        while (has_sub_field("partner_add_logo_image",$post_id)) {
                            $_p_logo = get_sub_field("part_upload_logo",$post_id);
                            if(!empty($_p_logo))
                            {
                                echo '<div class="logo">';
                                    echo '<img src="'.$_p_logo['url'].'" alt="'.$_p_logo['alt'].'" >';
                                echo '</div>';
                            }
                        }
                    }
                echo '</div>';
            echo '</div>';
        echo '</section>';
    }
}
function Contact_Form_Fn($post_id)
{
    if(get_field("fbs_contact_form",$post_id))
    {
        $bg_color = get_field("fbs_cfrm_bg_color",$post_id);
        echo '<section class="footer-module contact-form section bg-'.$bg_color.'">';
            echo '<div class="wrapper">';
                echo '<div class="content-section">';
                    echo get_field("fbs_cfrm_description",$post_id);
                echo '</div>';
                echo '<div class="contact-section">';
                    $gfrm = get_field("fbs_cfrm_shortcode",$post_id);
                    echo do_shortcode($gfrm);
                echo '</div>';
            echo '</div>';
        echo '</section>';
    }
}


add_action('wp_ajax_casestudy_post_ajax_callback', 'casestudy_post_ajax_callback');
add_action('wp_ajax_nopriv_casestudy_post_ajax_callback', 'casestudy_post_ajax_callback');

function casestudy_post_ajax_callback(){
    $paged      = $_POST['page'];
    if($_POST['t_filter'] != '')
    {
        $case_query  = new WP_Query( array(
            'post_type'      => 'knowledge',
            'posts_per_page' => 4,
            'paged'          => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => 'casestudy_filters',
                    'field'    => 'term_id',
                    'terms'    => $_POST['t_filter'],
                ),
            ),
        ));
    }else
    {
        $case_query  = new WP_Query( array(
            'post_type'      => 'knowledge',
            'posts_per_page' => 4,
            'paged'          => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => 'knowledge_cat',
                    'field'    => 'slug',
                    'terms'    => 'case-study',
                ),
            ),
        ));
    } 
    


    $html       = '';
    $sel_terms_data = '';

    if ( $case_query->have_posts() ) { 

        while ( $case_query->have_posts() ) {  $case_query->the_post();
            $html .= '<div class="single-case-study">';     
               $html .= '<a href="'.get_the_permalink().'">';
                    $html .= '<div class="image-container section">';
                        $html .= '<img src="'.get_the_post_thumbnail_url(get_the_ID(),'full').'" />';
                    $html .= '</div>';
                    $html .= '<div class="content-container section">';
                        $html .= '<span data-mh="card-titles" class="date uppercase section">Case Study</span>';
                        $html .= '<h2 class="post-title section">'.get_the_title().'</h2>';
                        $html .= '<p data-mh="card-excerpts" class="section">'.get_the_excerpt().'</p>';
                    $html .= '</div>';
               $html .= '</a>';    
            $html .= '</div>';   
        }
    }else{
            $html .= '<h3>data not found</h3>';
    } wp_reset_postdata();

    if($_POST['t_filter'] != '')
    {
        $terms_name = get_term_by('id',$_POST['t_filter'], 'casestudy_filters');
        $sel_terms_data = $terms_name->name;
    }
    $numer_of_pages = $case_query->max_num_pages;
    if($paged > 1) {
        $prev_page = $paged - 1;
        $pagination .= '<a class="prev page-numbers" data-page="'. $prev_page .'">« Previous</a>';
    }
    
    for ($i = 1; $i <= $numer_of_pages; $i++) {
        if( $paged == $i ) {
            $pagination .= '<span aria-current="page" class="page-numbers current">'. $i .'</span>';
        } else {
            $pagination .= '<a class="page-numbers" data-page="'.$i.'">'. $i .'</a>';
        }
    }
    
    if($paged != $numer_of_pages) {
        $next_page = $paged + 1;
        $pagination .= '<a class="next page-numbers" data-page="'. $next_page .'">Next »</a>';
    }

    $response_data = ['html' => $html, 'pagination' => $pagination, 'sel_terms_data' => $sel_terms_data];
    wp_send_json_success($response_data);
    die();
}

add_filter('wpseo_breadcrumb_single_link' ,'remove_shop', 10 ,2);
function remove_shop($link_output, $link ){
if( $link['text'] == 'Products' ) {
    $link_output ='';
}
return $link_output;
}


/* Filter Code*/

function my_files_new()
{

    // wp_enqueue_script( 'jquery' );

    if (is_product_category() || is_product_taxonomy() || is_page_template("template-parts/page-hardware.php")) {
           
        wp_enqueue_script('ajax-script', get_bloginfo('template_directory') . '/assets/js/filter.js', array('jquery'));
        wp_localize_script('ajax-script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
    }



   
}

add_action('wp_enqueue_scripts', 'my_files_new');

add_action('wp_ajax_ajax_cart_update', 'ajax_cart_update');
add_action('wp_ajax_nopriv_ajax_cart_update', 'ajax_cart_update');



// Lets check if product is in cart

function ajax_cart_update() {
    $response['status'] = '0';
    $response['message'] = '';
    $response['data'] = '';
    $catid = $_POST['cat_id'];
    $array_data = json_decode(stripslashes($_POST['checked']), true);
    $anew = array();
    
    // Sort by latest
    if($_POST['sort_val'] == 'date'){
        $orderby = 'date';
        $order = 'DESC';
    }

    // Sort by price: low to high
    if($_POST['sort_val'] == 'price'){
        $orderby = 'meta_value_num';
        $order = 'ASC';
        $metakeyval = '_price';
    }

    // Sort by price: high to low
    if($_POST['sort_val'] == 'price-desc'){
        $orderby = 'meta_value_num';
        $order = 'DESC';
        $metakeyval = '_price';
    }

    // Sort by Popularity
    if($_POST['sort_val'] == 'popularity'){
        $orderby = 'meta_value_num';
        $order = 'DESC';
        $metakeyval = 'total_sales';
    }

    

    $paged = $_POST['paged'];
    if($_POST['tax_name'] == 'product_ranges')
    {
        $rtaxid = array();
        foreach ($array_data as $array_data_list) {
        $anew[] = $array_data_list;
        }
        foreach ($anew as $key => $val) {
            $rtaxid[] = $val['value'];
        }
        
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12,
            'post_status' => 'publish',
            'paged' => $paged,
            'orderby' => $orderby,
            'order' => $order,
            'meta_key' => $metakeyval,
            'tax_query' => array(
                array(
                    'taxonomy' => $_POST['tax_name'],
                    'field' => 'term_id',
                    'terms' => $rtaxid,
                    'operator' => 'IN',
                )
            ),
        );
    }else if($_POST['tax_name'] == 'product_cat'){

        foreach ($array_data as $array_data_list) {
        $anew['relation'] = 'OR';
        $anew[] = $array_data_list;
        }
        $array = array(
            $anew,
        );
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12,
            'post_status' => 'publish',
            'paged' => $paged,
            'orderby' => $orderby,
            'order' => $order,
            'meta_key' => $metakeyval,
            'tax_query' => array(
                array(
                    'taxonomy' => $_POST['tax_name'],
                    'field' => 'term_id',
                    'terms' => $catid,
                    'operator' => 'IN',
                )
            ),
            'meta_query' => array(
                // 'relation' => 'OR',
                $array

            )
        );
    }else
    {
        foreach ($array_data as $array_data_list) {
        $anew['relation'] = 'OR';
        $anew[] = $array_data_list;
        }
        
        $array = array(
            $anew,
        );
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 24,
            'post_status' => 'publish',
            'paged' => $paged,
            'orderby' => $orderby,
            'order' => $order,
            'meta_key' => $metakeyval,
            'meta_query' => array(
                // 'relation' => 'OR',
                $array
            )
        );
    }
    
    

    $newarray[][] = '';

    // echo "<pre>";print_r($args); exit;
    $loop = new WP_Query( $args );
    // ptr($loop->posts);exit;
    if ( $loop->have_posts() ) {
    $i = 0;
    while ( $loop->have_posts() ) : $loop->the_post();
        $cmpr_btn = do_shortcode('[woosc id="' . get_the_ID() . '"]');
        if($_POST['site_id'] == 1)
        {
            $gravityform = do_shortcode('[gravityform id="9" ajax="true" field_values="pname='.get_the_title().'"]');    
        }else if($_POST['site_id'] == 4)
        {
            $gravityform = do_shortcode('[gravityform id="24" ajax="true" field_values="pname='.get_the_title().'"]');
        }
        
        $product = wc_get_product(get_the_ID());
        
        $featured_img = wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
        
        $product_price = $product->get_price_html();
        $product_stock = $product->is_in_stock();
        $buying_opttions = get_field('buying_options');

        $add_to_cart = do_shortcode('[add_to_cart id="' . get_the_ID() . '" show_price="false"]');
        $gc_pbttl_one = get_post_meta( get_the_ID(), 'gc_pbttl_one', true );
        $gc_pbclr_one = get_post_meta( get_the_ID(), 'gc_pbclr_one', true );

        $gc_pbttl_two = get_post_meta( get_the_ID(), 'gc_pbttl_two', true );
        $gc_pbclr_two = get_post_meta( get_the_ID(), 'gc_pbclr_two', true );

        $newarray[$i]['id']             = get_the_ID();
        $newarray[$i]['post_title']     = get_the_title();
        $newarray[$i]['cart_btn']       = $add_to_cart;
        $newarray[$i]['featured_img']   = $featured_img;
        $newarray[$i]['cmpr_btn']       = $cmpr_btn;
        $newarray[$i]['product_price']  = $product_price;
        $newarray[$i]['post_url']       = get_the_permalink(get_the_ID());
        $newarray[$i]['product_stock']  = $product_stock;
        $newarray[$i]['gc_pbttl_one']   = $gc_pbttl_one;
        $newarray[$i]['gc_pbclr_one']   = $gc_pbclr_one;
        $newarray[$i]['gc_pbttl_two']   = $gc_pbttl_two;
        $newarray[$i]['gc_pbclr_two']   = $gc_pbclr_two;
        $newarray[$i]['gravityform']    = $gravityform;
        $newarray[$i]['buyingoptions']    = $buying_opttions;
    $i++;
    endwhile;
    }
    wp_reset_postdata();
    $numer_of_pages = $loop->max_num_pages;
    $response['status'] = '1';
    $response['message'] = '';
    $response['data'] = $newarray;
    $response['paginate_after'] = $numer_of_pages;
    wp_send_json($response);
    
}

// Cutom filter = END

// Custom compare button
add_filter('woosc_button_position_archive', '__return_false');
add_filter('woosc_button_position_single', '__return_false');
/* End */


add_filter( 'gform_field_input', 'dynemic_input', 10, 5 );
function dynemic_input( $input, $field, $value, $lead_id, $form_id ) {
    if ( $field->cssClass == 'product-title' ) {
        $input = '<div class="ginput_container"><h2 class="product-heading">'.$value.'</h2></div>';
    }
    return $input;
}
?>