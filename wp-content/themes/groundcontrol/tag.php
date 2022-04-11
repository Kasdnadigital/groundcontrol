<?php get_header(); ?>

<?php
    $currentcategory = get_queried_object();
?>

<div class="template-inner section">
    <div class="container">
        
        <div class="title-bar section">
            <h1><?php the_archive_title(); ?></h1>
        </div>

        <div class="posts section">
            <?php while(have_posts()): the_post(); ?>
        
                <a href="<?php the_permalink(); ?>" class="single-post">
                    <div class="image">
                    <?php if ( has_post_thumbnail() ) : ?>
                            <?php 
                            $post_id = get_the_ID();
                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
                            $url = @$thumb['0']; // get url from array
                            ?>
                            <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
                        <?php else:?>
                            <img src="https://via.placeholder.com/430x269.png?text=No%20Image" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="content" data-mh="article-content">
                        <div class="date">
                            <p><?PHP echo get_the_date(); ?></p>
                        </div>
                        <div class="category">
                            <?php $blogcats = wp_get_post_categories(get_the_id()); ?>
                            <p> 
                                <?php foreach($blogcats as $blogcat){ ?>
                                    <?php $category = get_category($blogcat); ?>
                                    <span class="<?php echo $category->slug; ?>"><?php echo $category->name; ?></span>
                                <?php } ?>
                            </div>
                        <div class="title">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="snippet">
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </div>
                </a>
        
            <?php endwhile;wp_reset_postdata(); ?>
        
            <div class="pagination section">
                <div class="pagination-inner">
                    <?PHP echo paginate_links(); ?>
                </div>
            </div>
        </div>

    </div>
</div>



<?php get_footer(); ?>