<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<div class="template-inner section">
	<?php if ( is_search() ) { ?> 
	 <div class="wrapper">
        <h1>Results for: <span>[<?php echo $s; ?>]</span></h1>
        <div class="filters"></div>
    </div>
    <?php 
    $search_query = isset( $_REQUEST['s'] ) ? sanitize_text_field( $_REQUEST['s'] ) : null;
    $swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;
    $search_results = [];
    if ( ! empty( $search_query ) && class_exists( '\\SearchWP\\Query' ) ) {
        $searchwp_query = new \SearchWP\Query( $search_query, [
            'engine' => 'products_search', // The Engine name.
            'fields' => 'all',          // Load proper native objects of each result.
			'page'   => $swppg,
        ] );
        $search_results = $searchwp_query->get_results();

        // set up pagination
        $pagination = paginate_links( array(
            'format'  => '?swppg=%#%',
            'current' => $swppg,
            'total'   => $searchwp_query->max_num_pages,
        ) );
    }
    if ( ! empty( $search_query ) && ! empty( $search_results ) ) : ?>
        <div class="products-results bg-lightgrey section">
            <div class="wrapper">
                <h3 class="col-peach">Products</h3>
                 <?php foreach ( $search_results as $search_result ) : ?>
                    <div class="single-result">
                        <?PHP $product = wc_get_product($search_result->ID); ?>
                        <a href="<?=get_permalink($search_result->ID);?>">
                        <div class="product-image">
                            <?PHP    $p_url = wp_get_attachment_image_src( get_post_thumbnail_id($search_result->ID), 'single-post-thumbnail' ); ?>
                           
                                <img src="<?php echo $p_url[0]?>" alt="<?php echo get_the_title();?>"/>
                            
                        </div>
                        <div class="product-content" data-mh="product-content">
                            <h4 data-mh="product-title"><?=$search_result->post_title;?></h4>
                        </div>
                        </a>
                    </div>
                <?PHP endforeach; ?>
                <?PHP 
                if ( $searchwp_query->max_num_pages > 1 ) { ?>
					<div class="navigation pagination" role="navigation">
						<div class="nav-links">
							<?php echo wp_kses_post( $pagination ); ?>
						</div>
					</div>
				<?php } ?>
            </div>
        </div>
            <?PHP endif; ?>
        <?php
        $search_query = isset( $_REQUEST['s'] ) ? sanitize_text_field( $_REQUEST['s'] ) : null;
        $swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;
        $search_results = [];
        if ( ! empty( $search_query ) && class_exists( '\\SearchWP\\Query' ) ) {
            $searchwp_query = new \SearchWP\Query( $search_query, [
                'engine' => 'default', // The Engine name.
                'fields' => 'all',          // Load proper native objects of each result.
                'page'   => $swppg,
            ] );
            $search_results = $searchwp_query->get_results();

            // set up pagination
            $pagination = paginate_links( array(
                'format'  => '?swppg=%#%',
                'current' => $swppg,
                'total'   => $searchwp_query->max_num_pages,
            ) );
        }
        if ( ! empty( $search_query ) && ! empty( $search_results ) ) : ?>
            <div class="media-results bg-white section">
                <div class="wrapper">
                    <h3 class="col-peach">Media</h3>
	                <?php foreach ( $search_results as $search_result ) : ?>
                        <div class="result section">
                        <?PHP 
                        switch( get_class( $search_result ) ) {
                            case 'WP_Post':?>
                            <a href="<?=get_permalink($search_result->ID);?>">
                            <h5><?=$search_result->post_title;?></h5>
                            </a>
                            <?PHP break; ?>
                        <?PHP } ?>
                        </div>
                    <?PHP endforeach; ?>
                    <?PHP if ( $searchwp_query->max_num_pages > 1 ) { ?>
					<div class="navigation pagination" role="navigation">
						<div class="nav-links">
							<?php echo wp_kses_post( $pagination ); ?>
						</div>
					</div>
				<?php } ?>
                </div>
            </div>
        <?PHP endif; ?>
       
	<?php

	} elseif ( is_archive() && ! have_posts() ) {
		$archive_title = __( 'Nothing Found', 'twentytwenty' );
	} elseif ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}
 ?>
	

</div><!-- #site-content -->


<?php
get_footer();