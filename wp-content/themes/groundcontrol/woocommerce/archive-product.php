<?php
get_header();
global $wp_query;
$cat = $wp_query->get_queried_object();
$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
$cat_img = wp_get_attachment_url( $thumbnail_id );
$bk_pageid = get_term_meta( $cat->term_id, 'cat_page_link', true ); 


?>
<section class="product_list_banner section" style="background-image:url('<?php echo $cat_img; ?>">
    <div class="container">
        <div class="content">
            <h1><?php echo  single_cat_title(); ?></h1>
            <p><?php echo $cat->description;?></p>
            <?php if($bk_pageid){ ?>            
            <a href="<?php echo get_permalink($bk_pageid);?>" class="green_link">Find out more <img src="<?php echo get_template_directory_uri();?>/assets/images/arrow-right-green.svg" alt="arrow-right-green.svg"></a>
            <?php } ?>
        </div>
    </div>
</section>

    <?php
    $_site_id = get_current_blog_id();
    //error_reporting(0);
    global $wp_query;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    
         $all_products = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 12,
        'paged' => $paged,
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => 'total_sales',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $cat->term_id,
                'operator' => 'IN',
            )
        ),
        );
    
    ?>
<input type="hidden" value="<?php echo $cat->term_id; ?>" id="get_cat_id">
<input type="hidden" value="<?php echo $cat->taxonomy; ?>" id="get_cat_tax">
<input type="hidden" value="<?php echo $_site_id; ?>" id="site_id">

