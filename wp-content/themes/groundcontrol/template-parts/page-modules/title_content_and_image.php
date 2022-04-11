<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module title-content-and-image section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module title-content-and-image section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP if(get_sub_field('order') == 'cril'){ ?>
            <div class="content-container">
                <?PHP while(have_rows('content')): the_row(); ?>
                <h6><?=get_sub_field('title');?></h6>
                <div class="content">
                    <?=get_sub_field('content');?>
                </div>
                <?PHP endwhile; ?>
            </div>
            <div class="image-container left">
                <img src="<?=get_sub_field('image');?>"/>
            </div>
        <?PHP
        }else{ 
        ?>
            <div class="image-container right">
                <img src="<?=get_sub_field('image');?>"/>
            </div>
            <div class="content-container">
                <?PHP while(have_rows('content')): the_row(); ?>
                <h6><?=get_sub_field('title');?></h6>
                <div class="content">
                    <?=get_sub_field('content');?>
                </div>
                <?PHP endwhile; ?>
            </div>
        <?PHP } ?>
    </div>
</section>