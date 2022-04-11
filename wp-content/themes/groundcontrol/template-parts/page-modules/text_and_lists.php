<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module text-and-lists section bg-<?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module text-and-lists section bg-<?=get_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="module-wrapper">
            <div class="content-section">
                <?php while(have_rows('left_content')): the_row(); ?>
                    <h2><?php the_sub_field('title');?></h2>
                    <?php if(get_sub_field('content')):?>
                        <p><?php the_sub_field('content');?></p>
                    <?php endif;?>
                <?php endwhile; ?>
            </div>
            <div class="lists-section">
                <?php while(have_rows('lists')): the_row(); ?>
                    <div class="list">
                        <h4><?php the_sub_field('title');?></h4>
                        <div class="list-items">
                            <?php while(have_rows('list_items')): the_row(); ?>
                                <p><?php the_sub_field('item');?></p>
                            <?php endwhile;?>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</section>