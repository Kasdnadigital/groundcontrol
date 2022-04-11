<section class="page-module product-row section">
    <div class="wrapper">
    <?PHP 
        $term_type = '';
        $taxonomy = get_sub_field('taxonomy'); 
        switch($taxonomy){
            case 'product_ranges':
                $term_type = get_sub_field('taxonomy_range');
                break;
            case 'product_solutions':
                $term_type = get_sub_field('taxonomy_solution');
                break;
            case 'product_markets':
                $term_type = get_sub_field('taxonomy_markets');
                break;
            case 'product_networks':
                $term_type = get_sub_field('taxonomy_network');
                break;
            default:
                $term_type = 'No term type was defined in the switch';
                break;
        }
    ?>
        <h3><?=get_sub_field('title');?></h3>
        <?PHP (int)$temp_term_type = (int)$term_type;
        $value = get_term_link($temp_term_type, $taxonomy); 
        if(!is_wp_error($value)){ ?>
        <a href="<?=$value;?>">See More</a>
        <?PHP }else{
            echo 'Debugging values: <br/>';
            echo 'Int: Term Type: '.$temp_term_type.'<br/>';
            echo 'Raw Term Type: '.$term_type.'<br/>';
            echo 'Taxonomy Name: '.$taxonomy.'<br/>';
            print_r($value);
        } ?>
        <div class="products-container">
            <?PHP 
                $args = array(
                    'post_type'             => 'product',
                    'post_status'           => 'publish',
                    'ignore_sticky_posts'   => 1,
                    'posts_per_page'        => '5',
                    'orderby' => 'meta_value_num',
                    'meta_key' => '_price',
                    'order' => 'desc',
                    'tax_query'             => array(
                        array(
                            'taxonomy'      => $taxonomy,
                            'terms'         => $term_type,
                            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                        )
                    )
                );
                $products = new WP_Query($args);
                if($products->have_posts()){
                        while($products->have_posts()): $products->the_post();?>
                        <div class="single-product" data-mh="product-cards">
                            <a href='<?php the_permalink(); ?>'>
                                <div class="image-container">
                                    <?PHP
                                    while(have_rows('product_image')): the_row();
                                        $gallery = get_sub_field('product_gallery'); 
                                        if($gallery){
                                            echo '<div data-mh="product-thumbnails" class="product-thumb">';
                                            echo '<img data-type="product" data-mh="product-thumbnails-image" src="'.$gallery[0]['url'].'"/>';
                                            echo '</div>';
                                        }else{
                                            echo '<div data-mh="product-thumbnails" class="product-thumb">';
                                            echo '<img data-type="default" data-mh="product-thumbnails-image" src="'.get_field('default_product_image', 'option').'"/>';
                                            echo '</div>';
                                        }
                                    endwhile; 
                                    ?>
                                </div>
                                <div class="content-container">
                                    <h4 data-mh="related-product-title"><?PHP echo get_the_title(); ?></h4>
                                    <?PHP
                                        $temp_product = wc_get_product(get_the_id());
                                        echo '<p>'.$temp_product->get_price_html().'</p>';
                                    ?>
                                </div>
                            </a>
                        </div>
                    <?PHP endwhile;wp_reset_postdata();?>
                <?PHP } ?>
            </div>
        </div>
    </div>
</section>