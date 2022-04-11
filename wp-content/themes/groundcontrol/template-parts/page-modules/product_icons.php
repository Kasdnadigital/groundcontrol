<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module product-icons section"  id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
    <section class="page-module product-icons section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <h3><?=get_sub_field('title');?></h3>
        <div class="products-container">
            <?PHP while(have_rows('products')): the_row(); ?>
                <div class="single-product">
                    <a href="<?=get_site_url();?>/<?=get_sub_field('page_link');?>">
                    <img src="<?=get_sub_field('icon');?>"/>
                    <h4><?=get_sub_field('title');?></h4>
                    </a>
                    <?PHP // print_r(get_sub_field('product')); ?>
                </div>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>