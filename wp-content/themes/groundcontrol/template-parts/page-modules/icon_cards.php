<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module icon-cards section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module icon-cards section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="cards-container">
            <?PHP while(have_rows('cards')): the_row(); ?>
                <div class="single-card" data-mh="icon-cards">
                    <img src="<?=get_sub_field('icon');?>"/>
                    <?php if(get_sub_field('subtitle')){ ?><h5><?=get_sub_field('subtitle');?></h5><?php } ?>
                    <h4><?=get_sub_field('title');?></h4>
                    <p><?=get_sub_field('content');?></p>
                    <?PHP $link = get_sub_field('link'); ?>
                    <?php if(get_sub_field('link')){ ?><a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a><?php } ?>
                </div>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>