<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module icon-links section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
<section class="page-module icon-links section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="module-wrapper">
            <?php while( have_rows('links') ) : the_row(); ?>
                <?php 
                    $link = get_sub_field('link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="link-item">
                        <div class="icon">
                            <?php
                                $image = get_sub_field('icon');
                                if( !empty($image) ): ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                        </div>
                        <h2><?php echo esc_html( $link_title ); ?></h2>
                    </a>
                <?php endif;?>
            <?php endwhile;?>
        </div>
    </div>
</section>