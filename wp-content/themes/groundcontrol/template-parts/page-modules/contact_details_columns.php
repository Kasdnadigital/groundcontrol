<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module contact-details-columns section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module contact-details-columns section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="contact-details-wrapper">
        <div class="wrapper">
            <div class="module-wrapper">
                <?PHP $col_count = count(get_sub_field('column')); ?>
                <?php while( have_rows('column') ) : the_row(); ?>
                    <div class="column col-<?=$col_count;?>">
                        <h2 class="col-peach"><?php the_sub_field('column_title');?></h2>
                        <?php while( have_rows('section') ) : the_row(); ?>
                            <div class="section">
                                <h4 class="col-blue"><?php the_sub_field('section_title');?></h4>
                                <div class="contact-details">
                                    <?php while( have_rows('contact_details') ) : the_row(); ?>
                                        <?php if(get_sub_field('contact_detail_type') == 'phone'):?>
                                            <div class="contact-information">
                                                <div class="icon-holder icon-holder--phone bg-blue"></div>
                                                <?php 
                                                    $illegalChars = array('()', ' ', '(', ')','+','-',); 
                                                    $phoneNumber = get_sub_field('contact_information'); 
                                                    $phoneNumber = str_replace($illegalChars, '', $phoneNumber);
                                                ?>
                                                <a class="col-darkblue" href="tel:<?php echo $phoneNumber;?>"><?php the_sub_field('contact_information');?></a>
                                            </div>
                                        <?php elseif(get_sub_field('contact_detail_type') == 'fax'):?>
                                            <div class="contact-information">
                                                <div class="icon-holder icon-holder--fax bg-peach"></div>
                                                <?php 
                                                    $illegalChars = array('()', ' ', '(', ')','+','-',); 
                                                    $phoneNumber = get_sub_field('contact_information'); 
                                                    $phoneNumber = str_replace($illegalChars, '', $phoneNumber);
                                                ?>
                                                <a class="col-darkblue" href="tel:<?php echo $phoneNumber;?>"><?php the_sub_field('contact_information');?></a>
                                            </div>
                                        <?php elseif(get_sub_field('contact_detail_type') == 'email'):?>
                                            <div class="contact-information">
                                                <div class="icon-holder icon-holder--email bg-lightgreen"></div>
                                                <a class="col-darkblue" href="mailto:<?php the_sub_field('contact_information');?>"><?php the_sub_field('contact_information');?></a>
                                            </div>
                                        <?php endif;?>
                                    <?php endwhile;?>
                                </div>
                            </div>
                        <?php endwhile;?>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <?php while( have_rows('opening_hours') ) : the_row(); ?>
             <div class="opening-hours">
                 <div class="left">
                    <p><?php the_sub_field('caption');?></p>
                 </div>
                <div class="right">
                    <?php while( have_rows('times') ) : the_row(); ?>
                        <div class="info">
                            <p><strong><?php the_sub_field('title');?></strong></p>
                            <p><?php the_sub_field('information');?></p>
                        </div>
                    <?php endwhile;?>
                </div>
             </div>                           
        <?php endwhile;?>
    </div>
</section>
<script>
    jQuery(document).ready(function($){
        $('.contact-details-columns .column h2').matchHeight();
    });
</script>