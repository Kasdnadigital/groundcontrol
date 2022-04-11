<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module product-cards section"  id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module product-cards section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP if(get_sub_field('title')){ ?>
        <div class="section-title-container">
            <h6 class="col-peach"><?=get_sub_field('subtitle');?></h6>
            <h3><?=get_sub_field('title');?></h3>
        </div>
        <?PHP } ?>
        <div class="groups-container">
            <?PHP while(have_rows('groups')): the_row(); ?>
            <div class="group">
                <?PHP while(have_rows('group')): the_row();?>
                <div class="title-container">
                    <?PHP if(get_sub_field('link')){ ?>
                        <?PHP $link = get_sub_field('link'); ?>
                        <h3><a href="<?=$link['url'];?>"><?=get_sub_field('title');?></a></h3>
                    <?PHP }else{ ?> 
                    <h3><?=get_sub_field('title');?></h3>
                    <?PHP } ?>
                </div>
                <div class="product-container">
                    <?PHP $product_count = 0; ?>
                    <?PHP while(have_rows('product_list')): the_row(); $product_count++; ?>
                        <?PHP if($product_count == 1){ ?>
                        <?PHP $product_id = get_sub_field('product'); ?>
                        <div class="col-1">
                            <a href="<?=get_permalink($product_id->ID);?>">
                                <div class="image-container">
                                    <img src="<?=get_sub_field('image');?>" />
                                </div>
                                <div class="content-container">
                                    <h5><?=$product_id->post_title;?></h5>
                                    <?PHP while(have_rows('product_content', $product_id->ID)): the_row(); ?>
                                        <?PHP $description = get_sub_field('product_description'); ?>
                                        <?PHP $new_description = substr($description,0,140).'...'; ?>
                                        <?=$new_description;?>
                                    <?PHP endwhile; ?>
                                </div>
                            </a>
                        </div>
                        <?PHP }else{  } ?>
                    <?PHP endwhile; ?>
                    <?PHP $product_count_new = 0 ;?>
                    <div class="col-2">
                    <?PHP while(have_rows('product_list')): the_row(); $product_count_new++; ?>
                            <?PHP if($product_count_new != 1){ ?>
                            <div class="single-product">
                                <?PHP $product_id = get_sub_field('product'); ?>
                                <a href="<?=get_permalink($product_id->ID);?>">
                                <div class="image-container">
                                    <img src="<?=get_sub_field('image');?>" />
                                </div>
                                <div class="content-container">
                                    <?PHP $product_id = get_sub_field('product'); ?>
                                    <h5><?=$product_id->post_title;?></h5>
                                </div>
                                </a>
                            </div>

                            <?PHP }?>
                    <?PHP endwhile; ?>
                    </div>
                </div>
                <?PHP endwhile; ?>
            </div>
            <?PHP endwhile;?>
        </div>
    </div>
</section>