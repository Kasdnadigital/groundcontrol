<section class="page-module case-studies section">
    <div class="wrapper">
    <?PHP if(get_sub_field('pull_latest_case_studies')){ ?>
        <?PHP 
        $nice_numbers = array(
            'two'   => '2',
            'three' => '3',
            'four'  => '4'
        );
        $to_show = get_sub_field('number_to_render');
        ?>
        <?PHP
        $args = array(
            'order' => 'DESC',
            'post_status' => 'publish',
            'post_type' => 'case_study',
            'posts_per_page' => $nice_numbers[$to_show]
        ); 
        ?>
        <?PHP $posts = new WP_Query($args); ?>
        <?PHP if($posts->have_posts()){ ?>
            <div class="case-studies-container section <?=$to_show;?>">
                <h3 <?PHP if(is_front_page()){ ?> class="center"  <?PHP } ?>><?=get_sub_field('title');?></h3>
                <?PHP if(get_sub_field('show_all_case_studies_link')){ ?><div class="archive-link"><a <?PHP if(is_front_page()){ ?> class="center archive"  <?PHP }else{ ?> class="archive" <?PHP } ?> href="<?=get_post_type_archive_link('case_study');?>">All Case Studies</a></div><?PHP } ?>
                    <div class="studies-container">
                    <?PHP while($posts->have_posts()): $posts->the_post();?>
                        <div class="single-case-study">
                            <a href="<?=get_the_permalink();?>">
                                <div class="image-container section">
                                    <img src="<?=get_field('featured_image');?>" />
                                </div>
                                <div class="content-container section">
                                    <h5 data-mh="card-titles" class="date uppercase section">Case Study</h5>
                                    <h4 class="post-title section"><?=get_the_title();?></h4>
                                    <p data-mh="card-excerpts" class="section"><?=get_field('excerpt');?></p>
                                </div>
                            </a>
                        </div>
                    <?PHP endwhile;?>
                    </div>
            </div>
        <?PHP }wp_reset_postdata(); ?>
    <?PHP }else{ ?>
        <div class="case-studies-container section <?=get_sub_field('number_to_render');?>">
            <h3 <?PHP if(is_front_page()){ ?> class="center"  <?PHP } ?>><?=get_sub_field('title');?></h3>
            <?PHP if(get_sub_field('show_all_case_studies_link')){ ?><a href="<?=get_post_type_archive_link('case_studies');?>">All Case Studies</a><?PHP } ?>                   
             <div class="studies-container">
            <?PHP foreach(get_sub_field('pull_select_case_studies') as $title => $id){ ?>
                <?PHP $post = get_post($id); ?>
                <div class="single-case-study">
                    <a href="<?=get_the_permalink($post);?>">
                    <div class="image-container section">
                        <img src="<?=get_field('featured_image', $post);?>" />
                    </div>
                    <div class="content-container section">
                        <h5 data-mh="card-titles" class="date uppercase section">Case Study</h5>
                        <h4 class="post-title section"><?=get_the_title($post);?></h4>
                        <p data-mh="card-excerpts" class="section"><?=get_field('excerpt', $post);?></p>
                    </div>
                    </a>
                </div>
            <?PHP }wp_reset_postdata(); ?>
            </div>
    <?PHP } ?>
    </div>
</section>