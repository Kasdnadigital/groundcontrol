<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module content-and-list section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module content-and-list section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP while(have_rows('content')): the_row(); ?>
        <h4 class="col-peach"><?=get_sub_field('title');?></h4>
        <div class="content-container">
            <?=get_sub_field('content');?>
            <?PHP endwhile; ?>
        </div>
        <div class="list-container content">
            <ul>
                <?PHP while(have_rows('list')): the_row();?>
                    <li><?=get_sub_field('list_item');?></li>
                <?PHP endwhile; ?>
            </ul>
        </div>
    </div>
</section>