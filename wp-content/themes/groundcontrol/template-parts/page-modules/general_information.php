<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module general-information section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module general-information section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="content-container">
            <h1 id="informationSection"><?=get_sub_field('title');?></h1>
            <?php if(have_rows('links')):?>
                <div class="button-containers">
                <?PHP while(have_rows('links')): the_row(); ?>
                    <?PHP $link = get_sub_field('link'); ?>
                    <?PHP if($link){ ?>
                    <a class="bg-<?=get_sub_field('colour');?>"href="<?=$link['url'];?>" target="<?=$link['target'];?>"><?=$link['title'];?></a>
                    <?PHP }else{ ?>
                    <a class="bg-<?=get_sub_field('colour');?>"href="#section<?=get_sub_field('anchor_module')['module_number'];?>"><?=get_sub_field('anchor_module')['link_text'];?></a>
                    <?PHP } ?>
                <?PHP endwhile; ?>
                </div>
            <?php endif;?>
            <?PHP while(have_rows('content')): the_row(); ?>
              
                <div class="content">
                    <h3 class="subtitle"><?=get_sub_field('subtitle');?></h3>
                    <?=get_sub_field('content');?>
                </div>
            <?PHP endwhile; ?>
            <div class="image-container">
                <img src="<?=get_sub_field('image');?>"/>
            </div>
        </div>
    </div>
</section>
<a class="return-to-top" href="#informationSection"></a>