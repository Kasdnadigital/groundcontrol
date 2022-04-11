<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module content section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module content section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="width-<?=get_sub_field('width');?>">
            <?=get_sub_field('content'); ?>
        </div>
    </div>
</section>  