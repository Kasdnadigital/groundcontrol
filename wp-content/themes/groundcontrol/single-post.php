<?PHP get_header(); ?>

    <div class="template-inner section">
      <div class="container">

        <div class="back-to-media section">
          <a href="<?php echo get_post_type_archive_link('post'); ?>">Back to media</a>
        </div>
  
        <div class="tags section">
        <?php $blogtags = wp_get_post_tags(get_the_id()); ?>
              <p> 
                  <?php foreach($blogtags as $blogtag){ ?>
                      <?php $tag = get_tag($blogtag); ?>
                      <a href="<?php echo get_tag_link($tag); ?>" class="<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a>
                  <?php } ?>
        </div>

        <div class="date section">
          <?PHP $is_guide = false; 
            $post_cat = get_the_category(); 
            if($post_cat){
              foreach($post_cat as $cd){
                if($cd->cat_name == 'Guides'){
                  $is_guide = true;
                }
              }
            }
          ?>
          <?PHP if(!$is_guide){ ?>
          <p><?php echo get_the_date(); ?></p>
          <?PHP } ?>
        </div>
        
        <div class="title section">
          <h1><?php the_title(); ?></h1>
        </div>
  
        <?php while(have_posts()): the_post(); ?>
          <div class="content">
            <?php the_content(); ?>
<?php
if( get_field('fbs_contact_form') ) {
  $fbs_cfrm_shortcode = get_field('fbs_cfrm_shortcode');
  echo do_shortcode( $fbs_cfrm_shortcode );
}
?>
</div>

        <?php endwhile; ?>

      </div>

    </div>

<?PHP get_footer(); ?>