<?PHP get_header(); ?>
<?php $post_id = get_the_ID();

if (function_exists('get_field')) {
  $heading = get_field('heading');
  $banner_img = get_field('banner_img');
  $mast_add_module = get_field('mast_add_module');
} ?>

<?php if (get_field('enable_banner')){ ?>
  <?php if(!empty($banner_img)) { ?>
    <div class="hero hero--cat section" style="background-image: url(<?php echo get_field('banner_img');?>);">
      <div class="wrapper">
        <div class="content-wrapper">
          <?php if ($heading != "") { ?>
          <span class="subtitle"><?php echo $heading; ?></span>
          <?php } ?>
          <h1><?php echo get_the_title(); ?></h1>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="page-hero section bg-lightgrey">
      <div class="wrapper">
        <?php if ($heading != ""): ?>
        <span class="subtitle"><?php echo $heading; ?></span>
        <?php endif; ?>
        <h1 class="page-title"><?php echo get_the_title(); ?></h1>
      </div>
    </div>
  <?php } ?>
<?php } ?>

<div class="site-body section">
  <div class="template-inner section">
    <?php //echo '<pre>'; print_r($mast_add_module); echo '</pre>'; ?>
    <?php if ($mast_add_module): $j = 0;
      foreach ($mast_add_module as $mast_module_key => $sin_mast_module_sel):

        $main_module_loop = $sin_mast_module_sel;
        $select_module = $sin_mast_module_sel['mast_sel_modules'];
        
        foreach ($select_module as $sel_module_key => $sin_mast_module_sel_item):
          
          //$i = $sel_module_key+1;
          $i = $j+1;

          $vfunction = "general_acf_mast_module_$sin_mast_module_sel_item";
          echo $vfunction($main_module_loop, $i);
          $j++; 
        endforeach;
      endforeach; ?>
    <?php endif; ?>
    </div>
</div>

<!--  Partner Logo Section -->
<?php echo Partner_Logos_Fn(get_the_ID()); ?>
<!--  Contact Form Section -->
<?php echo Contact_Form_Fn(get_the_ID()); ?>

<?PHP get_footer(); ?>