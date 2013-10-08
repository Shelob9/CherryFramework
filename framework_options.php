<?php
	if(!function_exists('optionsframework_option_name')) {
		function optionsframework_option_name() {
			// This gets the theme name from the stylesheet (lowercase and without spaces)
			$optionsframework_settings = get_option('optionsframework');
			$optionsframework_settings['id'] = CURRENT_THEME;
			update_option('optionsframework', $optionsframework_settings);
		}
		
	}
	/**
	 * Defines an array of options that will be used to generate the settings page and be saved in the database.
	 * When creating the "id" fields, make sure to use all lowercase and no spaces.
	 *  
	 */
	if(!function_exists('framework_options')){
		function framework_options() {
			global $typography_mixed_fonts;
			if(count($typography_mixed_fonts)==0){
				$typography_mixed_fonts = array_merge(options_typography_get_os_fonts() , options_typography_get_google_fonts());
				asort($typography_mixed_fonts);
			}

	//true/false array
			$true_false_array = array(
				"true"  => theme_locals("yes"),
				"false" => theme_locals("no")
			);
	//yes/no array
			$yes_no_array = array(
				"yes" => theme_locals("yes"),
				"no"  => theme_locals("no")
			);
	// If using image radio buttons, define a directory path
			$imagepath = PARENT_URL . '/includes/images/';

			$options = array();
// ---------------------------------------------------------
// General
// ---------------------------------------------------------
			$options["general"] = array( "name" => theme_locals('general'),
								"type" => "heading");
	// Background Defaults
			$background_defaults = array(
				'color' => '', 
				'image' => '', 
				'repeat' => 'repeat',
				'position' => 'top center',
				'attachment'=>'scroll'
			);

			$options['body_background'] = array( 
								"name" =>  theme_locals('body_name'),
								"desc" => theme_locals('body_desc'),
								"id" => "body_background",
								"std" => $background_defaults, 
								"type" => "background");
			
			$main_layout_opt = array('fullwidth' => theme_locals('fullwidth'), 'fixed' => theme_locals('fixed'));
			$options['main_layout'] = array( "name" => theme_locals('main_layout_name'),
								"desc" => theme_locals('main_layout_desc'),
								"id" => "main_layout",
								"type" => "radio",
								"std" => "fullwidth",
								"options" => $main_layout_opt);

			$options['main_background'] = array( "name" => theme_locals('main_bg_name'),
								"desc" => theme_locals('main_bg_desc'),
								"id" => "main_background",
								"std" => "#fafafa",
								"type" => "color");

			$options['header_color'] = array( "name" => theme_locals('header_name'),
								"desc" => theme_locals('header_desc'),
								"id" => "header_color",
								"std" => "",
								"type" => "color");
			
			$options['links_color'] = array( "name" => theme_locals('buttons_name'),
								"desc" => theme_locals('buttons_desc'),
								"id" => "links_color",
								"std" => "#0088cc",
								"type" => "color");

			$options['links_color_hover'] = array( "name" => theme_locals('links_color_hover'),
								"desc" => theme_locals('links_color_hover_desc'),
								"id" => "links_color_hover",
								"std" => "",
								"type" => "color");
								
								
			$options['google_mixed_3'] = array( 'name' => theme_locals('body_text_name'),
								'desc' => theme_locals('body_text_desc'),
								'id' => 'google_mixed_3',
								'std' => array( 'size' => '12px', 'lineheight' => '18px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#333333'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);
								
			$options['h1_heading'] = array( 'name' => theme_locals('h1_name'),
								'desc' => theme_locals('h1_desc'),
								'id' => 'h1_heading',
								'std' => array( 'size' => '30px', 'lineheight' => '35px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#333333'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);
			
			$options['h2_heading'] = array( 'name' => theme_locals('h2_name'),
								'desc' => theme_locals('h2_desc'),
								'id' => 'h2_heading',
								'std' => array( 'size' => '22px', 'lineheight' => '22px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#333333'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);
								
			$options['h3_heading'] = array( 'name' => theme_locals('h3_name'),
								'desc' => theme_locals('h3_desc'),
								'id' => 'h3_heading',
								'std' => array( 'size' => '18px', 'lineheight' => '18px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#333333'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);
			
			$options['h4_heading'] = array( 'name' => theme_locals('h4_name'),
								'desc' => theme_locals('h4_desc'),
								'id' => 'h4_heading',
								'std' => array( 'size' => '14px', 'lineheight' => '18px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#333333'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);
								
			$options['h5_heading'] = array( 'name' => theme_locals('h5_name'),
								'desc' => theme_locals('h5_desc'),
								'id' => 'h5_heading',
								'std' => array( 'size' => '12px', 'lineheight' => '18px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#333333'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);
								
			$options['h6_heading'] = array( 'name' => theme_locals('h6_name'),
								'desc' => theme_locals('h6_desc'),
								'id' => 'h6_heading',
								'std' => array( 'size' => '12px', 'lineheight' => '18px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#333333'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);
			
			$options['g_search_box_id'] = array( "name" => theme_locals('search_name'),
								"desc" => theme_locals('search_desc'),
								"id" => "g_search_box_id",
								"type" => "radio",
								"std" => "yes",
								"options" => $yes_no_array);

			$options['g_breadcrumbs_id'] = array( "name" => theme_locals('breadcrumbs_name'),
								"desc" => theme_locals('breadcrumbs_desc'),
								"id" => "g_breadcrumbs_id",
								"type" => "radio",
								"std" => "yes",
								"options" => $yes_no_array);;

			$options['custom_css'] = array( "name" => theme_locals('css_name'),
								"desc" => theme_locals('css_desc'),
								"id" => "custom_css",
								"std" => "",
								"type" => "textarea");

// ---------------------------------------------------------
// Logo & Favicon
// ---------------------------------------------------------

			$options['logo_favicon'] = array( "name" => theme_locals('logo_favicon'),
								"type" => "heading");
	// Logo type
			$logo_type = array(
				"image_logo" => theme_locals("image_logo"),
				"text_logo" => theme_locals("text_logo")
			);		

			$options['logo_type'] = array( "name" => theme_locals('logo_name'),
								"desc" => theme_locals('logo_desc'),
								"id" => "logo_type",
								"std" => "image_logo",
								"type" => "radio",
								"options" => $logo_type);

			$options['logo_typography'] = array( 'name' => theme_locals('logo_t_name'),
								'desc' => theme_locals('logo_t_desc'),
								'id' => 'logo_typography',
								'std' => array( 'size' => '40px', 'lineheight' => '48px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#049CDB'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);
			
			$options['logo_url'] = array( "name" => theme_locals('logo_image_path'),
								"desc" => theme_locals('logo_image_path_desc'),
								"id" => "logo_url",
								"std" => get_stylesheet_directory_uri() . "/images/logo.png",
								"type" => "upload");
								
			$options['favicon'] = array( "name" => theme_locals('favicon_name'),
								"desc" => theme_locals('favicon_desc'),
								"id" => "favicon",
								"std" => get_stylesheet_directory_uri() . "/favicon.ico",
								"type" => "upload");

// ---------------------------------------------------------
// Navigation
// ---------------------------------------------------------

			$options['navigation'] = array( "name" => theme_locals('navigation'),
								"type" => "heading");

			$options['menu_typography'] = array( 'name' => theme_locals('menu_t_name'),
								'desc' => theme_locals('menu_t_desc'),
								'id' => 'menu_typography',
								'std' => array( 'size' => '12px', 'lineheight' => '18px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#1133AA'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);

			$options['sf_delay'] = array( "name" => theme_locals('delay_name'),
								"desc" => theme_locals('delay_desc'),
								"id" => "sf_delay",
								"std" => "1000",
								"class" => "tiny",
								"type" => "text");
	// Superfish fade-in animation
			$sf_f_animation_array = array(
				"show" => theme_locals("enable fade-in animation"),
				"false" => theme_locals("disable fade-in animation")
			);

			$options['sf_f_animation'] = array( "name" => theme_locals('fade_name'),
								"desc" => theme_locals('fade_desc'),
								"id" => "sf_f_animation",
								"std" => "show",
								"type" => "radio",
								"options" => $sf_f_animation_array);
	// Superfish slide-down animation
			$sf_sl_animation_array = array(
				"show" => theme_locals("enable slide-down animation"),
				"false" => theme_locals("disable slide-down animation")
			);
			
			$options['sf_sl_animation'] = array( "name" => theme_locals('slide_name'),
								"desc" => theme_locals('slide_desc'),
								"id" => "sf_sl_animation",
								"std" => "show",
								"type" => "radio",
								"options" => $sf_sl_animation_array);
	// Superfish animation speed
			$sf_speed_array = array(
				"slow" => theme_locals("slow_speed"), "normal" => theme_locals("normal_speed"), "fast" => theme_locals("fast_speed"));
			
			$options['sf_speed'] = array( "name" => theme_locals('speed_name'),
								"desc" => theme_locals('speed_desc'),
								"id" => "sf_speed",
								"type" => "select",
								"std" => "normal",
								"class" => "tiny", //mini, tiny, small
								"options" => $sf_speed_array);

			$options['sf_arrows'] = array( "name" => theme_locals('arrows_name'),
								"desc" => theme_locals('arrows_desc'),
								"id" => "sf_arrows",
								"std" => "false",
								"type" => "radio",
								"options" => $true_false_array);

			$options['mobile_menu_label'] = array( "name" => theme_locals('mobile_menu_name'),
								"desc" => theme_locals('mobile_menu_desc'),
								"id" => "mobile_menu_label",
								"std" => theme_locals('mobile_menu_std'),
								"class" => "tiny",
								"type" => "text");	

// ---------------------------------------------------------
// Slider
// ---------------------------------------------------------

			$options['slider'] = array( "name" => theme_locals('slider'),
								"type" => "heading");
	// Slider type
			$options['sl_type'] = array( 
								"name" => theme_locals('slider_type_name'),
								"desc" => theme_locals('slider_type_desc'),
								"id" => "slider_type",
								"std" => "camera_slider",
								"type" => "images",
								"options" => array(
									'none_slider' => $imagepath . 'slider_none.png',
									'camera_slider' => $imagepath . 'slider_type_1.png',
									'accordion_slider' => $imagepath . 'slider_type_2.png'),
								"title" => array(
									'none_slider' => theme_locals('slider_off'),
									'camera_slider' => theme_locals('camera_slider'),
									'accordion_slider' => theme_locals('accordion_slider')));
	// ---------------------------------------------------------*/
	// Camera Slider
	// ---------------------------------------------------------

	// Slider effects
			$sl_effect_array = array("random" => theme_locals("random"), "simpleFade" => theme_locals("simpleFade"), "curtainTopLeft" => theme_locals("curtainTopLeft"), "curtainTopRight" => theme_locals("curtainTopRight"), "curtainBottomLeft" => theme_locals("curtainBottomLeft"), "curtainBottomRight" => theme_locals("curtainBottomRight"), "curtainSliceLeft" => theme_locals("curtainSliceLeft"), "curtainSliceRight" => theme_locals("curtainSliceRight"), "blindCurtainTopLeft" => theme_locals("blindCurtainTopLeft"), "blindCurtainTopRight" => theme_locals("blindCurtainTopRight"), "blindCurtainBottomLeft" => theme_locals("blindCurtainBottomLeft"), "blindCurtainBottomRight" => theme_locals("blindCurtainBottomRight"), "blindCurtainSliceBottom" => theme_locals("blindCurtainSliceBottom"), "blindCurtainSliceTop" => theme_locals("blindCurtainSliceTop"), "stampede" => theme_locals("stampede"), "mosaic" => theme_locals("mosaic"), "mosaicReverse" => theme_locals("mosaicReverse"), "mosaicRandom" => theme_locals("mosaicRandom"), "mosaicSpiral" => theme_locals("mosaicSpiral"), "mosaicSpiralReverse" => theme_locals("mosaicSpiralReverse"), "topLeftBottomRight" => theme_locals("topLeftBottomRight"), "bottomRightTopLeft" => theme_locals("bottomRightTopLeft"), "bottomLeftTopRight" => theme_locals("bottomLeftTopRight"));
		
			$options['sl_effect'] = array( "name" => theme_locals('effect_name'),
								"desc" => theme_locals('effect_desc'),
								"id" => "sl_effect",
								"std" => "random",
								"type" => "select",
								"class" => "tiny slider_type_1", //mini, tiny, small
								"options" => $sl_effect_array);
	// Slider columns
			$sl_columns_array = array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20");

			$options['sl_columns'] = array( "name" => theme_locals('columns_name'),
								"desc" => theme_locals('columns_desc'),
								"id" => "sl_columns",
								"std" => "6",
								"type" => "select",
								"class" => "small slider_type_1", //mini, tiny, small
								"options" => $sl_columns_array);
	// Slider rows
			$sl_rows_array = array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20");

			$options['sl_rows'] = array( "name" => theme_locals('rows_name'),
								"desc" => theme_locals('rows_desc'),
								"id" => "sl_rows",
								"std" => "6",
								"type" => "select",
								"class" => "small slider_type_1", //mini, tiny, small
								"options" => $sl_rows_array);
	// Banner effects
			$sl_banner_array = array("moveFromLeft" => theme_locals("moveFromLeft"), "moveFromRight" => theme_locals("moveFromRight"), "moveFromTop" => theme_locals("moveFromTop"), "moveFromBottom" => theme_locals("moveFromBottom"), "fadeIn" => theme_locals("fadeIn"), "fadeFromLeft" => theme_locals("fadeFromLeft"), "fadeFromRight" => theme_locals("fadeFromRight"), "fadeFromTop" => theme_locals("fadeFromTop"), "fadeFromBottom" => theme_locals("fadeFromBottom"));

			$options['sl_banner'] = array( "name" =>  theme_locals('banner_name'),
								"desc" =>  theme_locals('banner_desc'),
								"id" => "sl_banner",
								"std" => "fadeFromBottom",
								"type" => "select",
								"class" => "tiny slider_type_1", //mini, tiny, small
								"options" => $sl_banner_array);

			$options['sl_pausetime'] = array( "name" => theme_locals('pause_name'),
								"desc" => theme_locals('pause_desc'),
								"id" => "sl_pausetime",
								"std" => "7000",
								"class" => "tiny slider_type_1",
								"type" => "text");
	 
			$options['sl_animation_speed'] = array( "name" => theme_locals('animation_name'),
								"desc" => theme_locals('animation_desc'),
								"id" => "sl_animation_speed",
								"std" => "1500",
								"class" => "tiny slider_type_1",
								"type" => "text");
	 
			$options['sl_slideshow'] = array( "name" => theme_locals('slideshow_name'),
								"desc" => theme_locals('slideshow_desc'),
								"id" => "sl_slideshow",
								"std" => "true",
								"type" => "radio",
								"class" => "slider_type_1",
								"options" => $true_false_array);

			$options['sl_thumbnails'] = array( "name" => theme_locals('thumbnails_name'),
								"desc" => theme_locals('thumbnails_desc'),
								"id" => "sl_thumbnails",
								"std" => "true",
								"type" => "radio",
								"class" => "slider_type_1",
								"options" => $true_false_array);

			$options['sl_control_nav'] = array( "name" => theme_locals('pagination_name'),
								"desc" => theme_locals('pagination_desc'),
								"id" => "sl_control_nav",
								"std" => "true",
								"type" => "radio",
								"class" => "slider_type_1",
								"options" => $true_false_array);

			$options['sl_dir_nav'] = array( "name" => theme_locals('navigation_name'),
								"desc" => theme_locals('navigation_desc'),
								"id" => "sl_dir_nav",
								"std" => "true",
								"type" => "radio",
								"class" => "slider_type_1",
								"options" => $true_false_array);

			$options['sl_dir_nav_hide'] = array( "name" => theme_locals('hover_name'),
								"desc" => theme_locals('hover_desc'),
								"id" => "sl_dir_nav_hide",
								"std" => "false",
								"type" => "radio",
								"class" => "slider_type_1",
								"options" => $true_false_array);

			$options['sl_play_pause_button'] = array( "name" => theme_locals('button_name'),
								"desc" => theme_locals('button_desc'),
								"id" => "sl_play_pause_button",
								"std" => "true",
								"type" => "radio",
								"class" => "slider_type_1",
								"options" => $true_false_array);
	// Slider loader
			$sl_loader_array = array("no" => theme_locals("none"), "pie" => theme_locals("pie"), "bar" => theme_locals("bar"));
		
			$options['sl_loader'] = array( "name" => theme_locals('loader_name'),
								"desc" => theme_locals('loader_desc'),
								"id" => "sl_loader",
								"std" => "no",
								"type" => "select",
								"class" => "small slider_type_1", //mini, tiny, small
								"options" => $sl_loader_array);
	// ---------------------------------------------------------
	// Accordion Slider
	// ---------------------------------------------------------
			$post_array = array();
			$slider_post = query_posts("post_type=slider&posts_per_page=-1&post_status=publish&orderby=name&order=ASC");
			foreach ($slider_post as $value){
				$postID = $value -> ID;
				$post_array[$postID] = get_the_title($postID);
			};
			wp_reset_query();

			$options['acc_show_post'] = array( "name" => theme_locals('show_post_name'),
					"desc" => theme_locals('show_post_desc'),
					"id" => "acc_show_post",
					"std" => "",
					"type" => "multicheck",
					"class" => "slider_type_2",
					"options" => $post_array);

			$options['acc_slideshow'] = array( "name" => theme_locals('slideshow_name'),
								"desc" => theme_locals('slideshow_desc'),
								"id" => "acc_slideshow",
								"std" => "false",
								"type" => "radio",
								"class" => "slider_type_2",
								"options" => $true_false_array);

			$options['acc_hover_pause'] = array( "name" => theme_locals('hover_pause_name'),
								"desc" => theme_locals('hover_pause_desc'),
								"id" => "acc_hover_pause",
								"std" => "true",
								"type" => "radio",
								"class" => "slider_type_2",
								"options" => $true_false_array);

			$options['acc_pausetime'] = array( "name" => theme_locals('pause_name'),
								"desc" => theme_locals('pause_desc'),
								"id" => "acc_pausetime",
								"std" => "6000",
								"class" => "tiny slider_type_2",
								"type" => "text");

			$options['acc_animation_speed'] = array( "name" => theme_locals('animation_name'),
								"desc" => theme_locals('animation_desc'),
								"id" => "acc_animation_speed",
								"std" => "600",
								"class" => "tiny slider_type_2",
								"type" => "text");

			// Accordion animation easing    
			$acc_easing = array("linear" => theme_locals("linear"), "easeInSine" => theme_locals("easeInSine"), "easeOutSine" => theme_locals("easeOutSine"), "easeInOutSine" => theme_locals("easeInOutSine"), "easeInQuad" => theme_locals("easeInQuad"), "easeOutQuad" => theme_locals("easeOutQuad"), "easeInOutQuad" => theme_locals("easeInOutQuad"), "easeInCubic" => theme_locals("easeInCubic"), "easeOutCubic" => theme_locals("easeOutCubic"), "easeInOutCubic" => theme_locals("easeInOutCubic"), "easeInQuart" => theme_locals("easeInQuart"), "easeOutQuart" => theme_locals("easeOutQuart"), "easeInOutQuart" => theme_locals("easeInOutQuart"), "easeInQuint" => theme_locals("easeInQuint"), "easeOutQuint" => theme_locals("easeOutQuint"), "easeInOutQuint" => theme_locals("easeInOutQuint"), "easeInExpo" => theme_locals("easeInExpo"), "easeOutExpo" => theme_locals("easeOutExpo"), "easeInOutExpo" => theme_locals("easeInOutExpo"), "easeInCirc" => theme_locals("easeInCirc"), "easeOutCirc" => theme_locals("easeOutCirc"), "easeInOutCirc" => theme_locals("easeInOutCirc"), "easeInBack" => theme_locals("easeInBack"), "easeOutBack" => theme_locals("easeOutBack"), "easeInOutBack" => theme_locals("easeInOutBack"), "easeInElastic" => theme_locals("easeInElastic"), "easeOutElastic" => theme_locals("easeOutElastic"), "easeInOutElastic" => theme_locals("easeInOutElastic"), "easeInBounce" => theme_locals("easeInBounce"), "easeOutBounce" => theme_locals("easeOutBounce"), "easeInOutBounce" => theme_locals("easeInOutBounce"));

			$options['acc_easing'] = array( "name" =>  theme_locals('easing_name'),
								"desc" =>  theme_locals('easing_desc'),
								"id" => "acc_easing",
								"std" => "easeOutCubic",
								"type" => "select",
								"class" => "tiny slider_type_2", //mini, tiny, small
								"options" => $acc_easing);
			// Accordion trigger    
			$acc_trigger = array("click" => theme_locals("click"), "mouseover" => theme_locals("mouseover"), "dblclick" => theme_locals("dblclick"));

			$options['acc_trigger'] = array( "name" => theme_locals('trigger_name'),
								"desc" => theme_locals('trigger_desc'),
								"id" => "acc_trigger",
								"std" => "mouseover",
								"type" => "select",
								"class" => "tiny slider_type_2", //mini, tiny, small
								"options" => $acc_trigger);

			$options['acc_starting_slide'] = array( "name" => theme_locals('starting_slide_name'),
								"desc" => theme_locals('starting_slide_desc'),
								"id" => "acc_starting_slide",
								"std" => "0",
								"class" => "tiny slider_type_2",
								"type" => "text");
// ---------------------------------------------------------
// Blog
// ---------------------------------------------------------
	
			$options['blog'] = array( "name" => theme_locals('blog'),
								"type" => "heading");
			
			$options['blog_text'] = array( "name" => theme_locals('blog_name'),
								"desc" => theme_locals('blog_desc'),
								"id" => "blog_text",
								"std" => theme_locals('blog'),
								"type" => "text");
			
			$options['blog_related'] = array( "name" => theme_locals('posts_name'),
								"desc" => theme_locals('posts_desc'),
								"id" => "blog_related",
								"std" => theme_locals('posts_std'),
								"type" => "text");
			
			$options['blog_sidebar_pos'] = array( "name" => theme_locals('sidebar_name'),
								"desc" => theme_locals('sidebar_desc'),
								"id" => "blog_sidebar_pos",
								"std" => "right",
								"type" => "images",
								"options" => array(
									'left' => $imagepath . '2cl.png',
									'right' => $imagepath . '2cr.png',)
								);
	// Featured image size on the blog.
			$post_image_size_array = array("normal" => theme_locals("normal_size"),"large" => theme_locals("large_size"));
				
			$options['post_image_size'] = array( "name" => theme_locals('image_size_name'),
								"desc" => theme_locals('image_size_desc'),
								"id" => "post_image_size",
								"type" => "select",
								"std" => "normal",
								"class" => "small", //mini, tiny, small
								"options" => $post_image_size_array);
	// Featured image size on the single page.
			$single_image_size_array = array("normal" => theme_locals("normal_size"),"large" => theme_locals("large_size"));
			
			$options['single_image_size'] = array( "name" => theme_locals('single_post_image_name'),
								"desc" => theme_locals('single_post_image_desc'),
								"id" => "single_image_size",
								"type" => "select",
								"std" => "normal",
								"class" => "small", //mini, tiny, small
								"options" => $single_image_size_array);

			$options['single_share_button'] = array( "name" => theme_locals('display_share_name'),
								"desc" => theme_locals('display_share_desc'),
								"id" => "single_share_button",
								"std" => "true",
								"type" => "radio",
								"options" => $true_false_array);

			$options['load_image'] = array( "name" => theme_locals('load_image_name'),
								"desc" => theme_locals('load_image_desc'),
								"id" => "load_image",
								"std" => "true",
								"type" => "radio",
								"options" => $true_false_array);

			$options['post_excerpt'] = array( "name" => theme_locals('excerpt_name'),
								"desc" => theme_locals('excerpt_desc'),
								"id" => "post_excerpt",
								"std" => "true",
								"type" => "radio",
								"options" => $true_false_array);

			$options['blog_button_text'] = array( "name" => theme_locals('button_text_name'),
								"desc" => theme_locals('button_text_desc'),
								"id" => "blog_button_text",
								"std" => "Read More",
								"class" => "tiny",
								"type" => "text");

			$options['post_meta'] = array( "name" => theme_locals('meta_name'),
								"desc" => theme_locals('meta_desc'),
								"id" => "post_meta",
								"std" => "line",
								"type" => "radio",
								"options" => array('false' => theme_locals('hide'), 'line' => theme_locals('line'), 'icon' => theme_locals('icons')));

			$options['post_date'] = array( "name" => theme_locals('post_date_name'),
								"desc" => theme_locals('post_date_desc'),
								"id" => "post_date",
								"std" => "yes",
								"class" => "post_meta_options",
								"type" => "radio",
								"options" => $yes_no_array);

			$options['post_author'] = array( "name" => theme_locals('post_author_name'),
								"desc" => theme_locals('post_author_desc'),
								"id" => "post_author",
								"std" => "yes",
								"class" => "post_meta_options",
								"type" => "radio",
								"options" => $yes_no_array);

			$options['post_permalink'] = array( "name" => theme_locals('post_permalink_name'),
								"desc" => theme_locals('post_permalink_desc'),
								"id" => "post_permalink",
								"std" => "yes",
								"class" => "post_meta_options",
								"type" => "radio",
								"options" => $yes_no_array);

			$options['post_category'] = array( "name" => theme_locals('post_category_name'),
								"desc" => theme_locals('post_category_desc'),
								"id" => "post_category",
								"std" => "yes",
								"class" => "post_meta_options",
								"type" => "radio",
								"options" => $yes_no_array);			

			$options['post_tag'] = array( "name" => theme_locals('post_tag_name'),
								"desc" => theme_locals('post_tag_desc'),
								"id" => "post_tag",
								"std" => "yes",
								"class" => "post_meta_options",
								"type" => "radio",
								"options" => $yes_no_array);			

			$options['post_comment'] = array( "name" => theme_locals('post_comment_name'),
								"desc" => theme_locals('post_comment_desc'),
								"id" => "post_comment",
								"std" => "yes",
								"class" => "post_meta_options",
								"type" => "radio",
								"options" => $yes_no_array);
			
			$options['post_views'] = array( "name" => theme_locals('post_views_name'),
								"desc" => theme_locals('post_views_desc'),
								"id" => "post_views",
								"std" => "yes",
								"class" => "post_meta_options",
								"type" => "radio",
								"options" => $yes_no_array);	

			$options['post_like'] = array( "name" => theme_locals('post_like_name'),
								"desc" => theme_locals('post_like_desc'),
								"id" => "post_like",
								"std" => "yes",
								"class" => "post_meta_options",
								"type" => "radio",
								"options" => $yes_no_array);	
										
			$options['post_dislike'] = array( "name" => theme_locals('post_dislike_name'),
								"desc" => theme_locals('post_dislike_desc'),
								"id" => "post_dislike",
								"std" => "yes",
								"class" => "post_meta_options",
								"type" => "radio",
								"options" => $yes_no_array);

// ---------------------------------------------------------
// Portfolio
// ---------------------------------------------------------

			$options['portfolio'] = array( "name" => theme_locals("portfolio"),
								"type" => "heading");

			$options['folio_filter'] = array( "name" => theme_locals("filter_name"),
								"desc" => theme_locals("filter_desc"),
								"id" => "folio_filter",
								"std" => "cat",
								"type" => "select",
								"options" => array(
												"cat"	=>	theme_locals("by_category"),
												"tag"	=>	theme_locals("by_tags"),
												"none"	=>	theme_locals("none")));
			
			$options['folio_title'] = array( "name" => theme_locals("show_title_name"),
								"desc" => theme_locals("show_title_desc"),
								"id" => "folio_title",
								"std" => "yes",
								"type" => "radio",
								"options" => $yes_no_array);

			$options['folio_excerpt'] = array( "name" => theme_locals("show_excerpt_name"),
								"desc" => theme_locals("show_excerpt_desc"),
								"id" => "folio_excerpt",
								"std" => "yes",
								"type" => "radio",
								"options" => $yes_no_array);

			$options['folio_excerpt_count'] = array( "name" => theme_locals("excerpt_words_name"),
								"desc" => theme_locals("excerpt_words_desc"),
								"id" => "folio_excerpt_count",
								"std" => "20",
								"class" => "small",
								"type" => "text");

			$options['folio_btn'] = array( "name" => theme_locals("show_button_name"),
								"desc" => theme_locals("show_button_desc"),
								"id" => "folio_btn",
								"std" => "yes",
								"type" => "radio",
								"options" => $yes_no_array);

			$options['folio_button_text'] = array( "name" => theme_locals('folio_button_text_name'),
								"desc" => theme_locals('folio_button_text_desc'),
								"id" => "folio_button_text",
								"std" => "Read More",
								"class" => "tiny",
								"type" => "text");

			$options['folio_meta'] = array( "name" => theme_locals("show_meta_name"),
								"desc" => theme_locals("show_meta_desc"),
								"id" => "folio_meta",
								"std" => "yes",
								"type" => "radio",
								"options" => $yes_no_array);

			$options['folio_lightbox'] = array( "name" => theme_locals("enable_lightbox"),
								"desc" => theme_locals("folio_enable_lightbox_desc"),
								"id" => "folio_lightbox",
								"std" => "yes",
								"type" => "radio",
								"options" => $yes_no_array);

			$options['layout_mode'] = array( "name" => theme_locals("layout_name"),
								"desc" => theme_locals("layout_desc"),
								"id" => "layout_mode",
								"type" => "select",
								"std" => "fitRows",
								"class" => "small", //mini, tiny, small
								"options" => array(
												"fitRows" => theme_locals("fit_rows"),
												"masonry" => theme_locals("masonry")));

			$options['items_count2'] = array( "name" => theme_locals("portfolio_2_name"),
								"desc" => theme_locals("portfolio_2_desc"),
								"id" => "items_count2",
								"std" => "8",
								"class" => "small",
								"type" => "text");

			$options['items_count3'] = array( "name" => theme_locals("portfolio_3_name"),
								"desc" => theme_locals("portfolio_3_desc"),
								"id" => "items_count3",
								"std" => "9",
								"class" => "small",
								"type" => "text");
			
			$options['items_count4'] = array( "name" => theme_locals("portfolio_4_name"),
								"desc" => theme_locals("portfolio_4_desc"),
								"id" => "items_count4",
								"std" => "12",
								"class" => "small",
								"type" => "text");

// ---------------------------------------------------------
// Footer
// ---------------------------------------------------------

			$options['footer'] = array( "name" => theme_locals("footer"),
								"type" => "heading");
			
			$options['footer_text'] = array( "name" => theme_locals("copyright_text_name"),
								"desc" => theme_locals("copyright_text_desc"),
								"id" => "footer_text",
								"std" => "",
								"type" => "textarea");
			
			$options['ga_code'] = array( "name" => theme_locals("google_name"),
								"desc" => theme_locals("google_desc"),
								"id" => "ga_code",
								"std" => "",
								"type" => "textarea");
			
			$options['feed_url'] = array( "name" => theme_locals("feedburner_name"),
								"desc" => theme_locals("feedburner_desc"),
								"id" => "feed_url",
								"std" => "",
								"type" => "text");
			
			$options['footer_menu'] = array( "name" => theme_locals("footer_menu_name"),
								"desc" => theme_locals("footer_menu_desc"),
								"id" => "footer_menu",
								"std" => "true",
								"type" => "radio",
								"options" => $true_false_array);

			$options['footer_menu_typography'] = array( 'name' => theme_locals("footer_menu_typography_name"),
								'desc' => theme_locals("footer_menu_typography_desc"),
								'id' => 'footer_menu_typography',
								'std' => array( 'size' => '12px', 'lineheight' => '18px', 'face' => 'Arial, Helvetica, sans-serif', 'style' => 'normal', 'character'  => 'latin', 'color' => '#0088CC'),
								'type' => 'typography',
								'options' => array(
										'faces' => $typography_mixed_fonts )
								);
			
			return $options;
		}
	}

// This function combined child theme options and framework options
	if(!function_exists('combined_option_array')){
		function combined_option_array(){
			$child_options = optionsframework_options();
			$framework_options = framework_options();
			$add_child_array = array();
			$add_child_tabs_array = array();
			$combined_array = array();
			$old_value_array = array();
			foreach ($child_options as $value) {
				foreach ($framework_options as $key => $value_2) {
					if(array_key_exists("id", $value) && array_key_exists("id", $value_2)){
						if(in_array($value["id"], $value_2)){
							if(array_key_exists("std", $value)){
								$framework_options[array_search($value_2, $framework_options)]["std"] = $value["std"];
							}
							if(array_key_exists("disable", $value)){
								if($value["disable"]=="true"){
									unset($framework_options[$key]);
								}
							}
							unset($add_to_array);
							break;
						}else{
							if(array_key_exists("type", $value)){
								if($value["type"] != "heading"){
									$add_to_array = $value;
								}
							}
						}
					}
				}

				if(isset($add_to_array)){
					if(array_key_exists("type", $old_value_array)){
						if($old_value_array["type"]=="heading"){
							array_push($add_child_array, $old_value_array);
						}
					}
					array_push($add_child_array, $add_to_array);
					unset($add_to_array);
				}
				$old_value_array = $value;
			}
			$combined_array =  array_merge ($framework_options, $add_child_array);
			return $combined_array;
		}
	}

/**
 * This is optional, but if you want to reuse some of the defaults
 * or values you already have built in the options panel, you
 * can load them into $options for easy reference
 */
	add_action('customize_register', 'cherry_register');

	if(!function_exists('cherry_register')) {
		function cherry_register($wp_customize) {
			$themename = CURRENT_THEME;

			$options = combined_option_array();
// ------------------------------------------------------------
// General
// ------------------------------------------------------------
			$wp_customize->add_section( $themename.'_header', array(
				'title' => theme_locals('general'),
				'priority' => 200
			));
			
			// Background Image
			$wp_customize->add_setting($themename.'[body_background][image]', array(
				'default' => $options['body_background']['std']['image'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'body_background_image', array(
				'label'   => theme_locals('background_image'),
				'section' => $themename.'_header',
				'settings'   => $themename.'[body_background][image]'
			)));
			
			// Background Color
			$wp_customize->add_setting( $themename.'[body_background][color]', array(
				'default' => $options['body_background']['std']['color'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background', array(
				'label'   => theme_locals('background_color'),
				'section' => $themename.'_header',
				'settings'   => $themename.'[body_background][color]'
			)));
			
			// Header Color 
			$wp_customize->add_setting( $themename.'[header_color]', array(
				'default' => $options['header_color']['std'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
				'label'   => $options['header_color']['name'],
				'section' => $themename.'_header',
				'settings'   => $themename.'[header_color]'
			)));
			
			// Body Font Face 
			$wp_customize->add_setting( $themename.'[google_mixed_3][face]', array(
				'default' => $options['google_mixed_3']['std']['face'],
				'type' => 'option'
			));
		
			$wp_customize->add_control( $themename.'_google_mixed_3', array(
					'label' => $options['google_mixed_3']['name'],
					'section' => $themename.'_header',
					'settings' => $themename.'[google_mixed_3][face]',
					'type' => 'select',
					'choices' => $options['google_mixed_3']['options']['faces']
			));
			
			// Buttons and Links Color 
			$wp_customize->add_setting( $themename.'[links_color]', array(
				'default' => $options['links_color']['std'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'links_color', array(
				'label'   => $options['links_color']['name'],
				'section' => $themename.'_header',
				'settings'   => $themename.'[links_color]'
			)));

			// breadcrumbs 
			$wp_customize->add_setting( $themename.'[g_breadcrumbs_id]', array(
					'default' => $options['g_breadcrumbs_id']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_g_breadcrumbs_id', array(
					'label' => $options['g_breadcrumbs_id']['name'],
					'section' => $themename.'_header',
					'settings' => $themename.'[g_breadcrumbs_id]',
					'type' => $options['g_breadcrumbs_id']['type'],
					'choices' => $options['g_breadcrumbs_id']['options']
			));

			// Search Box
			$wp_customize->add_setting( $themename.'[g_search_box_id]', array(
					'default' => $options['g_search_box_id']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_g_search_box_id', array(
					'label' => $options['g_search_box_id']['name'],
					'section' => $themename.'_header',
					'settings' => $themename.'[g_search_box_id]',
					'type' => $options['g_search_box_id']['type'],
					'choices' => $options['g_search_box_id']['options']
			));

			// H4 Heading font face 
			$wp_customize->add_setting( $themename.'[h4_heading][face]', array(
				'default' => $options['h4_heading']['std']['face'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( $themename.'_h4_heading', array(
					'label' => $options['h4_heading']['name'],
					'section' => $themename.'_header',
					'settings' => $themename.'[h4_heading][face]',
					'type' => 'select',
					'choices' => $options['h4_heading']['options']['faces']
			));
			// H3 Heading font face 
			$wp_customize->add_setting( $themename.'[h3_heading][face]', array(
				'default' => $options['h3_heading']['std']['face'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( $themename.'_h3_heading', array(
					'label' => $options['h3_heading']['name'],
					'section' => $themename.'_header',
					'settings' => $themename.'[h3_heading][face]',
					'type' => 'select',
					'choices' => $options['h3_heading']['options']['faces']
			));
			// H2 Heading font face 
			$wp_customize->add_setting( $themename.'[h2_heading][face]', array(
				'default' => $options['h2_heading']['std']['face'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( $themename.'_h2_heading', array(
					'label' => $options['h2_heading']['name'],
					'section' => $themename.'_header',
					'settings' => $themename.'[h2_heading][face]',
					'type' => 'select',
					'choices' => $options['h2_heading']['options']['faces']
			));

			// H1 Heading font face 
			$wp_customize->add_setting( $themename.'[h1_heading][face]', array(
				'default' => $options['h1_heading']['std']['face'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( $themename.'_h1_heading', array(
					'label' => $options['h1_heading']['name'],
					'section' => $themename.'_header',
					'settings' => $themename.'[h1_heading][face]',
					'type' => 'select',
					'choices' => $options['h1_heading']['options']['faces']
			));
			// H6 Heading font face 
			$wp_customize->add_setting( $themename.'[h6_heading][face]', array(
				'default' => $options['h6_heading']['std']['face'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( $themename.'_h6_heading', array(
					'label' => $options['h6_heading']['name'],
					'section' => $themename.'_header',
					'settings' => $themename.'[h6_heading][face]',
					'type' => 'select',
					'choices' => $options['h6_heading']['options']['faces']
			));	
			// H5 Heading font face 
			$wp_customize->add_setting( $themename.'[h5_heading][face]', array(
				'default' => $options['h5_heading']['std']['face'],
				'type' => 'option'
			));
			
			$wp_customize->add_control( $themename.'_h5_heading', array(
					'label' => $options['h5_heading']['name'],
					'section' => $themename.'_header',
					'settings' => $themename.'[h5_heading][face]',
					'type' => 'select',
					'choices' => $options['h5_heading']['options']['faces']
			));

// ---------------------------------------------------------
// Logo
// ---------------------------------------------------------

			$wp_customize->add_section( $themename.'_logo', array(
				'title' => theme_locals('logo'),
				'priority' => 201
			));
			
			/* Logo Type */
			$wp_customize->add_setting( $themename.'[logo_type]', array(
					'default' => $options['logo_type']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_logo_type', array(
					'label' => $options['logo_type']['name'],
					'section' => $themename.'_logo',
					'settings' => $themename.'[logo_type]',
					'type' => $options['logo_type']['type'],
					'choices' => $options['logo_type']['options']
			));
			
			/* Logo Path */
			$wp_customize->add_setting( $themename.'[logo_url]', array(
				'type' => 'option'
			));
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_url', array(
				'label' => $options['logo_url']['name'],
				'section' => $themename.'_logo',
				'settings' => $themename.'[logo_url]'
			)));
			
// ---------------------------------------------------------
// Slider
// ---------------------------------------------------------			 
			$wp_customize->add_section( $themename.'_slider', array(
				'title' => theme_locals('slider_name'),
				'priority' => 202
			));
			 
			/* Slider Effect */
			$wp_customize->add_setting( $themename.'[sl_effect]', array(
					'default' => $options['sl_effect']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_sl_effect', array(
					'label' => $options['sl_effect']['name'],
					'section' => $themename.'_slider',
					'settings' => $themename.'[sl_effect]',
					'type' => $options['sl_effect']['type'],
					'choices' => $options['sl_effect']['options']
			));
			 
			/* Pause time */
			$wp_customize->add_setting( $themename.'[sl_pausetime]', array(
					'default' => $options['sl_pausetime']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_sl_pausetime', array(
					'label' => $options['sl_pausetime']['name'],
					'section' => $themename.'_slider',
					'settings' => $themename.'[sl_pausetime]',
					'type' => $options['sl_pausetime']['type']
			));
			 
			/* Animation speed */
			$wp_customize->add_setting( $themename.'[sl_animation_speed]', array(
					'default' => $options['sl_animation_speed']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_sl_animation_speed', array(
					'label' => $options['sl_animation_speed']['name'],
					'section' => $themename.'_slider',
					'settings' => $themename.'[sl_animation_speed]',
					'type' => $options['sl_animation_speed']['type']
			));
			 
			/* Auto slideshow */
			$wp_customize->add_setting( $themename.'[sl_slideshow]', array(
					'default' => $options['sl_slideshow']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_sl_slideshow', array(
					'label' => $options['sl_slideshow']['name'],
					'section' => $themename.'_slider',
					'settings' => $themename.'[sl_slideshow]',
					'type' => $options['sl_slideshow']['type'],
					'choices' => $options['sl_slideshow']['options']
			));
			 
			/* Slide thumbnails */
			$wp_customize->add_setting( $themename.'[sl_thumbnails]', array(
					'default' => $options['sl_thumbnails']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_sl_thumbnails', array(
					'label' => $options['sl_thumbnails']['name'],
					'section' => $themename.'_slider',
					'settings' => $themename.'[sl_thumbnails]',
					'type' => $options['sl_thumbnails']['type'],
					'choices' => $options['sl_thumbnails']['options']
			));
			 
			/* Show pagination? */
			$wp_customize->add_setting( $themename.'[sl_control_nav]', array(
					'default' => $options['sl_control_nav']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_sl_control_nav', array(
					'label' => $options['sl_control_nav']['name'],
					'section' => $themename.'_slider',
					'settings' => $themename.'[sl_control_nav]',
					'type' => $options['sl_control_nav']['type'],
					'choices' => $options['sl_control_nav']['options']
			));   
			 
			/* Display next & prev navigation? */
			$wp_customize->add_setting( $themename.'[sl_dir_nav]', array(
					'default' => $options['sl_dir_nav']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_sl_dir_nav', array(
					'label' => $options['sl_dir_nav']['name'],
					'section' => $themename.'_slider',
					'settings' => $themename.'[sl_dir_nav]',
					'type' => $options['sl_dir_nav']['type'],
					'choices' => $options['sl_dir_nav']['options']
			));
			 
			/* Play/Pause button */
			$wp_customize->add_setting( $themename.'[sl_play_pause_button]', array(
					'default' => $options['sl_play_pause_button']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_sl_play_pause_button', array(
					'label' => $options['sl_play_pause_button']['name'],
					'section' => $themename.'_slider',
					'settings' => $themename.'[sl_play_pause_button]',
					'type' => $options['sl_play_pause_button']['type'],
					'choices' => $options['sl_play_pause_button']['options']
			));

			/* Loader */
			$wp_customize->add_setting( $themename.'[sl_loader]', array(
					'default' => $options['sl_loader']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_sl_loader', array(
					'label' => $options['sl_loader']['name'],
					'section' => $themename.'_slider',
					'settings' => $themename.'[sl_loader]',
					'type' => $options['sl_loader']['type'],
					'choices' => $options['sl_loader']['options']
			));
			
// ---------------------------------------------------------
// Blog
// ---------------------------------------------------------			
			$wp_customize->add_section( $themename.'_blog', array(
					'title' => theme_locals('blog'),
					'priority' => 203
			));
			
			/* Blog image size */
			$wp_customize->add_setting( $themename.'[post_image_size]', array(
					'default' => $options['post_image_size']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_post_image_size', array(
					'label' => $options['post_image_size']['name'],
					'section' => $themename.'_blog',
					'settings' => $themename.'[post_image_size]',
					'type' => $options['post_image_size']['type'],
					'choices' => $options['post_image_size']['options']
			));
			
			/* Single post image size */
			$wp_customize->add_setting( $themename.'[single_image_size]', array(
					'default' => $options['single_image_size']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_single_image_size', array(
					'label' => $options['single_image_size']['name'],
					'section' => $themename.'_blog',
					'settings' => $themename.'[single_image_size]',
					'type' => $options['single_image_size']['type'],
					'choices' => $options['single_image_size']['options']
			));
			
			/* Post Meta */
			$wp_customize->add_setting( $themename.'[post_meta]', array(
					'default' => $options['post_meta']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_post_meta', array(
					'label' => $options['post_meta']['name'],
					'section' => $themename.'_blog',
					'settings' => $themename.'[post_meta]',
					'type' => $options['post_meta']['type'],
					'choices' => $options['post_meta']['options']
			));
			
			/* Post Excerpt */
			$wp_customize->add_setting( $themename.'[post_excerpt]', array(
					'default' => $options['post_excerpt']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_post_excerpt', array(
					'label' => $options['post_excerpt']['name'],
					'section' => $themename.'_blog',
					'settings' => $themename.'[post_excerpt]',
					'type' => $options['post_excerpt']['type'],
					'choices' => $options['post_excerpt']['options']
			));
			
// ---------------------------------------------------------
// Footer
// ---------------------------------------------------------			
			$wp_customize->add_section( $themename.'_footer', array(
				'title' => theme_locals('footer'),
				'priority' => 204
			));
				
			/* Footer Copyright Text */
			$wp_customize->add_setting( $themename.'[footer_text]', array(
					'default' => $options['footer_text']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_footer_text', array(
					'label' => $options['footer_text']['name'],
					'section' => $themename.'_footer',
					'settings' => $themename.'[footer_text]',
					'type' => 'text'
			));
			
			/* Display Footer Menu */
			$wp_customize->add_setting( $themename.'[footer_menu]', array(
					'default' => $options['footer_menu']['std'],
					'type' => 'option'
			));
			$wp_customize->add_control( $themename.'_footer_menu', array(
					'label' => $options['footer_menu']['name'],
					'section' => $themename.'_footer',
					'settings' => $themename.'[footer_menu]',
					'type' => $options['footer_menu']['type'],
					'choices' => $options['footer_menu']['options']
			));	
		};
	}
?>