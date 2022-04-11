<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module coloured-text-and-image section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module coloured-text-and-image section" id="section<?php echo $x;?>">
<?php endif; ?>
    <div class="wrapper">
        <div class="content-container">
            <?PHP while(have_rows('text')): the_row(); ?>
                <p class="<?=get_sub_field('colour');?> <?=get_sub_field('font_size');?>"><?=get_sub_field('text');?></p>
            <?PHP endwhile;?>
        </div>
        <div class="image-container">
            <?PHP if(get_sub_field('image')){ ?>
                <img data-type="defined" src="<?=get_sub_field('image');?>" />
            <?PHP }else{ ?>
                <img data-type="default" src="<?=get_field('coloured_text_and_image_default_image', 'option');?>"/>
            <?PHP } ?>
        </div>
    </div>
</section>