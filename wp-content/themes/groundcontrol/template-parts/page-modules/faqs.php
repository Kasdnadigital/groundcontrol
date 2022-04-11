<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module faqs section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module faqs section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">

        <?php if(get_sub_field('section_title')){ ?><h3><?=get_sub_field('section_title');?></h3><?php } ?>

        <div class="faq-container section <?=get_sub_field('layout');?>">
            <?PHP $faqid = 0; ?>
            <?PHP $faquniid = rand(0,999999999); // Get a random parent ID incase two FAQ modules are present ?>
            <?PHP while(have_rows('questions_and_answers')): the_row(); $faqid++; ?>
                <div class="single-faq" data-faqid="faq-<?=$faquniid;?>-<?=$faqid;?>">
                    <div class="title-container"><h4><?=get_sub_field('question');?></h4><span></span></div>
                    <div class="answer-container"><span class="content"><?=get_sub_field('answer');?></span></div>
                </div>
            <?PHP endwhile; ?>
        </div>
    </div>
</section>