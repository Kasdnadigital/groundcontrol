<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module full-width-image section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module full-width-image section" id="section<?php echo $x;?>">
<?php endif;?>
    <?php if(get_sub_field('image_width') == 'full'):?>
        <img src="<?=get_sub_field('image');?>"/>
    <?php else :?>
        <div class="wrapper">
             <img src="<?=get_sub_field('image');?>"/>
        </div>
    <?php endif;?>
</section>