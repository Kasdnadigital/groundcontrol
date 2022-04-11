<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module horizontal-logos section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module horizontal-logos section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?php if(get_sub_field('title')):?>
            <h3 class="col-blue"><?=get_sub_field('title');?></h3>
        <?php endif;?>
        <div class="logo-gallery">
            <?PHP
                $images = get_sub_field('logos');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if( $images ): 
                    foreach( $images as $image_id ):?>
                    <img src="<?=$image_id;?>"/>
                <?PHP endforeach;
                endif;
            ?>
        </div>
    </div>
</section>