<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module title-and-links section bg-<?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module title-and-links section bg-<?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <h3 class="col-peach"><?=get_sub_field('title');?></h3>
        <div class="module-wrapper">
            <?PHP while(have_rows('links')): the_row();?>
                <a href="<?=get_sub_field('link')['url'];?>" target="<?=get_sub_field('link')['target'];?>"><?=get_sub_field('link')['title'];?></a>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>