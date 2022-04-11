<?php 
/*
* Template Name: Contact Page
*/

get_header();

if (function_exists('get_field')) {

	// Header Banner
	$heading = get_field('heading');

	// Content and Quote Module
	$mast_cnt_with_qua_mnttl = get_field('mast_content_with_qua_main_title');
	$mast_cnt_with_qua_cnt = get_field('mast_content_with_qua_content');
	$mast_cnt_with_qua_card_cnt = get_field('mast_content_with_qua_card_content');
	$mast_cnt_with_qua_card_cnt_bgcl = get_field('mast_content_with_qua_card_content_bg_col');
	$mast_cnt_with_qua_card_cnt_ordr = get_field('mast_content_with_qua_card_content_order');

	// Text Grid Module
	$mast_txt_grid_subtitle = get_field('mast_text_grid_subtitle');
	$mast_txt_grid_title = get_field('mast_text_grid_title');
	$mast_txt_grid_grid_rpt = get_field('mast_text_grid_grid_repeater');

	// Steps/List Module
	$mast_stepslist_title = get_field('mast_stepslist_title');
	$mast_stepslist_steps = get_field('mast_stepslist_steps');

	// Become a Partner Module
	$mast_bcm_prtnr_left_content = get_field('mast_bcm_prtnr_left_content');
	$mast_bcm_prtnr_rgt_img = get_field('mast_bcm_prtnr_rgt_img');
	$mast_bcm_prtnr_bg_col = get_field('mast_bcm_prtnr_bg_col');


    
} ?>

<?php if (get_field('enable_banner')): ?>
<div class="page-hero section bg-lightgrey">
	<div class="wrapper">
		<?php if ($heading != ""): ?>
		<h3 class="subtitle"><?php echo $heading; ?></h3>
		<?php endif; ?>
		<h1 class="page-title"><?php echo get_the_title(); ?></h1>
	</div>
</div>
<?php endif; ?>

