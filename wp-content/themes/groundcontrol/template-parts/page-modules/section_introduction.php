<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module section-introduction section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module section-introduction section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?PHP $sectionRand = rand(0,9999); ?>
        <?PHP if(get_sub_field('order') == 'image-left'){ ?>
        <div class="image-container" data-mh="sectionIntro<?=$sectionRand;?>"> 
            <img src="<?=get_sub_field('side_image');?>"/>
        </div>
        <div class="content-container <?=get_sub_field('background_colour');?>" data-mh="sectionIntro<?=$sectionRand;?>">
            <?PHP if(get_sub_field('title_link')){ ?>
                <a href="<?=get_sub_field('title_link');?>">
                    <img src="<?=get_sub_field('icon');?>"/>
                    <h3><?=get_sub_field('title');?></h3>
                </a>
            <?PHP }else{ ?>
                <img src="<?=get_sub_field('icon');?>"/>
                <h3><?=get_sub_field('title');?></h3>
            <?PHP } ?>
            <?=get_sub_field('content');?>
            <div class="links-container">
                <?PHP while(have_rows('links')): the_row();?>
                    <?PHP $link = get_sub_field('link');?>
                    <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                <?PHP endwhile; ?>
            </div>
        </div>
        <?PHP }else{ ?>
            <div class="content-container <?=get_sub_field('background_colour');?>" data-mh="sectionIntro<?=$sectionRand;?>">
            <?PHP if(get_sub_field('title_link')){ ?>
                <a href="<?=get_sub_field('title_link');?>">
                    <img src="<?=get_sub_field('icon');?>"/>
                    <h3><?=get_sub_field('title');?></h3>
                </a>
            <?PHP }else{ ?>
                <img src="<?=get_sub_field('icon');?>"/>
                <h3><?=get_sub_field('title');?></h3>
            <?PHP } ?>
                <?=get_sub_field('content');?>
                <div class="links-container">
                    <?PHP while(have_rows('links')): the_row();?>
                        <?PHP $link = get_sub_field('link');?>
                        <a href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                    <?PHP endwhile; ?>
                </div>
            </div>
            <div class="image-container" data-mh="sectionIntro<?=$sectionRand;?>"> 
                <img src="<?=get_sub_field('side_image');?>"/>
            </div>
        <?PHP } ?>
    </div>
</section>