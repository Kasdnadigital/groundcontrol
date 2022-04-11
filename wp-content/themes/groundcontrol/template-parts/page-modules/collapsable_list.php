<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module collapsable-list section"  id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module collapsable-list section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP $listID = rand(0,999); ?>
        <div class="list list-open <?=get_sub_field('background_colour');?>" id="list-<?=$listID;?>">
            <div class="title-container">
                <h3><?=get_sub_field('title');?></h3>
            </div>
            <div class="collapsable-container columns-<?=get_sub_field('number_of_columns');?>">
                    <ul class="single-point columns">
                        <?PHP while(have_rows('list_item')): the_row(); ?>
                                <li><p><?=get_sub_field('content');?></p></li>
                        <?PHP endwhile; ?>
                    </ul>
            </div>
        </div>
    </div>
</section>