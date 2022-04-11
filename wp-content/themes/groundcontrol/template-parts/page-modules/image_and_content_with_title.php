<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module image-and-content section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module image-and-content section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="image-container">
            <h6><?=get_sub_field('title');?></h6>
            <img src="<?=get_sub_field('image');?>"/>
        </div>
        <div class="content-container">
            <p><?=get_sub_field('content');?></p>
        </div>
    </div>
</section>