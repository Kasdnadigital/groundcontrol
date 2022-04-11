<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module text-grid section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module text-grid section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?php if(get_sub_field('subtitle')):?>
         <h4><?=get_sub_field('subtitle');?></h4>
        <?php endif;?>
        <?php if(get_sub_field('title')):?>
            <h3><?=get_sub_field('title');?></h3>
        <?php endif;?>
        <div class="grid-text-container">
            <?PHP while(have_rows('grid')) : the_row(); ?>
                <div class="single-text">
                    <h5 data-mh="grid-text-title"><?=get_sub_field('title');?></h5>
                    <div class="content">
                        <?=get_sub_field('content');?>
                    </div>
                </div>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>