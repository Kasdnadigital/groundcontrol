<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module text-and-image-with-background section <?=get_sub_field('background_colour');?>"  id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module text-and-image-with-background section <?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="content-container">
            <?PHP while(have_rows('content')): the_row(); ?>
                <h3><?=get_sub_field('title');?></h3>
                <p><?=get_sub_field('content');?></p>
            <?PHP endwhile; ?>
        </div>
        <div class="image-container">
            <img src="<?=get_sub_field('image');?>"/>
        </div>
    </div>
</section>