<?php 
/*
* Template Name: About Page
*/

get_header();

if (function_exists('get_field')) {

	// Header Banner
	$heading = get_field('heading');

	// Inline Title and Content Module
    $mast_itact_title = get_field('mast_inline_title_and_content_title');
    $mast_itact_content = get_field('mast_inline_title_and_content_content');

    // List Columns Module
    $mast_list_columns_rep = get_field('mast_list_columns_column_repeater');

    // Title, Content and Image Module
    $mast_ttlcontimg_grp = get_field('mast_title_content_and_image_content_grp');
    $mast_ttlcontimg_image = get_field('mast_title_content_and_image_image');
    $mast_ttlcontimg_order = get_field('mast_title_content_and_image_order');

    // History Slider Module
    $mast_history_slider_title = get_field('mast_history_slider_title');
    $mast_history_slider_cards = get_field('mast_history_slider_cards');

    // Key People Module
    $mast_key_people_title = get_field('mast_key_people_title');
    $mast_key_people_team = get_field('mast_key_people_team');
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
		<?php if (get_field('enable_mast_itact')): ?>
		<section class="page-module inline-title-and-content section" id="section1">
		    <div class="wrapper">
		    	<?php if ($mast_itact_title != ""): ?>
		        <h3 class="module-title"><?php echo $mast_itact_title; ?></h3>
		    	<?php endif; ?>

		    	<?php if ($mast_itact_content != ""): ?>
		        <span class="module-content content"><?php echo $mast_itact_content; ?></span>
		    	<?php endif; ?>
		    </div>
		</section>
		<?php endif; ?>

		<?php if (get_field('enable_mast_lcolumns_rep')): ?>
		<section class="page-module list-columns section" id="section2">
	        <div class="wrapper">
	            <div class="list-container">
	                <?php foreach ($mast_list_columns_rep as $key => $sin_list_column): ?>
	                    <div class="single-step">
	                        <div class="icon-container">
	                            <img src="<?php echo $sin_list_column['mast_list_columns_icon']['url']; ?>" alt="<?php echo $sin_list_column['mast_list_columns_icon']['alt']; ?>" />
	                        </div>
	                        <div class="content-container">
	                            <h4 class="col-blue"><?php echo $sin_list_column['mast_list_columns_title']; ?></h4>
	                            <p><?php echo $sin_list_column['mast_list_columns_content']; ?></p>
	                        </div>
	                    </div>
	                <?php endforeach; ?>
	            </div>
	        </div>
	    </section>
		<?php endif;?>

		<?php if (get_field('enable_mast_ttlcontimg')): ?>
		<section class="page-module title-content-and-image section" id="section3">
	        <div class="wrapper">
	            <?php if ( $mast_ttlcontimg_order == 'clir' ): ?>
	                <div class="content-container">
	                    <h6><?php echo $mast_ttlcontimg_grp['mast_title_content_and_image_title']; ?></h6>
	                    <div class="content">
	                        <?php echo $mast_ttlcontimg_grp['mast_title_content_and_image_content']; ?>
	                    </div>
	                </div>
	                <div class="image-container left">
	                    <img src="<?php echo $mast_ttlcontimg_image['url']; ?>" alt="<?php echo $mast_ttlcontimg_image['alt']; ?>" />
	                </div>
	            <?php else: ?>
	                <div class="image-container right">
	                    <img src="<?php echo $mast_ttlcontimg_image['url']; ?>" alt="<?php echo $mast_ttlcontimg_image['alt']; ?>" />
	                </div>
	                <div class="content-container">
	                    <h6><?php echo $mast_ttlcontimg_grp['mast_title_content_and_image_title']; ?></h6>
	                    <div class="content">
	                        <?php echo $mast_ttlcontimg_grp['mast_title_content_and_image_content']; ?>
	                    </div>
	                </div>
	            <?php endif; ?>
	        </div>
	    </section>
		<?php endif;?>

		<?php if (get_field('enable_mast_history_slider')): ?>
		<section class="page-module history-slider section" id="section4">
	        <div class="wrapper">
	            <?php if ($mast_history_slider_title != ""): ?>
	            <h3 class="col-peach"><?php echo $mast_history_slider_title; ?></h3>
	            <?php endif; ?>
	        </div>
	        <div class="history-slider-container section">
	            <?php foreach ($mast_history_slider_cards as $key => $sin_hist_slide): ?>
	                <div class="single-card">
	                    <div class="image-container section">
	                        <img src="<?php echo $sin_hist_slide['mast_history_slider_image']['url']; ?>" alt="<?php echo $sin_hist_slide['mast_history_slider_image']['alt']; ?>" />
	                    </div>
	                    <div class="card-content section">
	                        <h6 class="col-peach"><?php echo $sin_hist_slide['mast_history_slider_subtitle']; ?></h6>
	                        <h5><?php echo $sin_hist_slide['mast_history_slider_title']; ?></h5>
	                        <p><?php echo $sin_hist_slide['mast_history_slider_content']; ?></p>
	                    </div>
	                </div>
	            <?php endforeach; ?>
	        </div>
	    </section>
		<?php endif;?>

		<?php if (get_field('enable_mast_key_people')): ?>
		<section class="page-module key-people section" id="section5">
	        <div class="wrapper">
	            <?php if ($mast_key_people_title != ""): ?>
	            <h3 class="col-peach"><?php echo $mast_key_people_title; ?></h3>
	            <?php endif; ?>
	            <?php foreach ($mast_key_people_team as $key => $sin_key_ppl): ?>
	                <div class="single-person">
	                    <div class="headshot">
	                        <img src="<?php echo $sin_key_ppl['mast_key_people_headshot']['url']; ?>" alt="<?php echo $sin_key_ppl['mast_key_people_headshot']['alt']; ?>" />
	                        <div class="biography-container">
	                            <?php echo $sin_key_ppl['mast_key_people_biography']; ?>
	                        </div>
	                    </div>
	                    <div class="information">
	                        <h4><?php echo $sin_key_ppl['mast_key_people_name']; ?></h4>
	                        <h5><?php echo $sin_key_ppl['mast_key_people_job_title']; ?></h5>

	                        <?php if ($sin_key_ppl['mast_key_people_social_media'] != ""): ?>
	                            <?php foreach ($sin_key_ppl['mast_key_people_social_media'] as $key => $sin_kp_sm): ?>
	                                <a class="social" href="<?php echo $sin_kp_sm['mast_key_people_sm_link']; ?>" target="_blank">
	                                    <img src="<?php echo $sin_kp_sm['mast_key_people_sm_icon']['url']; ?>" alt="<?php echo $sin_kp_sm['mast_key_people_sm_icon']['alt']; ?>" />
	                                </a>
	                            <?php endforeach; ?>
	                        <?php endif; ?>
	                    </div>
	                </div>
	            <?php endforeach; ?>
	        </div>
	    </section>
		<?php endif;?>

  	</div>
</div>

<!--  Partner Logo Section -->
<?php echo Partner_Logos_Fn(get_the_ID()); ?>
<!--  Contact Form Section -->
<?php echo Contact_Form_Fn(get_the_ID()); ?>
<?php get_footer(); ?>