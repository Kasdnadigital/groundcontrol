<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module history-slider section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module history-slider section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <h3 class="col-peach"><?=get_sub_field('title');?></h3>
    </div>
    <div class="history-slider-container section">
        <?PHP while(have_rows('cards')): the_row(); ?>
            <div class="single-card">
                <div class="image-container section">
                    <img src="<?=get_sub_field('image');?>"/>
                </div>
                <div class="card-content section">
                    <h6 class="col-peach"><?=get_sub_field('subtitle');?></h6>
                    <?php if(get_sub_field('title')):?>
                        <h5><?=get_sub_field('title');?></h5>
                    <?php endif;?>
                    <p><?=get_sub_field('content');?></p>
                </div>
            </div>
        <?PHP endwhile; ?>
    </div>
</section>