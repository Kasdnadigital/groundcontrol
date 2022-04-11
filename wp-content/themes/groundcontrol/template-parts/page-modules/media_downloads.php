<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module media-downloads section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module media-downloads section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <!--<div class="filters-container"></div>-->
        <div class="files-container">
            <?PHP while(have_rows('file')): the_row(); ?>
                <div class="single-file">
                    <?PHP $file = get_sub_field('media'); ?>
                    <a href="<?=$file['url'];?>">
                        <div class="icon-container"></div>
                        <div class="file-title"><p><?=get_sub_field('title');?></p></div>
                    </a>
                </div>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>