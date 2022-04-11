<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

	<?php 
	if(get_field("phone_banner_block","option"))
	{
		echo '<div class="phone-banner">';
			echo '<div class="wrapper">';	
				echo '<div class="usa-number">';
					echo '<p>'.get_field("foot_usa_phone_number_heading","option").'</p>';
					echo '<a href="tel:'.get_field('foot_usa_phone_number',"option").'">'.get_field('foot_usa_phone_number',"option").'</a>';
				echo '</div>';
				echo '<div class="eu-number">';
					echo '<p>'.get_field("foot_europe_phone_number_heading","option").'</p>';
					echo '<a href="tel:'.get_field('foot_europe_phone_number',"option").'">'.get_field('foot_europe_phone_number',"option").'</a>';
				echo '</div>';
				echo '<div class="contact-page">';
					echo '<a href="'.get_field('foot_contact_page_link',"option").'">'.get_field('foot_contact_page_title',"option").'</a>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
	 ?>
	<footer class="site-footer section">
		<div class="container">
			<div class="top-level">
				<div class="top-col-1">
					<?php
						wp_nav_menu(array('menu'=>'Footer Menu 1'));
					 ?>
				</div>
				<div class="top-col-2">
					<?php
						wp_nav_menu(array('menu'=>'Footer Menu 2'));
					 ?>
				</div>
				<div class="top-col-3">
					<?php echo get_field("foot_contact_info","option"); ?>
				</div>
			</div>
			<div class="mid-level">
				<div class="mid-col-1">
		          <?php $site_logo = get_field("foot_logo_img","option");
					if(!empty($site_logo))
					{
						echo '<a href="'.home_url().'">';
							echo '<img id="siteLogo" src="'.$site_logo['url'].'" alt ="'.$site_logo['alt'].'">';	
						echo '</a>';
					}
					?>
		        </div>
		        <div class="mid-col-2">
		        	<?php 
		        		if(get_field("foot_social_icons_menu","option"))
		        		{
		        			while (has_sub_field("foot_social_icons_menu","option")) {
		        				
		        				echo '<a href="'.get_sub_field('foot_social_icon_link').'" target="_blank">';
		        				$social_icon = get_sub_field('foot_social_icon_img');

		        				echo file_get_contents( get_attached_file($social_icon) ); 
		        				echo '</a>';
		        			}
		        		}
		        	?>
		        </div>
			</div>		        
	        <div class="bot-level">
		        <div class="bot-row-1">
		          <div class="row-inner">
		            <?php wp_nav_menu(array('menu'=>'Footer Menu 3')); ?>
		          </div>
		        </div>
		        <div class="bot-row-2"><p><?php echo get_field('foot_copyright_text','option');?></p></div>
	       </div>
			
		</div>
	</footer> 
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NRBRQK7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
   
	<?php wp_footer(); ?>
	

	</body>
</html>