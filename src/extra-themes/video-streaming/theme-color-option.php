<?php

	/*---------------------------Width Layout -------------------*/
	$video_streaming_theme_lay = get_theme_mod( 'video_streaming_width_layout_options','Default');
    if($video_streaming_theme_lay == 'Default'){
		$video_streaming_custom_css .='body{';
			$video_streaming_custom_css .='max-width: 100%;';
		$video_streaming_custom_css .='}';
	}else if($video_streaming_theme_lay == 'Container Layout'){
		$video_streaming_custom_css .='body{';
			$video_streaming_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$video_streaming_custom_css .='}';
	}else if($video_streaming_theme_lay == 'Box Layout'){
		$video_streaming_custom_css .='body{';
			$video_streaming_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$video_streaming_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$video_streaming_theme_lay = get_theme_mod( 'video_streaming_slider_content_layout','Left');
    if($video_streaming_theme_lay == 'Left'){
		$video_streaming_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$video_streaming_custom_css .='text-align:left;';
		$video_streaming_custom_css .='}';
	}else if($video_streaming_theme_lay == 'Center'){
		$video_streaming_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn{';
			$video_streaming_custom_css .='text-align:center; ';
		$video_streaming_custom_css .='}';
	}else if($video_streaming_theme_lay == 'Right'){
		$video_streaming_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$video_streaming_custom_css .='text-align:right;';
		$video_streaming_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$video_streaming_footer_text_align = get_theme_mod('video_streaming_footer_text_align');
	$video_streaming_custom_css .='.copyright-wrapper{';
		$video_streaming_custom_css .='text-align: '.esc_attr($video_streaming_footer_text_align).';';
	$video_streaming_custom_css .='}';

	$video_streaming_footer_text_padding = get_theme_mod('video_streaming_footer_text_padding');
	$video_streaming_custom_css .='.copyright-wrapper{';
		$video_streaming_custom_css .='padding-top: '.esc_attr($video_streaming_footer_text_padding).'px; padding-bottom: '.esc_attr($video_streaming_footer_text_padding).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_footer_bg_color = get_theme_mod('video_streaming_footer_bg_color');
	$video_streaming_custom_css .='.footer-wp{';
		$video_streaming_custom_css .='background-color: '.esc_attr($video_streaming_footer_bg_color).';';
	$video_streaming_custom_css .='}';

	$video_streaming_footer_bg_image = get_theme_mod('video_streaming_footer_bg_image');
	if($video_streaming_footer_bg_image != false){
		$video_streaming_custom_css .='.footer-wp{';
			$video_streaming_custom_css .='background: url('.esc_attr($video_streaming_footer_bg_image).');';
		$video_streaming_custom_css .='}';
	}

	$video_streaming_copyright_text_font_size = get_theme_mod('video_streaming_copyright_text_font_size', 15);
	$video_streaming_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$video_streaming_custom_css .='font-size: '.esc_attr($video_streaming_copyright_text_font_size).'px;';
	$video_streaming_custom_css .='}';

	/*------------- Back to Top  -------------------*/
	$video_streaming_back_to_top_border_radius = get_theme_mod('video_streaming_back_to_top_border_radius');
	$video_streaming_custom_css .='#scrollbutton {';
		$video_streaming_custom_css .='border-radius: '.esc_attr($video_streaming_back_to_top_border_radius).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_scroll_icon_font_size = get_theme_mod('video_streaming_scroll_icon_font_size', 22);
	$video_streaming_custom_css .='#scrollbutton {';
		$video_streaming_custom_css .='font-size: '.esc_attr($video_streaming_scroll_icon_font_size).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_top_bottom_scroll_padding = get_theme_mod('video_streaming_top_bottom_scroll_padding', 7);
	$video_streaming_custom_css .='#scrollbutton {';
		$video_streaming_custom_css .='padding-top: '.esc_attr($video_streaming_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($video_streaming_top_bottom_scroll_padding).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_left_right_scroll_padding = get_theme_mod('video_streaming_left_right_scroll_padding', 17);
	$video_streaming_custom_css .='#scrollbutton {';
		$video_streaming_custom_css .='padding-left: '.esc_attr($video_streaming_left_right_scroll_padding).'px; padding-right: '.esc_attr($video_streaming_left_right_scroll_padding).'px;';
	$video_streaming_custom_css .='}';

	/*-------------- Post Button  -------------------*/
	$video_streaming_post_button_padding_top = get_theme_mod('video_streaming_post_button_padding_top');
	$video_streaming_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$video_streaming_custom_css .='padding-top: '.esc_attr($video_streaming_post_button_padding_top).'px; padding-bottom: '.esc_attr($video_streaming_post_button_padding_top).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_post_button_padding_right = get_theme_mod('video_streaming_post_button_padding_right');
	$video_streaming_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$video_streaming_custom_css .='padding-left: '.esc_attr($video_streaming_post_button_padding_right).'px; padding-right: '.esc_attr($video_streaming_post_button_padding_right).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_post_button_border_radius = get_theme_mod('video_streaming_post_button_border_radius');
	$video_streaming_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$video_streaming_custom_css .='border-radius: '.esc_attr($video_streaming_post_button_border_radius).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_post_comment_enable = get_theme_mod('video_streaming_post_comment_enable',true);
	if($video_streaming_post_comment_enable == false){
		$video_streaming_custom_css .='#comments{';
			$video_streaming_custom_css .='display: none;';
		$video_streaming_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$video_streaming_preloader_bg_color_option = get_theme_mod('video_streaming_preloader_bg_color_option');
	$video_streaming_preloader_icon_color_option = get_theme_mod('video_streaming_preloader_icon_color_option');
	$video_streaming_custom_css .='.frame{';
		$video_streaming_custom_css .='background-color: '.esc_attr($video_streaming_preloader_bg_color_option).';';
	$video_streaming_custom_css .='}';
	$video_streaming_custom_css .='.dot-1,.dot-2,.dot-3{';
		$video_streaming_custom_css .='background-color: '.esc_attr($video_streaming_preloader_icon_color_option).';';
	$video_streaming_custom_css .='}';

	// preloader type
	$video_streaming_theme_lay = get_theme_mod( 'video_streaming_preloader_type','First Preloader Type');
    if($video_streaming_theme_lay == 'First Preloader Type'){
		$video_streaming_custom_css .='.dot-1, .dot-2, .dot-3{';
			$video_streaming_custom_css .='';
		$video_streaming_custom_css .='}';
	}else if($video_streaming_theme_lay == 'Second Preloader Type'){
		$video_streaming_custom_css .='.dot-1, .dot-2, .dot-3{';
			$video_streaming_custom_css .='border-radius:0;';
		$video_streaming_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$video_streaming_theme_lay = get_theme_mod( 'video_streaming_background_skin','Without Background');
    if($video_streaming_theme_lay == 'With Background'){
		$video_streaming_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$video_streaming_custom_css .='background-color: #fff; padding:20px;';
		$video_streaming_custom_css .='}';
		$video_streaming_custom_css .='.login-box a{';
			$video_streaming_custom_css .='background-color: #fff;';
		$video_streaming_custom_css .='}';
	}else if($video_streaming_theme_lay == 'Without Background'){
		$video_streaming_custom_css .='{';
			$video_streaming_custom_css .='background-color: transparent;';
		$video_streaming_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$video_streaming_woocommerce_button_padding_top = get_theme_mod('video_streaming_woocommerce_button_padding_top',12);
	$video_streaming_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$video_streaming_custom_css .='padding-top: '.esc_attr($video_streaming_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($video_streaming_woocommerce_button_padding_top).'px;';
	$video_streaming_custom_css .='}';
	

	$video_streaming_woocommerce_button_padding_right = get_theme_mod('video_streaming_woocommerce_button_padding_right',15);
	$video_streaming_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$video_streaming_custom_css .='padding-left: '.esc_attr($video_streaming_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($video_streaming_woocommerce_button_padding_right).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_woocommerce_button_border_radius = get_theme_mod('video_streaming_woocommerce_button_border_radius',30);
	$video_streaming_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.added_to_cart{';
		$video_streaming_custom_css .='border-radius: '.esc_attr($video_streaming_woocommerce_button_border_radius).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_related_product_enable = get_theme_mod('video_streaming_related_product_enable',true);
	if($video_streaming_related_product_enable == false){
		$video_streaming_custom_css .='.related.products{';
			$video_streaming_custom_css .='display: none;';
		$video_streaming_custom_css .='}';
	}

	$video_streaming_woocommerce_product_border_enable = get_theme_mod('video_streaming_woocommerce_product_border_enable',true);
	if($video_streaming_woocommerce_product_border_enable == false){
		$video_streaming_custom_css .='.products li{';
			$video_streaming_custom_css .='border: none;';
		$video_streaming_custom_css .='}';
	}

	$video_streaming_woocommerce_product_padding_top = get_theme_mod('video_streaming_woocommerce_product_padding_top',0);
	$video_streaming_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$video_streaming_custom_css .='padding-top: '.esc_attr($video_streaming_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($video_streaming_woocommerce_product_padding_top).'px !important;';
	$video_streaming_custom_css .='}';

	$video_streaming_woocommerce_product_padding_right = get_theme_mod('video_streaming_woocommerce_product_padding_right',0);
	$video_streaming_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$video_streaming_custom_css .='padding-left: '.esc_attr($video_streaming_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($video_streaming_woocommerce_product_padding_right).'px !important;';
	$video_streaming_custom_css .='}';

	$video_streaming_woocommerce_product_border_radius = get_theme_mod('video_streaming_woocommerce_product_border_radius',20);
	$video_streaming_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$video_streaming_custom_css .='border-radius: '.esc_attr($video_streaming_woocommerce_product_border_radius).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_woocommerce_product_box_shadow = get_theme_mod('video_streaming_woocommerce_product_box_shadow', 5);
	$video_streaming_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$video_streaming_custom_css .='box-shadow: '.esc_attr($video_streaming_woocommerce_product_box_shadow).'px '.esc_attr($video_streaming_woocommerce_product_box_shadow).'px '.esc_attr($video_streaming_woocommerce_product_box_shadow).'px #eee;';
	$video_streaming_custom_css .='}';

	$video_streaming_woo_product_sale_top_bottom_padding = get_theme_mod('video_streaming_woo_product_sale_top_bottom_padding', 0);
	$video_streaming_woo_product_sale_left_right_padding = get_theme_mod('video_streaming_woo_product_sale_left_right_padding', 0);
	$video_streaming_custom_css .='.woocommerce span.onsale{';
		$video_streaming_custom_css .='padding-top: '.esc_attr($video_streaming_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($video_streaming_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($video_streaming_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($video_streaming_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$video_streaming_custom_css .='}';

	$video_streaming_woo_product_sale_border_radius = get_theme_mod('video_streaming_woo_product_sale_border_radius',50);
	$video_streaming_custom_css .='.woocommerce span.onsale {';
		$video_streaming_custom_css .='border-radius: '.esc_attr($video_streaming_woo_product_sale_border_radius).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_woo_product_sale_position = get_theme_mod('video_streaming_woo_product_sale_position', 'Right');
	if($video_streaming_woo_product_sale_position == 'Right' ){
		$video_streaming_custom_css .='.woocommerce ul.products li.product .onsale{';
			$video_streaming_custom_css .=' left:auto; right:0;';
		$video_streaming_custom_css .='}';
	}elseif($video_streaming_woo_product_sale_position == 'Left' ){
		$video_streaming_custom_css .='.woocommerce ul.products li.product .onsale{';
			$video_streaming_custom_css .=' left:0; right:auto;';
		$video_streaming_custom_css .='}';
	}

	$video_streaming_wooproduct_sale_font_size = get_theme_mod('video_streaming_wooproduct_sale_font_size',14);
	$video_streaming_custom_css .='.woocommerce span.onsale{';
		$video_streaming_custom_css .='font-size: '.esc_attr($video_streaming_wooproduct_sale_font_size).'px;';
	$video_streaming_custom_css .='}';

	// Responsive Media
	$video_streaming_post_date = get_theme_mod( 'video_streaming_display_post_date',true);
	if($video_streaming_post_date == true && get_theme_mod( 'video_streaming_metafields_date',true) != true){
    	$video_streaming_custom_css .='.metabox .entry-date{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} ';
	}
    if($video_streaming_post_date == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='.metabox .entry-date{';
			$video_streaming_custom_css .='display:inline-block;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_post_date == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px){';
		$video_streaming_custom_css .='.metabox .entry-date{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_post_author = get_theme_mod( 'video_streaming_display_post_author',true);
	if($video_streaming_post_author == true && get_theme_mod( 'video_streaming_metafields_author',true) != true){
    	$video_streaming_custom_css .='.metabox .entry-author{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} ';
	}
    if($video_streaming_post_author == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='.metabox .entry-author{';
			$video_streaming_custom_css .='display:inline-block;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_post_author == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px){';
		$video_streaming_custom_css .='.metabox .entry-author{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_post_comment = get_theme_mod( 'video_streaming_display_post_comment',true);
	if($video_streaming_post_comment == true && get_theme_mod( 'video_streaming_metafields_comment',true) != true){
    	$video_streaming_custom_css .='.metabox .entry-comments{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} ';
	}
    if($video_streaming_post_comment == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='.metabox .entry-comments{';
			$video_streaming_custom_css .='display:inline-block;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_post_comment == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px){';
		$video_streaming_custom_css .='.metabox .entry-comments{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_post_time = get_theme_mod( 'video_streaming_display_post_time',false);
	if($video_streaming_post_time == true && get_theme_mod( 'video_streaming_metafields_time',false) != true){
    	$video_streaming_custom_css .='.metabox .entry-time{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} ';
	}
    if($video_streaming_post_time == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='.metabox .entry-time{';
			$video_streaming_custom_css .='display:inline-block;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_post_time == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px){';
		$video_streaming_custom_css .='.metabox .entry-time{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	if($video_streaming_post_date == false && $video_streaming_post_author == false && $video_streaming_post_comment == false && $video_streaming_post_time == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px) {';
    	$video_streaming_custom_css .='.metabox {';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_metafields_date = get_theme_mod( 'video_streaming_metafields_date',true);
	$video_streaming_metafields_author = get_theme_mod( 'video_streaming_metafields_author',true);
	$video_streaming_metafields_comment = get_theme_mod( 'video_streaming_metafields_comment',true);
	$video_streaming_metafields_time = get_theme_mod( 'video_streaming_metafields_time',true);
	if($video_streaming_metafields_date == false && $video_streaming_metafields_author == false && $video_streaming_metafields_comment == false && $video_streaming_metafields_time == false){
		$video_streaming_custom_css .='@media screen and (min-width:576px) {';
    	$video_streaming_custom_css .='.metabox {';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_slider = get_theme_mod( 'video_streaming_display_slider',false);
	if($video_streaming_slider == true && get_theme_mod( 'video_streaming_slider_hide', false) == false){
    	$video_streaming_custom_css .='#slider{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} ';
	}
    if($video_streaming_slider == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='#slider{';
			$video_streaming_custom_css .='display:block;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_slider == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px){';
		$video_streaming_custom_css .='#slider{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_sidebar = get_theme_mod( 'video_streaming_display_sidebar',true);
    if($video_streaming_sidebar == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='#sidebar{';
			$video_streaming_custom_css .='display:block;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_sidebar == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='#sidebar{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_scroll = get_theme_mod( 'video_streaming_display_scrolltop',true);
	if($video_streaming_scroll == true && get_theme_mod( 'video_streaming_hide_show_scroll',true) != true){
    	$video_streaming_custom_css .='#scrollbutton {';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} ';
	}
    if($video_streaming_scroll == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='#scrollbutton {';
			$video_streaming_custom_css .='display:block;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_scroll == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px){';
		$video_streaming_custom_css .='#scrollbutton {';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_preloader = get_theme_mod( 'video_streaming_display_preloader',false);
	if($video_streaming_preloader == true && get_theme_mod( 'video_streaming_preloader',false) == false){
		$video_streaming_custom_css .='@media screen and (min-width:575px) {';
    	$video_streaming_custom_css .='.frame{';
			$video_streaming_custom_css .=' visibility: hidden;';
		$video_streaming_custom_css .='} }';
	}
    if($video_streaming_preloader == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='.frame{';
			$video_streaming_custom_css .='visibility:visible;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_preloader == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px){';
		$video_streaming_custom_css .='.frame{';
			$video_streaming_custom_css .='visibility: hidden;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_search = get_theme_mod( 'video_streaming_display_search_category',true);
	if($video_streaming_search == true && get_theme_mod( 'video_streaming_search_enable_disable',true) != true){
    	$video_streaming_custom_css .='.search-cat-box{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} ';
	}
    if($video_streaming_search == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='.search-cat-box{';
			$video_streaming_custom_css .='display:block;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_search == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px){';
		$video_streaming_custom_css .='.search-cat-box{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	$video_streaming_myaccount = get_theme_mod( 'video_streaming_display_myaccount',true);
	if($video_streaming_myaccount == true && get_theme_mod( 'video_streaming_myaccount_enable_disable',true) != true){
    	$video_streaming_custom_css .='.login-box{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} ';
	}
    if($video_streaming_myaccount == true){
    	$video_streaming_custom_css .='@media screen and (max-width:575px) {';
		$video_streaming_custom_css .='.login-box{';
			$video_streaming_custom_css .='display:block;';
		$video_streaming_custom_css .='} }';
	}else if($video_streaming_myaccount == false){
		$video_streaming_custom_css .='@media screen and (max-width:575px){';
		$video_streaming_custom_css .='.login-box{';
			$video_streaming_custom_css .='display:none;';
		$video_streaming_custom_css .='} }';
	}

	// menu settings
	$video_streaming_menu_font_size_option = get_theme_mod('video_streaming_menu_font_size_option');
	$video_streaming_custom_css .='.primary-navigation a{';
		$video_streaming_custom_css .='font-size: '.esc_attr($video_streaming_menu_font_size_option).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_menu_padding = get_theme_mod('video_streaming_menu_padding');
	$video_streaming_custom_css .='.primary-navigation a{';
		$video_streaming_custom_css .='padding: '.esc_attr($video_streaming_menu_padding).'px;';
	$video_streaming_custom_css .='}';

	$video_streaming_theme_lay = get_theme_mod( 'video_streaming_text_tranform_menu','Uppercase');
    if($video_streaming_theme_lay == 'Uppercase'){
		$video_streaming_custom_css .='.primary-navigation a{';
			$video_streaming_custom_css .='';
		$video_streaming_custom_css .='}';
	}else if($video_streaming_theme_lay == 'Lowercase'){
		$video_streaming_custom_css .='.primary-navigation a{';
			$video_streaming_custom_css .='text-transform: lowercase;';
		$video_streaming_custom_css .='}';
	}
	else if($video_streaming_theme_lay == 'Capitalize'){
		$video_streaming_custom_css .='.primary-navigation a{';
			$video_streaming_custom_css .='text-transform: Capitalize;';
		$video_streaming_custom_css .='}';
	}

	$video_streaming_theme_lay = get_theme_mod( 'video_streaming_font_weight_option_menu','');
    if($video_streaming_theme_lay == 'Bold'){
		$video_streaming_custom_css .='.primary-navigation a{';
			$video_streaming_custom_css .='font-weight:bold;';
		$video_streaming_custom_css .='}';
	}else if($video_streaming_theme_lay == 'Normal'){
		$video_streaming_custom_css .='.primary-navigation a{';
			$video_streaming_custom_css .='font-weight: normal;';
		$video_streaming_custom_css .='}';
	}

	//  comment form width
	$video_streaming_comment_form_width = get_theme_mod( 'video_streaming_comment_form_width');
	$video_streaming_custom_css .='#comments textarea{';
		$video_streaming_custom_css .='width: '.esc_attr($video_streaming_comment_form_width).'%;';
	$video_streaming_custom_css .='}';

	$video_streaming_title_comment_form = get_theme_mod('video_streaming_title_comment_form', 'Leave a Reply');
	if($video_streaming_title_comment_form == ''){
		$video_streaming_custom_css .='#comments h2#reply-title {';
			$video_streaming_custom_css .='display: none;';
		$video_streaming_custom_css .='}';
	}

	$video_streaming_comment_form_button_content = get_theme_mod('video_streaming_comment_form_button_content', 'Post Comment');
	if($video_streaming_comment_form_button_content == ''){
		$video_streaming_custom_css .='#comments p.form-submit {';
			$video_streaming_custom_css .='display: none;';
		$video_streaming_custom_css .='}';
	}

	// featured image setting
	$video_streaming_image_border_radius = get_theme_mod('video_streaming_image_border_radius', 0);
	$video_streaming_custom_css .='.box-image img, .content_box img{';
		$video_streaming_custom_css .='border-radius: '.esc_attr($video_streaming_image_border_radius).'%;';
	$video_streaming_custom_css .='}';

	$video_streaming_image_box_shadow = get_theme_mod('video_streaming_image_box_shadow',0);
	$video_streaming_custom_css .='.box-image img, .content_box img{';
		$video_streaming_custom_css .='box-shadow: '.esc_attr($video_streaming_image_box_shadow).'px '.esc_attr($video_streaming_image_box_shadow).'px '.esc_attr($video_streaming_image_box_shadow).'px #b5b5b5;';
	$video_streaming_custom_css .='}';

	// Post Block
	$video_streaming_post_block_option = get_theme_mod( 'video_streaming_post_block_option','By Block');
    if($video_streaming_post_block_option == 'By Without Block'){
		$video_streaming_custom_css .='.inner-service, #blog_sec .sticky{';
			$video_streaming_custom_css .='border:none; margin:30px 0;';
		$video_streaming_custom_css .='}';
	}

	// post image 
	$video_streaming_post_featured_color = get_theme_mod('video_streaming_post_featured_color', '#5c727d');
	$video_streaming_post_featured_image = get_theme_mod('video_streaming_post_featured_image','Image');
	if($video_streaming_post_featured_image == 'Color'){
		$video_streaming_custom_css .='.post-color{';
			$video_streaming_custom_css .='background-color: '.esc_attr($video_streaming_post_featured_color).';';
		$video_streaming_custom_css .='}';
	}

	// featured image dimention
	$video_streaming_post_featured_image_dimention = get_theme_mod('video_streaming_post_featured_image_dimention', 'Default');
	$video_streaming_post_featured_image_custom_width = get_theme_mod('video_streaming_post_featured_image_custom_width');
	$video_streaming_post_featured_image_custom_height = get_theme_mod('video_streaming_post_featured_image_custom_height');
	if($video_streaming_post_featured_image_dimention == 'Custom'){
		$video_streaming_custom_css .='.box-image img{';
			$video_streaming_custom_css .='width: '.esc_attr($video_streaming_post_featured_image_custom_width).'px; height: '.esc_attr($video_streaming_post_featured_image_custom_height).'px;';
		$video_streaming_custom_css .='}';
	}

	// featured image dimention
	$video_streaming_custom_post_color_width = get_theme_mod('video_streaming_custom_post_color_width');
	$video_streaming_custom_post_color_height = get_theme_mod('video_streaming_custom_post_color_height');
	if($video_streaming_post_featured_image == 'Color'){
		$video_streaming_custom_css .='.post-color{';
			$video_streaming_custom_css .='width: '.esc_attr($video_streaming_custom_post_color_width).'px; height: '.esc_attr($video_streaming_custom_post_color_height).'px;';
		$video_streaming_custom_css .='}';
	}

	// site title font size
	$video_streaming_site_title_font_size = get_theme_mod('video_streaming_site_title_font_size', 25);
	$video_streaming_custom_css .='.logo .site-title{';
	$video_streaming_custom_css .='font-size: '.esc_attr($video_streaming_site_title_font_size).'px;';
	$video_streaming_custom_css .='}';

	// site tagline font size
	$video_streaming_site_tagline_font_size = get_theme_mod('video_streaming_site_tagline_font_size', 13);
	$video_streaming_custom_css .='p.site-description{';
	$video_streaming_custom_css .='font-size: '.esc_attr($video_streaming_site_tagline_font_size).'px;';
	$video_streaming_custom_css .='}';

	// woocommerce Product Navigation
	$video_streaming_wooproducts_nav = get_theme_mod('video_streaming_wooproducts_nav', 'Yes');
	if($video_streaming_wooproducts_nav == 'No'){
		$video_streaming_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$video_streaming_custom_css .='display: none;';
		$video_streaming_custom_css .='}';
	}