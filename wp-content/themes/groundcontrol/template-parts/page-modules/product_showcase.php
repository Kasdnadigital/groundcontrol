<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module product-showcase section <?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module product-showcase section <?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
    <?PHP $order = get_sub_field('order'); ?>
    <?PHP if($order == 'prcl'){ ?>
        <div class="content-container left">
            <?PHP while(have_rows('content')): the_row(); ?>
                <h2><?=get_sub_field('title');?></h2>
                <h3><?=get_sub_field('subtitle');?></h3>
                <p><?=get_sub_field('content');?></p>
                <?PHP $link = get_sub_field('call_to_action'); ?>
                <a class="btn btn-<?=get_sub_field('call_to_action_colour');?>" href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
            <?PHP endwhile; ?>
        </div>
        <div class="product-container left">
            <?PHP while(have_rows('product_content')): the_row(); ?>
                <img src="<?=get_sub_field('image');?>"/>
                <h4><?=get_sub_field('title');?></h4>
                <p><?=get_sub_field('content');?></p>
            <?PHP endwhile; ?>
        </div>
        <?PHP }else{ ?>
        <div class="product-container left">
            <?PHP while(have_rows('product_content')): the_row(); ?>
                <img src="<?=get_sub_field('image');?>"/>
                <h4><?=get_sub_field('title');?></h4>
                <p><?=get_sub_field('content');?></p>
            <?PHP endwhile; ?>
        </div>
        <div class="content-container right">
            <?PHP while(have_rows('content')): the_row(); ?>
                <h2><?=get_sub_field('title');?></h2>
                <h3><?=get_sub_field('subtitle');?></h3>
                <p><?=get_sub_field('content');?></p>
                <?PHP $link = get_sub_field('call_to_action'); ?>
                <a class="btn btn-<?=get_sub_field('call_to_action_colour');?>" href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
            <?PHP endwhile; ?>
        </div>
        <?PHP } ?>
    </div>
</section>