<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module testimonial section <?=get_sub_field('colour_scheme');?>" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module testimonial section <?=get_sub_field('colour_scheme');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="testimonial-container">
            <p><?=get_sub_field('testimonial');?></p>
        </div>
        <?php if(get_sub_field('name') || get_sub_field('company') ):?>
            <div class="person-container">
                <?php if(get_sub_field('name')):?>
                    <h4><?=get_sub_field('name');?></h4>
                <?php endif;?>
                <?php if(get_sub_field('company')):?>
                    <h5><?=get_sub_field('company');?></h5>
                <?php endif;?>
            </div>
        <?php endif;?>
    </div>
</section>