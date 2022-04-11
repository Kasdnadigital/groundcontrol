<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<?php while ( have_posts() ) : the_post(); $product = wc_get_product(get_the_ID()); ?>
	<section class="product_slider section">
		<?PHP wc_print_notices(); ?>
		<div class="small_container">
			<div class="slider_left">
				<?php 
				$_prd_imgs_ids = $product->get_gallery_image_ids();

				if(!empty($_prd_imgs_ids))
				{
					echo '<div class="slider_img">';
						echo '<div class="slider slider-for">';
						    foreach( $_prd_imgs_ids as $imgs_id ) {
						        $img_link = wp_get_attachment_url($imgs_id);
						        $img_alt  = esc_attr( get_post_meta($imgs_id, '_wp_attachment_image_alt', true) );
						        echo '<div>';
						        	echo '<img src="'.$img_link.'" alt="'.$img_alt.'">';
						        echo '</div>';
						    }
				    	echo '</div>';
				    	echo '<div class="slider slider-nav">';
				    		foreach( $_prd_imgs_ids as $imgs_id ) {
						        $img_link = wp_get_attachment_url($imgs_id);
						        $img_alt  = esc_attr( get_post_meta($imgs_id, '_wp_attachment_image_alt', true) );
						        echo '<div class="inner-slider-nav">';
						        	echo '<img src="'.$img_link.'" alt="'.$img_alt.'">';
						        echo '</div>';
						    }
				    	echo '</div>';
				    echo '</div>';
				}
				?>
			</div>
			<div class="slider_right">
				<?php $buying_options = get_field("buying_options",get_the_ID());?>
				<?php if($buying_options == "buy-and-enquire") { ?>
				<?php do_action( 'woocommerce_single_product_summary' ); ?>
				<?php if($product->get_price() == '') { ?>	
				<div class="custom_btn_grp no-price">
		            <a href="javascript:void(0);" class="inquire">Inquire</a>
		        </div>
			    <?php } else{ ?> 
			    	<div class="custom_btn_grp">
			            <a href="javascript:void(0);" class="inquire">Inquire</a>
			        </div>
			    <?php } ?>
		         <script>jQuery(document).ready(function($){ $('.custom_btn_grp').appendTo('form.cart'); $('.custom_btn_grp').css('display', 'block'); });</script>
		    	<?php } else if($buying_options == "enquire"){ ?>
		    		 <h1><?php echo get_the_title();?></h1>
		    		<div class="custom_btn_grp no-price">
		            	<a href="javascript:void(0);" class="inquire">Inquire</a>
			        </div>
		    	<?php } else if($buying_options == "buy-now"){ ?>
		    		<?php do_action( 'woocommerce_single_product_summary' ); ?>
		    	<?php } ?>
                <div class="content">
                	<?php echo $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );?>
                	<?php if(get_field("additional_cta",get_the_ID()))
			        {
			        	$add_cta_link = get_field("add_cta_link",get_the_ID());
			        	if(!empty($add_cta_link))
			        	{
			        		echo '<a href="'.get_permalink($add_cta_link->ID).'" class="btn">'.$add_cta_link->post_title.'</a>';	
			        	}	
			        }
			        ?>
                </div>
			</div>
		</div>
		<div class="modal product-module-modal product-enquire">
	        <div class="modal-wrapper">
	            <span class="close" id="closeProductModuleModal"></span>
	            <?php  
                $site_id = get_current_blog_id();
                if($site_id == 1)
                {
                 echo do_shortcode('[gravityform id="9" ajax="true" field_values="pname='.get_the_title().'"]'); 
                }else if($site_id == 4)
                {
                    echo do_shortcode('[gravityform id="24" ajax="true" field_values="pname='.get_the_title().'"]'); 
                }

                ?>
	        </div>
	    </div>	
	</section>
	<!--  Tab Module -->

	<?php if(get_field("add_tab_data",get_the_ID()))
	{
		echo '<section class="custom_tab section">';
			echo '<div class="small_container">';
				echo '<ul class="tab_menu">';
					$i=1;
					while (has_sub_field("add_tab_data",get_the_ID())) {
						$acls = '';
						if($i == 1)
						{
							$acls = "active";
						}
						$tab_title = get_sub_field("tab_title",get_the_ID());
						$key_title = "tab_section_".$i;

						echo '<li class="'.$acls.'"><a href="javascript:void(0)" id="'.$key_title.'">'.$tab_title.'</a></li>';
						$i++;
					}
				echo '</ul>';
				echo '<div class="tab_content">';
					$a=1;
					while (has_sub_field("add_tab_data",get_the_ID())) {
						$tab_title = get_sub_field("tab_title",get_the_ID());
						$key_title = "tab_section_".$a;
						$acls = '';
						if($a == 1)
						{
							$acls = "active";
						}
						echo '<div class="inner_tab_content '.$key_title.' '.$acls.'" >';
							echo '<h2 class="title">'.$tab_title.'</h2>';	
							echo get_sub_field("tab_content",get_the_ID());
						echo '</div>';	
						$a++;
					}
				echo '</div>';	
			echo '</div>';
		echo '</section>';
	}
	?>
	<!--  Video Section  -->
	
	<?php if(get_field("add_video",get_the_ID()))
	{
		echo '<section class="section">';
			echo '<div class="small_container">';
				while (has_sub_field("add_video",get_the_ID())) {
					if(get_sub_field("mast_video_embed_video_type",get_the_ID()) == "ext-vid")
					{

						echo '<div class="video">';
							echo get_sub_field("mast_video_embed_vid_external",get_the_ID());
						echo '</div>';
					}
				}
			echo '</div>';
		echo '</section>';
	}
	?>
	<!--  FAQ Section -->
	<?php if(get_field("mast_faq_qa",get_the_ID()))
	{
		echo '<section class="faq section">';
			echo '<div class="small_container">';
				echo '<h2>'.get_field("mast_faq_main_heading",get_the_ID()).'</h2>';
			while (has_sub_field("mast_faq_qa",get_the_ID())) {
				echo '<div class="accordion_item">';
					echo '<div class="faq_title">'.get_sub_field("mast_faq_ques",get_the_ID()).'<span class="arrow"></span></div>';
					echo '<div class="faq_details">';
						echo get_sub_field("mast_faq_ans",get_the_ID());
					echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		echo '</section>';	
	} 
	?>
	<!--  Media Upload  -->
	<?php if(get_field("mast_media_downloads_file",get_the_ID()))
	{
		
		if(get_field("mast_title_and_links_links_grp",get_the_ID()) == null && get_field("mast_history_slider_cards",get_the_ID()) == null && get_field("mast_history_slider_cards",get_the_ID()) == null)
		{
			$adspc = "add_space";
		}else
		{
			$adspc = '';
		}
		echo '<section class="documention section '.$adspc.'">';
			echo '<div class="container">';
				echo '<h2 class="title">'.get_field("mast_media_downloads_file_title",get_the_ID()).'</h2>';
				while (has_sub_field("mast_media_downloads_file",get_the_ID())) {
					$d_file = get_sub_field("mast_media_downloads_media",get_the_ID());

					echo '<a href="'.$d_file.'" class="download" download><img src="'.get_template_directory_uri().'/assets/images/download.svg" alt="download.svg">'.get_sub_field("mast_media_downloads_title",get_the_ID()).'</a>';
				}
			echo '</div>';
		echo '</section>';	
	}
	?>
	<!--  Title & Link Module -->
	<?php if(get_field("mast_title_and_links_links_grp",get_the_ID()))
	{
		
		if(get_field("mast_media_downloads_file",get_the_ID()) == null && get_field("mast_history_slider_cards",get_the_ID()) == null && get_field("mast_history_slider_cards",get_the_ID()) == null)
		{
			$adspc = "add_space";
		}else
		{
			$adspc = '';
		}
		echo '<section class="resource section '.$adspc.'">';
			echo '<div class="container">';
				echo '<h2 class="title">'.get_field("mast_title_and_links_title",get_the_ID()).'</h2>';
				echo '<ul>';
				while (has_sub_field("mast_title_and_links_links_grp",get_the_ID())) {
					$m_link = get_sub_field("mast_title_and_links_link",get_the_ID());
					echo '<li><a href="'.$m_link['url'].'">'.$m_link['title'].'</a></li>';
				}
				echo '</ul>';
			echo '</div>';
		echo '</section>';	
	}
	?>
	<!--  Photo Gallery -->
	<?php if(get_field("mast_history_slider_cards",get_the_ID()))
	{
		$p=1;
    	echo '<section class="page-module history-slider section product_history">';
    		echo '<div class="wrapper">';
    			if(get_field("p_cat_sld_heading",get_the_ID()))
    			{
    				echo '<h2 class="col-peach">'.get_field("p_cat_sld_heading",get_the_ID()).'</h2>';
    			}
    		echo '</div>';
    		echo '<div class="history-slider-container section">';
    		while (has_sub_field("mast_history_slider_cards",get_the_ID())) {
    			$his_img = get_sub_field("mast_history_slider_image",get_the_ID());
    			echo '<div class="single-card">';
    				echo '<div class="image-container section">';
    					if(!empty($his_img))
    					{
    						echo '<img src="'.$his_img['url'].'" alt="'.$his_img['alt'].'" />';
    					}
    				echo '</div>';
    				echo '<div class="card-content section">';
    					echo '<div class="col-peach date">'.get_sub_field("mast_history_slider_subtitle",get_the_ID()).'</div>';
    					echo '<h3>'.get_sub_field("mast_history_slider_title",get_the_ID()).'</h3>';
    					echo '<p>'.get_sub_field("mast_history_slider_content",get_the_ID()).'</p>';
    				echo '</div>';
    			echo '</div>';
    		}
    		echo '</div>';
    	echo '</section>';	  
    }
    ?>
     <?PHP 
     $postid = get_the_ID();
    $accessories = $product->get_upsell_ids($postid);
    if($accessories){
        ?>
<section class="related-products section">
    <div class="wrapper">
        <h2>Accessories</h2>
        <div class="products-container">
        	<div class="products-related">
        		<?PHP
		        foreach($accessories as $id => $apost){
		            $product = wc_get_product($apost);
		            ?>
		                <div class="single-product" data-mh="product-cards-accessories">
	                        <div class="image-container">
	                            <?PHP
	                            
	                                $p_url = wp_get_attachment_image_src( get_post_thumbnail_id($apost), 'single-post-thumbnail' );
			                            $product_price = $product->get_price();
	                                	$product_stock = $product->is_in_stock();
	                                if(!empty($p_url)){
	                                    echo '<div data-mh="product-thumbnails" class="product-thumb">';
	                                    echo '<a href="'.get_permalink($apost).'"><img data-type="product" data-mh="product-thumbnails-accessories-image" src="'.$p_url[0].'"/></a>';
	                                    echo '</div>';
	                                }
	                            
	                            ?>
	                        </div>
	                        <div class="content-container">
	                        	<div class="related-products-info">
		                            <h3><a href="<?php echo get_permalink($apost);?>"><?PHP echo get_the_title($apost); ?></a></h3>
		                            <?PHP
		                                echo '<p>'.$product->get_price_html().'</p>';
		                            ?>
		                        </div>
			                  	<div class="addtocart">
	                        		<?php 

	                        		if($product_price != '' && $product_stock == 1)
	                                {
	                                    echo do_shortcode('[add_to_cart id="' . get_the_ID() . '" show_price="false"]');
	                                }else if($product_price == '' || $product_stock == '')
	                                {
	                                    echo '<div class="read_more">';
	                                        echo '<a href="'.get_permalink(get_the_ID()).'" class="enquiry" >Inquire</a>';
	                                    echo '</div>';
	                                }

	                        		?>
	                        	</div>
	                        </div>
		                </div> 
		            <?PHP
		        } 
		        ?>
        	</div>
    	</div>
    </div>
</section>
<?PHP } ?>
    <!--  Related Product Section -->
   <?PHP 
   $postid = get_the_ID();
    $crosssells = get_post_meta( get_the_ID(), '_crosssell_ids' ); 

    if(count($crosssells)>0){ $r=1;
	?>
		<section class="related-products section">
		    <div class="wrapper">
		    <?PHP
		        $crosssells = $crosssells[0];
		        if(count($crosssells)>0){ ?>
		            <h2><?php echo get_field("p_related_heading",$postid); ?></h2>
		            <div class="products-container">
		               <div class="products-related">
		                <?PHP
		                $args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'post__in' => $crosssells );
		                $loop = new WP_Query( $args );
		                while ( $loop->have_posts() ) : $loop->the_post();?>
		                <div class="single-product">
		                        <div class="image-container">
		                            <?PHP
		                            $p_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' );
		                            $product_price = $product->get_price();
                                	$product_stock = $product->is_in_stock();

		                            $_prd_imgs_ids = $product->get_gallery_image_ids(); 
									if(!empty($p_url))
									{
								        echo '<div data-mh="product-thumbnails" class="product-thumb">';
								        	echo '<a href="'.get_permalink(get_the_ID()).'" ><img data-type="product" src="'.$p_url[0].'" alt="'.get_the_title().'"></a>';
								        echo '</div>';
									}
		                            ?>
		                        </div>
		                        <div class="content-container">
		                            <div class="related-products-info">
		                            <h3><a href="<?php echo get_permalink(get_the_ID());?>"><?PHP echo get_the_title(); ?></a></h3>
		                            <?PHP
		                                echo '<p>'.$product->get_price_html().'</p>';
		                            ?>
		                            </div>
		                        	<div class="addtocart">
		                        		<?php 

		                        		if($product_price != '' && $product_stock == 1)
                                        {
                                            echo do_shortcode('[add_to_cart id="' . get_the_ID() . '" show_price="false"]');
                                        }else if($product_price == '' || $product_stock == '')
                                        {
                                            echo '<div class="read_more">';
                                                echo '<a href="'.get_permalink(get_the_ID()).'" class="enquiry" >Inquire</a>';
                                            echo '</div>';
                                        }

		                        		?>
		                        	</div>
		                        </div>
		                </div> 
		            <?php endwhile; ?>
		            	</div>
		            </div>
		    <?PHP } ?>
		    </div>
		</section>
	<?PHP } ?>

	<?php endwhile; // end of the loop. ?>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */