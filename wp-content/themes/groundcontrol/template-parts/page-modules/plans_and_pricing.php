<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module plans-and-pricing section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module plans-and-pricing section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP while(have_rows('plans')): the_row(); ?>
            <div class="row">
                <?PHP while(have_rows('column_1')) : the_row(); ?>
                    <div data-mh="columns" class="column-1">
                        <div class="inner">
                            <h4 class="col-blue"><?=get_sub_field('title');?></h4>
                        </div>
                    </div>
                <?PHP endwhile; ?>
                <?PHP while(have_rows('column_2')) : the_row(); ?>
                    <div data-mh="columns" class="column-2">
                        <h5><?=get_sub_field('title');?></h4>
                        <p><?=get_sub_field('content');?></p>
                    </div>
                <?PHP endwhile; ?>
                <?PHP while(have_rows('column_3')) : the_row(); ?>
                    <div data-mh="columns" class="column-3">
                        <?=get_sub_field('content');?>
                    </div>
                <?PHP endwhile; ?>
            </div>
        <?PHP endwhile; ?>
    </div>
</section>