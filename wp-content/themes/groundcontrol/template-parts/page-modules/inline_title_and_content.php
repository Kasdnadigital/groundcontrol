<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module inline-title-and-content section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module inline-title-and-content section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <h3 class="module-title"><?=get_sub_field('title');?></h3>
        <span class="module-content content"><?=get_sub_field('content');?></span>
    </div>
</section>