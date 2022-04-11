<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class='page-module calculator-maps-links section' id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class='page-module calculator-maps-links section' id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="calculator-container">
            <?PHP while(have_rows('calculators')): the_row(); ?>
                <?PHP $link = get_sub_field('link'); ?>
                <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
            <?PHP endwhile; ?>
        </div>
        <div class="maps-container">
            <h4><?=get_sub_field('maps_title');?></h4>
            <?PHP while(have_rows('maps')): the_row(); ?>
                <?PHP $link = get_sub_field('link'); ?>
                <div data-mh="single-map" class="single-map">
                    <a href="<?=$link['url'];?>" target="<?=$link['target'];?>">
                        <img src="<?=get_sub_field('image');?>"/>        
                    </a>
                </div>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>