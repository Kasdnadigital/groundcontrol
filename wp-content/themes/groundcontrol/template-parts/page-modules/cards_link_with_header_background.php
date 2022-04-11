<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module cards-link-with-header-background section" style="background-image:url('<?=get_sub_field('background_image');?>');" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module cards-link-with-header-background section" style="background-image:url('<?=get_sub_field('background_image');?>');" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP if(get_sub_field('subtitle')){ ?>
        <h6><?=get_sub_field('subtitle');?></h6>
        <?PHP } ?>
        <?PHP if(get_sub_field('title')){ ?>
        <h3><?=get_sub_field('title');?></h3>
        <?PHP } ?>
        <div class="cards-container">
            <?PHP while(have_rows('cards')): the_row(); ?>
                <div class="single-card">
                    <img src="<?=get_sub_field('image');?>"/>
                    <h4><?=get_sub_field('title');?></h4>
                    <p><?=get_sub_field('content');?></p>
                    <?PHP $link = get_sub_field('link');?>
                    <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                </div>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>