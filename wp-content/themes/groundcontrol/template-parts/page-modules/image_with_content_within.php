<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module image-with-content-within section" style="background-image:url('<?=get_sub_field('background_image');?>" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module image-with-content-within section" style="background-image:url('<?=get_sub_field('background_image');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="inner-container <?=get_sub_field('content_align');?>">
            <div class="content-container ">
                <h3><?=get_sub_field('title');?></h3>
                <p><?=get_sub_field('content');?></p>
                <?PHP $link = get_sub_field('link'); ?>
                <?PHP if($link){ ?>
                <?php if(get_sub_field('link')){ ?><a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a><?php } ?>
                <?PHP } ?>
            </div>
        </div>
    </div>
</section>