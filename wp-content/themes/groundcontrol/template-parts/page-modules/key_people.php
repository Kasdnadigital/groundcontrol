<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module key-people section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module key-people section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <h3 class="col-peach"><?=get_sub_field('title');?></h3>
        <?PHP while(have_rows('team')): the_row(); ?>
            <div class="single-person">
                <div class="headshot">
                    <img src="<?=get_sub_field('headshot');?>"/>
                    <div class="biography-container">
                        <?=get_sub_field('biography'); ?>
                    </div>
                </div>
                <div class="information">
                    <h4><?=get_sub_field('name');?></h4>
                    <h5><?=get_sub_field('job_title');?></h5>
                    <?php if(have_rows('social_media')):?>
                        <?PHP while(have_rows('social_media')): the_row(); ?>
                            <?PHP $link = get_sub_field('link'); ?>
                            <a class="social" href="<?php echo $link['url'];?>" target="_blank">
                                <img src="<?=get_sub_field('icon');?>"/>
                            </a>
                        <?PHP endwhile; ?>
                    <?php endif;?>
                </div>
            </div>
        <?PHP endwhile; ?>
    </div>
</section>