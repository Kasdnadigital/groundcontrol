<?php 
/*
* Template Name:Home
*/

?>
<?php get_header(); ?>
<?php $_b_img = get_field("home_banner_img",get_the_ID());?>
<div class="site-body section">
<div class="homepage-hero" style='background-image:url(<?php echo $_b_img['url']?>)'>
    <div class="container">
        <div class="header-content">
            <?php echo get_field("home_banner_content",get_the_ID());?>
            <form class="homepage-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input name="s" type="text" placeholder="Search">
                <button id="homepageSearchSubmit" type="submit"></button>
            </form>
        </div>
        <a href="#scroll-to" class="scroll-arrow" id="heroScrollDown"></a>
    </div>
</div>
<div id="scroll-to" class="template-inner section">

<!-- Solution Section -->
<?php if(get_field("solu_add_data",get_the_ID())) { ?>
<section class="page-module icon-cards section" id="section1">
	<div class="wrapper">
		<div class="cards-container">
			<?php while (has_sub_field("solu_add_data",get_the_ID())) { 
				echo '<div class="single-card" data-mh="icon-cards">';
					$_s_icon_m = get_sub_field("solu_icon_img",get_the_ID());
					if(!empty($_s_icon_m))
					{
						echo '<img src="'.$_s_icon_m['url'].'" alt="'.$_s_icon_m['alt'].'" >';
					}
					if(get_field("solu_main_heading",get_the_ID()))
					{
						echo '<span class="solu_sub_heading">'.get_field("solu_main_heading",get_the_ID()).'</span>';	
					}
					if(get_sub_field("solu_sub_heading",get_the_ID()))
					{
						echo '<h2>'.get_sub_field("solu_sub_heading",get_the_ID()).'</h2>';	
					}
                    if(get_sub_field("solu_short_desc",get_the_ID()))
					{
						echo '<p>'.get_sub_field("solu_short_desc",get_the_ID()).'</p>';	
					}
                    if(get_sub_field("solu_rm_btn_nam",get_the_ID()) && get_sub_field("solu_rm_btn_link",get_the_ID()))
					{
						echo '<a href="'.get_sub_field("solu_rm_btn_link",get_the_ID()).'">'.get_sub_field("solu_rm_btn_nam",get_the_ID()).'</a>';	
					}
                               
				echo '</div>';	
			 } ?>
		</div>		
	</div>
</section>
<?php } ?>	

<!--  Market Section -->

<?php if(get_field("mkt_add_data",get_the_ID())) {
$mkt_bg_img = get_field("mkt_bg_img",get_the_ID())
?>
<section class="page-module cards-link-with-header-background section" id="section2" style="background-image:url(<?php echo $mkt_bg_img['url'];?>);">
	<div class="wrapper">
		<?php 
			if(get_field("mkt_main_heading",get_the_ID()))
			{
				echo '<h2>'.get_field("mkt_main_heading",get_the_ID()).'</h2>';	
			}
		?>
		<div class="cards-container">
			<?php while (has_sub_field("mkt_add_data",get_the_ID())) { 
				echo '<div class="single-card">';
					$_mkt_icon_m = get_sub_field("mkt_icon_img",get_the_ID());
					if(!empty($_mkt_icon_m))
					{
						echo '<img src="'.$_mkt_icon_m['url'].'" alt="'.$_mkt_icon_m['alt'].'" >';
					}
					
					if(get_sub_field("mkt_sub_heading",get_the_ID()))
					{
						echo '<h3>'.get_sub_field("mkt_sub_heading",get_the_ID()).'</h3>';	
					}
                    if(get_sub_field("mkt_short_desc",get_the_ID()))
					{
						echo '<p>'.get_sub_field("mkt_short_desc",get_the_ID()).'</p>';	
					}
                    if(get_sub_field("mkt_rm_btn_nam",get_the_ID()) && get_sub_field("mkt_rm_btn_link",get_the_ID()))
					{
						echo '<a href="'.get_sub_field("mkt_rm_btn_link",get_the_ID()).'">'.get_sub_field("mkt_rm_btn_nam",get_the_ID()).'</a>';	
					}
                               
				echo '</div>';	
			 } ?>
		</div>		
	</div>
</section>
<?php } ?>	

