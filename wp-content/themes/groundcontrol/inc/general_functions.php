<?php

/* START: Address Cards */
function general_acf_mast_module_address_cards($main_module_loop, $i)
{
    $mast_add_address_card = $main_module_loop['mast_add_address_card'];
    if($mast_add_address_card) {
        echo '<section class="page-module address-cards section" id="section'.$i.'">';
            echo '<div class="wrapper">'; 
                echo '<div class="module-wrapper">'; 
                foreach ($mast_add_address_card as $key => $sin_address_card) {
                    echo '<div class="address-card-holder">';
                        echo '<div class="address-card">';
                            echo '<h2 class="col-peach">'.$sin_address_card['mast_card_loc_nam'].'</h2>';
                            echo '<address class="col-darkblue">'.$sin_address_card['mast_card_address'].'</address>';
                            $illegalChars = array('()', ' ', '(', ')','+','-',); 
                            $phoneNumber = $sin_address_card['mast_card_ph_num']; 
                            $phoneNumber = str_replace($illegalChars, '', $phoneNumber);
                            
                            $email = $sin_address_card['mast_card_email_id'];

                            echo '<div class="address-block">';
                                echo '<div class="address-link-holder">';
                                    echo '<a class="col-blue" href="tel:'.$phoneNumber.'">'.$sin_address_card['mast_card_ph_num'].'</a>';
                                echo '</div>';
                            
                                echo '<div class="address-link-holder">';
                                    echo '<a class="col-darkblue" href="mailto:'.$email.'">'.$email.'</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            echo '</div>';
        echo '</section>';
        echo '<script>';
            echo 'jQuery(document).ready(function($){';
                echo "$('.address-card h2').matchHeight();";
            echo '});';
        echo '</script>';
    }
}
/* END: Address Cards */

/* START: Contact Details Columns */
function general_acf_mast_module_contact_details_columns($main_module_loop, $i)
{
    $mast_cdc_add_columns = $main_module_loop['mast_cdc_add_columns'];
    $mast_cdc_oh_caption = $main_module_loop['mast_cdc_oh_caption'];
    $add_time = $main_module_loop['add_time'];

    echo '<section class="page-module contact-details-columns section" id="section'.$i.'">';
    if($mast_cdc_add_columns) {
        echo '<div class="contact-details-wrapper">';
            echo '<div class="wrapper">';
                echo '<div class="module-wrapper">';
                    $column_count = count($mast_cdc_add_columns);
                    foreach ($mast_cdc_add_columns as $key => $sin_column) {
                        echo '<div class="column col-'.$column_count.'">';
                        echo '<h2 class="col-peach">'.$sin_column['mast_cdc_column_title'].'</h2>';
                        if ($sin_column['mast_cdc_add_sections']) {
                            foreach ($sin_column['mast_cdc_add_sections'] as $key => $sin_col_sect) {
                                echo '<div class="section">';
                                    echo '<h3 class="col-blue">'.$sin_col_sect['mast_cdc_section_title'].'</h3>';
                                    echo '<div class="contact-details">';
                                        if ($sin_col_sect['mast_cdc_contect_details']) {
                                            foreach ($sin_col_sect['mast_cdc_contect_details'] as $key => $sin_cnt_detail) {
                                                echo '<div class="contact-information">';
                                                if ($sin_cnt_detail['mast_cdc_con_detail_type'] == 'ph_num') {
                                                    echo '<div class="icon-holder icon-holder--phone bg-blue"></div>';
                                                    $illegalChars = array('()', ' ', '(', ')','+','-',); 
                                                    $phoneNumber = $sin_cnt_detail['mast_cdc_contect_details_ph_num']; 
                                                    $phoneNumber_tel = str_replace($illegalChars, '', $phoneNumber);
                                                    echo '<a class="col-darkblue" href="tel:'.$phoneNumber_tel.'">'.$phoneNumber.'</a>';
                                                }
                                                if ($sin_cnt_detail['mast_cdc_con_detail_type'] == 'fax') {
                                                    echo '<div class="icon-holder icon-holder--fax bg-peach"></div>';
                                                    $illegalChars = array('()', ' ', '(', ')','+','-',); 
                                                    $faxNumber = $sin_cnt_detail['mast_cdc_contect_details_fax']; 
                                                    $faxNumber_tel = str_replace($illegalChars, '', $faxNumber);
                                                    echo '<a class="col-darkblue" href="tel:'.$faxNumber_tel.'">'.$faxNumber.'</a>';
                                                }
                                                if ($sin_cnt_detail['mast_cdc_con_detail_type'] == 'email') {
                                                    echo '<div class="icon-holder icon-holder--email bg-lightgreen"></div>';

                                                    echo '<a class="col-darkblue" href="mailto:'.$sin_cnt_detail['mast_cdc_contect_details_email'].'">'.$sin_cnt_detail['mast_cdc_contect_details_email'].'</a>';
                                                }
                                                echo '</div>';
                                            }
                                        }
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    if($add_time) {
        echo '<div class="wrapper">';
            echo '<div class="opening-hours">';
                if ($mast_cdc_oh_caption != "") {
                    echo '<div class="left">';
                    echo '<p>'.$mast_cdc_oh_caption.'</p>';
                    echo '</div>';
                }

                if ($add_time != "") {
                echo '<div class="right">';
                    foreach ($add_time as $key => $sin_add_time) {
                        echo '<div class="info">';
                            echo '<p><strong>'.$sin_add_time['mast_cdc_oh_time_title'].'</strong></p>';
                            echo '<p>'.$sin_add_time['mast_cdc_oh_time_info'].'</p>';
                        echo '</div>';
                    }
                echo '</div>';
                }
            echo '</div>';
        echo '</div>';
    }

    echo '</section>';

    echo '<script>';
        echo 'jQuery(document).ready(function($){';
            echo "$('.contact-details-columns .column h2').matchHeight();";
        echo '});';
    echo '</script>';
    
}
/* END: Contact Details Columns */

/* START: Form Block */
function general_acf_mast_module_form_block($main_module_loop, $i)
{
    $mast_cfrm_title = $main_module_loop['mast_cfrm_title'];
    $mast_cfrm_content = $main_module_loop['mast_cfrm_content'];
    $mast_cfrm_shortcode = $main_module_loop['mast_cfrm_shortcode'];
    $mast_cfrm_bg_color = $main_module_loop['mast_cfrm_bg_color'];

    if ($mast_cfrm_shortcode != "") { ?>
    <section class="page-module form-block section" id="section<?php echo $i; ?>">
        <div class="wrapper">
           <div class="form-wrapper" style="background-color: <?php echo $mast_cfrm_bg_color; ?>;">
                <div class="content-section">
                    <?php if ($mast_cfrm_title != ""): ?>
                    <h2><?php echo $mast_cfrm_title; ?></h2>
                    <?php endif; ?>
                    <?php if ($mast_cfrm_content != ""): ?>
                    <?php echo $mast_cfrm_content; ?>
                    <?php endif; ?>
                </div>
                <div class="contact-section">
                    <?php echo do_shortcode($mast_cfrm_shortcode);?>
                </div>
           </div>
        </div>
    </section>
    <?php
    }
}
/* END: Form Block */

/* START: Inline Title and Content */
function general_acf_mast_module_inline_title_and_content($main_module_loop, $i)
{
    $mast_inline_title_and_content_title = $main_module_loop['mast_inline_title_and_content_title'];
    $mast_inline_title_and_content_content = $main_module_loop['mast_inline_title_and_content_content']; ?>
    <section class="page-module inline-title-and-content section" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <?php if ($mast_inline_title_and_content_title != ""): ?>
            <h2 class="module-title"><?php echo $mast_inline_title_and_content_title; ?></h2>
            <?php endif; ?>
            <?php if ($mast_inline_title_and_content_content != ""): ?>
            <span class="module-content content"><?php echo $mast_inline_title_and_content_content; ?></span>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
/* END: Inline Title and Content */

/* START: List Columns */
function general_acf_mast_module_list_columns($main_module_loop, $i)
{
    $mast_list_columns_column_repeater = $main_module_loop['mast_list_columns_column_repeater'];

    if ($mast_list_columns_column_repeater != "") { ?>
    <section class="page-module list-columns section" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <div class="list-container">
                <?php foreach ($mast_list_columns_column_repeater as $key => $sin_list_col): ?>
                    <div class="single-step">
                        <div class="icon-container">
                            <img src="<?php echo $sin_list_col['mast_list_columns_icon']['url']; ?>" alt="<?php echo $sin_list_col['mast_list_columns_icon']['alt']; ?>" />
                        </div>
                        <div class="content-container">
                            <h2 class="col-blue"><?php echo $sin_list_col['mast_list_columns_title']; ?></h2>
                            <p><?php echo $sin_list_col['mast_list_columns_content']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    }
}
/* END: List Columns */

/* START: Title, Content and Image */
function general_acf_mast_module_title_content_and_image($main_module_loop, $i)
{
    $mast_ttl_cnt_img_cnt_grp = $main_module_loop['mast_title_content_and_image_content_grp'];
    $mast_ttl_cnt_img_cnt_image = $main_module_loop['mast_title_content_and_image_image'];
    $mast_ttl_cnt_img_cnt_order = $main_module_loop['mast_title_content_and_image_order'];

    if ($mast_ttl_cnt_img_cnt_grp != "") { ?>
    <section class="page-module title-content-and-image section" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <?php if ( $mast_ttl_cnt_img_cnt_order == 'clir' ): ?>
                <div class="content-container">
                    <h2><?php echo $mast_ttl_cnt_img_cnt_grp['mast_title_content_and_image_title']; ?></h2>
                    <div class="content">
                        <?php echo $mast_ttl_cnt_img_cnt_grp['mast_title_content_and_image_content']; ?>
                    </div>
                </div>
                <div class="image-container left">
                    <img src="<?php echo $mast_ttl_cnt_img_cnt_image['url']; ?>" alt="<?php echo $mast_ttl_cnt_img_cnt_image['alt']; ?>" />
                </div>
            <?php else: ?>
                <div class="image-container right">
                    <img src="<?php echo $mast_ttl_cnt_img_cnt_image['url']; ?>" alt="<?php echo $mast_ttl_cnt_img_cnt_image['alt']; ?>" />
                </div>
                <div class="content-container">
                    <h2><?php echo $mast_ttl_cnt_img_cnt_grp['mast_title_content_and_image_title']; ?></h2>
                    <div class="content">
                        <?php echo $mast_ttl_cnt_img_cnt_grp['mast_title_content_and_image_content']; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
    }
}
/* END: Title, Content and Image */

/* START: History Slider */
function general_acf_mast_module_history_slider($main_module_loop, $i)
{
    $mast_history_slider_title = $main_module_loop['mast_history_slider_title'];
    $mast_history_slider_cards = $main_module_loop['mast_history_slider_cards'];

    if ($mast_history_slider_cards != "") { ?>
    <section class="page-module history-slider section" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <?php if ($mast_history_slider_title != ""): ?>
            <h2 class="col-peach"><?php echo $mast_history_slider_title; ?></h2>
            <?php endif; ?>
        </div>
        <div class="history-slider-container section">
            <?php foreach ($mast_history_slider_cards as $key => $sin_hist_slide): ?>
                <div class="single-card">
                    <div class="image-container section">
                        <img src="<?php echo $sin_hist_slide['mast_history_slider_image']['url']; ?>" alt="<?php echo $sin_hist_slide['mast_history_slider_image']['alt']; ?>" />
                    </div>
                    <div class="card-content section">
                        <div class="col-peach date"><?php echo $sin_hist_slide['mast_history_slider_subtitle']; ?></div>
                        <h3><?php echo $sin_hist_slide['mast_history_slider_title']; ?></h3>
                        <p><?php echo $sin_hist_slide['mast_history_slider_content']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
    }
}
/* END: History Slider */

/* START: Key People */
function general_acf_mast_module_key_people($main_module_loop, $i)
{ 
    $mast_key_people_title = $main_module_loop['mast_key_people_title'];
    $mast_key_people_team = $main_module_loop['mast_key_people_team'];

    if ($mast_key_people_team != "") { ?>
    <section class="page-module key-people section" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <?php if ($mast_key_people_title != ""): ?>
            <h2 class="col-peach"><?php echo $mast_key_people_title; ?></h2>
            <?php endif; ?>
            <?php foreach ($mast_key_people_team as $key => $sin_key_ppl):  ?>
                <div class="single-person">
                    <div class="headshot">
                        <img src="<?php echo $sin_key_ppl['mast_key_people_headshot']['url']; ?>" alt="<?php echo $sin_key_ppl['mast_key_people_headshot']['alt']; ?>" />
                        <div class="biography-container">
                            <?php echo $sin_key_ppl['mast_key_people_biography']; ?>
                        </div>
                    </div>
                    <div class="information">
                        <span class="people-name"><?php echo $sin_key_ppl['mast_key_people_name']; ?></span>
                        <h3><?php echo $sin_key_ppl['mast_key_people_job_title']; ?></h3>

                        <?php if ($sin_key_ppl['mast_key_people_social_media'] != ""): ?>
                            <?php foreach ($sin_key_ppl['mast_key_people_social_media'] as $key => $sin_kp_sm): ?>
                                <a class="social" href="<?php echo $sin_kp_sm['mast_key_people_sm_link']; ?>" target="_blank">
                                    <img src="<?php echo $sin_kp_sm['mast_key_people_sm_icon']['url']; ?>" alt="<?php echo $sin_kp_sm['mast_key_people_sm_icon']['alt']; ?>"/>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
    }
}
/* END: Key People */

/* START: Content and Quote */
function general_acf_mast_module_content_and_quote($main_module_loop, $i)
{
    $mast_cnt_with_qua_mnttl = $main_module_loop['mast_content_with_qua_main_title'];
    $mast_cnt_with_qua_cnt = $main_module_loop['mast_content_with_qua_content'];
    $mast_cnt_with_qua_card_cnt = $main_module_loop['mast_content_with_qua_card_content'];
    $mast_cnt_with_qua_card_cnt_bgcl = $main_module_loop['mast_content_with_qua_card_content_bg_col'];
    $mast_cnt_with_qua_card_cnt_ordr = $main_module_loop['mast_content_with_qua_card_content_order']; ?>
    <section class="page-module content-and-quote section" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <?php if ($mast_cnt_with_qua_card_cnt_ordr == 'clcr'): ?>
                <div class="quote-content right" style="background-color: <?php echo $mast_cnt_with_qua_card_cnt_bgcl; ?>;">
                    <?php echo $mast_cnt_with_qua_card_cnt; ?>
                </div>
                <div class="content-container">
                    <?php if ($mast_cnt_with_qua_mnttl != ""): ?>
                    <h2 class="col-peach"><?php echo $mast_cnt_with_qua_mnttl; ?></h2>
                    <?php endif; ?>
                    <div class="content"><?php echo $mast_cnt_with_qua_cnt; ?></div>
                </div>
            <?php else: ?>
                <div class="content-container">
                    <?php if ($mast_cnt_with_qua_mnttl != ""): ?>
                    <h2 class="col-peach"><?php echo $mast_cnt_with_qua_mnttl; ?></h2>
                    <?php endif; ?>
                    <div class="content"><?php echo $mast_cnt_with_qua_cnt; ?></div>
                </div>
                <div class="quote-content left" style="background-color: <?php echo $mast_cnt_with_qua_card_cnt_bgcl; ?>;">
                    <?php echo $mast_cnt_with_qua_card_cnt; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
/* END: Content and Quote */

/* START: Text Grid */
function general_acf_mast_module_text_grid($main_module_loop, $i)
{
    $mast_txt_grid_subtitle = $main_module_loop['mast_text_grid_subtitle'];
    $mast_txt_grid_title = $main_module_loop['mast_text_grid_title'];
    $mast_txt_grid_grid_rpt = $main_module_loop['mast_text_grid_grid_repeater']; ?>
    <section class="page-module text-grid section" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <?php if ($mast_txt_grid_subtitle != ""): ?>
            <span class="sub-title"><?php echo $mast_txt_grid_subtitle; ?></span>
            <?php endif ?>

            <?php if ($mast_txt_grid_title != ""): ?>
            <h2><?php echo $mast_txt_grid_title; ?></h2>
            <?php endif;?>
            
            <div class="grid-text-container">
                <?php foreach ($mast_txt_grid_grid_rpt as $key => $sin_txt_grid): ?>
                    <div class="single-text">
                        <h3 data-mh="grid-text-title"><?php echo $sin_txt_grid['mast_text_grid_rep_title']; ?></h3>
                        <div class="content">
                            <?php echo $sin_txt_grid['mast_text_grid_rep_content']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}
/* END: Text Grid */

/* START: Steps/List */
function general_acf_mast_module_stepslist($main_module_loop, $i)
{
    $mast_stepslist_title = $main_module_loop['mast_stepslist_title'];
    $mast_stepslist_steps = $main_module_loop['mast_stepslist_steps'];
    if ($mast_stepslist_steps != "") { ?>
    <section class="page-module stepslist section" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <?php if($mast_stepslist_title != ""):?>
            <h2 class="col-peach"><?php echo $mast_stepslist_title; ?></h2>
            <?php endif;?>

            <?php foreach ($mast_stepslist_steps as $key => $sin_step): ?>
                <?php if($key % 2 != 0): ?>
                    <div class="single-step left">
                        <div data-mh="content" class="image-container left">
                            <img class="left" src="<?php echo $sin_step['mast_stepslist_icon']['url']; ?>" alt="<?php echo $sin_step['mast_stepslist_icon']['alt']; ?>" />
                        </div>
                        <div data-mh="content" class="content-container-wrapper <?php echo $sin_step['mast_stepslist_color_scheme']; ?>">
                            <div class="title-container">
                                <h3><?php echo $sin_step['mast_stepslist_title']; ?></h3>
                            </div>
                            <div class="content-container">
                                <p><?php echo $sin_step['mast_stepslist_content']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="single-step right">
                        <div data-mh="content" class="content-container-wrapper <?php echo $sin_step['mast_stepslist_color_scheme']; ?>">
                            <div class="title-container">
                                <h3><?php echo $sin_step['mast_stepslist_title']; ?></h3>
                            </div>
                            <div class="content-container">
                                <p><?php echo $sin_step['mast_stepslist_content']; ?></p>
                            </div>
                        </div>
                        <div data-mh="content" class="image-container right">
                            <img class="left" src="<?php echo $sin_step['mast_stepslist_icon']['url']; ?>" alt="<?php echo $sin_step['mast_stepslist_icon']['alt']; ?>" />
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
    }
}
/* END: Steps/List */

/* START: Become a Partner */
function general_acf_mast_module_become_a_partner($main_module_loop, $i)
{
    $mast_bcm_prtnr_left_content = $main_module_loop['mast_bcm_prtnr_left_content'];
    $mast_bcm_prtnr_rgt_img = $main_module_loop['mast_bcm_prtnr_rgt_img'];
    $mast_bcm_prtnr_bg_col = $main_module_loop['mast_bcm_prtnr_bg_col']; ?>

    <section class="footer-module become-a-partner section <?php echo $mast_bcm_prtnr_bg_col; ?>" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <div data-mh="footer-module-partner" class="left-section">
                <h2 class="col-lightgreen"><?php echo $mast_bcm_prtnr_left_content['mast_bcm_prtnr_title']; ?></h2>
                <span class="content"><?php echo $mast_bcm_prtnr_left_content['mast_bcm_prtnr_content']; ?></span>
                
                <?php if ($mast_bcm_prtnr_left_content['mast_bcm_prtnr_cta_btns'] != ""): ?>
                    <?php foreach ($mast_bcm_prtnr_left_content['mast_bcm_prtnr_cta_btns'] as $cta_key => $sin_bcmprt_cta):

                        $randid = rand(0,100000);
                        if($cta_key % 2 != 0 )
                        {
                            $btn_class = 'btn-black';
                        } else {
                            $btn_class = 'btn-white';
                        }

                        $form_sec_id = $cta_key+1; ?>
                    <a class="modal-footer-module btn <?=$btn_class;?>" data-form="<?php echo $form_sec_id; ?>" data-randid="<?=$randid;?>" href="#"><?php echo$sin_bcmprt_cta['mast_bcm_prtnr_cta_btn_txt']; ?></a>

                    <div class="modal-form" id="<?php echo 'form-'.$form_sec_id.'-'.$randid; ?>" style="display: none;"><?PHP echo do_shortcode($sin_bcmprt_cta['mast_bcm_prtnr_cta_btn_frm_code']);?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php if ($mast_bcm_prtnr_rgt_img != ""): ?>
            <img data-mh="footer-module-partner" src="<?php echo $mast_bcm_prtnr_rgt_img['url']; ?>" alt="<?php echo $mast_bcm_prtnr_rgt_img['alt']; ?>" />
        <?php endif; ?>
        </div>
    </section>
    <div class="modal footer-module-modal">
        <div class="modal-wrapper">
            <span class="close" id="closeFooterModuleModal"></span>
        </div>
    </div>
    <?php
}
/* END: Become a Partner */

/* START: Anchor Link List */
function general_acf_mast_module_anchor_link_list($main_module_loop, $i)
{
    $mast_anch_main_heading = $main_module_loop['mast_anch_main_heading'];
    $mast_anch_bg_col = $main_module_loop['mast_anch_bg_col'];
    $mast_anch_add_links = $main_module_loop['mast_anch_add_links'];

    if ($mast_anch_add_links != "") { ?>
    <section class="page-module anchor-link-list section" id="section<?php echo $i; ?>" style="background-color: <?php echo $mast_anch_bg_col; ?>;">
        <div class="wrapper">
            <?php if ($mast_anch_main_heading != ""): ?>
            <h2 class="col-peach"><?php echo $mast_anch_main_heading; ?></h2>
            <?php endif; ?>

            <?php if ($mast_anch_add_links != ""): ?>
            <div class="module-wrapper">
                <?php foreach ($mast_anch_add_links as $key => $sin_ql_item): ?>
                    <a href="#section<?php echo $sin_ql_item['mast_anch_module_num']; ?>" data-linkto="section<?php echo $sin_ql_item['mast_anch_module_num']; ?>"><?php echo $sin_ql_item['mast_anch_link']; ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
    }
}
/* END: Anchor Link List */

/* START: Content with Background */
function general_acf_mast_module_content_with_bg($main_module_loop, $i)
{
    $mast_content_with_background_content = $main_module_loop['mast_content_with_background_content'];
    $mast_content_with_background_bg_color = $main_module_loop['mast_content_with_background_bg_color'];

    if ($mast_content_with_background_content != "") { ?>
    <section class="page-module content-with-background section" id="section<?php echo $i; ?>">
        <div class="wrapper">
            <div class="content-section section <?php echo 'bg-'.$mast_content_with_background_bg_color; ?> ">
                <?php echo $mast_content_with_background_content; ?>
            </div>
        </div>
    </section>
    <?php
    }
}
/* END: Content with Background */

/* START: FAQs */
function general_acf_mast_module_faqs($main_module_loop, $i)
{
    $mast_faq_main_heading = $main_module_loop['mast_faq_main_heading'];
    $mast_faq_qa = $main_module_loop['mast_faq_qa'];
    $mast_faq_layout = $main_module_loop['mast_faq_layout'];

    if ($mast_faq_qa != "") { ?>
        <section class="page-module faqs section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_faq_main_heading != ""): ?>
            <h2><?php echo $mast_faq_main_heading; ?></h2>
            <?php endif; ?>

            <div class="faq-container section <?php echo $mast_faq_layout; ?>">
                <?PHP $faquniid = rand(0,999999999); // Get a random parent ID incase two FAQ modules are present ?>
                <?php foreach ($mast_faq_qa as $key => $sin_faq_qa): ?>
                    <div class="single-faq" data-faqid="faq-<?=$faquniid;?>-<?=$key;?>">
                        <div class="title-container"><h3><?php echo $sin_faq_qa['mast_faq_ques'];?></h3><span></span></div>
                        <div class="answer-container"><span class="content"><?php echo $sin_faq_qa['mast_faq_ans'];?></span></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section> <?php
    }
}
/* END: FAQs */

/* START: Media Downloads */
function general_acf_mast_module_media_downloads($main_module_loop, $i)
{
    $mast_media_downloads_file = $main_module_loop['mast_media_downloads_file'];

    if ($mast_media_downloads_file != "") { ?>
    <section class="page-module media-downloads section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="files-container">
                <?php foreach ($mast_media_downloads_file as $key => $sin_med_dw): ?>
                    <div class="single-file">
                        <a href="<?php echo $sin_med_dw['mast_media_downloads_media']; ?>">
                            <div class="icon-container"></div>
                            <div class="file-title"><p><?php echo $sin_med_dw['mast_media_downloads_title']; ?></p></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section> <?php
    }
}
/* END: Media Downloads */

/* START: Content */
function general_acf_mast_module_content($main_module_loop, $i)
{
    $mast_only_content = $main_module_loop['mast_only_content'];
    $mast_only_content_width = $main_module_loop['mast_only_content_width'];

    if ($mast_only_content != "") { ?>
    <section class="page-module content section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="width-<?php echo $mast_only_content_width; ?>">
                <?php echo $mast_only_content; ?>
            </div>
        </div>
    </section> <?php
    }
}
/* END: Content */

/* START: Video Embed */
function general_acf_mast_module_video_embed($main_module_loop, $i)
{
    $mast_video_embed_video_type = $main_module_loop['mast_video_embed_video_type'];
    $mast_video_embed_vid_internal = $main_module_loop['mast_video_embed_vid_internal'];
    $mast_video_embed_vid_external = $main_module_loop['mast_video_embed_vid_external']; ?>
    <section class="page-module video-embed section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="video-container">
                <?php if ($mast_video_embed_video_type == "int-vid"): ?>
                    <video width="812" height="463" controls>
                        <source src="<?php echo $mast_video_embed_vid_internal; ?>" type="video/mp4">
                    </video>
                <?php else: ?>
                    <?php echo $mast_video_embed_vid_external; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        jQuery(document).ready(function($) { jQuery(".page-module.video-embed .video-container iframe").removeAttr("style"); });
    </script> <?php
}
/* END: Video Embed */

/* START: Card Layout */
function general_acf_mast_module_card_layout($main_module_loop, $i)
{
    $mast_cardlay_main_heading = $main_module_loop['mast_cardlay_main_heading'];
    $mast_cardlay_bg_color = $main_module_loop['mast_cardlay_bg_color'];
    $mast_cardlay_add_cards_data = $main_module_loop['mast_cardlay_add_cards_data'];

    if ($mast_cardlay_add_cards_data != "") { ?>
    <section class="page-module card-layout section" id="section<?php echo $i;?>" style="background-color: <?php echo $mast_cardlay_bg_color; ?>;">
        <div class="wrapper">
            <?php if ($mast_cardlay_main_heading != ""): ?>
                <h2><?php echo $mast_cardlay_main_heading; ?></h2>
            <?php endif; ?>

            <div class="cards-container">
                <?php foreach ($mast_cardlay_add_cards_data as $key => $sin_acd): 
                        
                    ?>
                    <a href="<?php echo $sin_acd['mast_cardlay_link']['url']; ?>" target="_self"  class="single-card <?php echo 'bg-'.$sin_acd['mast_cardlay_col_scheme']; ?>" data-mh="card-layout-link">
                        <div class="image-container">
                            <img src="<?php echo $sin_acd['mast_cardlay_img']['url']; ?>" alt="<?php echo $sin_acd['mast_cardlay_img']['alt']; ?>" />
                        </div>
                        <div class="content-container">
                            <h3 data-mh="card-layout-h4"><?php echo $sin_acd['mast_cardlay_title']; ?></h3>
                            <p data-mh="card-layout-p"><?php echo $sin_acd['mast_cardlay_content']; ?></p>
                            <span><?php echo $sin_acd['mast_cardlay_link']['title'];?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section> <?php
    }
}
/* END: Card Layout */

/* START: iframe */
function general_acf_mast_module_embed_code($main_module_loop, $i)
{
    $mast_iframe_code = $main_module_loop['mast_iframe_code'];
    if ($mast_iframe_code != "") { ?>
    <section class="page-module iframe section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="flex-container">
                <?php echo $mast_iframe_code; ?>
            </div>
        </div>
    </section> <?php
    }
}
/* END: iframe */

/* START: Full Width Image */
function general_acf_mast_module_full_width_image($main_module_loop, $i)
{
    $mast_fwimg_imgwidth = $main_module_loop['mast_fwimg_imgwidth'];
    $mast_fwimg_imgurl = $main_module_loop['mast_fwimg_imgurl'];
    
    if ($mast_fwimg_imgurl != "") { ?>
    <section class="page-module full-width-image section" id="section<?php echo $i;?>">
        <?php if ($mast_fwimg_imgwidth == "full"): ?>
            <img src="<?php echo $mast_fwimg_imgurl['url']; ?>" alt="<?php echo $mast_fwimg_imgurl['alt']; ?>" />
        <?php else: ?>
            <div class="wrapper">
                <img src="<?php echo $mast_fwimg_imgurl['url']; ?>" alt="<?php echo $mast_fwimg_imgurl['alt']; ?>" />
            </div>
        <?php endif; ?>
    </section> <?php
    }
}
/* END: Full Width Image */

/* START: Image with Content Within */
function general_acf_mast_module_image_with_content_within($main_module_loop, $i)
{
    $mast_imgwcntw_bg_img = $main_module_loop['mast_imgwcntw_bg_img'];
    $mast_imgwcntw_title = $main_module_loop['mast_imgwcntw_title'];
    $mast_imgwcntw_content = $main_module_loop['mast_imgwcntw_content'];
    $mast_imgwcntw_cuslink = '';
    $mast_imgwcntw_cuslink_btn = '';
    $mast_imgwcntw_link = '';
    if(isset($main_module_loop['mast_imgwcntw_customlinkoption']))
    {
        $mast_imgwcntw_cuslink = $main_module_loop['mast_imgwcntw_cuslink'];
        $mast_imgwcntw_cuslink_btn = $main_module_loop['mast_imgwcntw_cuslink_btn'];
    }else
    {
        $mast_imgwcntw_link = $main_module_loop['mast_imgwcntw_link'];
    }
    $mast_imgwcntw_content_align = $main_module_loop['mast_imgwcntw_content_align'];

    $mast_imgwcntw_bg_img_url = "";
    if ($mast_imgwcntw_bg_img != "") {
        $mast_imgwcntw_bg_img_url = "background-image:url('$mast_imgwcntw_bg_img');";
    } ?>
    
    <section class="page-module image-with-content-within section" style="<?php echo $mast_imgwcntw_bg_img_url; ?>" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="inner-container <?php echo $mast_imgwcntw_content_align; ?>">
                <div class="content-container ">
                    <?php if ($mast_imgwcntw_title != ""): ?>
                    <h2><?php echo $mast_imgwcntw_title; ?></h2>
                    <?php endif; ?>

                    <?php if ($mast_imgwcntw_content != ""): ?>
                    <p><?php echo $mast_imgwcntw_content; ?></p>
                    <?php endif; ?>
                    
                    <?php if ($mast_imgwcntw_link != "" && !isset($main_module_loop[' mast_imgwcntw_customlinkoption'])) { ?>
                        <a href="<?php echo get_the_permalink($mast_imgwcntw_link); ?>" target="_self"><?php echo get_the_title($mast_imgwcntw_link); ?></a>
                    <?php } else { ?>
                         <a href="<?php echo $mast_imgwcntw_cuslink; ?>" target="_self"><?php echo $mast_imgwcntw_cuslink_btn ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section> <?php
}
/* END: Image with Content Within */

/* START: Table */
function general_acf_mast_module_table($main_module_loop, $i)
{
    $mast_table_width = $main_module_loop['mast_table_width'];
    $mast_table_table_content = $main_module_loop['mast_table_table_content'];
    
    if ($mast_table_table_content != "") { ?>
    <section class="page-module table section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="table-container width-<?php echo $mast_table_width; ?>">
                <table border="0">

                    <?php if ( $mast_table_table_content['caption'] != "" ): ?>
                        <caption><?php echo $mast_table_table_content['caption']; ?></caption>
                    <?php endif; ?>

                    <?php if ($mast_table_table_content['header'] != ""): ?>                        
                        <thead>
                            <tr>
                                <?php foreach ($mast_table_table_content['header'] as $key => $sin_tbl_head): ?>
                                    <th><?php echo $sin_tbl_head['c']; ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                    <?php endif; ?>

                    <?php if ($mast_table_table_content['body'] != ""): ?>                        
                    <tbody>
                        <?php foreach ($mast_table_table_content['body'] as $key => $sin_tbl_tr): ?>
                            <tr>
                                <?php foreach ($sin_tbl_tr as $key => $sin_tbl_td): ?>
                                <td><?php echo $sin_tbl_td['c']; ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </section> <?php
    }
}
/* END: Table */

/* START: General Information */
function general_acf_mast_module_general_information($main_module_loop, $i)
{
    $mast_geninfo_title = $main_module_loop['mast_general_info_title'];
    $mast_geninfo_links = $main_module_loop['mast_general_info_links'];
    $mast_geninfo_content_group = $main_module_loop['mast_general_info_content_group'];
    $mast_geninfo_image = $main_module_loop['mast_general_info_image']; ?>

    <section class="page-module general-information section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="content-container">
                <?php if ($mast_geninfo_title != ""): ?>
                <h2 id="informationSection"><?php echo $mast_geninfo_title; ?></h2>
                <?php endif; ?>

                <?php if ($mast_geninfo_links != ""): ?>
                    <div class="button-containers">
                    <?php foreach ($mast_geninfo_links as $key => $sin_geninfo_link):

                        $pid = $sin_geninfo_link['mast_general_info_link'];

                        $link_btntxt = "";
                        if ($sin_geninfo_link['mast_general_info_custom_txt_forbtn'] == 1) {
                            $link_btntxt = $sin_geninfo_link['mast_general_info_custom_text_for_link_btn'];
                            $link_url = $sin_geninfo_link['mast_general_info_custom_for_link_btn'];
                        } else {
                            $link_btntxt = get_the_title($pid);
                            $link_url = get_the_permalink($pid);
                        }

                        $geninf_anch_mdl = $sin_geninfo_link['mast_general_info_anchor_module']; ?>

                        <?php if ($sin_geninfo_link['mast_general_info_onpg_link'] == ""): ?>
                            <a class="<?php echo $sin_geninfo_link['mast_general_info_bg_col']; ;?>" href="<?php echo $link_url; ?>" target="_self" ><?php echo $link_btntxt;?></a>
                        
                        <?php else: ?>
                        
                            <a class="<?php echo $sin_geninfo_link['mast_general_info_bg_col']; ;?>"href="#section<?php echo $geninf_anch_mdl['mast_general_info_mdl_nmbr'] ;?>"><?php echo $geninf_anch_mdl['mast_general_info_link_txt'] ;?></a>

                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($mast_geninfo_content_group != ""): ?>
                    <div class="content">
                        <h3 class="subtitle"><?php echo $mast_geninfo_content_group['mast_general_info_subtitle']; ?></h3>
                        <?php echo $mast_geninfo_content_group['mast_general_info_content']; ?>
                    </div>
                <?php endif; ?>

                <?php if ($mast_geninfo_image != ""): ?>
                <div class="image-container">
                    <img src="<?php echo $mast_geninfo_image['url']; ?>" alt="<?php echo $mast_geninfo_image['alt']; ?>" />
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <a class="return-to-top" href="#informationSection"></a> <?php
}
/* END: General Information */

/* START: Featured Product Group */
function general_acf_mast_module_featured_product_group($main_module_loop, $i)
{
    $mast_fpg_cont_image = $main_module_loop['mast_fpg_cont_image'];
    $mast_fpg_cont_title = $main_module_loop['mast_fpg_cont_title'];
    $mast_fpg_contents = $main_module_loop['mast_fpg_contents'];

    $mast_fpg_cont_link = $main_module_loop['mast_fpg_cont_link'];
    $mast_fpg_custom_link_text = $main_module_loop['mast_fpg_custom_link_text'];
    $mast_fpg_custom_link_texbtn = $main_module_loop['mast_fpg_custom_link_texbtn'];
    $mast_fpg_custom_link_urlbtn = $main_module_loop['mast_fpg_custom_link_urlbtn'];
    
    $mast_fpg_product = $main_module_loop['mast_fpg_product'];
    $mast_fpg_order = $main_module_loop['mast_fpg_order'];
    $mast_fpg_bg_color = $main_module_loop['mast_fpg_bg_color'];


    $fpg_link_txt = "";
    $fpg_link_url = "";
    if ($mast_fpg_custom_link_text != "" && $mast_fpg_custom_link_urlbtn != "") {
        $fpg_link_txt = $mast_fpg_custom_link_texbtn;
        $fpg_link_url = $mast_fpg_custom_link_urlbtn;
    } else {
        $fpg_link_txt = get_the_title($mast_fpg_cont_link);
        $fpg_link_url = get_the_permalink($mast_fpg_cont_link);
    } ?>

    <section class="page-module featured-product-group section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="product-showcase <?php echo $mast_fpg_bg_color; ?>">
                <?php $prd_cnt = count($mast_fpg_product); ?>
                
                <?php if ($mast_fpg_order == 'clpr'): ?>
                <div class="content-container product-<?php echo $prd_cnt; ?>">
                    <?php if ($mast_fpg_cont_image != ""): ?>
                        <img data-mh="cardimg" src="<?php echo $mast_fpg_cont_image['url']; ?>" alt="<?php echo $mast_fpg_cont_image['alt']; ?>" />
                    <?php else: ?>
                        <h2><?php echo $mast_fpg_cont_title; ?></h2>
                    <?php endif; ?>

                    <?php if ($mast_fpg_contents != ""): ?>
                        <?php echo $mast_fpg_contents; ?>
                    <?php endif; ?>

                    <a href="<?php echo $fpg_link_url; ?>" target="_self"><?php echo $fpg_link_txt; ?></a>
                </div>

                <div class="products-container products-<?php echo $prd_cnt; ?>">
                    <?php if ($mast_fpg_product != ""): ?>
                        <?php foreach ($mast_fpg_product as $key => $sin_fpg_prod_item): ?>   
                            <?php if ($sin_fpg_prod_item['mast_fpg_product_content_style'] == "ctac"): ?>
                            <div class="single-product product-<?php echo $prd_cnt; ?> product-cta product-right <?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_bg_color']; ?>">

                                <?php if ($sin_fpg_prod_item['mast_fpg_product_ctac_title'] != ""): ?>    
                                <h3><?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_title']; ?></h3>
                                <?php endif; ?>

                                <?php if ($sin_fpg_prod_item['mast_fpg_product_ctac_content'] != ""): ?>    
                                <?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_content']; ?>
                                <?php endif; ?>

                                <a href="<?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_call_to_action']['url']; ?>" target="_self"><?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_call_to_action']['title']; ?></a>
                            </div>
                            <?php else: ?>
                            <div class="single-product product-<?php echo $prd_cnt; ?> product-right" data-product-id="<?php echo $sin_fpg_prod_item['mast_fpg_sel_prod']; ?>">
                                <a href="<?php echo get_the_permalink($sin_fpg_prod_item['mast_fpg_sel_prod']); ?>">
                                    <?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($sin_fpg_prod_item['mast_fpg_sel_prod']), 'full' ); ?>
                                    <div class="product-image">
                                        <img data-mh="cardimg" src="<?php echo $featured_image_url; ?>" alt="<?php echo $sin_fpg_prod_item['mast_fpg_product_title']; ?>" />
                                    </div>
                                    <div class="product-information">
                                        <?php if ($sin_fpg_prod_item['mast_fpg_product_title'] != ""): ?>
                                        <h3><?php echo $sin_fpg_prod_item['mast_fpg_product_title']; ?></h3>
                                        <?php else: ?>
                                        <h3><?php echo get_the_title($sin_fpg_prod_item['mast_fpg_sel_prod']); ?></h3>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <?php else: ?>
                <div class="products-container products-<?php echo $prd_cnt; ?>">
                    <?php if ($mast_fpg_product != ""): ?>
                        <?php foreach ($mast_fpg_product as $key => $sin_fpg_prod_item): ?>   
                            <?php if ($sin_fpg_prod_item['mast_fpg_product_content_style'] == "ctac"): ?>
                            <div class="single-product product-<?php echo $prd_cnt; ?> product-cta product-right <?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_bg_color']; ?>">

                                <?php if ($sin_fpg_prod_item['mast_fpg_product_ctac_title'] != ""): ?>    
                                <h3><?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_title']; ?></h3>
                                <?php endif; ?>

                                <?php if ($sin_fpg_prod_item['mast_fpg_product_ctac_content'] != ""): ?>    
                                <?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_content']; ?>
                                <?php endif; ?>

                                <a href="<?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_call_to_action']['url']; ?>" target="_self"><?php echo $sin_fpg_prod_item['mast_fpg_product_ctac_call_to_action']['title']; ?></a>
                            </div>
                            <?php else: ?>
                            <div class="single-product product-<?php echo $prd_cnt; ?> product-left" data-product-id="<?php echo $sin_fpg_prod_item['mast_fpg_sel_prod']; ?>">
                                <a href="<?php echo get_the_permalink($sin_fpg_prod_item['mast_fpg_sel_prod']); ?>">
                                    <?php $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id($sin_fpg_prod_item['mast_fpg_sel_prod']), 'full' ); ?>
                                <div class="product-image">
                                    <img data-mh="cardimg" src="<?php echo $featured_image_url; ?>" alt="<?php echo $sin_fpg_prod_item['mast_fpg_product_title']; ?>"/>
                                </div>
                                <div class="product-information">
                                    <?php if ($sin_fpg_prod_item['mast_fpg_product_title'] != ""): ?>
                                    <h3><?php echo $sin_fpg_prod_item['mast_fpg_product_title']; ?></h3>
                                    <?php else: ?>
                                    <h3><?php echo get_the_title($sin_fpg_prod_item['mast_fpg_sel_prod']); ?></h3>
                                    <?php endif; ?>

                                </div>
                                </a>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="content-container product-<?php echo $prd_cnt; ?>">
                    <?php if ($mast_fpg_cont_image != ""): ?>
                        <img data-mh="cardimg" src="<?php echo $mast_fpg_cont_image['url']; ?>" alt="<?php echo $mast_fpg_cont_image['alt']; ?>" />
                    <?php else: ?>
                        <h2><?php echo $mast_fpg_cont_title; ?></h2>
                    <?php endif; ?>

                    <?php if ($mast_fpg_contents != ""): ?>
                        <?php echo $mast_fpg_contents; ?>
                    <?php endif; ?>

                    <a href="<?php echo $fpg_link_url; ?>" target="_self"><?php echo $fpg_link_txt; ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <script>
        jQuery(document).ready(function($){ $('.products-container .product-information h2').matchHeight(); });
    </script>
    <?php
}
/* END: Featured Product Group */

/* START: Case Studies */
function general_acf_mast_module_case_studies($main_module_loop, $i)
{
    $mast_case_main_heading  = $main_module_loop['mast_case_main_heading'];
    $mast_case_study_option  = $main_module_loop['mast_case_study_option'];
    $mast_case_studies_data  = $main_module_loop['mast_case_studies_data'];
    $mast_case_list_link     = $main_module_loop['mast_case_list_link'];
    $mast_select_list_column = $main_module_loop['mast_select_list_column'];

    ?>

    <section class="page-module case-studies section" id="section<?php echo $i; ?>">
        <div class="wrapper">
        <?php if ($mast_case_study_option == "lcs"):

            $get_cs_args = array(
                'order' => 'DESC',
                'post_status' => 'publish',
                'post_type' => 'knowledge',
                'posts_per_page' => $mast_select_list_column['label'],
                'tax_query' => array( // if custom post type
                    array(
                        'taxonomy' => 'knowledge_cat',
                        'field' => 'term_id',
                        'terms' => 23, // case-study term ID
                    ),
                ),
            ); $get_case_studies = new WP_Query($get_cs_args); ?>

            <?php if($get_case_studies->have_posts()): ?>
                <div class="case-studies-container section <?php echo $mast_select_list_column['value']; ?>">
                    
                    <?php if ($mast_case_main_heading != ""): ?>
                    <h2 class="<?php echo is_front_page() ? 'center' : ''; ?>"><?php echo $mast_case_main_heading; ?></h2>
                    <?php endif; ?>

                    <?php if($mast_case_list_link != ""): ?>
                    <div class="archive-link">
                        <a class="<?php echo is_front_page() ? 'center archive' : 'archive'; ?>" href="<?php echo site_url().'/knowledge/case-studies/'; ?>">All Case Studies</a>
                    </div>
                    <?php endif; ?>

                    <div class="studies-container">
                    <?php while($get_case_studies->have_posts()): $get_case_studies->the_post(); 
                        $featured_img = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'full' ); ?>
                        <div class="single-case-study">
                            <a href="<?php the_permalink(); ?>">
                                <div class="image-container section">
                                    <img src="<?php echo $featured_img; ?>" alt="<?php the_title(); ?>" />
                                </div>
                                <div class="content-container section">
                                    <span data-mh="card-titles" class="date uppercase section">Case Study</span>
                                    <h3 class="post-title section"><?php the_title(); ?></h3>
                                    
                                    <?php if (has_excerpt()): ?>
                                    <p data-mh="card-excerpts" class="section"><?php the_excerpt();?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata();?>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="case-studies-container section <?php echo $mast_select_list_column['value']; ?>">  

                <?php if ($mast_case_main_heading != ""): ?>
                <h2 class="<?php echo is_front_page() ? 'center' : ''; ?>"><?php echo $mast_case_main_heading; ?></h2>
                <?php endif; ?>

                <?php if($mast_case_list_link != ""): ?>
                    <div class="archive-link">
                        <a class="<?php echo is_front_page() ? 'center archive' : 'archive'; ?>" href="<?php echo site_url().'/knowledge/case-studies/'; ?>">All Case Studies</a>
                    </div>
                <?php endif; ?>

                <?php if ($mast_case_studies_data != ""): ?>
                <div class="studies-container">
                    <?php foreach ($mast_case_studies_data as $key => $sin_cs_post):
                        $featured_img = wp_get_attachment_url( get_post_thumbnail_id($sin_cs_post), 'full' ); ?>
                    <div class="single-case-study">
                        <a href="<?php echo get_the_permalink($sin_cs_post); ?>">
                            <div class="image-container section">
                                <img src="<?php echo $featured_img; ?>" alt="<?php echo get_the_title($sin_cs_post); ?>" />
                            </div>
                            <div class="content-container section">
                                <span data-mh="card-titles" class="date uppercase section">Case Study</span>
                                <h3 class="post-title section"><?php echo get_the_title($sin_cs_post);?></h3>
                                <?php if (has_excerpt($sin_cs_post)): ?>
                                <p data-mh="card-excerpts" class="section"><?php echo get_the_excerpt($sin_cs_post);?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <?php endforeach;wp_reset_postdata(); ?>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Case Studies */

/* START: Calculator & Map Links */
function general_acf_mast_module_calu_map_link($main_module_loop, $i)
{
    $mast_map_title = $main_module_loop['mast_map_title'];
    $mast_calculator_link = $main_module_loop['mast_calculator_link'];
    $mast_maps = $main_module_loop['mast_maps']; ?>

    <section class='page-module calculator-maps-links section' id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_calculator_link != ""): ?>
            <div class="calculator-container">
                <?php foreach ($mast_calculator_link as $key => $sin_calc_link): ?>
                <a href="<?php echo get_the_permalink($sin_calc_link); ?>" target="_self"><?php echo get_the_title($sin_calc_link); ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if ($mast_maps != ""): ?>
            <div class="maps-container">
                <?php if ($mast_map_title != ""): ?>
                <h2><?php echo $mast_map_title; ?></h2>
                <?php endif; ?>

                <?php foreach ($mast_maps as $key => $sin_calc_map_link): ?>
                <div data-mh="single-map" class="single-map">
                    <a href="<?php echo $sin_calc_map_link['mast_maps_link']; ?>" target="_self">
                        <img src="<?php echo $sin_calc_map_link['mast_maps_image']['url']; ?>" alt="<?php echo $sin_calc_map_link['mast_maps_image']['alt']; ?>" />
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Calculator & Map Links */

/* START: Glossary Items */
function general_acf_mast_module_glossary_items($main_module_loop, $i)
{
    $mast_glossary_items_item_repeater = $main_module_loop['mast_glossary_items_item_repeater'];

    if ($mast_glossary_items_item_repeater != "") { ?>
    <section class="page-module glossary section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php foreach ($mast_glossary_items_item_repeater as $key => $sin_gloss_item): ?>
                <div class="single-item">
                    <h2><?php echo $sin_gloss_item['mast_glossary_items_title']; ?></h2>
                    <p><?php echo $sin_gloss_item['mast_glossary_items_content']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section> <?php
    }
}
/* END: Glossary Items */

/* START: Title and WYSIWYG */
function general_acf_mast_module_title_and_wysiwyg($main_module_loop, $i)
{
    $mast_title_and_wysiwyg_title = $main_module_loop['mast_title_and_wysiwyg_title'];
    $mast_title_and_wysiwyg_content = $main_module_loop['mast_title_and_wysiwyg_content'];
    $mast_title_and_wysiwyg_bg_col = $main_module_loop['mast_title_and_wysiwyg_bg_col']; ?>
    
    <section class="page-module title-and-wysiwyg section <?php echo $mast_title_and_wysiwyg_bg_col; ?>" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="title-container">
                <?php if ($mast_title_and_wysiwyg_title != ""): ?>
                <h2 class="col-peach"><?php echo $mast_title_and_wysiwyg_title; ?></h2>
                <?php endif; ?>
            </div>

            <?php if ($mast_title_and_wysiwyg_content != ""): ?>
            <div class="content-container content">
                <?php echo $mast_title_and_wysiwyg_content; ?>
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Title and WYSIWYG */

/* START: Collapsable List */
function general_acf_mast_module_collapsable_list($main_module_loop, $i)
{
    $mast_coll_main_title = $main_module_loop['mast_coll_main_title'];
    $mast_coll_num_colu = $main_module_loop['mast_coll_num_colu'];
    $mast_coll_bg_col = $main_module_loop['mast_coll_bg_col'];
    $mast_coll_add_list_item = $main_module_loop['mast_coll_add_list_item'];

    if ($mast_coll_add_list_item != "") { ?>
    <section class="page-module collapsable-list section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?PHP $collapse_listID = rand(0,999); ?>
            <div class="list list-open <?php echo $mast_coll_bg_col; ?>" id="list-<?php echo $collapse_listID;?>">
                <?php if ($mast_coll_main_title != ""): ?>
                <div class="title-container">
                    <h2><?php echo $mast_coll_main_title; ?></h2>
                </div>
                <?php endif; ?>

                <div class="collapsable-container columns-<?php echo $mast_coll_num_colu; ?>">
                    <ul class="single-point columns">
                        <?php foreach ($mast_coll_add_list_item as $key => $sin_collapse_list): ?>
                            <li><p><?php echo $sin_collapse_list['mast_coll_content']; ?></p></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section> <?php
    }
}
/* END: Collapsable List */

/* START: Testimonial */
function general_acf_mast_module_testimonial($main_module_loop, $i)
{
    $mast_testimonial_content = $main_module_loop['mast_testimonial_content'];
    $mast_testimonial_name = $main_module_loop['mast_testimonial_name'];
    $mast_testimonial_company = $main_module_loop['mast_testimonial_company'];
    $mast_testimonial_bg_col = $main_module_loop['mast_testimonial_bg_col'];

    if ($mast_testimonial_content) { ?>
    <section class="page-module testimonial section <?php echo $mast_testimonial_bg_col; ?>" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="testimonial-container">
                <p><?php echo $mast_testimonial_content; ?></p>
            </div>
            <?php if($mast_testimonial_name != "" || $mast_testimonial_company != "" ):?>
                <div class="person-container">
                    <?php if($mast_testimonial_name): ?>
                        <h2><?php echo $mast_testimonial_name; ?></h2>
                    <?php endif;?>

                    <?php if($mast_testimonial_company):?>
                        <h3><?php echo $mast_testimonial_company; ?></h3>
                    <?php endif;?>
                </div>
            <?php endif;?>
        </div>
    </section> <?php
    }
}
/* END: Testimonial */

/* START: Title and Links */
function general_acf_mast_module_title_and_links($main_module_loop, $i)
{
    $mast_title_and_links_title = $main_module_loop['mast_title_and_links_title'];
    $mast_title_and_links_links_grp = $main_module_loop['mast_title_and_links_links_grp'];
    $mast_title_and_links_bg_col = $main_module_loop['mast_title_and_links_bg_col'];

    if ($mast_title_and_links_links_grp != "") { ?>
    <section class="page-module title-and-links section <?php echo $mast_title_and_links_bg_col; ?>" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_title_and_links_title != ""): ?>
            <h2 class="col-peach"><?php echo $mast_title_and_links_title; ?></h2>
            <?php endif; ?>
            <div class="module-wrapper">
                <?php foreach ($mast_title_and_links_links_grp as $key => $sin_ttllink_item): ?>
                    <a href="<?php echo get_the_permalink($sin_ttllink_item['mast_title_and_links_link']); ?>" target="_self"><?php echo get_the_title($sin_ttllink_item['mast_title_and_links_link']); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section> <?php
    }
}
/* END: Title and Links */

/* START: Icon Links */
function general_acf_mast_module_icon_links($main_module_loop, $i)
{
    $mast_icon_links_link_rpt = $main_module_loop['mast_icon_links_link_repeater'];

    if ($mast_icon_links_link_rpt != "") { ?>
    <section class="page-module icon-links section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="module-wrapper">
                <?php foreach ($mast_icon_links_link_rpt as $key => $sin_icn_link_item): ?>
                    <a href="<?php echo get_the_permalink($sin_icn_link_item['mast_icon_links_link']); ?>" target="_self" class="link-item">
                        <div class="icon">
                            <?php if ($sin_icn_link_item['mast_icon_links_icon'] != ""): ?>
                                <img src="<?php echo $sin_icn_link_item['mast_icon_links_icon']['url']; ?>" alt="<?php echo $sin_icn_link_item['mast_icon_links_icon']['alt']; ?>" />
                            <?php endif; ?>
                        </div>
                        <h2><?php echo get_the_title($sin_icn_link_item['mast_icon_links_link']); ?></h2>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section> <?php
    }
}
/* END: Icon Links */

/* START: Section Introduction */
function general_acf_mast_module_section_introduction($main_module_loop, $i)
{
    $mast_section_introduction_side_image = $main_module_loop['mast_section_introduction_side_image'];
    $mast_section_introduction_icon = $main_module_loop['mast_section_introduction_icon'];
    $mast_section_introduction_links = $main_module_loop['mast_section_introduction_links'];
    $mast_section_introduction_bg_col = $main_module_loop['mast_section_introduction_bg_col'];
    $mast_section_introduction_title = $main_module_loop['mast_section_introduction_title'];
    $mast_section_introduction_title_link = $main_module_loop['mast_section_introduction_title_link'];
    $mast_section_introduction_content = $main_module_loop['mast_section_introduction_content'];
    $mast_section_introduction_order = $main_module_loop['mast_section_introduction_order']; ?>

    <section class="page-module section-introduction section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php $sec_intro_id = rand(0,9999); ?>
            <?php if ($mast_section_introduction_order == "image-left"): ?>
                <?php if ($mast_section_introduction_side_image != ""): ?>
                <div class="image-container" data-mh="sectionIntro<?=$sec_intro_id;?>">     
                    <img src="<?php echo $mast_section_introduction_side_image['url']; ?>" alt="<?php echo $mast_section_introduction_side_image['alt']; ?>" />
                </div>
                <?php endif; ?>

                <div class="content-container <?php echo $mast_section_introduction_bg_col; ?>" data-mh="sectionIntro<?=$sec_intro_id;?>">    
                    <?php if ($mast_section_introduction_title_link != ""): ?>
                        <a href="<?php echo $mast_section_introduction_title_link; ?>">
                    <?php endif; ?>    
                            <img src="<?php echo $mast_section_introduction_icon['url']; ?>" alt="<?php echo $mast_section_introduction_icon['alt']; ?>" />
                            <h2><?php echo $mast_section_introduction_title; ?></h2>
                    <?php if ($mast_section_introduction_title_link != ""): ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php echo $mast_section_introduction_content; ?>

                    <?php if ($mast_section_introduction_links != ""): ?>
                    <div class="links-container">
                        <?php foreach ($mast_section_introduction_links as $key => $sin_secintro_link_item):
                            $pid = $sin_secintro_link_item['mast_section_introduction_link_item']; ?>
                        <a href="<?php echo get_the_permalink($pid); ?>" target="_self"><?php echo get_the_title($pid); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="content-container <?php echo $mast_section_introduction_bg_col; ?>" data-mh="sectionIntro<?=$sec_intro_id;?>">
                    <?php if ($mast_section_introduction_title_link != ""): ?>
                        <a href="<?php echo $mast_section_introduction_title_link; ?>">
                    <?php endif; ?>
                            <img src="<?php echo $mast_section_introduction_icon['url']; ?>" alt="<?php echo $mast_section_introduction_icon['alt']; ?>" />
                            <h2><?php echo $mast_section_introduction_title; ?></h2>

                    <?php if ($mast_section_introduction_title_link != ""): ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php echo $mast_section_introduction_content; ?>

                    <?php if ($mast_section_introduction_links != ""): ?>
                    <div class="links-container">
                        <?php foreach ($mast_section_introduction_links as $key => $sin_secintro_link_item):
                            $pid = $sin_secintro_link_item['mast_section_introduction_link_item']; ?>
                        <a href="<?php echo get_the_permalink($pid); ?>" target="_self"><?php echo get_the_title($pid); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if ($mast_section_introduction_side_image != ""): ?>
                <div class="image-container" data-mh="sectionIntro<?=$sec_intro_id;?>">    <img src="<?php echo $mast_section_introduction_side_image['url']; ?>" alt="<?php echo $mast_section_introduction_side_image['alt']; ?>" />
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Section Introduction */

/* START: Product Showcase */
function general_acf_mast_module_product_showcase($main_module_loop, $i)
{
    $mast_product_showcase_content = $main_module_loop['mast_product_showcase_content'];
    $mast_product_showcase_product_content = $main_module_loop['mast_product_showcase_product_content'];
    $mast_product_showcase_bg_col = $main_module_loop['mast_product_showcase_bg_col'];
    $mast_product_showcase_order = $main_module_loop['mast_product_showcase_order']; ?>

    <section class="page-module product-showcase section <?php echo $mast_product_showcase_bg_col; ?>" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_product_showcase_order == "prcl"): ?>
            <div class="content-container left">
                <?php if ($mast_product_showcase_content['mast_product_showcase_cnt_grp_title'] != ""): ?>
                    <h2><?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_title']; ?></h2>
                <?php endif; ?>

                <?php if ($mast_product_showcase_content['mast_product_showcase_cnt_grp_subtitle'] != ""): ?>
                    <h3><?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_subtitle']; ?></h3>
                <?php endif; ?>

                <?php if ($mast_product_showcase_content['mast_product_showcase_cnt_grp_content'] != ""): ?>
                    <p><?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_content']; ?></p>
                <?php endif; ?>

                <?php if ($mast_product_showcase_content['mast_product_showcase_cnt_grp_call_to_action'] != ""): ?>
                    <a class="btn btn-<?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_call_to_action_col']; ?>" href="<?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_call_to_action']; ?>" target="_self">View Product Detail</a>
                <?php endif; ?>
            </div>
            <div class="product-container left">
                <?php if ($mast_product_showcase_product_content['mast_product_showcase_prd_grp_image'] != ""): ?>
                    <img src="<?php echo $mast_product_showcase_product_content['mast_product_showcase_prd_grp_image']['url']; ?>" alt="<?php echo $mast_product_showcase_product_content['mast_product_showcase_prd_grp_image']['alt']; ?>" />
                <?php endif; ?>

                <?php if ($mast_product_showcase_product_content['mast_product_showcase_prd_grp_title'] != ""): ?>
                    <h3><?php echo $mast_product_showcase_product_content['mast_product_showcase_prd_grp_title']; ?></h3>
                <?php endif; ?>

                <?php if ($mast_product_showcase_product_content['mast_product_showcase_prd_grp_content'] != ""): ?>
                    <p><?php echo $mast_product_showcase_product_content['mast_product_showcase_prd_grp_content']; ?></p>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <div class="product-container left">
                <?php if ($mast_product_showcase_product_content['mast_product_showcase_prd_grp_image'] != ""): ?>
                    <img src="<?php echo $mast_product_showcase_product_content['mast_product_showcase_prd_grp_image']['url']; ?>" alt="<?php echo $mast_product_showcase_product_content['mast_product_showcase_prd_grp_image']['alt']; ?>" />
                <?php endif; ?>

                <?php if ($mast_product_showcase_product_content['mast_product_showcase_prd_grp_title'] != ""): ?>
                    <h3><?php echo $mast_product_showcase_product_content['mast_product_showcase_prd_grp_title']; ?></h3>
                <?php endif; ?>

                <?php if ($mast_product_showcase_product_content['mast_product_showcase_prd_grp_content'] != ""): ?>
                    <p><?php echo $mast_product_showcase_product_content['mast_product_showcase_prd_grp_content']; ?></p>
                <?php endif; ?>
            </div>
            <div class="content-container right">
                <?php if ($mast_product_showcase_content['mast_product_showcase_cnt_grp_title'] != ""): ?>
                    <h2><?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_title']; ?></h2>
                <?php endif; ?>

                <?php if ($mast_product_showcase_content['mast_product_showcase_cnt_grp_subtitle'] != ""): ?>
                    <h3><?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_subtitle']; ?></h3>
                <?php endif; ?>

                <?php if ($mast_product_showcase_content['mast_product_showcase_cnt_grp_content'] != ""): ?>
                    <p><?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_content']; ?></p>
                <?php endif; ?>

                <?php if ($mast_product_showcase_content['mast_product_showcase_cnt_grp_call_to_action'] != ""): ?>
                    <a class="btn btn-<?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_call_to_action_col']; ?>" href="<?php echo $mast_product_showcase_content['mast_product_showcase_cnt_grp_call_to_action']; ?>" target="_self">View Product Detail</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Product Showcase */

/* START: Content with CTA Links */
function general_acf_mast_module_content_with_cta_links($main_module_loop, $i)
{
    $mast_content_with_cta_title = $main_module_loop['mast_content_with_cta_title'];
    $mast_content_with_cta_content = $main_module_loop['mast_content_with_cta_content'];
    $mast_content_with_cta_add_button = $main_module_loop['mast_content_with_cta_add_button'];
    $mast_content_with_cta_content_bg_color = $main_module_loop['mast_content_with_cta_content_bg_color'];
    
    if ($mast_content_with_cta_content != "") { ?>
    <section class="page-module content-with-cta-links section" id="section<?php echo $i;?>" style="background-color: <?php echo $mast_content_with_cta_content_bg_color; ?>;">
        <div class="wrapper">
            <div class="module-wrapper">
                <div class="content-section">
                    <?php if ($mast_content_with_cta_title != ""): ?>
                    <h2><?php echo $mast_content_with_cta_title; ?></h2>
                    <?php endif; ?>

                    <?php if ($mast_content_with_cta_content != ""): ?>
                    <?php echo $mast_content_with_cta_content; ?>
                    <?php endif; ?>
                </div>
                <?php if ($mast_content_with_cta_add_button != ""): ?>
                <div class="links-section">
                    <?php foreach ($mast_content_with_cta_add_button as $key => $sin_cta_btn_item): ?>
                        <a style="background-color: <?php echo $sin_cta_btn_item['mast_content_with_cta_bg_color']; ?>;" href="<?php echo get_the_permalink($sin_cta_btn_item['mast_content_with_cta_link']); ?>" target="_self"><?php echo get_the_title($sin_cta_btn_item['mast_content_with_cta_link']); ?></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section> <?php    
    }
}
/* END: Content with CTA Links */

/* START: Product Cards */
function general_acf_mast_module_product_cards($main_module_loop, $i)
{
    $mast_product_cards_subtitle = $main_module_loop['mast_product_cards_subtitle'];
    $mast_product_cards_title = $main_module_loop['mast_product_cards_title'];
    $mast_product_cards_prd_grps = $main_module_loop['mast_product_cards_prd_grps']; ?>

    <section class="page-module product-cards section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_product_cards_title): ?>
            <div class="section-title-container">
                <?php if ($mast_product_cards_subtitle != ""): ?>
                <span class="col-peach sub-title"><?php echo $mast_product_cards_subtitle; ?></span>
                <?php endif; ?>
                <h2><?php echo $mast_product_cards_title; ?></h2>
            </div>
            <?php endif; ?>

            <?php if ($mast_product_cards_prd_grps != ""): ?>
            <div class="groups-container">
                <?php foreach ($mast_product_cards_prd_grps as $key => $sin_prcrds_item): ?>
                <div class="group">
                    <div class="title-container">
                        <?php if ($sin_prcrds_item['mast_product_cards_grp_link'] != ""): ?>
                            <h3><a href="<?php echo $sin_prcrds_item['mast_product_cards_grp_link']; ?>"><?php echo $sin_prcrds_item['mast_product_cards_grp_title']; ?></a></h3>
                        <?php else: ?>
                            <h3><?php echo $sin_prcrds_item['mast_product_cards_grp_title']; ?></h3>
                        <?php endif; ?>
                    </div>

                    <?php if ($sin_prcrds_item['mast_product_cards_grp_product_list'] != ""): ?>
                    <div class="product-container">
                        <?php foreach ($sin_prcrds_item['mast_product_cards_grp_product_list'] as $key => $sin_prcrd_sel_prd):
                            $prd_id = $sin_prcrd_sel_prd['mast_product_cards_grp_sel_prod'];
                            $prdcrd_selprod_img_url = wp_get_attachment_url( get_post_thumbnail_id($prd_id), 'full' );
                            $prdcrd_prdttl = get_the_title($prd_id);
                            $prdcrds_selprod_exerpt =  get_the_excerpt($prd_id); ?>
                        <div class="col-<?php echo $key == 0 ? '1' : '2'; ?>">
                            <?php echo $key != 0 ? '<div class="single-product">' : ''; ?>
                            <a href="<?php echo get_the_permalink($prd_id); ?>">
                                <?php if ($prdcrd_selprod_img_url != ""): ?>
                                <div class="image-container">
                                    <img src="<?php echo $prdcrd_selprod_img_url; ?>"  alt="<?php echo $prdcrd_prdttl;?>" />
                                </div>
                                <?php endif; ?>

                                <div class="content-container">
                                    <div class="product-heading"><span><?php echo $prdcrd_prdttl; ?></span></div>
                                    <?php if (has_excerpt($prd_id)): ?>
                                        <?php $new_description = substr($prdcrds_selprod_exerpt, 0, 140).'...'; ?>
                                        <p><?php echo $new_description; ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                            <?php echo $key != 0 ? '</div>' : ''; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Product Cards */

/* START: Image and Content (With Title) */
function general_acf_mast_module_image_and_content_with_title($main_module_loop, $i)
{
    $mast_imgcwttl_title = $main_module_loop['mast_imgcwttl_title'];
    $mast_imgcwttl_image = $main_module_loop['mast_imgcwttl_image'];
    $mast_imgcwttl_content = $main_module_loop['mast_imgcwttl_content']; ?>
    <section class="page-module image-and-content section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="image-container">
                <?php if ($mast_imgcwttl_title != ""): ?>
                <h2><?php echo $mast_imgcwttl_title; ?></h2>
                <?php endif; ?>
                <?php if ($mast_imgcwttl_image != ""): ?>
                <img src="<?php echo $mast_imgcwttl_image['url']; ?>" alt="<?php echo $mast_imgcwttl_image['alt']; ?>" />
                <?php endif; ?>
            </div>
            <div class="content-container">
                <?php if ($mast_imgcwttl_content != ""): ?>
                <p><?php echo $mast_imgcwttl_content; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section> <?php
}
/* END: Image and Content (With Title) */

/* START: Full Width Cards */
function general_acf_mast_module_full_width_cards($main_module_loop, $i)
{
    $mast_fwcrd = $main_module_loop['mast_fwcrd'];

    if ($mast_fwcrd != "") { ?>
    <section class="page-module full-width-cards section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php foreach ($mast_fwcrd as $key => $sin_fwcrd_item): ?>
                <div class="single-card <?php echo $sin_fwcrd_item['mast_fwcrd_col_sche']; ?>">
                <?php if ($sin_fwcrd_item['mast_fwcrd_img_loc'] == "right" ): ?>
                    <div data-mh="content-image-sizing" class="content-container">
                        <?php if ($sin_fwcrd_item['mast_fwcrd_title'] != ""): ?>
                        <h2><?php echo $sin_fwcrd_item['mast_fwcrd_title']; ?></h2>
                        <?php endif; ?>

                        <?php if ($sin_fwcrd_item['mast_fwcrd_content'] != ""): ?>
                        <?php echo $sin_fwcrd_item['mast_fwcrd_content']; ?>
                        <?php endif; ?>

                        <?php if ($sin_fwcrd_item['mast_fwcrd_link'] != ""): ?>
                        <a href="<?php echo $sin_fwcrd_item['mast_fwcrd_link']; ?>" target="_self"><?php echo $sin_fwcrd_item['link_button_text']; ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="image-container">
                        <?php if ($sin_fwcrd_item['mast_fwcrd_image'] != ""): ?>
                        <img data-mh="content-image-sizing"  src="<?php echo $sin_fwcrd_item['mast_fwcrd_image']['url']; ?>" alt="<?php echo $sin_fwcrd_item['mast_fwcrd_image']['alt']; ?>" />
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="image-container">
                        <?php if ($sin_fwcrd_item['mast_fwcrd_image'] != ""): ?>
                        <img data-mh="content-image-sizing"  src="<?php echo $sin_fwcrd_item['mast_fwcrd_image']['url']; ?>" alt="<?php echo $sin_fwcrd_item['mast_fwcrd_image']['alt']; ?>" />
                        <?php endif; ?>
                    </div>
                    <div data-mh="content-image-sizing" class="content-container">
                        <?php if ($sin_fwcrd_item['mast_fwcrd_title'] != ""): ?>
                        <h2><?php echo $sin_fwcrd_item['mast_fwcrd_title']; ?></h2>
                        <?php endif; ?>

                        <?php if ($sin_fwcrd_item['mast_fwcrd_content'] != ""): ?>
                        <?php echo $sin_fwcrd_item['mast_fwcrd_content']; ?>
                        <?php endif; ?>

                        <?php if ($sin_fwcrd_item['mast_fwcrd_link'] != ""): ?>
                        <a href="<?php echo $sin_fwcrd_item['mast_fwcrd_link']; ?>" target="_self"><?php echo $sin_fwcrd_item['link_button_text']; ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section> <?php
    }
}
/* END: Full Width Cards */

/* START: Product Icons */
function general_acf_mast_module_product_icons($main_module_loop, $i)
{
    $mast_product_icons_title = $main_module_loop['mast_product_icons_title'];
    $mast_product_icons_products = $main_module_loop['mast_product_icons_products'];

    if ($mast_product_icons_products) { ?>
    <section class="page-module product-icons section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_product_icons_title != ""): ?>
            <h2><?php echo $mast_product_icons_title; ?></h2>
            <?php endif; ?>

            <div class="products-container">
                <?php foreach ($mast_product_icons_products as $key => $sin_prd_icn): ?>
                    <div class="single-product">
                        <a href="<?php echo $sin_prd_icn['mast_product_icons_page_link'] ? $sin_prd_icn['mast_product_icons_page_link'] : '#'; ?>">
                            <img src="<?php echo $sin_prd_icn['mast_product_icons_icon']['url']; ?>" alt="<?php echo $sin_prd_icn['mast_product_icons_icon']['alt']; ?>" />
                            <h3><?php echo $sin_prd_icn['mast_product_icons_title']; ?></h3>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section><?php
    }
}
/* END: Product Icons */

/* START: Cards Link with Header Background */
function general_acf_mast_module_cards_link_with_head_bg($main_module_loop, $i)
{
    $mast_cardlwh_bg_img = $main_module_loop['mast_cardlwh_bg_img'];
    $mast_cardlwh_main_title = $main_module_loop['mast_cardlwh_main_title'];
    $mast_cardlwh_sub_title = $main_module_loop['mast_cardlwh_sub_title'];
    $mast_cardlwh_add_cards_data = $main_module_loop['mast_cardlwh_add_cards_data'];

    $mast_cardlwh_bg_img_url = "";
    if ($mast_cardlwh_bg_img != "") {
        
        $mast_cardlwh_bg_img_url = 'style="background-image:url('.$mast_cardlwh_bg_img.');"';
    } else { $mast_cardlwh_bg_img_url = ""; } ?>
    
    <section class="page-module cards-link-with-header-background section" id="section<?php echo $i;?>" <?php echo $mast_cardlwh_bg_img_url; ?>>
        <div class="wrapper">
            <?php if ($mast_cardlwh_sub_title != ""): ?>
            <span class="sub-title"><?php echo $mast_cardlwh_sub_title; ?></span>
            <?php endif; ?>

            <?php if ($mast_cardlwh_main_title != ""): ?>
            <h2><?php echo $mast_cardlwh_main_title; ?></h2>
            <?php endif; ?>

            <?php if ($mast_cardlwh_add_cards_data != ""): ?>
            <div class="cards-container">
                <?php foreach ($mast_cardlwh_add_cards_data as $key => $sin_crdwhb_item):
                    
                    $crdwhb_itemID = $sin_crdwhb_item['mast_cardlwh_inn_link']; ?>
                    <div class="single-card">
                        <?php if ($sin_crdwhb_item['mast_cardlwh_inn_icon_image'] != ""): ?>
                        <img src="<?php echo $sin_crdwhb_item['mast_cardlwh_inn_icon_image']['url']; ?>" alt="<?php echo $sin_crdwhb_item['mast_cardlwh_inn_icon_image']['alt']; ?>" />
                        <?php endif; ?>

                        <?php if ($sin_crdwhb_item['mast_cardlwh_inn_title'] != ""): ?>
                        <h3><?php echo $sin_crdwhb_item['mast_cardlwh_inn_title']; ?></h3>
                        <?php endif; ?>

                        <?php if ($sin_crdwhb_item['mast_cardlwh_inn_content'] != ""): ?>
                        <p><?php echo $sin_crdwhb_item['mast_cardlwh_inn_content']; ?></p>
                        <?php endif; ?>

                        <?php if ($crdwhb_itemID != ""): ?>
                        <a href="<?php echo get_the_permalink($crdwhb_itemID) ?>" target="_self"><?php echo get_the_title($crdwhb_itemID); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Cards Link with Header Background */

/* START: Content and List */
function general_acf_mast_module_content_and_list($main_module_loop, $i)
{
    $mast_content_with_list_main_title = $main_module_loop['mast_content_with_list_main_title'];
    $mast_content_with_list_content = $main_module_loop['mast_content_with_list_content'];
    $mast_content_with_add_list_item = $main_module_loop['mast_content_with_add_list_item']; ?>

    <section class="page-module content-and-list section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_content_with_list_main_title != ""): ?>
            <h2 class="col-peach"><?php echo $mast_content_with_list_main_title; ?></h2>
            <?php endif; ?>

            <?php if ($mast_content_with_list_content != ""): ?>
            <div class="content-container">
                <?php echo $mast_content_with_list_content; ?>
            </div>
            <?php endif; ?>

            <?php if ($mast_content_with_add_list_item != ""): ?>
            <div class="list-container content">
                <ul>
                    <?php foreach ($mast_content_with_add_list_item as $key => $sin_cwl_item): ?>
                        <li><?php echo $sin_cwl_item['mast_content_with_list_item']; ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Content and List */

/* START: Coloured Text and Image */
function general_acf_mast_module_coloured_txt_and_img($main_module_loop, $i)
{
    $mast_cti_image = $main_module_loop['mast_cti_image'];
    $mast_cti_add_text = $main_module_loop['mast_cti_add_text']; ?>

    <section class="page-module coloured-text-and-image section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_cti_add_text != ""): ?>
            <div class="content-container">
                <?php foreach ($mast_cti_add_text as $key => $sin_clr_txt): ?>
                    <p class="<?php echo $sin_clr_txt['mast_cti_color'].' '.$sin_clr_txt['mast_cti_font_size']; ?>"><?php echo $sin_clr_txt['mast_cti_text']; ?></p>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="image-container">
                    <?php if ($mast_cti_image != ""): ?>
                    <img data-type="defined" src="<?php echo $mast_cti_image['url']; ?>" alt="<?php echo $mast_cti_image['alt']; ?>" />
                    <?php endif; ?>
            </div>
        </div>
    </section> <?php
}
/* END: Coloured Text and Image */

/* START: Text and Lists */
function general_acf_mast_module_text_and_lists($main_module_loop, $i)
{
    $mast_txtnlst_leftcnt_grp = $main_module_loop['mast_txtnlst_leftcnt_grp'];
    $mast_txtnlst_repeater = $main_module_loop['mast_txtnlst_repeater'];
    $mast_txtnlst_bg_col = $main_module_loop['mast_txtnlst_bg_col']; ?>

    <section class="page-module text-and-lists section <?php echo 'bg-'.$mast_txtnlst_bg_col; ?>" id="section<?php echo $i;?>" >
        <div class="wrapper">
            <div class="module-wrapper">
                <div class="content-section">
                    <?php if ($mast_txtnlst_leftcnt_grp['mast_txtnlst_grp_title'] != ""): ?>
                        <h2><?php echo $mast_txtnlst_leftcnt_grp['mast_txtnlst_grp_title']; ?></h2>
                    <?php endif; ?>

                    <?php if ($mast_txtnlst_leftcnt_grp['mast_txtnlst_grp_content'] != ""): ?>
                        <p><?php echo $mast_txtnlst_leftcnt_grp['mast_txtnlst_grp_content']; ?></p>
                    <?php endif; ?>
                </div>
                <?php if ($mast_txtnlst_repeater != ""): ?>
                <div class="lists-section">
                    <?php foreach ($mast_txtnlst_repeater as $key => $sin_txtnlist_rep): ?>
                        <div class="list">
                            <?php if ($sin_txtnlist_rep['mast_txtnlst_rep_title'] != ""): ?>
                            <h3><?php echo $sin_txtnlist_rep['mast_txtnlst_rep_title']; ?></h3>
                            <?php endif; ?>

                            <?php if ($sin_txtnlist_rep['mast_txtnlst_rep_list_items'] != ""): ?>
                            <div class="list-items">
                                <?php foreach ($sin_txtnlist_rep['mast_txtnlst_rep_list_items'] as $key => $sin_txtlst_item): ?>
                                <p><?php echo $sin_txtlst_item['mast_txtnlst_item']; ?></p>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section> <?php
}
/* END: Text and Lists */

/* START: Content and Parameters */
function general_acf_mast_module_content_and_partam($main_module_loop, $i)
{
    $mast_content_with_pama = $main_module_loop['mast_content_with_pama'];
    $mast_content_with_pama_terms = $main_module_loop['mast_content_with_pama_terms']; ?>

    <section class="page-module content-and-parameters section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_content_with_pama != ""): ?>
            <div class="content-container content">
                <?php echo $mast_content_with_pama; ?>
            </div>
            <?php endif; ?>

            <?php if ($mast_content_with_pama_terms != ""): ?>
            <div class="parameters-container bg-darkblue">
                <?php foreach ($mast_content_with_pama_terms as $key => $sin_cntprm_term): ?>
                    <div class="single-parameter">
                        <?php if ($sin_cntprm_term['mast_content_with_pama_terms_title'] != ""): ?>
                        <h2><?php echo $sin_cntprm_term['mast_content_with_pama_terms_title']; ?></h2>
                        <?php endif; ?>
                        <?php if ($sin_cntprm_term['mast_content_with_pama_terms_content'] != ""): ?>
                        <?php echo $sin_cntprm_term['mast_content_with_pama_terms_content']; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Content and Parameters */

/* START: Grid Links */
function general_acf_mast_module_grid_links($main_module_loop, $i)
{
    $mast_grid_link_title = $main_module_loop['mast_grid_link_title'];
    $mast_grid_links = $main_module_loop['mast_grid_links']; ?>

    <section class="page-module grid-links section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if ($mast_grid_link_title != ""): ?>
            <h2><?php echo $mast_grid_link_title; ?></h2>
            <?php endif; ?>
            <?php if ($mast_grid_links != ""): ?>
            <div class="links">
                <?php foreach ($mast_grid_links as $key => $sin_gridlink_item):
                    $gridlink_pid = $sin_gridlink_item['mast_grid_link'];
                    $gridlink_color = $sin_gridlink_item['mast_grid_link_bg_col']; ?>
                    <a class="<?php echo $gridlink_color; ?>" href="<?php echo get_the_permalink($gridlink_pid); ?>" target="_self"><?php echo get_the_title($gridlink_pid); ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Grid Links */

/* START: Horizontal Logos */
function general_acf_mast_module_horizontal_logos($main_module_loop, $i)
{
    $mast_horizontal_logos_title = $main_module_loop['mast_horizontal_logos_title'];
    $mast_horizontal_logos_logo_gallery = $main_module_loop['mast_horizontal_logos_logo_gallery'];

    if ($mast_horizontal_logos_logo_gallery != "") { ?>
    <section class="page-module horizontal-logos section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php if($mast_horizontal_logos_title != ""):?>
                <h2 class="col-blue"><?php echo $mast_horizontal_logos_title; ?></h2>
            <?php endif;?>

            <div class="logo-gallery">
                <?php foreach ($mast_horizontal_logos_logo_gallery as $key => $sin_horzn_gal): ?>
                <img src="<?php echo $sin_horzn_gal['url']; ?>" alt="<?php echo $sin_horzn_gal['alt']; ?>" />
                <?php endforeach; ?>
            </div>
        </div>
    </section> <?php
    }
}
/* END: Horizontal Logos */

/* START: Icon Cards */
function general_acf_mast_module_icon_cards($main_module_loop, $i)
{
    $mast_icncrds_card_rptr = $main_module_loop['mast_icncrds_card_rptr'];

    if ($mast_icncrds_card_rptr != "") { ?>
    <section class="page-module icon-cards section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="cards-container">
                <?php foreach ($mast_icncrds_card_rptr as $key => $sin_icncrds_item):

                    $icncrds_linkID = $sin_icncrds_item['mast_icncrds_link']; ?>
                    
                    <div class="single-card" data-mh="icon-cards">
                        <?php if ($sin_icncrds_item['mast_icncrds_icon'] != ""): ?>
                            <img src="<?php echo $sin_icncrds_item['mast_icncrds_icon']['url']; ?>" alt="<?php echo $sin_icncrds_item['mast_icncrds_icon']['alt']; ?>" />
                        <?php endif; ?>
                            
                        <?php if ($sin_icncrds_item['mast_icncrds_subtitle'] != ""): ?>
                            <span class="solu_sub_heading"><?php echo $sin_icncrds_item['mast_icncrds_subtitle']; ?></span>
                        <?php endif; ?>

                        <?php if ($sin_icncrds_item['mast_icncrds_title'] != ""): ?>
                            <h2><?php echo $sin_icncrds_item['mast_icncrds_title']; ?></h2>
                        <?php endif; ?>

                        <?php if ($sin_icncrds_item['mast_icncrds_content'] != ""): ?>
                        <p><?php echo $sin_icncrds_item['mast_icncrds_content']; ?></p>
                        <?php endif; ?>

                        <?php if ($icncrds_linkID != ""): ?>
                            <a href="<?php echo get_the_permalink($icncrds_linkID); ?>" target="_self"><?php echo get_the_title($icncrds_linkID); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section> <?php
    }
}
/* END: Icon Cards */

/* START: Plans and Pricing */
function general_acf_mast_module_plans_and_pricing($main_module_loop, $i)
{
    $mast_plnaprice_plans_rept = $main_module_loop['mast_plnaprice_plans_rept'];
    
    if ($mast_plnaprice_plans_rept != "") { ?>
    <section class="page-module plans-and-pricing section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <?php foreach ($mast_plnaprice_plans_rept as $key => $sin_plnaprice):

                $plnprice_colone = $sin_plnaprice['mast_plnaprice_column_one'];
                $plnprice_coltwo = $sin_plnaprice['mast_plnaprice_column_two'];
                $plnprice_colthree = $sin_plnaprice['mast_plnaprice_column_three']; ?>
                <div class="row">
                    <?php if ($plnprice_colone != ""): ?>
                        <div data-mh="columns" class="column-1">
                            <div class="inner">
                                <?php if ($plnprice_colone['mast_plnaprice_colone_title'] != ""): ?>
                                <h2 class="col-blue"><?php echo $plnprice_colone['mast_plnaprice_colone_title']; ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($plnprice_coltwo != ""): ?>
                        <div data-mh="columns" class="column-2">
                            <?php if ($plnprice_coltwo['mast_plnaprice_coltwo_title'] != ""): ?>
                            <h3><?php echo $plnprice_coltwo['mast_plnaprice_coltwo_title']; ?></h3>
                            <?php endif; ?>

                            <?php if ($plnprice_coltwo['mast_plnaprice_coltwo_content'] != ""): ?>
                            <p><?php echo $plnprice_coltwo['mast_plnaprice_coltwo_content']; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($plnprice_colthree != ""): ?>
                        <div data-mh="columns" class="column-3">
                            <?php if ($plnprice_colthree['mast_plnaprice_colthree_content'] != ""): ?>
                                <p><?php echo $plnprice_colthree['mast_plnaprice_colthree_content']; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section> <?php
    }
}
/* END: Plans and Pricing */

/* START: Text and Image (With Background) */
function general_acf_mast_module_text_and_image_with_bg($main_module_loop, $i)
{
    $mast_text_and_img_with_bg_content = $main_module_loop['mast_text_and_img_with_bg_content'];
    $mast_text_and_img_with_bg_image = $main_module_loop['mast_text_and_img_with_bg_image'];
    $mast_text_and_img_with_bg_bgcol = $main_module_loop['mast_text_and_img_with_bg_bgcol']; ?>
    
    <section class="page-module text-and-image-with-background section <?php echo $mast_text_and_img_with_bg_bgcol; ?>" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="content-container">
                <?php if ($mast_text_and_img_with_bg_content['mast_text_and_img_with_bg_title'] != ""): ?>
                    <h2><?php echo $mast_text_and_img_with_bg_content['mast_text_and_img_with_bg_title']; ?></h2>
                <?php endif; ?>
                <?php if ($mast_text_and_img_with_bg_content['mast_text_and_img_with_bg_content'] != ""): ?>
                    <p><?php echo $mast_text_and_img_with_bg_content['mast_text_and_img_with_bg_content']; ?></p>
                <?php endif; ?>
            </div>
            <?php if ($mast_text_and_img_with_bg_image != ""): ?>
            <div class="image-container">
                <img src="<?php echo $mast_text_and_img_with_bg_image['url']; ?>" alt="<?php echo $mast_text_and_img_with_bg_image['alt']; ?>" />
            </div>
            <?php endif; ?>
        </div>
    </section> <?php
}
/* END: Text and Image (With Background) */

/* START: Plan Information */
function general_acf_mast_module_plan_information($main_module_loop, $i)
{
    $mast_plan_information_title = $main_module_loop['mast_plan_information_title'];
    $mast_plan_information_tagline = $main_module_loop['mast_plan_information_tagline'];
    $mast_plan_information_content = $main_module_loop['mast_plan_information_content'];
    $mast_plan_information_additional_points = $main_module_loop['mast_plan_information_additional_points']; ?>

    <section class="page-module plan-information section" id="section<?php echo $i;?>">
        <div class="wrapper">
            <div class="module-wrapper">
                <div class="content-section">
                    <?php if ($mast_plan_information_title != ""): ?>
                    <h2><?php echo $mast_plan_information_title; ?></h2>
                    <?php endif; ?>

                    <div class="tagline">
                        <?php if ($mast_plan_information_tagline != ""):
                            $peach_text = $mast_plan_information_tagline['mast_plan_information_peach_text'];
                            $blue_text = $mast_plan_information_tagline['mast_plan_information_blue_text']; ?>
                            
                            <?php if ($peach_text != ""): ?>
                                <h3 class="col-peach"><?php echo $peach_text; ?></h3> 
                            <?php endif; ?>

                            <?php if ($blue_text != ""): ?>
                                <h3 class="col-blue"><?php echo $blue_text; ?></h3>
                            <?php endif; ?>
                            
                        <?php endif; ?>
                    </div>
                    <?php if ($mast_plan_information_content != ""): ?>
                    <p><?php echo $mast_plan_information_content; ?></p>
                    <?php endif; ?>
                </div>
                <div class="points-section">
                    <?php if ($mast_plan_information_additional_points != ""): ?>
                    <ul class="points">
                        <?php foreach ($mast_plan_information_additional_points as $key => $sin_addit_point): ?>
                            <li><?php echo $sin_addit_point['mast_plan_information_point']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section> <?php
}
/* END: Plan Information */

/* START: Blogs & News Section */
function general_acf_mast_module_news_sec($main_module_loop, $i)
{

 
   if($main_module_loop['mast_news_news_type'] == "lna") {
    $news_args = array(
        'order' => 'DESC',
        'post_status' => 'publish',
        'post_type' => 'post',
        'posts_per_page' => 3
       );   
    }else if($main_module_loop['mast_news_news_type'] == "sna")
    {
        $sel_artis = $main_module_loop['mast_news_select_articles'];
        $news_args = array(
            'order' => 'DESC',
            'post_status' => 'publish',
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post__in' => $sel_artis,
           ); 
        
    }
    else if($main_module_loop['mast_news_news_type'] == "lfc")
    {
        $sel_artis = $main_module_loop['mast_news_select_categories'];
        $news_args = array(
            'order' => 'DESC',
            'post_status' => 'publish',
            'post_type' => 'post',
            'posts_per_page' => 3,
            'category__in' => $sel_artis,
           ); 
        
    }
    else if($main_module_loop['mast_news_news_type'] == "lft")
    {
        $sel_artis = $main_module_loop['mast_news_select_tags'];
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
                echo '<h2>'.$main_module_loop['mast_news_main_heading'].'</h2>';
                if($news_qry->have_posts()){
                    while($news_qry->have_posts()){  $news_qry->the_post();
                        echo '<div class="single-post">';
                            echo '<a href="'.get_the_permalink().'">';
                                echo '<div class="image-container section">';
                                    echo '<img src="'.get_the_post_thumbnail_url(get_the_ID(),array( 400, 250)).'" alt="'.get_the_title().'" />';
                                echo '</div>';
                                echo '<div class="content-container section">';
                                    echo '<div data-mh="card-titles" class="date uppercase section col-peach">'.get_the_date('j M Y').'</div>';
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
}

/* START: Product Row */
function general_acf_mast_module_product_row($main_module_loop, $i)
{
?>
    <section class="page-module product-row section">
        <div class="wrapper">
            <?php
                $taxonomy = $main_module_loop['mast_pr_tax_parent'];

                 switch($taxonomy){
                    case 'product_ranges':
                        $term_type = $main_module_loop['mast_pr_tax_range'];
                        break;
                    case 'product_solutions':
                        $term_type = $main_module_loop['mast_pr_tax_solu'];
                        break;
                    case 'product_markets':
                        $term_type = $main_module_loop['mast_pr_tax_mrkt'];
                        break;
                    case 'product_networks':
                        $term_type = $main_module_loop['mast_pr_tax_netw'];
                        break;
                    default:
                        $term_type = 'No term type was defined in the switch';
                        break;
                }
                

                echo '<h2>'.$main_module_loop['mast_pr_title'].'</h2>';
                $t_link = get_term_link($term_type, $taxonomy); 
                echo '<a href="'.$t_link.'">See More</a>';

                $args = array(
                    'post_type'             => 'product',
                    'post_status'           => 'publish',
                    'ignore_sticky_posts'   => 1,
                    'posts_per_page'        => '5',
                   /* 'orderby'               => 'meta_value_num',
                    'meta_key'              => '_price',
                    'order'                 => 'desc',*/
                    'tax_query'             => array(
                        array(
                            'taxonomy'      => $taxonomy,
                            'terms'         => $term_type,
                            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                        )
                    )
                );
                
                $products = new WP_Query($args);
             
                if($products->have_posts()){
                    echo '<div class="products-container">';
                        while($products->have_posts()) { $products->the_post();
                            echo '<div class="single-product" data-mh="product-cards">';
                                echo '<a href='.get_the_permalink().'>';
                                    echo '<div class="image-container">';
                                        $prd_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                        $prd_alt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);   
                                        echo '<div data-mh="product-thumbnails" class="product-thumb">';
                                            echo '<img data-type="product" data-mh="product-thumbnails-image" src="'.$prd_img_url.'" alt="'.$prd_alt.'" />';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="content-container">';
                                        echo '<h3 data-mh="related-product-title">'.get_the_title().'</h3>';
                                        $prod = wc_get_product(get_the_id());
                                        //echo '<p>'.$prod->get_price_html().'</p>';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';
                        }
                    echo '</div>';
                }wp_reset_postdata();
             ?>
        </div>
    </section>
<?php 
}
/* END */
?>