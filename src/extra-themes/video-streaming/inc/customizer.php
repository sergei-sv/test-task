<?php
/**
 * Video Streaming Theme Customizer
 * @package Video Streaming
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function video_streaming_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'video_streaming_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','video-streaming' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('video_streaming_site_title_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
	));
	$wp_customize->add_control('video_streaming_site_title_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Site Title','video-streaming'),
		'section' => 'title_tagline'
	));

 	$wp_customize->add_setting('video_streaming_site_title_font_size',array(
		'default'=> 25,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','video-streaming' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

   $wp_customize->add_setting('video_streaming_site_tagline_enable',array(
      'default' => true,
      'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
   ));
   $wp_customize->add_control('video_streaming_site_tagline_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable Site Tagline','video-streaming'),
      'section' => 'title_tagline'
   ));

   $wp_customize->add_setting('video_streaming_site_tagline_font_size',array(
		'default'=> 13,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','video-streaming' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

    $wp_customize->add_setting('video_streaming_site_logo_inline',array(
       'default' => false,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_site_logo_inline',array(
       'type' => 'checkbox',
       'label' => __('Site logo inline with site title','video-streaming'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('video_streaming_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','video-streaming'),
        'description' => __('Here you can add the background skin along with the background image.','video-streaming'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','video-streaming'),
            'Without Background' => __('Without Background Skin','video-streaming'),
        ),
	) );

	//add home page setting pannel
	$wp_customize->add_panel( 'video_streaming_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'video-streaming' ),
	    'description' => __( 'Description of what this panel does.', 'video-streaming' ),
	) );

	$video_streaming_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One', 
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower', 
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit', 
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two', 
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda', 
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli', 
		'Marck Script'           => 'Marck Script', 
		'Noto Serif'             => 'Noto Serif', 
		'Open Sans'              => 'Open Sans', 
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen', 
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display', 
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik', 
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo', 
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two', 
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn', 
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('video_streaming_typography', array(
		'title'    => __('Typography', 'video-streaming'),
		'panel'    => 'video_streaming_panel_id',
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('video_streaming_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_paragraph_color', array(
		'label'    => __('Paragraph Color', 'video-streaming'),
		'section'  => 'video_streaming_typography',
		'settings' => 'video_streaming_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('video_streaming_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control(	'video_streaming_paragraph_font_family', array(
		'section' => 'video_streaming_typography',
		'label'   => __('Paragraph Fonts', 'video-streaming'),
		'type'    => 'select',
		'choices' => $video_streaming_font_array,
	));

	$wp_customize->add_setting('video_streaming_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('video_streaming_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'video-streaming'),
		'section' => 'video_streaming_typography',
		'setting' => 'video_streaming_paragraph_font_size',
		'type'    => 'text',
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('video_streaming_atag_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_atag_color', array(
		'label'    => __('"a" Tag Color', 'video-streaming'),
		'section'  => 'video_streaming_typography',
		'settings' => 'video_streaming_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('video_streaming_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control(	'video_streaming_atag_font_family', array(
		'section' => 'video_streaming_typography',
		'label'   => __('"a" Tag Fonts', 'video-streaming'),
		'type'    => 'select',
		'choices' => $video_streaming_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('video_streaming_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_li_color', array(
		'label'    => __('"li" Tag Color', 'video-streaming'),
		'section'  => 'video_streaming_typography',
		'settings' => 'video_streaming_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('video_streaming_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control(	'video_streaming_li_font_family', array(
		'section' => 'video_streaming_typography',
		'label'   => __('"li" Tag Fonts', 'video-streaming'),
		'type'    => 'select',
		'choices' => $video_streaming_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('video_streaming_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_h1_color', array(
		'label'    => __('H1 Color', 'video-streaming'),
		'section'  => 'video_streaming_typography',
		'settings' => 'video_streaming_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('video_streaming_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control('video_streaming_h1_font_family', array(
		'section' => 'video_streaming_typography',
		'label'   => __('H1 Fonts', 'video-streaming'),
		'type'    => 'select',
		'choices' => $video_streaming_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('video_streaming_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('video_streaming_h1_font_size', array(
		'label'   => __('H1 Font Size', 'video-streaming'),
		'section' => 'video_streaming_typography',
		'setting' => 'video_streaming_h1_font_size',
		'type'    => 'text',
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting('video_streaming_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_h2_color', array(
		'label'    => __('h2 Color', 'video-streaming'),
		'section'  => 'video_streaming_typography',
		'settings' => 'video_streaming_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('video_streaming_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control(
	'video_streaming_h2_font_family', array(
		'section' => 'video_streaming_typography',
		'label'   => __('h2 Fonts', 'video-streaming'),
		'type'    => 'select',
		'choices' => $video_streaming_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('video_streaming_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('video_streaming_h2_font_size', array(
		'label'   => __('H2 Font Size', 'video-streaming'),
		'section' => 'video_streaming_typography',
		'setting' => 'video_streaming_h2_font_size',
		'type'    => 'text',
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting('video_streaming_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_h3_color', array(
		'label'    => __('H3 Color', 'video-streaming'),
		'section'  => 'video_streaming_typography',
		'settings' => 'video_streaming_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('video_streaming_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control(
	'video_streaming_h3_font_family', array(
		'section' => 'video_streaming_typography',
		'label'   => __('H3 Fonts', 'video-streaming'),
		'type'    => 'select',
		'choices' => $video_streaming_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('video_streaming_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('video_streaming_h3_font_size', array(
		'label'   => __('H3 Font Size', 'video-streaming'),
		'section' => 'video_streaming_typography',
		'setting' => 'video_streaming_h3_font_size',
		'type'    => 'text',
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting('video_streaming_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_h4_color', array(
		'label'    => __('H4 Color', 'video-streaming'),
		'section'  => 'video_streaming_typography',
		'settings' => 'video_streaming_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('video_streaming_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control('video_streaming_h4_font_family', array(
		'section' => 'video_streaming_typography',
		'label'   => __('H4 Fonts', 'video-streaming'),
		'type'    => 'select',
		'choices' => $video_streaming_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('video_streaming_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('video_streaming_h4_font_size', array(
		'label'   => __('H4 Font Size', 'video-streaming'),
		'section' => 'video_streaming_typography',
		'setting' => 'video_streaming_h4_font_size',
		'type'    => 'text',
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting('video_streaming_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_h5_color', array(
		'label'    => __('H5 Color', 'video-streaming'),
		'section'  => 'video_streaming_typography',
		'settings' => 'video_streaming_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('video_streaming_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control('video_streaming_h5_font_family', array(
		'section' => 'video_streaming_typography',
		'label'   => __('H5 Fonts', 'video-streaming'),
		'type'    => 'select',
		'choices' => $video_streaming_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('video_streaming_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('video_streaming_h5_font_size', array(
		'label'   => __('H5 Font Size', 'video-streaming'),
		'section' => 'video_streaming_typography',
		'setting' => 'video_streaming_h5_font_size',
		'type'    => 'text',
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting('video_streaming_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_h6_color', array(
		'label'    => __('H6 Color', 'video-streaming'),
		'section'  => 'video_streaming_typography',
		'settings' => 'video_streaming_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('video_streaming_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control('video_streaming_h6_font_family', array(
		'section' => 'video_streaming_typography',
		'label'   => __('H6 Fonts', 'video-streaming'),
		'type'    => 'select',
		'choices' => $video_streaming_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('video_streaming_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('video_streaming_h6_font_size', array(
		'label'   => __('H6 Font Size', 'video-streaming'),
		'section' => 'video_streaming_typography',
		'setting' => 'video_streaming_h6_font_size',
		'type'    => 'text',
	));

	//layout setting
	$wp_customize->add_section( 'video_streaming_option', array(
    	'title'      => __( 'Layout Settings', 'video-streaming' ),
    	'panel'    => 'video_streaming_panel_id',
	) );

	$wp_customize->add_setting('video_streaming_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','video-streaming'),
       'section' => 'video_streaming_option'
    ));

   $wp_customize->add_setting('video_streaming_preloader_type',array(
     	'default' => 'First Preloader Type',
     	'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_preloader_type',array(
      'type' => 'radio',
      'label' => __('Preloader Types','video-streaming'),
      'section' => 'video_streaming_option',
      'choices' => array(
         'First Preloader Type' => __('First Preloader Type','video-streaming'),
         'Second Preloader Type' => __('Second Preloader Type','video-streaming'),
      ),
	) );

	$wp_customize->add_setting('video_streaming_preloader_bg_color_option', array(
		'default'           => '#03B2FB',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'video-streaming'),
		'section'  => 'video_streaming_option',
	)));

	$wp_customize->add_setting('video_streaming_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'video-streaming'),
		'section'  => 'video_streaming_option',
	)));

	$wp_customize->add_setting('video_streaming_width_layout_options',array(
		'default' => 'Default',
		'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_width_layout_options',array(
		'type' => 'radio',
		'label' => __('Container Box','video-streaming'),
		'description' => __('Here you can change the Width layout. ','video-streaming'),
		'section' => 'video_streaming_option',
		'choices' => array(
		   'Default' => __('Default','video-streaming'),
		   'Container Layout' => __('Container Layout','video-streaming'),
		   'Box Layout' => __('Box Layout','video-streaming'),
		),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('video_streaming_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	) );
	$wp_customize->add_control('video_streaming_layout_options', array(
        'type' => 'select',
        'label' => __('Select different post sidebar layout','video-streaming'),
        'section' => 'video_streaming_option',
        'choices' => array(
            'One Column' => __('One Column','video-streaming'),
            'Grid Layout' => __('Grid Layout','video-streaming'),
            'Left Sidebar' => __('Left Sidebar','video-streaming'),
            'Right Sidebar' => __('Right Sidebar','video-streaming')
        ),
	)   );

	$wp_customize->add_setting('video_streaming_sidebar_size',array(
        'default' => 'Sidebar 1/3',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','video-streaming'),
        'section' => 'video_streaming_option',
        'choices' => array(
            'Sidebar 1/3' => __('Sidebar 1/3','video-streaming'),
            'Sidebar 1/4' => __('Sidebar 1/4','video-streaming'),
        ),
	) );

	$wp_customize->add_setting( 'video_streaming_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize,  'video_streaming_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','video-streaming' ),
		'section'     => 'video_streaming_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'video_streaming_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize,  'video_streaming_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','video-streaming' ),
		'section' => 'video_streaming_option',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	//Blog Post Settings
	$wp_customize->add_section('video_streaming_post_settings', array(
		'title'    => __('Post General Settings', 'video-streaming'),
		'panel'    => 'video_streaming_panel_id',
	));

	$wp_customize->add_setting('video_streaming_post_layouts',array(
     'default' => 'Layout 1',
     'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_post_layouts', array(
		'type' => 'select',
		'label' => __('Post Layouts','video-streaming'),
		'description' => __('Here you can change the 3 different layouts of post','video-streaming'),
		'section' => 'video_streaming_post_settings',
		'choices' => array(
		   'Layout 1' => __('Layouts 1','video-streaming'),
		   'Layout 2' => __('Layouts 2','video-streaming'),
		   'Layout 3' => __('Layouts 3','video-streaming'),
	)));

	$wp_customize->add_setting('video_streaming_metafields_date',array(
		'default' => true,
		'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
	));
	$wp_customize->add_control('video_streaming_metafields_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date ','video-streaming'),
		'section' => 'video_streaming_post_settings'
	));

	$wp_customize->add_setting('video_streaming_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
        $wp_customize,'video_streaming_post_date_icon',array(
		'label'	=> __('Post Date Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('video_streaming_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','video-streaming'),
       'section' => 'video_streaming_post_settings'
    ));

    $wp_customize->add_setting('video_streaming_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
        $wp_customize,'video_streaming_post_author_icon',array(
		'label'	=> __('Post Author Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('video_streaming_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','video-streaming'),
       'section' => 'video_streaming_post_settings'
    ));

    $wp_customize->add_setting('video_streaming_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
        $wp_customize,'video_streaming_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('video_streaming_metafields_time',array(
       'default' => false,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','video-streaming'),
       'section' => 'video_streaming_post_settings'
    ));

    $wp_customize->add_setting('video_streaming_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
        $wp_customize,'video_streaming_post_time_icon',array(
		'label'	=> __('Post Time Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('video_streaming_post_featured_image',array(
       'default' => 'Image',
       'sanitize_callback'	=> 'video_streaming_sanitize_choices'
    ));
    $wp_customize->add_control('video_streaming_post_featured_image',array(
       'type' => 'select',
       'label'	=> __('Post Image Options','video-streaming'),
       'choices' => array(
            'Image' => __('Image','video-streaming'),
            'Color' => __('Color','video-streaming'),
            'None' => __('None','video-streaming'),
        ),
      	'section'	=> 'video_streaming_post_settings',
    ));

    $wp_customize->add_setting('video_streaming_post_featured_color', array(
		'default'           => '#5c727d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_post_featured_color', array(
		'label'    => __('Post Color', 'video-streaming'),
		'section'  => 'video_streaming_post_settings',
		'settings' => 'video_streaming_post_featured_color',
		'active_callback' => 'video_streaming_post_color_enabled'
	)));

	$wp_customize->add_setting( 'video_streaming_custom_post_color_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_custom_post_color_width',	array(
		'label' => esc_html__( 'Color Post Custom Width','video-streaming' ),
		'section' => 'video_streaming_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'video_streaming_show_post_color'
	)));

	$wp_customize->add_setting( 'video_streaming_custom_post_color_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_custom_post_color_height',array(
		'label' => esc_html__( 'Color Post Custom Height','video-streaming' ),
		'section' => 'video_streaming_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'video_streaming_show_post_color'
	)));

	$wp_customize->add_setting('video_streaming_post_featured_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'video_streaming_sanitize_choices'
    ));
    $wp_customize->add_control('video_streaming_post_featured_image_dimention',array(
       'type' => 'select',
       'label'	=> __('Post Featured Image Dimention','video-streaming'),
       'choices' => array(
            'Default' => __('Default','video-streaming'),
            'Custom' => __('Custom','video-streaming'),
        ),
      	'section'	=> 'video_streaming_post_settings',
      	'active_callback' => 'video_streaming_enable_post_featured_image'
    ));

    $wp_customize->add_setting( 'video_streaming_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Post Featured Image Custom Width','video-streaming' ),
		'section' => 'video_streaming_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'video_streaming_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'video_streaming_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Post Featured Image Custom Height','video-streaming' ),
		'section' => 'video_streaming_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'video_streaming_enable_post_image_custom_dimention'
	)));

    //Post excerpt
	$wp_customize->add_setting( 'video_streaming_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'video_streaming_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','video-streaming' ),
		'section'     => 'video_streaming_post_settings',
		'type'        => 'number',
		'settings'    => 'video_streaming_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('video_streaming_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','video-streaming'),
        'section' => 'video_streaming_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','video-streaming'),
            'Content' => __('Content','video-streaming'),
        ),
	) );

	$wp_customize->add_setting( 'video_streaming_post_discription_suffix', array(
		'default'   => __('[...]','video-streaming'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'video_streaming_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','video-streaming' ),
		'section'     => 'video_streaming_post_settings',
		'type'        => 'text',
		'settings'    => 'video_streaming_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'video_streaming_blog_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'video_streaming_blog_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box','video-streaming' ),
		'section'     => 'video_streaming_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','video-streaming'),
		'type'        => 'text',
		'settings'    => 'video_streaming_blog_post_meta_seperator',
	) );

	$wp_customize->add_setting('video_streaming_button_text',array(
		'default'=> __('View More','video-streaming'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('video_streaming_button_text',array(
		'label'	=> __('Add Button Text','video-streaming'),
		'section'=> 'video_streaming_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'video_streaming_post_button_padding_top',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','video-streaming' ),
		'section' => 'video_streaming_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'video_streaming_post_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','video-streaming' ),
		'section' => 'video_streaming_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'video_streaming_post_button_border_radius',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','video-streaming' ),
		'section' => 'video_streaming_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('video_streaming_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','video-streaming'),
       'section' => 'video_streaming_post_settings'
    ));

    $wp_customize->add_setting( 'video_streaming_post_pagination_position', array(
        'default'			=>  'Bottom', 
        'sanitize_callback'	=> 'video_streaming_sanitize_choices'
    ));
    $wp_customize->add_control( 'video_streaming_post_pagination_position', array(
        'section' => 'video_streaming_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Position', 'video-streaming' ),
        'choices'		=> array(
            'Top'  => __( 'Top', 'video-streaming' ),
            'Bottom' => __( 'Bottom', 'video-streaming' ),
            'Both Top & Bottom' => __( 'Both Top & Bottom', 'video-streaming' ),
    )));

	$wp_customize->add_setting( 'video_streaming_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'video_streaming_sanitize_choices'
    ));
    $wp_customize->add_control( 'video_streaming_pagination_settings', array(
        'section' => 'video_streaming_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'video-streaming' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'video-streaming' ),
            'next-prev' => __( 'Next / Previous', 'video-streaming' ),
    )));

    $wp_customize->add_setting('video_streaming_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','video-streaming'),
        'section' => 'video_streaming_post_settings',
        'choices' => array(
            'By Block' => __('By Block','video-streaming'),
            'By Without Block' => __('By Without Block','video-streaming'),
        ),
	) );

    //Single Post Settings
	$wp_customize->add_section('video_streaming_single_post_settings', array(
		'title'    => __('Single Post Settings', 'video-streaming'),
		'panel'    => 'video_streaming_panel_id',
	));

	$wp_customize->add_setting('video_streaming_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','video-streaming'),
       'section' => 'video_streaming_single_post_settings'
    ));

    $wp_customize->add_setting('video_streaming_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
        $wp_customize,'video_streaming_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('video_streaming_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','video-streaming'),
       'section' => 'video_streaming_single_post_settings'
    ));

   $wp_customize->add_setting('video_streaming_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
      $wp_customize,'video_streaming_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('video_streaming_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
	));
	$wp_customize->add_control('video_streaming_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','video-streaming'),
		'section' => 'video_streaming_single_post_settings'
	));

 	$wp_customize->add_setting('video_streaming_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback' => 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer( $wp_customize, 'video_streaming_single_post_comment_icon', array(
		'label'	=> __('Single Post Comment Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('video_streaming_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','video-streaming'),
       'section' => 'video_streaming_single_post_settings'
    ));

    $wp_customize->add_setting('video_streaming_single_post_time',array(
       'default' => false,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','video-streaming'),
       'section' => 'video_streaming_single_post_settings',
    ));

    $wp_customize->add_setting('video_streaming_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
        $wp_customize,'video_streaming_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('video_streaming_post_comment_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_post_comment_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post comment','video-streaming'),
       'section' => 'video_streaming_single_post_settings',
    ));

	$wp_customize->add_setting('video_streaming_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured image','video-streaming'),
       'section' => 'video_streaming_single_post_settings',
    ));

	$wp_customize->add_setting('video_streaming_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	) );
	$wp_customize->add_control('video_streaming_single_post_layout', array(
        'type' => 'select',
        'label' => __('Select different Single post sidebar layout','video-streaming'),
        'section' => 'video_streaming_single_post_settings',
        'choices' => array(
            'One Column' => __('One Column','video-streaming'),
            'Left Sidebar' => __('Left Sidebar','video-streaming'),
            'Right Sidebar' => __('Right Sidebar','video-streaming')
        ),
	)   );

	$wp_customize->add_setting( 'video_streaming_single_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'video_streaming_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','video-streaming' ),
		'section'     => 'video_streaming_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','video-streaming'),
		'type'        => 'text',
		'settings'    => 'video_streaming_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'video_streaming_comment_form_width',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','video-streaming' ),
		'section' => 'video_streaming_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('video_streaming_title_comment_form',array(
       'default' => __('Leave a Reply','video-streaming'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('video_streaming_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','video-streaming'),
       'section' => 'video_streaming_single_post_settings'
    ));

    $wp_customize->add_setting('video_streaming_comment_form_button_content',array(
       'default' => __('Post Comment','video-streaming'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('video_streaming_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','video-streaming'),
       'section' => 'video_streaming_single_post_settings'
    ));

	$wp_customize->add_setting('video_streaming_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Post Pagination','video-streaming'),
       'section' => 'video_streaming_single_post_settings'
    ));

	//Related Post Settings
	$wp_customize->add_section('video_streaming_related_settings', array(
		'title'    => __('Related Post Settings', 'video-streaming'),
		'panel'    => 'video_streaming_panel_id',
	));

	$wp_customize->add_setting( 'video_streaming_related_enable_disable',array(
		'default' => true,
      	'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ) );
    $wp_customize->add_control('video_streaming_related_enable_disable',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Related Post','video-streaming' ),
        'section' => 'video_streaming_related_settings'
    ));

    $wp_customize->add_setting('video_streaming_related_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('video_streaming_related_title',array(
		'label'	=> __('Add Section Title','video-streaming'),
		'section'	=> 'video_streaming_related_settings',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'video_streaming_related_posts_count_number', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'video_streaming_related_posts_count_number', array(
		'label'       => esc_html__( 'Related Post Count','video-streaming' ),
		'section'     => 'video_streaming_related_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting('video_streaming_related_posts_taxanomies',array(
        'default' => 'categories',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_related_posts_taxanomies',array(
        'type' => 'radio',
        'label' => __('Post Taxonomies','video-streaming'),
        'section' => 'video_streaming_related_settings',
        'choices' => array(
            'categories' => __('Categories','video-streaming'),
            'tags' => __('Tags','video-streaming'),
        ),
	) );

	$wp_customize->add_setting( 'video_streaming_related_post_excerpt_number',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','video-streaming' ),
		'section' => 'video_streaming_related_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Header Section
	$wp_customize->add_section('video_streaming_topbar',array(
		'title'	=> __('Header','video-streaming'),
		'description'	=> __('Add contact us here','video-streaming'),
		'priority'	=> null,
		'panel' => 'video_streaming_panel_id',
	));

	$wp_customize->add_setting('video_streaming_topbar_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('video_streaming_topbar_text',array(
		'type' => 'text',
		'label' => __('Add Topbar Text','video-streaming'),
		'section' => 'video_streaming_topbar',
	) );

	$wp_customize->add_setting('video_streaming_header_button_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('video_streaming_header_button_text',array(
		'type' => 'text',
		'label' => __('Add Button Text','video-streaming'),
		'section' => 'video_streaming_topbar',
	) );

	$wp_customize->add_setting('video_streaming_header_button_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
 	));
 	$wp_customize->add_control('video_streaming_header_button_url',array(
		'type' => 'url',
		'label' => __('Add Button URL','video-streaming'),
		'section' => 'video_streaming_topbar',
	) );

	$wp_customize->add_setting('video_streaming_menu_font_size_option',array(
		'default'=> 12,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize,'video_streaming_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','video-streaming'),
		'section'=> 'video_streaming_topbar',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('video_streaming_menu_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize,'video_streaming_menu_padding',array(
		'label'	=> __('Main Menu Padding','video-streaming'),
		'section'=> 'video_streaming_topbar',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('video_streaming_text_tranform_menu',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'video_streaming_sanitize_choices'
 	));
 	$wp_customize->add_control('video_streaming_text_tranform_menu',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','video-streaming'),
		'section' => 'video_streaming_topbar',
		'choices' => array(
		   'Uppercase' => __('Uppercase','video-streaming'),
		   'Lowercase' => __('Lowercase','video-streaming'),
		   'Capitalize' => __('Capitalize','video-streaming'),
		),
	) );

	$wp_customize->add_setting('video_streaming_font_weight_option_menu',array(
		'default' => '',
		'sanitize_callback' => 'video_streaming_sanitize_choices'
 	));
 	$wp_customize->add_control('video_streaming_font_weight_option_menu',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','video-streaming'),
		'section' => 'video_streaming_topbar',
		'choices' => array(
		   'Bold' => __('Bold','video-streaming'),
		   'Normal' => __('Normal','video-streaming'),
		),
	) );

	$wp_customize->add_setting('video_streaming_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
        $wp_customize,'video_streaming_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('video_streaming_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
        $wp_customize,'video_streaming_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_topbar',
		'type'		=> 'icon'
	)));

	//Header Section
	$wp_customize->add_section('video_streaming_social_icons',array(
		'title'	=> __('Social Icons','video-streaming'),
		'priority'	=> null,
		'panel' => 'video_streaming_panel_id',
	));

	$wp_customize->add_setting('video_streaming_facebook_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('video_streaming_facebook_url',array(
		'type' => 'url',
		'label' => __('Add Facebook URL','video-streaming'),
		'section' => 'video_streaming_social_icons',
	));

	$wp_customize->add_setting('video_streaming_twitter_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('video_streaming_twitter_url',array(
		'type' => 'url',
		'label' => __('Add Twitter URL','video-streaming'),
		'section' => 'video_streaming_social_icons',
	));

	$wp_customize->add_setting('video_streaming_instagram_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('video_streaming_instagram_url',array(
		'type' => 'url',
		'label' => __('Add Instagram URL','video-streaming'),
		'section' => 'video_streaming_social_icons',
	));

	$wp_customize->add_setting('video_streaming_linkedin_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('video_streaming_linkedin_url',array(
		'type' => 'url',
		'label' => __('Add Linkedin URL','video-streaming'),
		'section' => 'video_streaming_social_icons',
	));

	//Slider Section
	$wp_customize->add_section( 'video_streaming_slider_section' , array(
    	'title'      => __( 'Slider Section', 'video-streaming' ),
		'priority'   => null,
		'panel' => 'video_streaming_panel_id'
	) );

	$wp_customize->add_setting('video_streaming_slider_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
	));
	$wp_customize->add_control('video_streaming_slider_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable slider','video-streaming'),
		'section' => 'video_streaming_slider_section',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

 	$wp_customize->add_setting('video_streaming_slider_video_category',array(
     	'sanitize_callback' => 'video_streaming_sanitize_choices',
 	));
	$wp_customize->add_control('video_streaming_slider_video_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Video Category','video-streaming'),
		'section' => 'video_streaming_slider_section',
 	));

	$wp_customize->add_setting('video_streaming_slider_heading',array(
		'default' => true,
		'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
	));
	$wp_customize->add_control('video_streaming_slider_heading',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Heading','video-streaming'),
		'section' => 'video_streaming_slider_section'
	));

	$wp_customize->add_setting('video_streaming_slider_text',array(
		'default' => true,
		'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
	));
	$wp_customize->add_control('video_streaming_slider_text',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Text','video-streaming'),
		'section' => 'video_streaming_slider_section'
	));

	//content layout
   $wp_customize->add_setting('video_streaming_slider_content_layout',array(
    	'default' => 'Left',
		'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_slider_content_layout',array(
		'type' => 'radio',
		'label' => __('Slider Content Layout','video-streaming'),
		'section' => 'video_streaming_slider_section',
		'choices' => array(
		   'Center' => __('Center','video-streaming'),
		   'Left' => __('Left','video-streaming'),
		   'Right' => __('Right','video-streaming'),
		),
	) );

	//Slider excerpt
	$wp_customize->add_setting( 'video_streaming_slider_excerpt_number', array(
		'default'            => 15,
		'type'               => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'video_streaming_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Content Limit','video-streaming' ),
		'section'     => 'video_streaming_slider_section',
		'type'        => 'number',
		'settings'    => 'video_streaming_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'video_streaming_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_slider_speed',array(
		'label' => esc_html__( 'Slider Slide Speed','video-streaming' ),
		'section' => 'video_streaming_slider_section',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	)));

	//Our Services
  	$wp_customize->add_section('video_streaming_trending_videos',array(
		'title' => __('Trending Videos','video-streaming'),
		'description' => '',
		'priority'  => null,
		'panel' => 'video_streaming_panel_id',
	));

	$wp_customize->add_setting('video_streaming_video_enable',array(
		'default' => false,
		'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
	));
	$wp_customize->add_control('video_streaming_video_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Trending Videos','video-streaming'),
		'section' => 'video_streaming_trending_videos'
	));

	$wp_customize->add_setting('video_streaming_video_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('video_streaming_video_section_title',array(
		'type' => 'text',
		'label' => __('Section Title','video-streaming'),
		'section' => 'video_streaming_trending_videos'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

 	$wp_customize->add_setting('video_streaming_video_category',array(
     	'sanitize_callback' => 'video_streaming_sanitize_choices',
 	));
	$wp_customize->add_control('video_streaming_video_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Video Category','video-streaming'),
		'section' => 'video_streaming_trending_videos',
 	));

	//footer text
	$wp_customize->add_section('video_streaming_footer_section',array(
		'title'	=> __('Footer Text','video-streaming'),
		'panel' => 'video_streaming_panel_id'
	));

	$wp_customize->add_setting('video_streaming_footer_bg_color', array(
		'default'           => '#0d0d0f',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'video_streaming_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'video-streaming'),
		'section'  => 'video_streaming_footer_section',
	)));

	$wp_customize->add_setting('video_streaming_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'video_streaming_footer_bg_image',array(
		'label' => __('Footer Background Image','video-streaming'),
		'section' => 'video_streaming_footer_section'
	)));

	$wp_customize->add_setting('footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	));
	$wp_customize->add_control('footer_widget_areas',array(
		'type'        => 'radio',
		'label'       => __('Footer widget area', 'video-streaming'),
		'section'     => 'video_streaming_footer_section',
		'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'video-streaming'),
		'choices' => array(
		   '1'     => __('One', 'video-streaming'),
		   '2'     => __('Two', 'video-streaming'),
		   '3'     => __('Three', 'video-streaming'),
		   '4'     => __('Four', 'video-streaming')
		),
	));

	$wp_customize->add_setting('video_streaming_hide_show_scroll',array(
		'default' => true,
		'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
	));
	$wp_customize->add_control('video_streaming_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','video-streaming'),
      	'section' => 'video_streaming_footer_section',
	));

	$wp_customize->add_setting('video_streaming_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Video_Streaming_Icon_Changer(
        $wp_customize,'video_streaming_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','video-streaming'),
		'transport' => 'refresh',
		'section'	=> 'video_streaming_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('video_streaming_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','video-streaming'),
		'section'=> 'video_streaming_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('video_streaming_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top Alignment','video-streaming'),
        'section' => 'video_streaming_footer_section',
        'choices' => array(
            'Left align' => __('Left Align','video-streaming'),
            'Right align' => __('Right Align','video-streaming'),
            'Center align' => __('Center Align','video-streaming'),
        ),
	) );

	$wp_customize->add_setting( 'video_streaming_top_bottom_scroll_padding',array(
		'default' => 7,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','video-streaming' ),
		'section' => 'video_streaming_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'video_streaming_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','video-streaming' ),
		'section' => 'video_streaming_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'video_streaming_back_to_top_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','video-streaming' ),
		'section' => 'video_streaming_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));
	
	$wp_customize->add_setting('video_streaming_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('video_streaming_footer_copy',array(
		'label'	=> __('Copyright Text','video-streaming'),
		'section'	=> 'video_streaming_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','video-streaming'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('video_streaming_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','video-streaming'),
        'section' => 'video_streaming_footer_section',
        'choices' => array(
            'left' => __('Left Align','video-streaming'),
            'right' => __('Right Align','video-streaming'),
            'center' => __('Center Align','video-streaming'),
        ),
	) );

	$wp_customize->add_setting('video_streaming_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','video-streaming' ),
		'section'=> 'video_streaming_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'video_streaming_footer_text_padding',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','video-streaming' ),
		'section' => 'video_streaming_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Responsive Media Settings
	$wp_customize->add_section('video_streaming_responsive_media',array(
		'title'	=> __('Responsive Media','video-streaming'),
		'panel' => 'video_streaming_panel_id',
	));

	$wp_customize->add_setting('video_streaming_display_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_display_post_date',array(
       'type' => 'checkbox',
       'label' => __('Display Post Date','video-streaming'),
       'section' => 'video_streaming_responsive_media'
    ));

    $wp_customize->add_setting('video_streaming_display_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_display_post_author',array(
       'type' => 'checkbox',
       'label' => __('Display Post Author','video-streaming'),
       'section' => 'video_streaming_responsive_media'
    ));

    $wp_customize->add_setting('video_streaming_display_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_display_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Display Post Comment','video-streaming'),
       'section' => 'video_streaming_responsive_media'
    ));

    $wp_customize->add_setting('video_streaming_display_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','video-streaming'),
       'section' => 'video_streaming_responsive_media'
    ));

	$wp_customize->add_setting('video_streaming_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','video-streaming'),
       'section' => 'video_streaming_responsive_media'
    ));

    $wp_customize->add_setting('video_streaming_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Scroll To Top','video-streaming'),
       'section' => 'video_streaming_responsive_media'
    ));

    $wp_customize->add_setting('video_streaming_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','video-streaming'),
       'section' => 'video_streaming_responsive_media'
    ));

    //404 Page Setting
	$wp_customize->add_section('video_streaming_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','video-streaming'),
		'panel' => 'video_streaming_panel_id',
	));	

	$wp_customize->add_setting('video_streaming_page_not_found_heading',array(
		'default'=> __('404 Not Found','video-streaming'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('video_streaming_page_not_found_heading',array(
		'label'	=> __('404 Heading','video-streaming'),
		'section'=> 'video_streaming_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('video_streaming_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','video-streaming'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('video_streaming_page_not_found_text',array(
		'label'	=> __('404 Content','video-streaming'),
		'section'=> 'video_streaming_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('video_streaming_page_not_found_button',array(
		'default'=>  __('Back to Home Page','video-streaming'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('video_streaming_page_not_found_button',array(
		'label'	=> __('404 Button','video-streaming'),
		'section'=> 'video_streaming_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('video_streaming_no_search_result_heading',array(
		'default'=> __('Nothing Found','video-streaming'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('video_streaming_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','video-streaming'),
		'description'=>__('The search page heading display when no results are found.','video-streaming'),
		'section'=> 'video_streaming_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('video_streaming_no_search_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','video-streaming'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('video_streaming_no_search_result_text',array(
		'label'	=> __('No Search Results Text','video-streaming'),
		'description'=>__('The search page text display when no results are found.','video-streaming'),
		'section'=> 'video_streaming_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'video_streaming_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'video-streaming' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','video-streaming'),
		'priority'   => null,
		'panel' => 'video_streaming_panel_id'
	) );

	/**
	 * Product Columns
	 */
	$wp_customize->add_setting( 'video_streaming_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'video_streaming_per_columns', array(
		'label'    => __( 'Product per columns', 'video-streaming' ),
		'section'  => 'video_streaming_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('video_streaming_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('video_streaming_product_per_page',array(
		'label'	=> __('Product per page','video-streaming'),
		'section'	=> 'video_streaming_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('video_streaming_shop_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','video-streaming'),
       'section' => 'video_streaming_woocommerce_section',
    ));

    $wp_customize->add_setting('video_streaming_product_page_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product page sidebar','video-streaming'),
       'section' => 'video_streaming_woocommerce_section',
    ));

    $wp_customize->add_setting('video_streaming_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
    ));
    $wp_customize->add_control('video_streaming_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','video-streaming'),
       'section' => 'video_streaming_woocommerce_section',
    ));

    $wp_customize->add_setting( 'video_streaming_woo_product_sale_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','video-streaming'),
        'section'  => 'video_streaming_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('video_streaming_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','video-streaming'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'video_streaming_woocommerce_section',
	)));

    $wp_customize->add_setting('video_streaming_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','video-streaming'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'video_streaming_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('video_streaming_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','video-streaming'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'video_streaming_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('video_streaming_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'video_streaming_sanitize_choices'
	));
	$wp_customize->add_control('video_streaming_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','video-streaming'),
        'section' => 'video_streaming_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','video-streaming'),
            'Left' => __('Left','video-streaming'),
        ),
	));

	$wp_customize->add_setting( 'video_streaming_woocommerce_button_padding_top',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','video-streaming' ),
		'section' => 'video_streaming_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'video_streaming_woocommerce_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','video-streaming' ),
		'section' => 'video_streaming_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'video_streaming_woocommerce_button_border_radius',array(
		'default' => 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','video-streaming' ),
		'section' => 'video_streaming_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

   $wp_customize->add_setting('video_streaming_woocommerce_product_border_enable',array(
      'default' => true,
      'sanitize_callback'	=> 'video_streaming_sanitize_checkbox'
   ));
   $wp_customize->add_control('video_streaming_woocommerce_product_border_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable product border','video-streaming'),
      'section' => 'video_streaming_woocommerce_section',
   ));

	$wp_customize->add_setting( 'video_streaming_woocommerce_product_padding_top',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','video-streaming' ),
		'section' => 'video_streaming_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'video_streaming_woocommerce_product_padding_right',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','video-streaming' ),
		'section' => 'video_streaming_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'video_streaming_woocommerce_product_border_radius',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','video-streaming' ),
		'section' => 'video_streaming_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'video_streaming_woocommerce_product_box_shadow',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'video_streaming_sanitize_integer'
	));
	$wp_customize->add_control( new Video_Streaming_Custom_Control( $wp_customize, 'video_streaming_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','video-streaming' ),
		'section' => 'video_streaming_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('video_streaming_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'video_streaming_sanitize_choices'
    ));
    $wp_customize->add_control('video_streaming_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','video-streaming'),
       'choices' => array(
            'Yes' => __('Yes','video-streaming'),
            'No' => __('No','video-streaming'),
        ),
       'section' => 'video_streaming_woocommerce_section',
    ));
	
}
add_action( 'customize_register', 'video_streaming_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Video_Streaming_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Video_Streaming_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Video_Streaming_Customize_Section_Pro(
				$manager,
				'video_streaming_example_1',
				array(
					'title'   =>  esc_html__( 'Video Streaming Pro', 'video-streaming' ),
					'pro_text' => esc_html__( 'Go Pro', 'video-streaming' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/themes/videographer-wordpress-theme/' ),
					'priority'   => 9
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'video-streaming-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'video-streaming-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function video_streaming_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'video-streaming'),
	        '2'     => __('Two', 'video-streaming'),
	        '3'     => __('Three', 'video-streaming'),
	        '4'     => __('Four', 'video-streaming')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
Video_Streaming_Customize::get_instance();