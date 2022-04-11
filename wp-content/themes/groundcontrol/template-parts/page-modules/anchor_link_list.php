<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module anchor-link-list section bg-<?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module anchor-link-list section bg-<?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <h3 class="col-peach"><?=get_sub_field('title');?></h3>
        <div class="module-wrapper">
            <?PHP while(have_rows('links')): the_row();?>
                <a href="#section<?=get_sub_field('module_number');?>" data-linkto="section<?=get_sub_field('module_number');?>"><?=get_sub_field('link');?></a>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>