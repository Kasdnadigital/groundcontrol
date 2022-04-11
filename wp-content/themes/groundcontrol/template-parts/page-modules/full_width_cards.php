<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module full-width-cards section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module full-width-cards section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP while(have_rows('cards')): the_row(); ?>
            <div class="single-card bg-<?=get_sub_field('colour_scheme');?>">
                <?PHP if(get_sub_field('image_location') == 'Right'){ ?>
                    <div data-mh="content-image-sizing" class="content-container">
                        <h3><?=get_sub_field('title');?></h3>
                        <p><?=get_sub_field('content');?></p>
                        <?PHP if($link = get_sub_field('link')){ ?>
                            <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                        <?PHP } ?>
                    </div>
                    <div class="image-container">
                        <img data-mh="content-image-sizing"  src="<?=get_sub_field('image');?>"/>
                    </div>
                <?PHP }else{ ?>
                    <div class="image-container">
                        <img data-mh="content-image-sizing" src="<?=get_sub_field('image');?>"/>
                    </div>
                    <div data-mh="content-image-sizing" class="content-container">
                        <h3><?=get_sub_field('title');?></h3>
                        <p><?=get_sub_field('content');?></p>
                        <?PHP if($link = get_sub_field('link')){ ?>
                            <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                        <?PHP } ?>
                    </div>
                <?PHP } ?>
            </div>
        <?PHP endwhile; ?>
    </div>
</section>