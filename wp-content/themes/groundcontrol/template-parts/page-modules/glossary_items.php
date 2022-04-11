<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module glossary section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module glossary section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP while(have_rows('item')): the_row(); ?>
            <div class="single-item">
                <h4><?=get_sub_field('title');?></h4>
                <p><?=get_sub_field('content');?></p>
            </div>
        <?PHP endwhile; ?>
    </div>
</section>