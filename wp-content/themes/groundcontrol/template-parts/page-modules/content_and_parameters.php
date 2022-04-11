<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module content-and-parameters section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module content-and-parameters section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="content-container content">
            <?=get_sub_field('content');?>
        </div>
        <div class="parameters-container bg-darkblue">
            <?PHP while(have_rows('terms')): the_row(); ?>
                <div class="single-parameter">
                    <h3><?=get_sub_field('title');?></h3>
                    <p><?=get_sub_field('content');?></p>
                </div>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>