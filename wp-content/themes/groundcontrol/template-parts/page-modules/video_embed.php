<?php
if(is_product()):
    ['order'  => $x,] = $args;  
?>
<section class="page-module video-embed  section" id="section<?php echo $x;?>">
<?php else:?>
<?PHP 
    $x = get_row_index(); 
?>
    <section class="page-module video-embed section" id="section<?php echo $x;?>">
<?php endif;?>
    <div class="wrapper">
        <div class="video-container">
            <?PHP if(get_sub_field('video_type') == 'Internal Video'){  ?>
                <video width="812" height="463" controls>
                    <source src="<?=get_sub_field('video_internal');?>" type="video/mp4">
                </video>
            <?PHP }else{ ?>
                <?PHP echo get_sub_field('video_external'); ?>
            <?PHP } ?>
        </div>
    </div>
</section>