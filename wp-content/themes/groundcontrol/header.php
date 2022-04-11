<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
<script src="https://www.googleoptimize.com/optimize.js?id=OPT-KLRMWNB"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-87983-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-87983-1');
</script>

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NRBRQK7');</script>

<script>
(function(h,o,t,j,a,r){
    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
    h._hjSettings={hjid:2517075,hjsv:6};
    a=o.getElementsByTagName('head')[0];
    r=o.createElement('script');r.async=1;
    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
    a.appendChild(r);
})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header section">
	<div class="container">
		 <div class="logo-container">
				<?php $site_logo = get_field("main_logo_img","option");
					if(!empty($site_logo))
					{
						echo '<a href="'.home_url().'">';
							echo '<img id="siteLogo" src="'.$site_logo['url'].'" alt ="'.$site_logo['alt'].'">';	
						echo '</a>';
					}
				?>
		</div>
		<div class="menu-container">
			<div class="top-level">
				<div class="menu-inner">
					<div class="upper-level">
						<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input name="s" type="text" placeholder="Search">
							<button id="searchSubmit" type="submit"></button>
						</form>
						<?php 
							$items_count = WC()->cart->get_cart_contents_count(); 
							?><a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
								<span class="cart-contents-count"><?php echo esc_html( $items_count ? $items_count : '0' ); ?></span>
							</a>
						
						 
					</div>
					<?PHP wp_nav_menu(array('menu'=>'Main Menu','container_class' => 'menu-top-level-header-menu-container','menu_id' => 'menu-top-level-header-menu')); ?>
				</div>
				<div class="language-select">
					<?php $site_id = get_current_blog_id();
						if($site_id == 4)
						{
							echo '<div class="language-title"><img src="'.get_template_directory_uri().'/assets/images/Americas.png"><span>Americas</span></div>';		
						}else if($site_id == 1)
						{
							echo '<div class="language-title"><img src="'.get_template_directory_uri().'/assets/images/RoW.png"><span>Europe / RoW</span></div>';
						}
					?>
					<div class="language-view">
						<ul>
							<?php 
							$sites = get_sites();
							foreach ($sites as $_sitedata) {
								if($_sitedata->blog_id == 4)
								{
									$_site_url = 'http://'.$_sitedata->domain.$_sitedata->path;
								
									echo '<li><a href="'.$_site_url.'"><img src="'.get_template_directory_uri().'/assets/images/Americas.png"><span>Americas</span></a></li>';	
								}
								if($_sitedata->blog_id == 1)
								{
									$_site_url = 'http://'.$_sitedata->domain.$_sitedata->path.'en';
								
									echo '<li><a href="'.$_site_url.'"><img src="'.get_template_directory_uri().'/assets/images/RoW.png"><span>Europe / RoW</span></a></li>';
								}
							}
							?>
						</ul>
					</div>
				</div>
				<div class="mobile-search-trigger"></div>
				<div class="mobile-trigger"></div>
				<div class="upper-level mobile-cart-icon">
					<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
							$count = WC()->cart->cart_contents_count;
							?><a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php 
							if ( $count > 0 ) {
								?>
								<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
								<?php
							}
								?></a>
						
						<?php } ?>

				</div>
			</div>
			<div class="bottom-level">
				<?php 
					if(get_field("mega_add_menu_option","option"))
					{
						$mega_menu_id = '';
						$mega_menu_cls = '';
						$mega_menu_h_cls = '';
						echo '<ul>';
						echo '<li><a class="header-title products-header-title" id="productsTrigger" href="'.get_permalink(290).'">Products</a></li>';
							echo '<div class="products-menu submenu">';
								echo '<div class="container">';
									echo '<div class="main_submenu">';
										if(get_field("add_category_menu","option"))
										{
										echo '<div class="submenu_item">';
											echo '<div class="menu_title">'.get_field("cat_main_heading","option").'</div>';
											echo '<ul>';
											while (has_sub_field("add_category_menu","option")) {
												echo '<li><a href="'.get_sub_field("cat_menu_link","option").'">'.get_sub_field("cat_menu_name","option").'</a></li>';
											}
											echo '</ul>';
											echo '<a href="'.get_field("cat_btn_link","option").'" class="view_all_hardware">'.get_field("cat_btn_name","option").' <img src="'.get_template_directory_uri().'/assets/images/arrow-right-green.svg" alt="arrow-right-green.svg"></a>';
										echo '</div>';
										}
										if(get_field("add_page_menu","option"))
										{
											echo '<div class="submenu_item">';
												echo '<div class="menu_title">'.get_field("pages_main_heading","option").'</div>';
												echo '<ul>';
												while (has_sub_field("add_page_menu","option")) {
													echo '<li><a href="'.get_sub_field("page_menu_link","option").'">'.get_sub_field("page_menu_name","option").'</a></li>';
												}
												echo '</ul>';
												echo '<a href="'.get_field("pages_btn_link","option").'" class="view_all_hardware">'.get_field("pages_btn_name","option").' <img src="'.get_template_directory_uri().'/assets/images/arrow-right-green.svg" alt="arrow-right-green.svg"></a>';
											echo '</div>';
										}
										$fargs = array(
								        'post_type'   => 'product',
								        'posts_per_page'   => 6,
								        'orderby'     => 'date',
								        'order'       => 'DESC' ,
								        'tax_query'  => array(
								            array(
								                'taxonomy' => 'product_visibility',
											    'field'    => 'name',
											    'terms'    => 'featured',
											    'operator' => 'IN',
								            )
								        )
								    );
										$query = new WP_Query($fargs);
						
										if ( $query->have_posts() ) {
										echo '<div class="submenu_item">';
											echo '<div class="featured_products_menu">';
												echo '<div class="fead_menu_title">'.get_field("feat_prod_main_heading","option").'</div>';
												echo '<ul>';
											while ( $query->have_posts() ){ $query->the_post();
                            				$p_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' );
												echo '<li><a href="'.get_permalink(get_the_ID()).'"><img src="'.$p_url[0].'" alt="'.get_the_title().'">'.get_the_title().'</a></li>';
												}		
												echo '</ul>';
											echo '</div>';
										echo '</div>';
										}wp_reset_postdata();
										echo '<div class="submenu_item">';
											echo '<div class="menu_card">';
											if(get_field("content_image","option"))
											{	
												$c_image = get_field("content_image","option");
												echo '<div class="menu_card_img">
														<img src="'.$c_image['url'].'" alt="'.$c_image['alt'].'">';
												echo '</div>';
											}
											echo '<div class="menu_card_content">';
												echo get_field("static_content","option");
												echo '<a href="'.get_field("content_button_link","option").'">'.get_field("content_button_name","option").' <img src="'.get_template_directory_uri().'/assets/images/arrow-right-white.svg" alt="arrow-right-white.svg"></a>';
											echo '</div>';
											echo '</div>';
										echo '</div>';

									echo '</div>';
								echo '</div>';
							echo '</div>';
						while(has_sub_field("mega_add_menu_option","option"))
						{
							if(get_sub_field("main_heading","option") == "Markets")
							{
								$mega_menu_id = "marketsTrigger";
								$mega_menu_h_cls = 'markets-header-title';
								$mega_menu_cls = 'markets-menu';
							}
							if(get_sub_field("main_heading","option") == "Solutions")
							{
								$mega_menu_id = "solutionsTrigger";
								$mega_menu_h_cls = 'solutions-header-title';
								$mega_menu_cls = 'solutions-menu';
							}
							
							echo '<li><a class="header-title '.$mega_menu_h_cls.'" id="'.$mega_menu_id.'" href="'.get_sub_field("main_heading_link","option").'">'.get_sub_field("main_heading","option").'</a></li>';
							echo '<div class="'.$mega_menu_cls.' submenu">';
								echo '<div class="container">';
									echo '<div class="information">';
										echo '<div class="menu_title">'.get_sub_field("main_heading","option").'</div>';
										echo '<p>'.get_sub_field("short_description","option").'<p>';
									echo '</div>';
									echo '<div class="menus">';
										echo '<div class="menus-inner">';
										$sum_menu = get_sub_field("add_sub_menu_option","option");
											if(!empty($sum_menu))
											{
												

												foreach ($sum_menu as $_s_menus) {
												
												$_menu_pages = $_s_menus['add_pages'];
												

													echo '<div data-mh="product-menus" class="menu-single columns-'.count($sum_menu).'">';
														if(!empty($_s_menus['sub_menu_icon_img']))
														{
														 echo '<div class="menu-header imageandtext">';
														
														 echo '<a href="'.$_s_menus['learn_more_btn_link'].'">';
														 echo '<img class="imageandtext" src="'.$_s_menus['sub_menu_icon_img']['url'].'" alt="'.$_s_menus['sub_menu_icon_img']['alt'].'" />';
														 echo '</a>';
														echo '<a class="archive-link-header" href="'.$_s_menus['learn_more_btn_link'].'">';
														echo '<div class="imageandtext menu_sub_title">'.$_s_menus['sub_menu_heading'].'</div>';	
														echo '</a>';
														echo '</div>';
													}else
													{
														echo '<div class="menu-header">';
														echo '<a class="archive-link-header" href="'.$_s_menus['learn_more_btn_link'].'">';
														echo '<div class="menu_sub_title">'.$_s_menus['sub_menu_heading'].'</div>';	
														echo '</a>';
														echo '</div>';
													}
														
														foreach ($_menu_pages as $s_menus) {
															
															echo '<a href='.$s_menus['set_menu_link']['url'].'>'.$s_menus['set_menu_link']['title'].'</a>';
															}
														echo '<a data-mh="archive-link" class="archive-link" href='.$_s_menus['learn_more_btn_link'].'>'.$_s_menus['learn_more_btn_title'].'</a>';
													echo '</div>';		
												}
											}
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';		
						}
						echo '</ul>';
					}
				?>
			</div>
		</div>
	</div>
	<div class="mobile-menu">
		<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input name="s" type="text" placeholder="Search">
			<button id="searchSubmit" class="mobile-search-submit" type="submit"></button>
		</form>
		<div class="lower-menu">
			<?PHP wp_nav_menu(array('menu'=>'Main Menu','container_class' => 'menu-top-level-header-menu-container','menu_id' => 'menu-top-level-header-menu')); ?>
			<?php 
				if(get_field("mega_add_menu_option","option"))
				{
					$mega_menu_id = '';
					$mega_menu_cls = '';
					$mega_menu_h_cls = '';
					echo '<div class="menu_title"><a href="'.get_permalink(290).'">Products</a>';
						echo '<div class="arrow"></div>';
						echo '<div class="products-menu submenu">';
								echo '<div class="container">';
									echo '<div class="main_submenu">';
										if(get_field("add_category_menu","option"))
										{
										echo '<div class="submenu_item">';
											echo '<div class="sub_menu_title">'.get_field("cat_main_heading","option").'</div>';
											echo '<ul>';
											while (has_sub_field("add_category_menu","option")) {
												echo '<li><a href="'.get_sub_field("cat_menu_link","option").'">'.get_sub_field("cat_menu_name","option").'</a></li>';
											}
											echo '</ul>';
											echo '<a href="'.get_field("cat_btn_link","option").'" class="view_all_hardware">'.get_field("cat_btn_name","option").' <img src="'.get_template_directory_uri().'/assets/images/arrow-right-green.svg" alt="arrow-right-green.svg"></a>';
										echo '</div>';
										}
										if(get_field("add_page_menu","option"))
										{
											echo '<div class="submenu_item">';
												echo '<div class="sub_menu_title">'.get_field("pages_main_heading","option").'</div>';
												echo '<ul>';
												while (has_sub_field("add_page_menu","option")) {
													echo '<li><a href="'.get_sub_field("page_menu_link","option").'">'.get_sub_field("page_menu_name","option").'</a></li>';
												}
												echo '</ul>';
												echo '<a href="'.get_field("pages_btn_link","option").'" class="view_all_hardware">'.get_field("pages_btn_name","option").' <img src="'.get_template_directory_uri().'/assets/images/arrow-right-green.svg" alt="arrow-right-green.svg"></a>';
											echo '</div>';
										}
										$fargs = array(
								        'post_type'   => 'product',
								        'posts_per_page'   => 6,
								        'orderby'     => 'date',
								        'order'       => 'DESC' ,
								        'tax_query'  => array(
								            array(
								                'taxonomy' => 'product_visibility',
											    'field'    => 'name',
											    'terms'    => 'featured',
											    'operator' => 'IN',
								            )
								        )
								    );
										$query = new WP_Query($fargs);
						
										if ( $query->have_posts() ) {
										echo '<div class="submenu_item">';
											echo '<div class="featured_products_menu">';
												echo '<div class="fead_menu_title">'.get_field("feat_prod_main_heading","option").'</div>';
												echo '<ul>';
											while ( $query->have_posts() ){ $query->the_post();
                            				$p_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' );
												echo '<li><a href="'.get_permalink(get_the_ID()).'"><img src="'.$p_url[0].'" alt="'.get_the_title().'">'.get_the_title().'</a></li>';
												}		
												echo '</ul>';
											echo '</div>';
										echo '</div>';
										}wp_reset_postdata();
										echo '<div class="submenu_item">';
											echo '<div class="menu_card">';
											if(get_field("content_image","option"))
											{	
												$c_image = get_field("content_image","option");
												echo '<div class="menu_card_img">
														<img src="'.$c_image['url'].'" alt="'.$c_image['alt'].'">';
												echo '</div>';
											}
											echo '<div class="menu_card_content">';
												echo get_field("static_content","option");
												echo '<a href="'.get_field("content_button_link","option").'">'.get_field("content_button_name","option").' <img src="'.get_template_directory_uri().'/assets/images/arrow-right-white.svg" alt="arrow-right-white.svg"></a>';
											echo '</div>';
											echo '</div>';
										echo '</div>';

									echo '</div>';
								echo '</div>';
							echo '</div>';
					echo '</div>';	
					while(has_sub_field("mega_add_menu_option","option"))
					{
						if(get_sub_field("main_heading","option") == "Markets")
						{
							$mega_menu_id = "marketsTrigger";
							$mega_menu_h_cls = 'markets-header-title';
							$mega_menu_cls = 'markets-menu';
						}
						if(get_sub_field("main_heading","option") == "Solutions")
						{
							$mega_menu_id = "solutionsTrigger";
							$mega_menu_h_cls = 'solutions-header-title';
							$mega_menu_cls = 'solutions-menu';
						}
						

						
						echo '<div class="menu_title"><a href="'.get_sub_field("main_heading_link","option").'">'.get_sub_field("main_heading","option").'</a>';
						echo '<div class="arrow"></div>';
						echo '<div class="'.$mega_menu_cls.' submenu">';
							echo '<div class="container">';
								echo '<div class="information">';
									echo '<div class="menu_title">'.get_sub_field("main_heading","option").'</div>';
									echo '<p>'.get_sub_field("short_description","option").'<p>';
								echo '</div>';
								echo '<div class="menus">';
									echo '<div class="menus-inner">';
									$sum_menu = get_sub_field("add_sub_menu_option","option");
										if(!empty($sum_menu))
										{

											foreach ($sum_menu as $_s_menus) {
											$select_menus = $_s_menus['menu_select_pages'];

												echo '<div data-mh="product-menus" class="menu-single columns-'.count($sum_menu).'">';
													if(!empty($_s_menus['sub_menu_icon_img']))
													{
													 echo '<div class="menu-header imageandtext">';
													
													 echo '<a href="'.$_s_menus['learn_more_btn_link'].'">';
													 echo '<img class="imageandtext" src="'.$_s_menus['sub_menu_icon_img']['url'].'" alt="'.$_s_menus['sub_menu_icon_img']['alt'].'" />';
													 echo '</a>';
													echo '<a class="archive-link-header" href="'.$_s_menus['learn_more_btn_link'].'">';
													echo '<div class="imageandtext menu_sub_title">'.$_s_menus['sub_menu_heading'].'</div>';	
													echo '</a>';
													echo '</div>';
												}else
												{
													echo '<div class="menu-header">';
													echo '<a class="archive-link-header" href="'.$_s_menus['learn_more_btn_link'].'">';
													echo '<div class="menu_sub_title">'.$_s_menus['sub_menu_heading'].'</div>';	
													echo '</a>';
													echo '</div>';
												}
													
													foreach ($select_menus as $s_menus) {
														echo '<a href='.get_permalink($s_menus->ID).'>'.$s_menus->post_title.'</a>';
														}
													echo '<a data-mh="archive-link" class="archive-link" href='.$_s_menus['learn_more_btn_link'].'>'.$_s_menus['learn_more_btn_title'].'</a>';
												echo '</div>';		
											}
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '</div>';		
					}
					
				}
			?>
		</div>
	</div>		
</header>
<?php  if(!is_front_page()){ ?>
<div class="breadcrumbs-container section">
	<div class="container">
        <?php 
        if(function_exists('bcn_display'))
        {
           bcn_display();
        }
    ?>
	</div>
</div>
<?php } ?>