<div class="site-body section">
	<div class="template-inner section">
		<?php if (get_field('enable_mast_content_with_qua')): ?>
		<section class="page-module content-and-quote section" id="section1">
	        <div class="wrapper">
	            <?php if ($mast_cnt_with_qua_card_cnt_ordr == 'clcr'): ?>
	                <div class="quote-content right" style="background-color: <?php echo $mast_cnt_with_qua_card_cnt_bgcl; ?>;">
	                    <p><?php echo $mast_cnt_with_qua_card_cnt; ?></p>
	                </div>
	                <div class="content-container">
	                    <?php if ($mast_cnt_with_qua_mnttl != ""): ?>
	                    <h3 class="col-peach"><?php echo $mast_cnt_with_qua_mnttl; ?></h3>
	                    <?php endif; ?>
	                    <div class="content"><?php echo $mast_cnt_with_qua_cnt; ?></div>
	                </div>
	            <?php else: ?>
	                <div class="content-container">
	                    <?php if ($mast_cnt_with_qua_mnttl != ""): ?>
	                    <h3 class="col-peach"><?php echo $mast_cnt_with_qua_mnttl; ?></h3>
	                    <?php endif; ?>
	                    <div class="content"><?php echo $mast_cnt_with_qua_cnt; ?></div>
	                </div>
	                <div class="quote-content left" style="background-color: <?php echo $mast_cnt_with_qua_card_cnt_bgcl; ?>;">
	                    <p><?php echo $mast_cnt_with_qua_card_cnt; ?></p>
	                </div>
	            <?php endif; ?>
	        </div>
	    </section>
		<?php endif; ?>

		<?php if (get_field('enable_mast_text_grid')): ?>
		<section class="page-module text-grid section" id="section2">
	        <div class="wrapper">
	            <?php if ($mast_txt_grid_subtitle != ""): ?>
	            <h4><?php echo $mast_txt_grid_subtitle; ?></h4>
	            <?php endif;?>

	            <?php if ($mast_txt_grid_title != ""): ?>
	            <h3><?php echo $mast_txt_grid_title; ?></h3>
	            <?php endif;?>
	            
	            <div class="grid-text-container">
	                <?php foreach ($mast_txt_grid_grid_rpt as $key => $sin_txt_grid): ?>
	                    <div class="single-text">
	                        <h5 data-mh="grid-text-title"><?php echo $sin_txt_grid['mast_text_grid_rep_title']; ?></h5>
	                        <div class="content">
	                            <?php echo $sin_txt_grid['mast_text_grid_rep_content']; ?>
	                        </div>
	                    </div>
	                <?php endforeach; ?>
	            </div>
	        </div>
	    </section>
		<?php endif; ?>
		
		<?php if (get_field('enable_mast_stepslist')): ?>
		<section class="page-module stepslist section" id="section3">
	        <div class="wrapper">
	            <?php if($mast_stepslist_title != ""):?>
	            <h3 class="col-peach"><?php echo $mast_stepslist_title; ?></h3>
	            <?php endif;?>

	            <?php foreach ($mast_stepslist_steps as $key => $sin_step): ?>
	                <?php if($key % 2 != 0): ?>
	                    <div class="single-step left">
	                        <div data-mh="content" class="image-container left">
	                            <img class="left" src="<?php echo $sin_step['mast_stepslist_icon']['url']; ?>" alt="<?php echo $sin_step['mast_stepslist_icon']['alt']; ?>" />
	                        </div>
	                        <div data-mh="content" class="content-container-wrapper <?php echo $sin_step['mast_stepslist_color_scheme']; ?>">
	                            <div class="title-container">
	                                <h4><?php echo $sin_step['mast_stepslist_title']; ?></h4>
	                            </div>
	                            <div class="content-container">
	                                <p><?php echo $sin_step['mast_stepslist_content']; ?></p>
	                            </div>
	                        </div>
	                    </div>
	                <?php else: ?>
	                    <div class="single-step right">
	                        <div data-mh="content" class="content-container-wrapper <?php echo $sin_step['mast_stepslist_color_scheme']; ?>">
	                            <div class="title-container">
	                                <h4><?php echo $sin_step['mast_stepslist_title']; ?></h4>
	                            </div>
	                            <div class="content-container">
	                                <p><?php echo $sin_step['mast_stepslist_content']; ?></p>
	                            </div>
	                        </div>
	                        <div data-mh="content" class="image-container right">
	                            <img class="right" src="<?php echo $sin_step['mast_stepslist_icon']['url']; ?>" alt="<?php echo $sin_step['mast_stepslist_icon']['alt']; ?>" />
	                        </div>
	                    </div>
	                <?php endif; ?>
	            <?php endforeach; ?>
	        </div>
	    </section>
		<?php endif; ?>

		<?php if (get_field('enable_mast_bcm_prtnr')): ?>
		<section class="footer-module become-a-partner section <?php echo $mast_bcm_prtnr_bg_col; ?>" id="section4">
	        <div class="wrapper">
	            <div data-mh="footer-module-partner" class="left-section">
	                <h3 class="col-lightgreen"><?php echo $mast_bcm_prtnr_left_content['mast_bcm_prtnr_title']; ?></h3>
	                <span class="content"><?php echo $mast_bcm_prtnr_left_content['mast_bcm_prtnr_content']; ?></span>
	                
	                <?php if ($mast_bcm_prtnr_left_content['mast_bcm_prtnr_cta_btns'] != ""): ?>
	                    <?php foreach ($mast_bcm_prtnr_left_content['mast_bcm_prtnr_cta_btns'] as $cta_key => $sin_bcmprt_cta):

	                        $randid = rand(0,100000);
	                        if($cta_key % 2 != 0 )
	                        {
	                            $btn_class = 'btn-black';
	                        } else {
	                            $btn_class = 'btn-white';
	                        }

	                        $form_sec_id = $cta_key+1; ?>
	                    <a class="modal-footer-module btn <?=$btn_class;?>" data-form="<?php echo $form_sec_id; ?>" data-randid="<?=$randid;?>" href="#"><?php echo $sin_bcmprt_cta['mast_bcm_prtnr_cta_btn_txt']; ?></a>

	                    <div class="modal-form" id="<?php echo 'form-'.$form_sec_id.'-'.$randid; ?>" style="display: none;"><?PHP echo do_shortcode($sin_bcmprt_cta['mast_bcm_prtnr_cta_btn_frm_code']);?></div>
	                    <?php endforeach; ?>
	                <?php endif; ?>
	            </div>
	        <?php if ($mast_bcm_prtnr_rgt_img != ""): ?>
	            <img data-mh="footer-module-partner" src="<?php echo $mast_bcm_prtnr_rgt_img['url']; ?>" alt="<?php echo $mast_bcm_prtnr_rgt_img['alt']; ?>" />
	        <?php endif; ?>
	        </div>
	    </section>
		    <div class="modal footer-module-modal">
		        <div class="modal-wrapper">
		            <span class="close" id="closeFooterModuleModal"></span>
		        </div>
		    </div>
		<?php endif; ?>

  	</div>
</div>

<!--  Partner Logo Section -->
<?php echo Partner_Logos_Fn(get_the_ID()); ?>
<!--  Contact Form Section -->
<?php echo Contact_Form_Fn(get_the_ID()); ?>
<?php get_footer(); ?>