<section class="product_listing section">
    <div class="container">
            <div class="procust_sidebar">
                <div class="accordion">
                    <!-- Category : IoT M2M - Sidebar -->
                    <?php if($cat->slug == 'iot-m2m'){ ?>
                    <div id="sticky-sidebar">
                        <div id="filter_main" class="main_cat_iot" style="display:inline-block;">
                            <!-- Data Upload Speed -->
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Data Upload Speed<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_checkbox"> 
                                        <label for="cellular" class="mt-1"> Cellular
                                        <input type="checkbox" data-page="1" id="cellular" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="cellular" value="cellular">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div> 
                                    <div class="custom_checkbox">
                                        <label for="sbd" class="mt-1">Short Burst Data (SBD)
                                        <input type="checkbox" data-page="1" id="sbd" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="sbd" value="sbd">
                                        <span class="checkmark"></span>
                                        </label> 
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="88-kbps" class="mt-1">88 Kbps
                                        <input type="checkbox" data-page="1" id="88-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="88-kbps" value="88-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox"> 
                                        <label for="256-kbps" class="mt-1"> 256 Kbps
                                        <input type="checkbox" data-page="1" id="256-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="256-kbps" value="256-kbps">
                                        <span class="checkmark"></span>
                                        </label> 
                                    </div>
                                    <div class="custom_checkbox"> 
                                        <label for="448-kbps" class="mt-1"> 448 Kbps
                                        <input type="checkbox" data-page="1" id="448-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="448-kbps" value="448-kbps">
                                        <span class="checkmark"></span>
                                        </label> 
                                    </div>
                                   
                                </div>
                            </div>

                            <!-- Power -->
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Power <span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_checkbox">
                                        <label for="battery" class="mt-1"> Battery
                                        <input type="checkbox" data-page="1" id="battery" class="checkbox_dofilter form-check-input" data-type="power" name="battery" value="battery">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="solar_battery" class="mt-1"> Solar / Battery
                                        <input type="checkbox" data-page="1" id="solar_battery" class="checkbox_dofilter form-check-input" data-type="power" name="solar_battery" value="solar_battery">
                                        <span class="checkmark"></span>
                                        </label>
                                        
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="mains" class="mt-1"> Mains
                                        <input type="checkbox" data-page="1" id="mains" class="checkbox_dofilter form-check-input" data-type="power" name="mains" value="mains">
                                        <span class="checkmark"></span>
                                        </label>  
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile or Fixed -->
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Mobile or Fixed <span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_checkbox">
                                        <label for="mobile" class="mt-1"> Mobile
                                        <input type="checkbox" data-page="1" id="mobile" class="checkbox_dofilter form-check-input" data-type="mobile_or_fixed" name="mobile" value="mobile">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                    <label for="fixed" class="mt-1"> Fixed
                                    <input type="checkbox" data-page="1" id="fixed" class="checkbox_dofilter form-check-input" data-type="mobile_or_fixed" name="fixed" value="fixed">
                                    <span class="checkmark"></span>
                                    </label> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Category : IoT M2M - Sidebar -->

                    <!-- Category : Tracking - Sidebar -->
                    <?php if($cat->slug == 'tracking'){ ?>
                    <div id="sticky-sidebar">
                        <div id="filter_main" class="main_cat_iot" style="display:inline-block;">
                            
                            <!-- Tracking What? -->
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Tracking What? <span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_checkbox">
                                        <label for="aircraft" class="mt-1"> Aircraft
                                        <input type="checkbox" data-page="1" id="aircraft" class="checkbox_dofilter form-check-input" data-type="tracking_what" name="aircraft" value="aircraft">
                                        <span class="checkmark"></span>
                                        </label> 
                                   </div> 
                                    <div class="custom_checkbox">
                                        <label for="land-transport" class="mt-1"> Land Transport
                                        <input type="checkbox" data-page="1" id="land-transport" class="checkbox_dofilter form-check-input" data-type="tracking_what" name="land-transport" value="land-transport">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="marine-vessels" class="mt-1"> Marine Vessels
                                        <input type="checkbox" data-page="1" id="marine-vessels" class="checkbox_dofilter form-check-input" data-type="tracking_what" name="marine-vessels" value="marine-vessels">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    
                                    <div class="custom_checkbox">
                                        <label for="people" class="mt-1"> People
                                        <input type="checkbox" data-page="1" id="people" class="checkbox_dofilter form-check-input" data-type="tracking_what" name="people" value="people">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Power -->
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Power <span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_checkbox">
                                        <label for="battery" class="mt-1"> Battery
                                        <input type="checkbox" data-page="1" id="battery" class="checkbox_dofilter form-check-input" data-type="power" name="battery" value="battery">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="custom_checkbox">
                                        <label for="mains" class="mt-1"> Mains
                                        <input type="checkbox" data-page="1" id="mains" class="checkbox_dofilter form-check-input" data-type="power" name="mains" value="mains">
                                        <span class="checkmark"></span>
                                        </label> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Category : Tracking - Sidebar -->

                    <!-- Category : portable - Sidebar -->
                    <?php if($cat->slug == 'portable'){ ?>
                    <div id="sticky-sidebar">
                        <div id="filter_main" class="main_cat_iot" style="display:inline-block;">

                                <!-- Data Upload Speed -->
                                <div class="accordion_item">
                                    <div class="js-accordion-link open">Data Upload Speed<span class="arrow"></span></div>
                                    <div class="js-accordion-details">
                                        <div class="custom_checkbox">
                                            <label for="variable" class="mt-1">Variable
                                            <input type="checkbox" data-page="1" id="variable" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="variable" value="variable">
                                            <span class="checkmark"></span>
                                            </label> 
                                        </div>
                                        <div class="custom_checkbox"> 
                                            <label for="352-kbps" class="mt-1"> 352 Kbps
                                            <input type="checkbox" data-page="1" id="352-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="352-kbps" value="352-kbps">
                                            <span class="checkmark"></span>
                                            </label> 
                                        </div>

                                        <div class="custom_checkbox">
                                            <label for="444-kbps" class="mt-1"> 444 Kbps
                                            <input type="checkbox" data-page="1" id="444-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="444-kbps" value="444-kbps">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="custom_checkbox">
                                            <label for="448-kbps" class="mt-1"> 448 Kbps
                                            <input type="checkbox" data-page="1" id="448-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="448-kbps" value="448-kbps">
                                            <span class="checkmark"></span>
                                            </label> 
                                        </div>

                                        
                                        <div class="custom_checkbox">
                                            <label for="650-kbps" class="mt-1"> 650 Kbps
                                            <input type="checkbox" data-page="1" id="650-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="650-kbps" value="650-kbps">
                                            <span class="checkmark"></span>
                                            </label> 
                                        </div>
                                    </div>
                                </div>

                                <!-- Battery Life -->
                                <div class="accordion_item">
                                    <div class="js-accordion-link open">Battery Life<span class="arrow"></span></div>
                                    <div class="js-accordion-details">
                                        <div class="custom_checkbox">
                                            <label for="3.5-hours" class="mt-1"> 3.5 hours
                                            <input type="checkbox" id="3.5-hours" class="checkbox_dofilter form-check-input" data-type="battery_life" name="3.5-hours" value="3.5-hours">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="custom_checkbox">
                                            <label for="4-hours" class="mt-1"> 4 hours
                                            <input type="checkbox" id="4-hours" class="checkbox_dofilter form-check-input" data-type="battery_life" name="4-hours" value="4-hours">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="custom_checkbox">
                                            <label for="5-hours" class="mt-1"> 5 hours
                                            <input type="checkbox" id="5-hours" class="checkbox_dofilter form-check-input" data-type="battery_life" name="5-hours" value="5-hours">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="custom_checkbox">
                                            <label for="5.5-hours" class="mt-1"> 5.5 hours
                                            <input type="checkbox" id="5.5-hours" class="checkbox_dofilter form-check-input" data-type="battery_life" name="5.5-hours" value="5.5-hours">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="custom_checkbox">
                                            <label for="6-hours" class="mt-1"> 6 hours
                                            <input type="checkbox" id="6-hours" class="checkbox_dofilter form-check-input" data-type="battery_life" name="6-hours" value="6-hours">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="custom_checkbox">
                                            <label for="10-hours" class="mt-1"> 10 hours
                                            <input type="checkbox" id="10-hours" class="checkbox_dofilter form-check-input" data-type="battery_life" name="10-hours" value="10-hours">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- IP Rating -->
                                <div class="accordion_item">
                                    <div class="js-accordion-link open">IP Rating<span class="arrow"></span></div>
                                    <div class="js-accordion-details">
                                         <div class="custom_radio">
                                            <label for="ip55" class="mt-1"> IP55
                                            <input type="radio" id="ip55" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip_rating" value="ip55">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="custom_radio">
                                            <label for="ip65" class="mt-1"> IP65
                                            <input type="radio" id="ip65" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip_rating" value="ip65">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>
                                         <div class="custom_radio">
                                            <label for="ip66" class="mt-1"> IP66
                                            <input type="radio" id="ip66" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip_rating" value="ip66">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="custom_radio">
                                            <label for="ip67" class="mt-1"> IP67
                                            <input type="radio" id="ip67" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip_rating" value="ip67">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <!-- Airtime Provider -->
                                <div class="accordion_item">
                                    <div class="js-accordion-link open">Airtime Provider<span class="arrow"></span></div>
                                    <div class="js-accordion-details">
                                        <div class="custom_checkbox">
                                            <label for="cellular" class="mt-1"> Cellular
                                            <input type="checkbox" data-page="1" id="cellular" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="cellular" value="cellular">
                                            <span class="checkmark"></span>    
                                            </label>
                                        </div>
                                        
                                         <div class="custom_checkbox">
                                            <label for="thuraya" class="mt-1"> Thuraya
                                            <input type="checkbox" data-page="1" id="thuraya" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="thuraya" value="thuraya">
                                            <span class="checkmark"></span>    
                                            </label>
                                        </div>

                                        <div class="custom_checkbox">
                                            <label for="inmarsat" class="mt-1"> Inmarsat     <input type="checkbox" data-page="1" id="inmarsat" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="inmarsat" value="inmarsat">
                                            <span class="checkmark"></span>
                                            </label>
                                        </div>

                                       
                                        <div class="custom_checkbox">
                                            <label for="iridium" class="mt-1"> Iridium
                                            <input type="checkbox" data-page="1" id="iridium" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="iridium" value="iridium">
                                            <span class="checkmark"></span>    
                                            </label> 
                                        </div> 
                                    </div>
                                </div>
    
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Category : portable - Sidebar -->

                     <!-- Category : handheld - Sidebar -->
                    <?php if($cat->slug == 'handheld'){ ?>
                    <div id="sticky-sidebar">
                        <div id="filter_main" class="main_cat_iot" style="display:inline-block;">
                            
                           
                            <!-- IP Rating -->
                            <div class="accordion_item">
                                <div class="js-accordion-link open">IP Rating<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                     
                                    <div class="custom_radio">
                                        <label for="ip65" class="mt-1"> IP65
                                        <input type="radio" id="ip65" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip_rating" value="ip65">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    
                                    <div class="custom_radio">
                                        <label for="ip67" class="mt-1"> IP67
                                        <input type="radio" id="ip67" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip_rating" value="ip67">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <!-- Airtime Provider -->
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Airtime Provider<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_checkbox">
                                        <label for="inmarsat" class="mt-1"> Inmarsat     <input type="checkbox" data-page="1" id="inmarsat" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="inmarsat" value="inmarsat">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                   
                                    <div class="custom_checkbox">
                                        <label for="iridium" class="mt-1"> Iridium
                                        <input type="checkbox" data-page="1" id="iridium" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="iridium" value="iridium">
                                        <span class="checkmark"></span>    
                                        </label> 
                                    </div> 
                                </div>
                            </div>

                            <!-- Talk time -->
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Talk Time<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_checkbox">
                                        <label for="4-hours" class="mt-1"> 4 hours
                                        <input type="checkbox" data-page="1" id="4-hours" class="checkbox_dofilter form-check-input" data-type="talk_time" name="4-hours" value="4-hours">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="custom_checkbox">
                                        <label for="6.5-hours" class="mt-1"> 6.5 hours
                                        <input type="checkbox" data-page="1" id="6.5-hours" class="checkbox_dofilter form-check-input" data-type="talk_time" name="6.5-hours" value="6.5-hours">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="custom_checkbox">
                                        <label for="7-hours" class="mt-1"> 7 hours
                                        <input type="checkbox" data-page="1" id="7-hours" class="checkbox_dofilter form-check-input" data-type="talk_time" name="7-hours" value="7-hours">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="custom_checkbox">
                                        <label for="8-hours" class="mt-1"> 8 hours
                                        <input type="checkbox" data-page="1" id="8-hours" class="checkbox_dofilter form-check-input" data-type="talk_time" name="8-hours" value="8-hours">
                                        <span class="checkmark"></span>
                                        </label> 
                                    </div> 
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Category : handheld - Sidebar -->

                    <!-- Category : Mobile - Sidebar -->
                    <?php if($cat->slug == 'mobile-satellite'){ ?>
                    <div id="sticky-sidebar">
                        <div id="filter_main" class="main_cat_iot" style="display:inline-block;">
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Data Upload Speed<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                     <div class="custom_checkbox">
                                        <label for="variable" class="mt-1">Variable
                                        <input type="checkbox" data-page="1" id="variable" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="variable" value="variable">
                                        <span class="checkmark"></span>
                                        </label> 
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="2-mbps" class="mt-1"> 2 Mbps
                                        <input type="checkbox" data-page="1" id="2-mbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="2-mbps" value="2-mbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="3-kbps" class="mt-1"> 3 Mbps
                                        <input type="checkbox" data-page="1" id="3-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="3-kbps" value="3-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="custom_checkbox">
                                        <label for="5-kbps" class="mt-1"> 5 Mbps
                                        <input type="checkbox" data-page="1" id="5-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="5-kbps" value="5-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="150-kbps" class="mt-1">150 Kbps
                                        <input type="checkbox" data-page="1" id="150-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="150-kbps" value="150-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="225-kbps" class="mt-1"> 225 Kbps
                                        <input type="checkbox" data-page="1" id="225-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="225-kbps" value="225-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="custom_checkbox">
                                        <label for="352-kbps" class="mt-1"> 352 Kbps
                                        <input type="checkbox" data-page="1" id="352-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="352-kbps" value="352-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="custom_checkbox">
                                        <label for="444-kbps" class="mt-1"> 444 Kbps
                                        <input type="checkbox" data-page="1" id="444-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="444-kbps" value="444-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="464-kbps" class="mt-1"> 464 Kbps
                                        <input type="checkbox" data-page="1" id="464-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="464-kbps" value="464-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="448-kbps" class="mt-1"> 448 Kbps
                                        <input type="checkbox" data-page="1" id="448-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="448-kbps" value="448-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="custom_checkbox">
                                        <label for="492-kbps" class="mt-1"> 492 Kbps
                                        <input type="checkbox" data-page="1" id="492-kbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="492-kbps" value="492-kbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
     
                                </div>
                            </div>
                            <div class="accordion_item">
                                <div class="js-accordion-link open">IP Rating<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_radio">
                                        <label for="ip55" class="mt-1"> IP55
                                        <input type="radio" data-page="1" id="ip55" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip55" value="ip55">
                                        <span class="checkmark"></span>
                                        </label> 
                                    </div> 
                                    <div class="custom_radio">
                                        <label for="ip56" class="mt-1"> IP56
                                        <input type="radio" data-page="1" id="ip56" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip56" value="ip56">
                                        <span class="checkmark"></span>
                                        </label>  
                                    </div>
                                    <div class="custom_radio">
                                        <label for="ip66" class="mt-1"> IP66
                                        <input type="radio" data-page="1" id="ip66" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip66" value="ip66">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_radio">
                                        <label for="ip67" class="mt-1"> IP67
                                        <input type="radio" data-page="1" id="ip67" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ip67" value="ip67">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_radio">
                                        <label for="ipx6" class="mt-1"> IPX6
                                        <input type="radio" id="ipx6" class="checkbox_dofilter form-check-input" data-type="ip_rating" name="ipx6" value="ipx6">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Airtime Provider<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_checkbox">    
                                        <label for="cellular" class="mt-1"> Cellular
                                        <input type="checkbox" data-page="1" id="cellular" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="cellular" value="cellular">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="galaxy-18" class="mt-1"> Galaxy 18
                                        <input type="checkbox" data-page="1" id="galaxy-18" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="galaxy-18" value="galaxy-18">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="inmarsat" class="mt-1"> Inmarsat
                                        <input type="checkbox" data-page="1" id="inmarsat" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="inmarsat" value="inmarsat">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                      <div class="custom_checkbox">
                                        <label for="iridium" class="mt-1"> Iridium
                                        <input type="checkbox" data-page="1" id="iridium" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="iridium" value="iridium">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                     <div class="custom_checkbox">
                                        <label for="kvh" class="mt-1"> KVH
                                        <input type="checkbox" data-page="1" id="kvh" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="kvh" value="kvh">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                     <div class="custom_checkbox">
                                        <label for="ses2" class="mt-1"> SES2
                                        <input type="checkbox" data-page="1" id="ses2" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="ses2" value="ses2">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>


                                    <div class="custom_checkbox">
                                        <label for="thuraya" class="mt-1"> Thuraya
                                        <input type="checkbox" data-page="1" id="thuraya" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="thuraya" value="thuraya">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <!-- Category : Mobile - Sidebar -->
                    <?php if($cat->slug == 'fixed'){ ?>
                    <div id="sticky-sidebar">
                        <div id="filter_main" class="main_cat_iot" style="display:inline-block;">
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Data Upload Speed<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_checkbox">
                                        <label for="2-mbps" class="mt-1"> 2 Mbps
                                        <input type="checkbox" data-page="1" id="2-mbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="2-mbps" value="2-mbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="custom_checkbox">
                                        <label for="3-mbps" class="mt-1"> 3 Mbps
                                        <input type="checkbox" data-page="1" id="3-mbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="3-mbps" value="3-mbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="custom_checkbox">
                                        <label for="5-mbps" class="mt-1"> 5 Mbps
                                        <input type="checkbox" data-page="1" id="5-mbps" class="checkbox_dofilter form-check-input" data-type="data_upload_speed" name="5-mbps" value="5-mbps">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                          
                                </div>
                            </div>
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Location<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    <div class="custom_radio">
                                        <label for="land" class="mt-1"> Land
                                        <input type="radio" data-page="1" id="land" class="checkbox_dofilter form-check-input" data-type="location" name="location" value="land">
                                        <span class="checkmark"></span>
                                        </label> 
                                    </div>
                                    <div class="custom_radio">
                                        <label for="sea" class="mt-1"> Sea
                                        <input type="radio" data-page="1" id="sea" class="checkbox_dofilter form-check-input" data-type="location" name="location" value="sea">
                                        <span class="checkmark"></span>
                                        </label> 
                                    </div> 
                                   
                                </div>
                            </div>
                            <div class="accordion_item">
                                <div class="js-accordion-link open">Airtime Provider<span class="arrow"></span></div>
                                <div class="js-accordion-details">
                                    
                                    <div class="custom_checkbox">
                                        <label for="galaxy-18" class="mt-1"> Galaxy 18
                                        <input type="checkbox" data-page="1" id="galaxy-18" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="galaxy-18" value="galaxy-18">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                     <div class="custom_checkbox">
                                        <label for="kvh" class="mt-1"> KVH
                                        <input type="checkbox" data-page="1" id="kvh" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="kvh" value="kvh">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                     <div class="custom_checkbox">
                                        <label for="ses2" class="mt-1"> SES2
                                        <input type="checkbox" data-page="1" id="ses2" class="checkbox_dofilter form-check-input" data-type="airtime_provider" name="ses2" value="ses2">
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <?php if($cat->slug == 'accessory'){}else{ ?>
                <button class="clear_filter reset" data-page="1">Clear filters</button>
                <?php } ?>

                <div class="got_quetion">
                <h3>Got a question?</h3>
                <a href="<?php echo get_permalink(287);?>" class="green_link">Get in touch <img src="<?php echo get_template_directory_uri();?>/assets/images/arrow-right-green.svg" alt="arrow-right-green.svg"></a>
              </div>
            </div>
            <!-- Category : Mobile - Sidebar -->
            <div class="product_list_items">
                <div class="top_select">
                    <div class="box">
                        <select name="sortby" class="sortby custom_select2" data-page="1" data-type="sortby">
                                <option value="popularity" selected="selected">Sort by popularity</option>
                                <option value="date">Sort by latest</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>
                </div>
                <div id="show_product_view">
                    <div class="product_list_multiple_items">
                        
                        <?php
                        global $product;
                       
                        $loop = new WP_Query( $all_products );
                        $i=1;
                        if ( $loop->have_posts() ) {
                            while ( $loop->have_posts() ){ $loop->the_post();
                                
                                $product = wc_get_product();
                                
                                $product_price = $product->get_price();
                                $product_stock = $product->is_in_stock();
                                $image = wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');

                                $add_to_cart = do_shortcode('[add_to_cart id="' . get_the_ID() . '" show_price="false"]');
                                $gc_pbttl_one = get_post_meta( get_the_ID(), 'gc_pbttl_one', true );
                                $gc_pbclr_one = get_post_meta( get_the_ID(), 'gc_pbclr_one', true );

                                $gc_pbttl_two = get_post_meta( get_the_ID(), 'gc_pbttl_two', true );
                                $gc_pbclr_two = get_post_meta( get_the_ID(), 'gc_pbclr_two', true );
                                //$total_sales = get_post_meta( get_the_ID(), 'total_sales', true );
                                
                            ?>
                            <div class="single_item post-<?php echo get_the_ID(); ?>">
                                <div class="inner_single_item">
                                    <a href="<?php echo get_permalink(get_the_ID()) ?>" class="product-bdage">
                                    <?php 
                                    if (!empty($gc_pbttl_one)){ 
                                        echo '<span class="own_brand" style="background-color:'.$gc_pbclr_one.';" >'.$gc_pbttl_one.'</span>';
                                    }
                                    if (!empty($gc_pbttl_two)){ 
                                        echo '<span class="featured" style="background-color:'.$gc_pbclr_two.';">'.$gc_pbttl_two.'</span>';
                                    }

                                    ?>
                                    <div data-mh="product-thumbnails" class="product-thumb img"><?php echo $image; ?></div>
                                    </a>
                                    <div class="product-info" data-mh="product">
                                        <h3 class="card-title"><a href="<?php echo get_permalink(get_the_ID()) ?>">
                                            <?php echo get_the_title(); ?>
                                        </a></h3>
                                        <h4>
                                            <?PHP 
                                                if(get_field('buying_options') == 'enquire'){}else{
                                                echo $product->get_price_html();}
                                            ?>
                                        </h4>
                                    </div>    
                                        <?php 
                                        if(get_field('buying_options') == 'enquire'){
                                            echo '<div class="read_more">';
                                                echo '<a href="javascript:void(0);" class="enquiry" >Inquire</a>';
                                            echo '</div>';
                                        }
                                        else{
                                            if($product_price != '' && $product_stock == 1)
                                            {
                                                echo $add_to_cart;
                                            }
                                            else if($product_price == '' || $product_stock == '' || get_field('buying_options') == 'enquire')
                                            {
                                                echo '<div class="read_more">';
                                                    echo '<a href="javascript:void(0);" class="enquiry" >Inquire</a>';
                                                echo '</div>';
                                            }    
                                        }
                                        

                                         ?>
                                        <?php echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
                                        ?>
                                    
                                </div>    
                            </div>
                            <div class="modal product-module-modal product-enquire" id="product-enquire_<?php echo $i;?>">
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
                        <?php //}
                            $i++; }
                        } 
                        wp_reset_postdata(); ?>
                        
                    </div>                    
                </div>
            </div>
        
    </div>

<?php
$numer_of_pages = $loop->max_num_pages;
?>
<input type="hidden" name="total_pages" class="total_pages" value="<?php echo $numer_of_pages; ?>">
<input type="hidden" name="sortby_val" class="sortby_val" value="popularity">
<input type="hidden" name="cur_page" class="cur_page" value="<?php echo $paged; ?>">
<section class="pagination section">
      <div class="container pagination_cls">
        <ul>
         <?php 
            // echo $paged;
            
            if($paged > 1) {
                $prev_page = $paged - 1;
                echo '<li><a class="prev page-numbers" data-page="'. $prev_page .'"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>';
            }
            
            for ($i = 1; $i <= $numer_of_pages; $i++) {
                if( $paged == $i ) {
                    echo '<li><span aria-current="page" class="page-numbers current">'. $i .'</span></li>';
                } else {
                    echo '<li><a class="page-numbers" data-page="'.$i.'">'. $i .'</a></li>';
                }
            }
            
            if($paged != $numer_of_pages) {
                $next_page = $paged + 1;
                echo '<li><a class="next page-numbers" data-page="'. $next_page .'"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>';
            }
            ?>
            </ul>
        </div>
    </section>
</section>
<?PHP get_footer(); ?>