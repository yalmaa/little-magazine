<?php

function barcelona_theme_options() {

	/* OptionTree is not loaded yet, or this is not an admin request */
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() ) {
		return false;
	}

	/*
	 * Get a copy of the saved settings array.
	 */
	$barcelona_saved_settings = get_option( 'option_tree_settings', array() );

	/*
	 * Google Font Options
	 */
	$barcelona_font_choices = array(
		array(
			'label'     => 'Montserrat',
			'value'     => 'Montserrat'
		),
		array(
			'label'     => 'Open Sans',
			'value'     => 'Open+Sans'
		),
		array(
			'label'     => 'Open Sans Condensed',
			'value'     => 'Open+Sans+Condensed'
		),
		array(
			'label'     => 'Source Sans',
			'value'     => 'Source+Sans'
		),
		array(
			'label'     => 'PT Sans',
			'value'     => 'PT+Sans'
		),
		array(
			'label'     => 'PT Serif',
			'value'     => 'PT+Serif'
		),
		array(
			'label'     => 'Josefin Sans',
			'value'     => 'Josefin+Sans'
		),
		array(
			'label'     => 'Arvo',
			'value'     => 'Arvo'
		),
		array(
			'label'     => 'Lato',
			'value'     => 'Lato'
		),
		array(
			'label'     => 'Vollkorn',
			'value'     => 'Vollkorn'
		),
		array(
			'label'     => 'Ubuntu',
			'value'     => 'Ubuntu'
		),
		array(
			'label'     => 'Droid Sans',
			'value'     => 'Droid+Sans'
		)
	);

	/*
	 * Color Scheme Options
	 */
	$barcelona_color_scheme_choices = array(
		array(
			'label'     => esc_html__( 'Light', 'barcelona' ),
			'value'     => 'light'
		),
		array(
			'label'     => esc_html__( 'Dark', 'barcelona' ),
			'value'     => 'dark'
		)
	);

	/*
	 * Posts Layout Options
	 */
	$barcelona_posts_layout_choices = array(
		array(
			'value' => 'c',
			'label' => esc_html__( 'List A', 'barcelona' ),
			'src'   => BARCELONA_THEME_PATH .'includes/admin/images/pmodule-a.png'
		),
		array(
			'value' => 'd',
			'label' => esc_html__( 'List B', 'barcelona' ),
			'src'   => BARCELONA_THEME_PATH .'includes/admin/images/pmodule-b.png'
		),
		array(
			'value' => 'i',
			'label' => esc_html__( '1 Column Layout', 'barcelona' ),
			'src'   => BARCELONA_THEME_PATH .'includes/admin/images/pmodule-d.png'
		),
		array(
			'value' => 'h',
			'label' => esc_html__( '2 Columns Layout', 'barcelona' ),
			'src'   => BARCELONA_THEME_PATH .'includes/admin/images/pmodule-c.png'
		),
		array(
			'value' => 'j',
			'label' => esc_html__( '3 Columns Layout', 'barcelona' ),
			'src'   => BARCELONA_THEME_PATH .'includes/admin/images/pmodule-e.png'
		),
		array(
			'value' => 'k',
			'label' => esc_html__( '4 Columns Layout', 'barcelona' ),
			'src'   => BARCELONA_THEME_PATH .'includes/admin/images/pmodule-f.png'
		)
	);

	/*
	 * Sidebar Position Options
	 */
	$barcelona_sidebar_position_choices = array(
		array(
			'value'     => 'right',
			'label'     => esc_html__( 'Sidebar Left', 'barcelona' ),
			'src'       => BARCELONA_THEME_PATH .'includes/admin/images/sidebar-'. ( is_rtl() ? 'left' : 'right' ) .'.jpg'
		),
		array(
			'value'     => 'left',
			'label'     => esc_html__( 'Sidebar Right', 'barcelona' ),
			'src'       => BARCELONA_THEME_PATH .'includes/admin/images/sidebar-'. ( is_rtl() ? 'right' : 'left' ) .'.jpg'
		),
		array(
			'value'     => 'none',
			'label'     => esc_html__( 'No Sidebar', 'barcelona' ),
			'src'       => BARCELONA_THEME_PATH .'includes/admin/images/sidebar-none.jpg'
		)
	);

	/*
	 * Featured Image Options
	 */
	$barcelona_fi_choices = array(
		array(
			'value'     => 'cl',
			'label'     => esc_html__( 'Classic Featured Image', 'barcelona' ),
			'src'       => BARCELONA_THEME_PATH .'includes/admin/images/fimg-cl.jpg'
		),
		array(
			'value'     => 'fw',
			'label'     => esc_html__( 'Full Width Featured Image', 'barcelona' ),
			'src'       => BARCELONA_THEME_PATH .'includes/admin/images/fimg-fw.jpg'
		),
		array(
			'value'     => 'sw',
			'label'     => esc_html__( 'Screen Width Featured Image', 'barcelona' ),
			'src'       => BARCELONA_THEME_PATH .'includes/admin/images/fimg-sw.jpg'
		),
		array(
			'value'     => 'sp',
			'label'     => esc_html__( 'Screen Width Parallax Featured Image', 'barcelona' ),
			'src'       => BARCELONA_THEME_PATH .'includes/admin/images/fimg-sp.jpg'
		)
	);

	/*
	 * Order by Field Options
	 */
	$barcelona_orderby_choices = array(
		array(
			'value' => 'date',
			'label' => esc_html__( 'Date', 'barcelona' )
		),
		array(
			'value' => 'views',
			'label' => esc_html__( 'Number of Views', 'barcelona' )
		),
		array(
			'value' => 'comments',
			'label' => esc_html__( 'Number of Comments', 'barcelona' )
		),
		array(
			'value' => 'votes',
			'label' => esc_html__( 'Number of Votes', 'barcelona' )
		),
		array(
			'value' => 'random',
			'label' => esc_html__( 'Random', 'barcelona' )
		),
		array(
			'value' => 'posts',
			'label' => esc_html__( 'Manual Post IDs', 'barcelona' )
		)
	);

	/*
	 * Custom settings array that will eventually be
	 * passes to the OptionTree Settings API Class.
	 */
	$barcelona_custom_settings = array(
		'sections' => array(
			array(
				'id' => 'ot-logos-icons',
				'title' => '<i class="fa fa-picture-o"></i> '. esc_html__( 'Logos & Icons', 'barcelona' )
			),
			array(
				'id' => 'ot-layout-settings',
				'title' => '<i class="fa fa-sitemap"></i> '. esc_html__( 'Layout Settings', 'barcelona' )
			),
			array(
				'id' => 'ot-sidebar-settings',
				'title' => '<i class="fa fa-columns"></i> '. esc_html__( 'Sidebar Settings', 'barcelona' )
			),
			array(
				'id' => 'ot-social-settings',
				'title' => '<i class="fa fa-share-alt"></i> '. esc_html__( 'Social Settings', 'barcelona' )
			),
			array(
				'id' => 'ot-typography',
				'title' => '<i class="fa fa-align-left"></i> '. esc_html__( 'Typography', 'barcelona' )
			),
			array(
				'id' => 'ot-custom-codes',
				'title' => '<i class="fa fa-code"></i> '. esc_html__( 'Custom Codes', 'barcelona' )
			),
			array(
				'id' => 'ot-color-scheme',
				'title' => '<i class="fa fa-paint-brush"></i> '. esc_html__( 'Color Scheme', 'barcelona' )
			),
			array(
				'id' => 'ot-advertisement',
				'title' => '<i class="fa fa-bullhorn"></i> '. esc_html__( 'Advertisement', 'barcelona' )
			)
		),
		'settings' => array(

			/* Logos & Icons */
			array(
				'id'          => 'barcelona_show_header_logo_as_text',
				'label'       => esc_html__( 'Display Header Logo as Text', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-logos-icons'
			),
			array(
				'id'          => 'barcelona_header_logo_text',
				'label'       => esc_html__( 'Header Logo Text', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_header_logo_as_text:is(on)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_header_dark_logo_url',
				'label'       => esc_html__( 'Header Logo URL (Dark Version)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the URL of logo for dark version or upload new one for header. (Recommended size: 200px by 90px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_header_logo_as_text:is(off)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_header_dark_retina_logo_url',
				'label'       => esc_html__( 'Header Retina Logo URL (Dark Version)', 'barcelona' ),
				'desc'        => esc_html__( 'Double size of header logo for dark version. (Recommended size: 400px by 180px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_header_logo_as_text:is(off)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_header_light_logo_url',
				'label'       => esc_html__( 'Header Logo URL (Light Version)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the URL of logo for light version or upload new one for header. (Recommended size: 200px by 90px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_header_logo_as_text:is(off)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_header_light_retina_logo_url',
				'label'       => esc_html__( 'Header Retina Logo URL (Light Version)', 'barcelona' ),
				'desc'        => esc_html__( 'Double size of header logo for light version. (Recommended size: 400px by 180px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_header_logo_as_text:is(off)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_show_footer_logo_as_text',
				'label'       => esc_html__( 'Display Footer Logo as Text', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-logos-icons'
			),
			array(
				'id'          => 'barcelona_footer_logo_text',
				'label'       => esc_html__( 'Footer Logo Text', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_footer_logo_as_text:is(on)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_footer_dark_logo_url',
				'label'       => esc_html__( 'Footer Logo URL (Dark Version)', 'barcelona' ),
				'desc'        => esc_html__( '(Recommended size: 200px X 90px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_footer_logo_as_text:is(off)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_footer_dark_retina_logo_url',
				'label'       => esc_html__( 'Footer Retina Logo URL (Dark Version)', 'barcelona' ),
				'desc'        => esc_html__( '(Recommended size: 400px X 180px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_footer_logo_as_text:is(off)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_footer_light_logo_url',
				'label'       => esc_html__( 'Footer Logo URL (Light Version)', 'barcelona' ),
				'desc'        => esc_html__( '(Recommended size: 200px X 90px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_footer_logo_as_text:is(off)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_footer_light_retina_logo_url',
				'label'       => esc_html__( 'Footer Retina Logo URL (Light Version)', 'barcelona' ),
				'desc'        => esc_html__( '(Recommended size: 400px X 180px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons',
				'condition'   => 'barcelona_show_footer_logo_as_text:is(off)',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_favicon_url',
				'label'       => esc_html__( 'Favicon URL', 'barcelona' ),
				'desc'        => esc_html__( '(Recommended min. size: 32px X 32px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons'
			),
			array(
				'id'          => 'barcelona_apple_touch_icon_iphone',
				'label'       => esc_html__( 'Apple Iphone Icon URL', 'barcelona' ),
				'desc'        => esc_html__( '(57px X 57px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons'
			),
			array(
				'id'          => 'barcelona_apple_touch_icon_ipad',
				'label'       => esc_html__( 'Apple Ipad Icon URL', 'barcelona' ),
				'desc'        => esc_html__( '(72px X 72px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons'
			),
			array(
				'id'          => 'barcelona_apple_touch_icon_retina',
				'label'       => esc_html__( 'Apple Retina Icon URL', 'barcelona' ),
				'desc'        => esc_html__( '(144px X 144px)', 'barcelona' ),
				'type'        => 'upload',
				'section'     => 'ot-logos-icons'
			),

			/* Layout Settings - General */
			array(
				'id'          => 'barcelona_layout_tab_general',
				'label'       => esc_html__( 'General', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_boxed_layout',
				'label'       => esc_html__( 'Boxed Layout', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sticky_nav_bar',
				'label'       => esc_html__( 'Sticky Navigation Bar', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sticky_sidebars',
				'label'       => esc_html__( 'Sticky Sidebars', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_disqus_comments',
				'label'       => esc_html__( 'Enable Disqus Comment System', 'barcelona' ),
				'desc'        => esc_html__( 'Find more info about Disqus: https://disqus.com', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_disqus_sitename',
				'label'       => esc_html__( 'Disqus URL', 'barcelona' ),
				'desc'        => esc_html__( 'E.g YOUR_SHORTNAME.disqus.com - Get your Disqus Url here: https://publishers.disqus.com/engage', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-layout-settings',
				'class'       => 'barcelona-setting-indent',
				'condition'   => 'barcelona_disqus_comments:is(on)'
			),

			/* Layout Settings - Header */
			array(
				'id'          => 'barcelona_layout_tab_header',
				'label'       => esc_html__( 'Header', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
		    array(
			    'id'          => 'barcelona_header_style',
			    'label'       => esc_html__( 'Header Style', 'barcelona' ),
			    'type'        => 'radio-image',
			    'section'     => 'ot-layout-settings',
			    'class'       => 'barcelona-radio-img-horizontal',
			    'choices'     => array(
				    array(
					    'value' => 'a',
					    'label' => esc_html__( 'Logo + Ad Area', 'barcelona' ),
					    'src'   => BARCELONA_THEME_PATH .'includes/admin/images/header-a.png'
				    ),
			        array(
				        'value' => 'b',
				        'label' => esc_html__( 'Centered Logo Only', 'barcelona' ),
				        'src'   => BARCELONA_THEME_PATH .'includes/admin/images/header-b.png'
			        )
			    )
			),
			array(
				'id'          => 'barcelona_show_top_bar_menu',
				'label'       => esc_html__( 'Display Top Bar Menu', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
		    array(
			    'id'          => 'barcelona_show_header_social_icons',
			    'label'       => esc_html__( 'Display Social Icons', 'barcelona' ),
			    'type'        => 'on-off',
			    'section'     => 'ot-layout-settings'
			),

			/* Layout Settings - Footer */
			array(
				'id'          => 'barcelona_layout_tab_footer',
				'label'       => esc_html__( 'Footer', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_footer_sidebars',
				'label'       => esc_html__( 'Enable Footer Sidebars', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_footer_logo',
				'label'       => esc_html__( 'Display Logo on Footer', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_footer_menu',
				'label'       => esc_html__( 'Display Menu on Footer', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_footer_copyright_text',
				'label'       => esc_html__( 'Footer Copyright Text', 'barcelona' ),
				'type'        => 'textarea-simple',
				'section'     => 'ot-layout-settings',
				'rows'        => 3
			),

			/* Layout Settings - Mega Menu */
			array(
				'id'          => 'barcelona_layout_tab_megamenu',
				'label'       => esc_html__( 'Mega Menu', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'            => 'barcelona_mm_orderby',
				'label'         => esc_html__( 'Order Mega Menu Posts by', 'barcelona' ),
				'type'          => 'select',
				'std'           => 'date',
				'choices'       => $barcelona_orderby_choices,
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'        => 'barcelona_mm_order',
				'label'     => esc_html__( 'Mega Menu Posts Order Type', 'barcelona' ),
				'type'      => 'select',
				'choices'   => array(
					array(
						'value' => 'asc',
						'label' => esc_html__( 'Ascending', 'barcelona' )
					),
					array(
						'value' => 'desc',
						'label' => esc_html__( 'Descending', 'barcelona' )
					)
				),
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_tags_under_mm',
				'label'       => esc_html__( 'Display Popular Tags Under Mega Menu', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),

			/* Layout Settings - Single Post */
			array(
				'id'          => 'barcelona_layout_tab_single',
				'label'       => esc_html__( 'Single Post', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_featured_image_style__single',
				'label'       => esc_html__( 'Featured Image Style', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_fi_choices
			),
			array(
				'id'          => 'barcelona_default_sidebar__single',
				'label'       => esc_html__( 'Single Post Sidebar', 'barcelona' ),
				'type'        => 'sidebar-select',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sidebar_position__single',
				'label'       => esc_html__( 'Single Post Sidebar Position', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_sidebar_position_choices
			),
			array(
				'id'          => 'barcelona_show_breadcrumb__single',
				'label'       => esc_html__( 'Display Breadcrumb', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_comments__single',
				'label'       => esc_html__( 'Display Comments', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_tags__single',
				'label'       => esc_html__( 'Display Tags', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_social_sharing__single',
				'label'       => esc_html__( 'Display Social Sharing', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_author_box__single',
				'label'       => esc_html__( 'Display Author Box', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_voting__single',
				'label'       => esc_html__( 'Display Voting Buttons', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_voting_login_req__single',
				'label'       => esc_html__( 'Only logged-in users can vote', 'barcelona' ),
				'type'        => 'on-off',
				'class'       => 'barcelona-setting-indent',
				'condition'   => 'barcelona_show_voting__single:is(on)',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_post_nav__single',
				'label'       => esc_html__( 'Display Post Navigation', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_related_posts__single',
				'label'       => esc_html__( 'Display Related Posts', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_post_meta_choices__single',
				'label'       => __( 'Post Meta Data', 'theme-text-domain' ),
				'desc'        => __( 'Check which meta data to show for single post', 'barcelona' ),
				'std'         => '',
				'type'        => 'checkbox',
				'choices'     => array(
					array(
						'value'       => 'date',
						'label'       => __( 'Post Date', 'theme-text-domain' )
					),
					array(
						'value'       => 'views',
						'label'       => __( 'Post Views', 'theme-text-domain' )
					),
					array(
						'value'       => 'likes',
					    'label'       => __( 'Post Votes', 'barcelona' )
					),
					array(
						'value'       => 'comments',
						'label'       => __( 'Post Comments', 'barcelona' )
					),
					array(
						'value'       => 'categories',
						'label'       => __( 'Post Categories', 'barcelona' )
					)
				),
				'section'     => 'ot-layout-settings',
			),
			array(
				'id'          => 'barcelona_show_post_content_ad__single',
				'label'       => esc_html__( 'Display Post Content Ad', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_post_content_ad_1__single',
				'label'       => esc_html__( 'Single Post Content Ad (728x90)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to single post content for large screens.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_show_post_content_ad__single:is(on)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_post_content_ad_2__single',
				'label'       => esc_html__( 'Single Post Content Ad (468x60)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to single post content for small screens.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_show_post_content_ad__single:is(on)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_add_header_ad__single',
				'label'       => esc_html__( 'Header Ad for Single Post', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_header_ad_1__single',
				'label'       => esc_html__( 'Header Ad for Large Screens (728x90)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for large screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__single:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_header_ad_2__single',
				'label'       => esc_html__( 'Header Ad for Small Screens (468x60)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for small screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__single:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_set_background__single',
				'label'       => esc_html__( 'Background for Single Post', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_custom_background__single',
				'label'       => esc_html__( 'Background', 'barcelona' ),
				'type'        => 'background',
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_set_background__single:is(custom)',
				'class'       => 'barcelona-setting-indent'
			),

		    /* Layout Settings - Page */
			array(
				'id'          => 'barcelona_layout_tab_page',
				'label'       => esc_html__( 'Page', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_featured_image_style__page',
				'label'       => esc_html__( 'Featured Image Style', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_fi_choices
			),
			array(
				'id'          => 'barcelona_default_sidebar__page',
				'label'       => esc_html__( 'Page Sidebar', 'barcelona' ),
				'type'        => 'sidebar-select',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sidebar_position__page',
				'label'       => esc_html__( 'Page Sidebar Position', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_sidebar_position_choices
			),
			array(
				'id'          => 'barcelona_show_comments__page',
				'label'       => esc_html__( 'Display Comments', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_social_sharing__page',
				'label'       => esc_html__( 'Display Social Sharing', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_voting__page',
				'label'       => esc_html__( 'Display Voting Buttons', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_voting_login_req__page',
				'label'       => esc_html__( 'Only logged-in users can vote', 'barcelona' ),
				'type'        => 'on-off',
				'class'       => 'barcelona-setting-indent',
				'condition'   => 'barcelona_show_voting__page:is(on)',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_set_background__page',
				'label'       => esc_html__( 'Background for Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_custom_background__page',
				'label'       => esc_html__( 'Background', 'barcelona' ),
				'type'        => 'background',
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_set_background__page:is(custom)',
				'class'       => 'barcelona-setting-indent'
			),

			/* Layout Settings - Category */
			array(
				'id'          => 'barcelona_layout_tab_category',
				'label'       => esc_html__( 'Category', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_posts_layout__category',
				'label'       => esc_html__( 'Category Posts Layout', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_posts_layout_choices
			),
			array(
				'id'          => 'barcelona_default_sidebar__category',
				'label'       => esc_html__( 'Category Page Sidebar', 'barcelona' ),
				'type'        => 'sidebar-select',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sidebar_position__category',
				'label'       => esc_html__( 'Category Page Sidebar Position', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_sidebar_position_choices
			),
			array(
				'id'          => 'barcelona_show_breadcrumb__category',
				'label'       => esc_html__( 'Display Breadcrumb', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
		    array(
			    'id'          => 'barcelona_add_header_ad__category',
			    'label'       => esc_html__( 'Header Ad for Category Page', 'barcelona' ),
			    'type'        => 'select',
			    'section'     => 'ot-layout-settings',
			    'choices'     => array(
				    array(
					    'value' => 'inherit',
					    'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
				    ),
				    array(
					    'value' => 'custom',
					    'label' => esc_html__( 'Custom', 'barcelona' )
				    )
			    )
			),
			array(
				'id'          => 'barcelona_header_ad_1__category',
				'label'       => esc_html__( 'Header Ad for Large Screens (728x90)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for large screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__category:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_header_ad_2__category',
				'label'       => esc_html__( 'Header Ad for Small Screens (468x60)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for small screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__category:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_set_background__category',
				'label'       => esc_html__( 'Background for Category Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_custom_background__category',
				'label'       => esc_html__( 'Background', 'barcelona' ),
				'type'        => 'background',
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_set_background__category:is(custom)',
				'class'       => 'barcelona-setting-indent'
			),

			/* Layout Settings - Author */
			array(
				'id'          => 'barcelona_layout_tab_author',
				'label'       => esc_html__( 'Author', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_posts_layout__author',
				'label'       => esc_html__( 'Author Posts Layout', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_posts_layout_choices
			),
			array(
				'id'          => 'barcelona_default_sidebar__author',
				'label'       => esc_html__( 'Author Page Sidebar', 'barcelona' ),
				'type'        => 'sidebar-select',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sidebar_position__author',
				'label'       => esc_html__( 'Author Page Sidebar Position', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_sidebar_position_choices
			),
			array(
				'id'          => 'barcelona_show_breadcrumb__author',
				'label'       => esc_html__( 'Display Breadcrumb', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_show_author_box__author',
				'label'       => esc_html__( 'Display Author Bio', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_add_header_ad__author',
				'label'       => esc_html__( 'Header Ad for Author Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_header_ad_1__author',
				'label'       => esc_html__( 'Header Ad for Large Screens (728x90)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for large screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__author:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_header_ad_2__author',
				'label'       => esc_html__( 'Header Ad for Small Screens (468x60)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for small screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__author:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_set_background__author',
				'label'       => esc_html__( 'Background for Author Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_custom_background__author',
				'label'       => esc_html__( 'Background', 'barcelona' ),
				'type'        => 'background',
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_set_background__author:is(custom)',
				'class'       => 'barcelona-setting-indent'
			),

			/* Layout Settings - Search */
			array(
				'id'          => 'barcelona_layout_tab_search',
				'label'       => esc_html__( 'Search', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_posts_layout__search',
				'label'       => esc_html__( 'Search Posts Layout', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_posts_layout_choices
			),
			array(
				'id'          => 'barcelona_default_sidebar__search',
				'label'       => esc_html__( 'Search Page Sidebar', 'barcelona' ),
				'type'        => 'sidebar-select',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sidebar_position__search',
				'label'       => esc_html__( 'Search Page Sidebar Position', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_sidebar_position_choices
			),
			array(
				'id'          => 'barcelona_show_breadcrumb__search',
				'label'       => esc_html__( 'Display Breadcrumb', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_add_header_ad__search',
				'label'       => esc_html__( 'Header Ad for Search Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_header_ad_1__search',
				'label'       => esc_html__( 'Header Ad for Large Screens (728x90)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for large screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__search:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_header_ad_2__search',
				'label'       => esc_html__( 'Header Ad for Small Screens (468x60)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for small screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__search:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_set_background__search',
				'label'       => esc_html__( 'Background for Search Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_custom_background__search',
				'label'       => esc_html__( 'Background', 'barcelona' ),
				'type'        => 'background',
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_set_background__search:is(custom)',
				'class'       => 'barcelona-setting-indent'
			),

			/* Layout Settings - Tag */
			array(
				'id'          => 'barcelona_layout_tab_tag',
				'label'       => esc_html__( 'Tag', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_posts_layout__tag',
				'label'       => esc_html__( 'Tag Posts Layout', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_posts_layout_choices
			),
			array(
				'id'          => 'barcelona_default_sidebar__tag',
				'label'       => esc_html__( 'Tag Page Sidebar', 'barcelona' ),
				'type'        => 'sidebar-select',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sidebar_position__tag',
				'label'       => esc_html__( 'Tag Page Sidebar Position', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_sidebar_position_choices
			),
			array(
				'id'          => 'barcelona_show_breadcrumb__tag',
				'label'       => esc_html__( 'Display Breadcrumb', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_add_header_ad__tag',
				'label'       => esc_html__( 'Header Ad for Tag Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_header_ad_1__tag',
				'label'       => esc_html__( 'Header Ad for Large Screens (728x90)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for large screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__tag:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_header_ad_2__tag',
				'label'       => esc_html__( 'Header Ad for Small Screens (468x60)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for small screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__tag:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_set_background__tag',
				'label'       => esc_html__( 'Background for Tag Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_custom_background__tag',
				'label'       => esc_html__( 'Background', 'barcelona' ),
				'type'        => 'background',
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_set_background__tag:is(custom)',
				'class'       => 'barcelona-setting-indent'
			),

			/* Layout Settings - Posts Page */
			array(
				'id'          => 'barcelona_layout_tab_home',
				'label'       => esc_html__( 'Posts Page', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_posts_layout__home',
				'label'       => esc_html__( 'Posts Page Layout', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_posts_layout_choices
			),
			array(
				'id'          => 'barcelona_default_sidebar__home',
				'label'       => esc_html__( 'Posts Page Sidebar', 'barcelona' ),
				'type'        => 'sidebar-select',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sidebar_position__home',
				'label'       => esc_html__( 'Posts Page Sidebar Position', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_sidebar_position_choices
			),
			array(
				'id'          => 'barcelona_show_breadcrumb__home',
				'label'       => esc_html__( 'Display Breadcrumb', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_add_header_ad__home',
				'label'       => esc_html__( 'Header Ad for Posts Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_header_ad_1__home',
				'label'       => esc_html__( 'Header Ad for Large Screens (728x90)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for large screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__home:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_header_ad_2__home',
				'label'       => esc_html__( 'Header Ad for Small Screens (468x60)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for small screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__home:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_set_background__home',
				'label'       => esc_html__( 'Background for Posts Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_custom_background__home',
				'label'       => esc_html__( 'Background', 'barcelona' ),
				'type'        => 'background',
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_set_background__home:is(custom)',
				'class'       => 'barcelona-setting-indent'
			),

			/* Layout Settings - Archives */
			array(
				'id'          => 'barcelona_layout_tab_archive',
				'label'       => esc_html__( 'Archives', 'barcelona' ),
				'type'        => 'tab',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_posts_layout__archive',
				'label'       => esc_html__( 'Archive Posts Layout', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_posts_layout_choices
			),
			array(
				'id'          => 'barcelona_default_sidebar__archive',
				'label'       => esc_html__( 'Archive Page Sidebar', 'barcelona' ),
				'type'        => 'sidebar-select',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_sidebar_position__archive',
				'label'       => esc_html__( 'Archive Page Sidebar Position', 'barcelona' ),
				'type'        => 'radio-image',
				'section'     => 'ot-layout-settings',
				'choices'     => $barcelona_sidebar_position_choices
			),
			array(
				'id'          => 'barcelona_show_breadcrumb__archive',
				'label'       => esc_html__( 'Display Breadcrumb', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-layout-settings'
			),
			array(
				'id'          => 'barcelona_add_header_ad__archive',
				'label'       => esc_html__( 'Header Ad for Archive Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_header_ad_1__archive',
				'label'       => esc_html__( 'Header Ad for Large Screens (728x90)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for large screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'operator'    => 'and',
				'condition'   => 'barcelona_add_header_ad__archive:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_header_ad_2__archive',
				'label'       => esc_html__( 'Header Ad for Small Screens (468x60)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for small screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 4,
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_add_header_ad__archive:is(custom)',
				'class'       => 'barcelona-setting-indent barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_set_background__archive',
				'label'       => esc_html__( 'Background for Archive Page', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-layout-settings',
				'choices'     => array(
					array(
						'value' => 'inherit',
						'label' => esc_html__( 'Inherit (Same as global setting)', 'barcelona' )
					),
					array(
						'value' => 'custom',
						'label' => esc_html__( 'Custom', 'barcelona' )
					)
				)
			),
			array(
				'id'          => 'barcelona_custom_background__archive',
				'label'       => esc_html__( 'Background', 'barcelona' ),
				'type'        => 'background',
				'section'     => 'ot-layout-settings',
				'condition'   => 'barcelona_set_background__archive:is(custom)',
				'class'       => 'barcelona-setting-indent'
			),

			/* Sidebar Settings */
			array(
				'id'          => 'barcelona_default_sidebar',
				'label'       => esc_html__( 'Default Sidebar', 'barcelona' ),
				'desc'        => esc_html__( 'Choose any sidebar that you created. This will be default for all layouts.', 'barcelona' ),
				'type'        => 'sidebar-select',
				'section'     => 'ot-sidebar-settings'
			),
			array(
				'id'          => 'barcelona_sidebars',
				'label'       => esc_html__( 'Sidebars', 'barcelona' ),
				'desc'        => esc_html__( 'Create custom sidebar to use on various layouts.', 'barcelona' ),
				'type'        => 'list-item',
				'section'     => 'ot-sidebar-settings',
				'settings'    => array()
			),
			array(
				'id'          => 'barcelona_social_rss_feed_url',
				'label'       => esc_html__( 'RSS Feed URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_facebook_url',
				'label'       => esc_html__( 'Facebook URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_twitter_url',
				'label'       => esc_html__( 'Twitter URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_google_plus_url',
				'label'       => esc_html__( 'Google Plus URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_linkedin_url',
				'label'       => esc_html__( 'Linkedin URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_youtube_url',
				'label'       => esc_html__( 'Youtube URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_vimeo_url',
				'label'       => esc_html__( 'Vimeo URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_vk_url',
				'label'       => esc_html__( 'VK URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_instagram_url',
				'label'       => esc_html__( 'Instagram URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_pinterest_url',
				'label'       => esc_html__( 'Pinterest URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_github_url',
				'label'       => esc_html__( 'Github URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_social_flickr_url',
				'label'       => esc_html__( 'Flickr URL', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings'
			),
			array(
				'id'          => 'barcelona_facebook_app_settings_title',
				'label'       => esc_html__( 'Facebook App Settings', 'barcelona' ),
				'type'        => 'textblock-titled',
				'section'     => 'ot-social-settings',
				'class'       => 'barcelona-title-bar'
			),
			array(
				'id'          => 'barcelona_facebook_app_id',
				'label'       => esc_html__( 'Facebook App ID', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_add_facebook_og_tags',
				'label'       => esc_html__( 'Add Facebook Open Graph Tags to Header', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-social-settings',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_add_facebook_sdk',
				'label'       => esc_html__( 'Add Facebook SDK to Header', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-social-settings',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_twitter_app_settings_title',
				'label'       => esc_html__( 'Twitter App Settings', 'barcelona' ),
				'desc'        => esc_html__( 'In order to get the application info visit https://apps.twitter.com/ and create new app.', 'barcelona' ),
				'type'        => 'textblock-titled',
				'section'     => 'ot-social-settings',
				'class'       => 'barcelona-title-bar'
			),
			array(
				'id'          => 'barcelona_twitter_access_token',
				'label'       => esc_html__( 'Access Token', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_twitter_access_token_secret',
				'label'       => esc_html__( 'Access Token Secret', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_twitter_consumer_key',
				'label'       => esc_html__( 'Consumer Key', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_twitter_consumer_secret',
				'label'       => esc_html__( 'Consumer Secret', 'barcelona' ),
				'type'        => 'text',
				'section'     => 'ot-social-settings',
				'class'       => 'barcelona-setting-indent'
			),
			array(
				'id'          => 'barcelona_font_headings',
				'label'       => esc_html__( 'Font for Headings', 'barcelona' ),
				'desc'        => esc_html__( 'Select a font to use for general headings. Default is Montserrat.', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-typography',
				'choices'     => $barcelona_font_choices
			),
			array(
				'id'          => 'barcelona_font_general',
				'label'       => esc_html__( 'General Body Text', 'barcelona' ),
				'desc'        => esc_html__( 'Select a font to use for general body text. Default is Montserrat', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-typography',
				'choices'     => $barcelona_font_choices
			),
			array(
				'id'          => 'barcelona_font_latin_ext',
				'label'       => esc_html__( 'Use Latin Extended Charset', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-typography'
			),
			array(
				'id'          => 'barcelona_font_cyrillic_ext',
				'label'       => esc_html__( 'Use Cyrillic Extended Charset', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-typography'
			),
			array(
				'id'          => 'barcelona_font_greek_charset',
				'label'       => esc_html__( 'Use Greek Charset', 'barcelona' ),
				'type'        => 'on-off',
				'section'     => 'ot-typography'
			),
			array(
				'id'          => 'barcelona_header_custom_code',
				'label'       => esc_html__( 'Header Custom Code', 'barcelona' ),
				'type'        => 'textarea-simple',
				'section'     => 'ot-custom-codes',
				'rows'        => '10',
				'class'       => 'barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_footer_custom_code',
				'label'       => esc_html__( 'Footer Custom Code', 'barcelona' ),
				'type'        => 'textarea-simple',
				'section'     => 'ot-custom-codes',
				'rows'        => '10',
				'class'       => 'barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_css_custom_code',
				'label'       => esc_html__( 'CSS Custom Code', 'barcelona' ),
				'type'        => 'css',
				'section'     => 'ot-custom-codes'
			),
			array(
				'id'          => 'barcelona_top_nav_color_scheme',
				'label'       => esc_html__( 'Top Navigation Bar Color Scheme', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-color-scheme',
				'choices'     => $barcelona_color_scheme_choices
			),
			array(
				'id'          => 'barcelona_footer_color_scheme',
				'label'       => esc_html__( 'Footer Color Scheme', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-color-scheme',
				'choices'     => $barcelona_color_scheme_choices
			),
			array(
				'id'          => 'barcelona_megamenu_color_scheme',
				'label'       => esc_html__( 'Mega Menu Color Scheme', 'barcelona' ),
				'type'        => 'select',
				'section'     => 'ot-color-scheme',
				'choices'     => $barcelona_color_scheme_choices
			),
			array(
				'id'          => 'barcelona_selection_color',
				'label'       => esc_html__( 'Selection Color', 'barcelona' ),
				'type'        => 'colorpicker',
				'section'     => 'ot-color-scheme'
			),
			array(
				'id'          => 'barcelona_header_ad_1',
				'label'       => esc_html__( 'Header Ad for Large Screens (728x90)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for large screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 6,
				'section'     => 'ot-advertisement',
				'class'       => 'barcelona-textarea-code barcelona-textarea-code'
			),
			array(
				'id'          => 'barcelona_header_ad_2',
				'label'       => esc_html__( 'Header Ad for Small Screens (468x60)', 'barcelona' ),
				'desc'        => esc_html__( 'Put the ad code to header for small screen sizes.', 'barcelona' ),
				'type'        => 'textarea-simple',
				'rows'        => 6,
				'section'     => 'ot-advertisement',
				'class'       => 'barcelona-textarea-code barcelona-textarea-code'
			)
		)
	);

	/*
	 * Get standard values of all settings
	 */
	foreach( $barcelona_custom_settings['settings'] as $k => $v ) {

		$barcelona_std = barcelona_get_option( $v['id'], true );

		if ( ! empty( $barcelona_std ) ) {
			$barcelona_custom_settings['settings'][ $k ]['std'] = $barcelona_std;
		}

	}

	/*
	 * Allow settings to be filtered before saving
	 */
	$barcelona_custom_settings = apply_filters( 'option_tree_settings_args', $barcelona_custom_settings );

	/*
	 * If settings are not the same update the DB
	 */
	if ( $barcelona_saved_settings !== $barcelona_custom_settings ) {
		update_option( 'option_tree_settings', $barcelona_custom_settings );
	}

	return true;

}
add_action( 'init', 'barcelona_theme_options' );