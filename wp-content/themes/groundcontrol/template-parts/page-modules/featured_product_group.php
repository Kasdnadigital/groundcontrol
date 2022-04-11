<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module featured-product-group section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module featured-product-group section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="product-showcase <?=get_sub_field('background_colour');?>">
        <?PHP if(get_sub_field('order') == 'clpr'){ ?>
                <?PHP $product_count = count(get_sub_field('products')); ?>
            <div class="content-container product-<?=$product_count;?>">
                <?PHP while(have_rows('content')): the_row(); ?>
                    <?PHP if(get_sub_field('image')){ ?>
                        <img data-mh="cardimg" src="<?=get_sub_field('image');?>"/>
                    <?PHP }else{ ?>
                        <h3><?=get_sub_field('title');?></h3>
                    <?PHP } ?>
                    <p><?=get_sub_field('content');?></p>
                    <?PHP $link = get_sub_field('link'); ?>
                    <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                <?PHP endwhile; ?>
            </div>
            <div class="products-container products-<?=$product_count;?>">
                <?PHP while(have_rows('products')): the_row(); ?>
                    <?PHP if(get_sub_field('call_to_action_card')) { ?>
                        <div class="single-product product-<?=$product_count;?> product-cta product-right <?=get_sub_field('background_colour');?>">
                            <h4><?=get_sub_field('cta_title');?></h4>
                            <p><?=get_sub_field('cta_content');?></p>
                            <?PHP $link = get_sub_field('call_to_action'); ?>
                            <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                        </div>
                    <?PHP }else{ ?>
                    <?PHP $link = get_permalink(get_sub_field('product_id')); ?>
                    <div class="single-product product-<?=$product_count;?> product-right" data-product-id="<?=get_sub_field('product_id');?>">
                        <a href="<?=$link;?>">
                        <div class="product-image">
                            <img data-mh="cardimg" src="<?=get_sub_field('product_image');?>"/>
                        </div>
                        <div class="product-information">
                            <h4><?=get_sub_field('title');?></h4>
                            <?PHP $product = wc_get_product( get_sub_field('product_id') ); ?>
                            <p><?PHP echo $product->get_price_html(); ?></p>
                        </div>
                        </a>
                    </div>
                    <?PHP } ?>
                <?PHP endwhile; ?>
            </div>
        <?PHP }else{ ?>
            <?PHP $product_count = count(get_sub_field('products')); ?>
            <div class="products-container products-<?=$product_count;?>">
                <?PHP while(have_rows('products')): the_row(); ?>
                    <?PHP if(get_sub_field('call_to_action_card')) { ?>
                        <div class="single-product product-<?=$product_count;?> product-cta product-right <?=get_sub_field('background_colour');?>">
                            <h4><?=get_sub_field('cta_title');?></h4>
                            <p><?=get_sub_field('cta_content');?></p>
                            <?PHP $link = get_sub_field('call_to_action'); ?>
                            <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                        </div>
                    <?PHP }else{ ?>
                    <?PHP $link = get_permalink(get_sub_field('product_id')); ?>
                    <div class="single-product product-<?=$product_count;?> product-left" data-product-id="<?=get_sub_field('product_id');?>">
                        <a href="<?=$link;?>">
                        <div class="product-image">
                            <img data-mh="cardimg" src="<?=get_sub_field('product_image');?>"/>
                        </div>
                        <div class="product-information">
                            <h4><?=get_sub_field('title');?></h4>
                            <?PHP $product = wc_get_product( get_sub_field('product_id') ); ?>
                            <p><?PHP echo $product->get_price_html(); ?></p>
                        </div>
                        </a>
                    </div>
                    <?PHP } ?>
                <?PHP endwhile; ?>
            </div>
            <div class="content-container product-<?=$product_count;?>">
                <?PHP while(have_rows('content')): the_row(); ?>
                    <?PHP if(get_sub_field('image')){ ?>
                        <img data-mh="cardimg" src="<?=get_sub_field('image');?>"/>
                    <?PHP }else{ ?>
                        <h3><?=get_sub_field('title');?></h3>
                    <?PHP } ?>
                    <p><?=get_sub_field('content');?></p>
                    <?PHP $link = get_sub_field('link'); ?>
                    <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                <?PHP endwhile; ?>
            </div>
        <?PHP } ?>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function($){
        $('.products-container .product-information h4').matchHeight();
    });
</script>