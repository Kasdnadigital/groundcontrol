<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module plan-information section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module plan-information section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="module-wrapper">
            <div class="content-section">
                <h2><?php the_sub_field('title');?></h2>
                <div class="tagline">
                    <?php if( have_rows('tagline') ): ?>
                        <?php while( have_rows('tagline') ) : the_row(); ?>
                            <?php if(get_sub_field('peach_text') && get_sub_field('blue_text')):?>
                                <h4 class="col-peach"><?php the_sub_field('peach_text');?></h4> 
                                <h4 class="col-blue"> <?php the_sub_field('blue_text');?></h4>
                            <?php elseif(get_sub_field('peach_text') && get_sub_field('blue_text') == false ):?>
                                <h4 class="col-peach"><?php the_sub_field('peach_text');?></h4> 
                            <?php elseif(get_sub_field('blue_text') && get_sub_field('peach_text') == false):?>
                                <h4 class="col-blue"> <?php the_sub_field('blue_text');?></h4>
                            <?php endif;?>
                        <?php endwhile;?>
                    <?php endif;?>
                </div>
                <p><?php the_sub_field('content');?></p>
            </div>
            <div class="points-section">
                <ul class="points">
                     <?php while( have_rows('additional_points') ) : the_row(); ?>
                            <li><?php the_sub_field('point');?></li>
                     <?php endwhile;?>
                </ul>
            </div>
        </div>
    </div>
</section>