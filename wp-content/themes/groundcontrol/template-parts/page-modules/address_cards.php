<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module address-cards section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module address-cards section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="module-wrapper">
            <?php while( have_rows('address_cards') ) : the_row(); ?>
                <div class="address-card-holder">
                    <div class="address-card">
                        <h2 class="col-peach"><?php the_sub_field('location_name');?></h2>
                        <address class="col-darkblue"><?php the_sub_field('address');?></address>
                        <?php 
                            $illegalChars = array('()', ' ', '(', ')','+','-',); 
                            $phoneNumber = get_sub_field('phone_number'); 
                            $phoneNumber = str_replace($illegalChars, '', $phoneNumber);
                        ?>
                        <div class="address-block">
                            <div class="address-link-holder">
                                <a class="col-blue" href="tel:<?php echo $phoneNumber;?>"><?php the_sub_field('phone_number');?></a>
                            </div>
                           <div class="address-link-holder">
                                <a class="col-darkblue" href="mailto:<?php the_sub_field('email');?>"><?php the_sub_field('email');?></a>
                           </div>
                       </div>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function($){
        $('.address-card h2').matchHeight();
    });
</script>