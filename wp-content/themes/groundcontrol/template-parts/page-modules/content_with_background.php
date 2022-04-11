<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module content-with-background section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module content-with-background section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="content-section section bg-<?=get_sub_field('background_colour');?>">
            <?=get_sub_field('content');?>
        </div>
    </div>
</section>