<!--  About Us Section -->
<?php if(get_field("abt_short_desc",get_the_ID())) {
	$abt_bg_img = get_field("abt_bg_img",get_the_ID());
	if(get_field("abt_content_align",get_the_ID()) == "left")
	{
		$abtcls = "left"; 
	}else if(get_field("abt_content_align",get_the_ID()) == "right")
	{
		$abtcls = "right";
	}
?>
<section class="page-module image-with-content-within section" id="section3" style="background-image:url(<?php echo $abt_bg_img['url'];?>);">
	<div class="wrapper">
		<div class="inner-container <?php echo $abtcls;?>" >
			<div class="content-container">
				<?php echo get_field("abt_short_desc",get_the_ID());?>
			</div>
		</div>
	</div>	
</section>
</div>
</div>
<?php } ?>
<!-- Case Study  -->
<?php
$case_cols = get_field("select_list_column",get_the_ID()); 
echo '<section class="page-module case-studies section">';
	echo '<div class="wrapper">';

		echo '<div class="case-studies-container section '.strtolower($case_cols['label']).'">';
			echo '<h2 class="center">Latest Case Studies</h2>';
			if(get_field("case_list_link",get_the_ID()))
			{
				echo '<div class="archive-link">';
					echo '<a class="center archive" href="'.get_permalink(342).'">All Case Studies</a>';
				echo '</div>';
			}
			
			if(get_field("case_study_option",get_the_ID()) == "lcs")
			{
				$kledge_args = array(
	            'order' => 'DESC',
	            'post_status' => 'publish',
	            'post_type' => 'knowledge',
	            'posts_per_page' => $case_cols['value'],
	            'tax_query' => array(
				        array(
				            'taxonomy' => 'knowledge_cat',
				            'field'    => 'slug',
				            'terms'    => 'case-study',
				        ),
				    ),
	        	); 
			}else if(get_field("case_study_option",get_the_ID()) == "scs")
			{
				$sel_cst = get_field("case_studies_data",get_the_ID());	
				$kledge_args = array(
	            'order' => 'DESC',
	            'post_status' => 'publish',
	            'post_type' => 'knowledge',
	            'post__in' => $sel_cst,
	            'posts_per_page' => $case_cols['value'],
	            'tax_query' => array(
				        array(
				            'taxonomy' => 'knowledge_cat',
				            'field'    => 'slug',
				            'terms'    => 'case-study',
				        ),
				    ),
	        	); 
			}
			$c_query = new WP_Query($kledge_args);
			if ( $c_query->have_posts() ) {
				echo '<div class="studies-container">';
				while ( $c_query->have_posts() ) {  $c_query->the_post();
					echo '<div class="single-case-study">';
						echo '<a href="'.get_the_permalink().'">';
							echo '<div class="image-container section">';
								echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" />';
							echo '</div>';
							echo '<div class="content-container section">';
								echo '<span data-mh="card-titles" class="date uppercase section">Case Study</span>';
								echo '<h3 class="post-title section">'.get_the_title().'</h3>';
								echo '<p data-mh="card-excerpts" class="section">'.get_the_excerpt().'</p>';
							echo '</div>';
						echo '</a>';	
					echo '</div>';
				}
				echo '</div>';
			}
			wp_reset_postdata();
		echo '</div>';
	echo '</div>';
echo '</section>';
?>
<!--  Knowledge Section  -->
<?php 
if(get_field("knowleg_add_button",get_the_ID()) || get_field("knowleg_content",get_the_ID()))
{
echo '<section class="page-module content-with-cta-links section" style="background-color: '.get_field("knowleg_bg_color",get_the_ID()).';">';
	echo '<div class="wrapper">';
		echo '<div class="module-wrapper">';
			echo '<div class="content-section">';
				echo get_field("knowleg_content",get_the_ID());
			echo '</div>';
			echo '<div class="links-section">';
				while (has_sub_field("knowleg_add_button",get_the_ID())) {
					$link = get_sub_field("knowleg_btn_link",get_the_ID());
					echo '<a href="'.get_permalink($link->ID).'" target="_self" style="background-color: '.get_sub_field("knowleg_btn_link_bg_color",get_the_ID()).';">'.get_sub_field("knowleg_btn_title",get_the_ID()).'</a>';
				}
			echo '</div>';
		echo '</div>';
	echo '</div>';	
echo '</section>';
}
?>

<!-- News & Blogs Section -->
<?php 
if(get_field("news_type",get_the_ID()) == "lna") {
	$news_args = array(
        'order' => 'DESC',
        'post_status' => 'publish',
      	'post_type' => 'post',
      	'posts_per_page' => 3
       ); 	
}else if(get_field("news_type",get_the_ID()) == "sna")
{
	$sel_artis = get_field("news_select_articles",get_the_ID());
	$news_args = array(
        'order' => 'DESC',
        'post_status' => 'publish',
      	'post_type' => 'post',
      	'posts_per_page' => 3,
      	'post__in' => $sel_artis,
       ); 
	
}
else if(get_field("news_type",get_the_ID()) == "lfc")
{
	$sel_artis = get_field("news_select_categories",get_the_ID());
	$news_args = array(
        'order' => 'DESC',
        'post_status' => 'publish',
      	'post_type' => 'post',
      	'posts_per_page' => 3,
      	'category__in' => $sel_artis,
       ); 
	
}
else if(get_field("news_type",get_the_ID()) == "lft")
{
	$sel_artis = get_field("news_select_tags",get_the_ID());
	$news_args = array(
        'order' => 'DESC',
        'post_status' => 'publish',
      	'post_type' => 'post',
      	'posts_per_page' => 3,
      	'tag__in' => $sel_artis,
       ); 
	
}
$news_qry = new WP_Query($news_args);
echo '<section class="footer-module latest-news section">';
	echo '<div class="wrapper">';
		echo '<div class="news-container section">';
			echo '<h2>'.get_field("news_main_heading",get_the_ID()).'</h2>';
			if($news_qry->have_posts()){
				while($news_qry->have_posts()){  $news_qry->the_post();
					echo '<div class="single-post">';
						echo '<a href="'.get_the_permalink().'">';
							echo '<div class="image-container section">';
								echo '<img src="'.get_the_post_thumbnail_url(get_the_ID(),array( 400, 250)).'" />';
							echo '</div>';
							echo '<div class="content-container section">';
								echo '<span data-mh="card-titles" class="date uppercase section col-peach">'.get_the_date('j M Y').'</span>';
								echo '<h3 class="post-title section" data-mh="sib-card-titles">'.get_the_title().'</h3>';
								echo '<p data-mh="card-excerpts" class="section">'.substr(get_the_excerpt(),0,300).' […]</p>';
							echo '</div>';
						echo '</a>';	
					echo '</div>';		
				}
			}else {
			    echo '<h3>no posts found</h3>';
			} wp_reset_postdata();
		
		echo '</div>';
	echo '</div>';
echo '</section>';
?>

<!--  Partner Logo Section -->
<?php echo Partner_Logos_Fn(get_the_ID()); ?>
<!--  Contact Form Section -->
<?php echo Contact_Form_Fn(get_the_ID()); ?>
<?php get_footer(); ?>