<?php 
/*
* Template Name:Casestudies Template
  Template Post Type: knowledge 
*/

get_header();
?>
<?php 
$post_id = get_the_ID();

if (function_exists('get_field')) {
	$heading = get_field('heading');
	//$mast_sel_modules = get_field('mast_sel_modules');
    $mast_add_module = get_field('mast_add_module');
}
echo '<input type="hidden" class="admin_url" value="'.admin_url('admin-ajax.php').'">';
?>
<?php if (get_field('enable_banner')): ?>
<div class="page-hero section bg-lightgrey">
	<div class="wrapper">
		<div class="module-wrapper">
			<div class="title-holder">
				<?php if ($heading != ""): ?>
				<span class="subtitle"><?php echo $heading; ?></span>
				<?php endif; ?>
				<h1 class="page-title"><?php echo get_the_title(); ?></h1>
			</div>
			<div class="caption-holder">
				<?php the_excerpt();?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<section class="case-studies case-studies--archive section">
	<div class="wrapper">
			<div class="filter-container">
					<div class="filter-select-button">
            <p class="filter-text">Filter by <span class="filter-arrow"></span></p>
          </div>
          <div class="filters-container">
          		<?php 
          			 $case_filters = get_terms( array(
                        'taxonomy' => 'casestudy_filters',
                        'hide_empty' => false,
                    ));
          			 
          			 $f=1;
          			 if(!empty($case_filters))
          			 {
          			 	echo '<div class="col">';
          			 		foreach($case_filters as $term => $fits_val){
          			 				
          			 				
          			 				echo '<a href="javascript:void(0);" id="'.$fits_val->term_id.'" class="filter-cat">'.$fits_val->name.'('.$fits_val->count.')</a>';
          			 				if($f%8==0)
          			 				{
          			 					echo '</div><div class="col">';
          			 				}
          			 				$f++;
          			 		}
          			 }
          		?>
          </div>
    	</div>
    	<div class="case-studies-container section"> 
      		<div class="studies-container">
      				<img id="loading-image" src="<?php echo get_template_directory_uri();?>/assets/images/ajax_loader.gif" alt="Loading..." />
      		</div>
      </div>
      <div class="pagination section">
          <div class="pagination-inner"></div>
      </div>
	</div>
</section>

<!--  Partner Logo Section -->
<?php echo Partner_Logos_Fn(get_the_ID()); ?>
<!--  Contact Form Section -->
<?php echo Contact_Form_Fn(get_the_ID()); ?>

<?php get_footer(); ?>