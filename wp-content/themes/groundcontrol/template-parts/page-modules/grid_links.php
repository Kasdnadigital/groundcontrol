<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module grid-links section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module grid-links section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <h3><?=get_sub_field('title');?></h3>
        <div class="links">
            <?PHP while(have_rows('links')): the_row(); ?>
                <?PHP $colour = get_sub_field('colour'); ?>
                <a class="<?=$colour;?>" href="<?=get_sub_field('link')['url'];?>" target="<?=get_sub_field('link')['target'];?>"><?=get_sub_field('link')['title'];?></a>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>
