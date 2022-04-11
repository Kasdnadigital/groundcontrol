<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module list-columns section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module list-columns section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="list-container">
            <?PHP while(have_rows('column')): the_row(); ?>
                <div class="single-step">
                    <div class="icon-container">
                        <img src="<?=get_sub_field('icon');?>"/>
                    </div>
                    <div class="content-container">
                        <h4 class="col-blue"><?=get_sub_field('title');?></h4>
                        <p><?=get_sub_field('content');?></p>
                    </div>
                </div>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>