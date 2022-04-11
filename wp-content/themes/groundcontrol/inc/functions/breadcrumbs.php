<?php
function the_breadcrumb() {

    $sep = ' <span>&#x25B8</span> ';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } elseif(is_post_type_archive('case_study')){
                _e( 'Case Studies', 'text_domain' );
            }
            else {
                if(is_shop()){
                    _e('Store', 'text_domain');
                }else if(is_category()){
                    _e(get_the_title(), 'text_domain');
                }else if(is_tax()){
                    _e(get_the_archive_title(), 'text_domain');
                }else{
                    _e( 'Blog Archives', 'text_domain' );
                }
            }
        }

        // Check if page has a parent
        if(get_post() !== null ){
            if(get_post()->post_parent) {
                $parent_title = get_the_title(get_post()->post_parent);
                $parent_link = get_the_permalink(get_post()->post_parent);
                echo '<a class="post-parent" href="';
                echo $parent_link;
                echo '">';
                echo $parent_title;
                echo '</a>';
                echo $sep;
            }
        }
	
	// If the current page is a single §, show its title with the separator
        if (is_single()) {
            if(is_product()){
                $post = get_post();
                $range_terms = get_the_terms($post->ID, 'product_ranges', array('hide_empty' => false));
				$range_terms = get_the_terms($post->ID, 'product_ranges', array('hide_empty' => false));
                $network_terms = get_the_terms($post->ID, 'product_networks', array('hide_empty' => false));
                $solution_terms = get_the_terms($post->ID, 'product_solutions', array('hide_empty' => false));
                if($range_terms){
                    $term_type = $range_terms[0]->term_id;
                    $taxonomy = 'product_ranges';
                    (int)$temp_term_type = (int)$term_type;
                    $value = get_term_link($temp_term_type, $taxonomy); 
                    $page_link = get_field('archive_url', 'product_ranges_'.$temp_term_type);
                    if($page_link){
                        echo '<a href="';
                        echo $page_link['url'];
                        echo '">';
                        echo $page_link['title'];
                        echo '</a>';
                        echo $sep;
                    }
                    echo '<a href="';
                    echo $value;
                    echo '">';
                    echo $range_terms[0]->name;
                    echo '</a>';
                    
                }elseif($network_terms){
                    $term_type = $network_terms_terms[0]->term_id;
                    $taxonomy = 'product_networks';
                    (int)$temp_term_type = (int)$term_type;
                    $value = get_term_link($temp_term_type, $taxonomy); 
                    $page_link = get_field('archive_url', 'product_networks_'.$temp_term_type);
                    if($page_link){
                        echo '<a href="';
                        echo $page_link['url'];
                        echo '">';
                        echo $page_link['title'];
                        echo '</a>';
                        echo $sep;
                    }
                    echo '<a href="';
                    echo $value;
                    echo '">';
                    echo $network_terms[0]->name;
                    echo '</a>';
                    
                }elseif($solution_terms){
                    $term_type = $solution_terms[0]->term_id;
                    $taxonomy = 'product_solutions';
                    (int)$temp_term_type = (int)$term_type;
                    $value = get_term_link($temp_term_type, $taxonomy); 
                    $page_link = get_field('archive_url', 'product_solutions_'.$temp_term_type);
                    if($page_link){
                        echo '<a href="';
                        echo $page_link['url'];
                        echo '">';
                        echo $page_link['title'];
                        echo '</a>';
                        echo $sep;
                    }
                    echo '<a href="';
                    echo $value;
                    echo '">';
                    echo $solution_terms[0]->name;
                    echo '</a>';

                }else{
                    echo '<a href="'.get_home_url().'/products">';
                    echo 'Products';
                    echo '</a>';
                }
                echo $sep;
                echo the_title();
            }else{
                $postType = get_post_type_object(get_post_type());
                if ($postType) {
                    echo '<a href="'.get_post_type_archive_link(get_post_type()).'">';
                    echo esc_html($postType->labels->name);
                    echo '</a>';
                    echo $sep;
                }
                the_title();
            }
        }
	 
    // If the current page is the search page

        if(is_search()){
            echo 'Search';
        }

	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}
?>