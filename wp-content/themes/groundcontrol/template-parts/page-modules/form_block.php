<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module form-block section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module form-block section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
       <div class="form-wrapper bg-<?=get_sub_field('background_colour');?>">
            <div class="content-section">
                <?PHP while(have_rows('left_content')): the_row(); ?>
                    <h2><?=get_sub_field('title');?></h2>
                    <p><?=get_sub_field('content');?></p>
                <?PHP endwhile; ?>
            </div>
            <div class="contact-section">
                <?PHP echo do_shortcode('[gravityform id="'.get_sub_field('form_id').'" ajax="true"]');?>
            </div>
       </div>
    </div>
</section>