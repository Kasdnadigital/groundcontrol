<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module card-layout section <?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module card-layout section <?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?php if(get_sub_field('title')):?>
            <h3><?=get_sub_field('title');?></h3>
        <?php endif;?>
        <div class="cards-container">
            <?PHP while(have_rows('cards')): the_row(); ?>
            <?PHP $link = get_sub_field('link'); ?>
                <a href="<?=$link['url'];?>" target="<?=$link['target'];?>" data-mh="card-layout-link" class="single-card bg-<?=get_sub_field('colour_scheme');?>">
                    <div class="image-container">
                        <img src="<?=get_sub_field('image');?>"/>
                    </div>
                    <div class="content-container" <?PHP /* data-mh="card-layout-row" */ ?>>
                        <h4 data-mh="card-layout-h4"><?=get_sub_field('title');?></h4>
                        <p data-mh="card-layout-p"><?=get_sub_field('content');?></p>
                        <span><?=$link['title'];?></span>
                    </div>
                </a>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>