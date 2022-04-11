<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module content-with-cta-links section <?php the_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module content-with-cta-links section <?php the_sub_field('background_colour');?>" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="module-wrapper">
            <?php while( have_rows('content') ) : the_row(); ?>
                <div class="content-section">
                    <h2><?php the_sub_field('title');?></h2>
                    <p><?php the_sub_field('content');?></p>
                </div>
            <?php endwhile;?>
            <div class="links-section">
                    <?php 
                    while( have_rows('buttons') ) : the_row(); 
                    $link = get_sub_field('link');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a class="<?php the_sub_field('background_color');?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                    <?php endwhile;?>
            </div>
        </div>
    </div>
</section>