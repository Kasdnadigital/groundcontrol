<?php 
/*
* Template Name:Hardware Template
*/

get_header();

$post_id = get_the_ID();
?>

<section class="product_list_banner section" style="background-image:url('<?php echo get_field('banner_img'); ?>">
    <div class="container">
        <div class="content">
            <h1><?php echo get_field('heading'); ?></h1>
        </div>
    </div>
</section>
 <?php
    //error_reporting(0);
    global $wp_query;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    
         $all_products = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 24,
        'paged' => $paged,
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => 'total_sales',
        );
    
    ?>

<section class="product_listing section">
    <div class="container">
        <div class="procust_sidebar">
            <div class="accordion">
                <div id="sticky-sidebar">
                    <div id="filter_main" class="main_cat_iot" style="display:inline-block;">
                        <!-- All Hardware -->

                        <div class="accordion_item">
                            <div class="js-accordion-link open">All Hardware<span class="arrow"></span></div>
                            <div class="js-accordion-details">
                                <div class="hardware-list"> 
                                    <ul>
                                    <?php
                                        $taxonomy = 'product_cat';
                                        $categories = get_terms( ['taxonomy' => 'product_cat'] );
                                        foreach ($categories as $category) {
                                            echo '<li><a href="'.get_term_link($category->name, $taxonomy).'">'.$category->name.'</a></li>';
                                        }
                                    ?>
                                    </ul>
                                </div> 
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="product_list_items">
            <div class="top_select">
                <div class="box">
                    <select name="sortby" class="sortby custom_select2" data-page="1" data-type="sortby">
                            <option value="popularity" selected="selected">Sort by popularity</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                    </select>
                </div>
            </div>
            <div id="show_product_view">
                <div class="product_list_multiple_items">
                    
                    <?php
                    global $product;
                   
                    $loop = new WP_Query( $all_products );
                    $i=1;
                    if ( $loop->have_posts() ) {
                        while ( $loop->have_posts() ){ $loop->the_post();
                            
                            $product = wc_get_product();
                            
                            $product_price = $product->get_price();
                            $product_stock = $product->is_in_stock();
                            $image = wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');

                            $add_to_cart = do_shortcode('[add_to_cart id="' . get_the_ID() . '" show_price="false"]');
                            $gc_pbttl_one = get_post_meta( get_the_ID(), 'gc_pbttl_one', true );
                            $gc_pbclr_one = get_post_meta( get_the_ID(), 'gc_pbclr_one', true );

                            $gc_pbttl_two = get_post_meta( get_the_ID(), 'gc_pbttl_two', true );
                            $gc_pbclr_two = get_post_meta( get_the_ID(), 'gc_pbclr_two', true );
                        ?>
                        <div class="single_item post-<?php echo get_the_ID(); ?>">
                            <div class="inner_single_item">
                                <a href="<?php echo get_permalink(get_the_ID()) ?>" class="product-bdage">
                                <?php 
                                if (!empty($gc_pbttl_one)){ 
                                    echo '<span class="own_brand" style="background-color:'.$gc_pbclr_one.';" >'.$gc_pbttl_one.'</span>';
                                }
                                if (!empty($gc_pbttl_two)){ 
                                    echo '<span class="featured" style="background-color:'.$gc_pbclr_two.';">'.$gc_pbttl_two.'</span>';
                                }

                                ?>
                                <div data-mh="product-thumbnails" class="product-thumb img"><?php echo $image; ?></div>
                                </a>
                                <div class="product-info" data-mh="product">
                                    <h3 class="card-title"><a href="<?php echo get_permalink(get_the_ID()) ?>">
                                        <?php echo get_the_title(); ?>
                                    </a></h3>
                                    <h4><?PHP echo $product->get_price_html();
                                        ?></h4>
                                </div>    
                                    <?php 
                                    if($product_price != '' && $product_stock == 1)
                                    {
                                        echo $add_to_cart;
                                    }else if($product_price == '' || $product_stock == '')
                                    {
                                        echo '<div class="read_more">';
                                            echo '<a href="javascript:void(0);" class="enquiry" >Inquire</a>';
                                        echo '</div>';
                                    }

                                     ?>
                                    <?php echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
                                    ?>
                                
                            </div>    
                        </div>
                        <div class="modal product-module-modal product-enquire" id="product-enquire_<?php echo $i;?>">
                            <div class="modal-wrapper">
                                <span class="close" id="closeProductModuleModal"></span>
                                <?php  
                                    $site_id = get_current_blog_id();
                                    if($site_id == 1)
                                    {
                                     echo do_shortcode('[gravityform id="9" ajax="true" field_values="pname='.get_the_title().'"]'); 
                                    }else if($site_id == 4)
                                    {
                                        echo do_shortcode('[gravityform id="24" ajax="true" field_values="pname='.get_the_title().'"]'); 
                                    }

                                    ?>
                            </div>
                        </div>
                    <?php //}
                        $i++; }
                    } 
                    wp_reset_postdata(); ?>
                    
                </div>                    
            </div>
        </div>
    </div>
</section>

<?php
$numer_of_pages = $loop->max_num_pages;
?>
<input type="hidden" name="total_pages" class="total_pages" value="<?php echo $numer_of_pages; ?>">
<input type="hidden" name="sortby_val" class="sortby_val" value="popularity">
<input type="hidden" name="cur_page" class="cur_page" value="<?php echo $paged; ?>">
<section class="pagination section">
      <div class="container pagination_cls">
        <ul>
         <?php 
            // echo $paged;
            
            if($paged > 1) {
                $prev_page = $paged - 1;
                echo '<li><a class="prev page-numbers" data-page="'. $prev_page .'"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>';
            }
            
            for ($i = 1; $i <= $numer_of_pages; $i++) {
                if( $paged == $i ) {
                    echo '<li><span aria-current="page" class="page-numbers current">'. $i .'</span></li>';
                } else {
                    echo '<li><a class="page-numbers" data-page="'.$i.'">'. $i .'</a></li>';
                }
            }
            
            if($paged != $numer_of_pages) {
                $next_page = $paged + 1;
                echo '<li><a class="next page-numbers" data-page="'. $next_page .'"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>';
            }
            ?>
            </ul>
        </div>
    </section>
</section>
<?php get_footer(); ?>