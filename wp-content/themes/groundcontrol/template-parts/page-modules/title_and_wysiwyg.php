<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module title-and-wysiwyg section <?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module title-and-wysiwyg section <?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="title-container">
            <h3 class="col-peach"><?=get_sub_field('title');?></h3>
        </div>
        <div class="content-container content">
            <?=get_sub_field('content');?>
        </div>
    </div>
</section>