<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module content-and-quote section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module content-and-quote section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP if(get_sub_field('order') == 'clcr'){ ?>
            <?PHP while(have_rows('card_content')): the_row(); ?>
                <div class="quote-content right bg-<?=get_sub_field('background_colour');?>">
                    <p><?=get_sub_field('content');?></p>
                </div>
            <?PHP endwhile; ?>
            <div class="content-container">
                <?PHP if(get_sub_field('title') != ''){ ?>
                    <h3 class="col-peach"><?=get_sub_field('title');?></h3>
                <?PHP } ?>
                <div class="content"><?=get_sub_field('content');?></div>
            </div>
        <?PHP }else{ ?>
            <div class="content-container">
                <?PHP if(get_sub_field('title') != ''){ ?>
                    <h3 class="col-peach"><?=get_sub_field('title');?></h3>
                <?PHP } ?>
                <div class="content"><?=get_sub_field('content');?></div>
            </div>
            <?PHP while(have_rows('card_content')): the_row(); ?>
                <div class="quote-content left bg-<?=get_sub_field('background_colour');?>">
                    <p><?=get_sub_field('content');?></p>
                </div>
            <?PHP endwhile; ?>
        <?PHP } ?>
    </div>
</section>