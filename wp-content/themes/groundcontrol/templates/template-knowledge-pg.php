<?php 
/*
* Template Name: Knowledge Page
*/

get_header();

if (function_exists('get_field')) {

	// Header Banner
	$heading = get_field('heading');

	// Card Layout Module
	$mast_cardlay_main_heading = get_field('mast_cardlay_main_heading');
	$mast_cardlay_bg_color = get_field('mast_cardlay_bg_color');
	$mast_cardlay_add_cards_data = get_field('mast_cardlay_add_cards_data');


    
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
		<?php if (get_field('enable_mast_cardlay')): ?>
		<section class="page-module card-layout section" id="section1" style="background-color: <?php echo $mast_cardlay_bg_color; ?>;">
	        <div class="wrapper">
	            <?php if ($mast_cardlay_main_heading != ""): ?>
	                <h3><?php echo $mast_cardlay_main_heading; ?></h3>
	            <?php endif; ?>

	            <div class="cards-container">
	                <?php foreach ($mast_cardlay_add_cards_data as $key => $sin_acd): 
	                        
	                    ?>
	                    <a href="<?php echo $sin_acd['mast_cardlay_link']['url']; ?>" target="_self"  class="single-card <?php echo 'bg-'.$sin_acd['mast_cardlay_col_scheme']; ?>">
	                        <div class="image-container">
	                            <img src="<?php echo $sin_acd['mast_cardlay_img']['url']; ?>" alt="<?php echo $sin_acd['mast_cardlay_img']['alt']; ?>" />
	                        </div>
	                        <div class="content-container">
	                            <h4 data-mh="card-layout-h4"><?php echo $sin_acd['mast_cardlay_title']; ?></h4>
	                            <p data-mh="card-layout-p"><?php echo $sin_acd['mast_cardlay_content']; ?></p>
	                            <span><?php echo $sin_acd['mast_cardlay_link']['title']; ?></span>
	                        </div>
	                    </a>
	                <?php endforeach; ?>
	            </div>
	        </div>
	    </section>
		<?php endif; ?>

  	</div>
</div>

<!--  Partner Logo Section -->
<?php echo Partner_Logos_Fn(get_the_ID()); ?>
<!--  Contact Form Section -->
<?php echo Contact_Form_Fn(get_the_ID()); ?>
<?php get_footer(); ?>