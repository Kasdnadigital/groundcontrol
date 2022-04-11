<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module stepslist section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module stepslist section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <?php if(get_sub_field('title')):?>
            <h3 class="col-peach"><?=get_sub_field('title');?></h3>
        <?php endif;?>
        <?PHP $step_count = 0; ?>
        <?PHP while(have_rows('steps')): the_row(); $step_count++;?>
            <?PHP if($step_count % 2 === 0){ ?>
                <div class="single-step left <?=get_sub_field('colour_scheme');?>">
                    <div data-mh="content" class="image-container left">
                        <img class="left" src="<?=get_sub_field('icon');?>"/>
                    </div>
                    <div data-mh="content" class="content-container-wrapper bg-<?=get_sub_field('colour_scheme');?>">
                        <div class="title-container">
                            <h4><?=get_sub_field('title');?></h4>
                        </div>
                        <div class="content-container">
                            <p><?=get_sub_field('content');?></p>
                        </div>
                    </div>
                </div>
            <?PHP }else{ ?>
                <div class="single-step right <?=get_sub_field('colour_scheme');?>">
                    <div data-mh="content" class="content-container-wrapper bg-<?=get_sub_field('colour_scheme');?>">
                        <div class="title-container">
                            <h4><?=get_sub_field('title');?></h4>
                        </div>
                        <div class="content-container">
                            <p><?=get_sub_field('content');?></p>
                        </div>
                    </div>
                    <div data-mh="content" class="image-container right">
                        <img class="right" src="<?=get_sub_field('icon');?>"/>
                    </div>
                </div>
            <?PHP } ?>
            
        <?PHP endwhile; ?>
    </div>
</section>