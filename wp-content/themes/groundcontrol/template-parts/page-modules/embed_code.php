<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module iframe section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module iframe section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="flex-container">
            <?=get_sub_field('code');?>
        </div>
    </div>
</section>