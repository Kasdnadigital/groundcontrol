<?PHP get_header(); ?>
<?php $post_id = get_the_ID();

if (function_exists('get_field')) {
  $heading = get_field('heading');
  $mast_add_module = get_field('mast_add_module');
} ?>

<?php if (get_field('enable_banner')): ?>
<div class="page-hero section bg-lightgrey">
  <div class="wrapper">
    <?php if ($heading != ""): ?>
    <span class="subtitle"><?php echo $heading; ?></span>
    <?php endif; ?>
    <h1 class="page-title"><?php echo get_the_title(); ?></h1>
  </div>
</div>
<?php endif; ?>

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