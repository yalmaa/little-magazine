<?php

/*
 * Enqueue Scripts & Styles
 */
function barcelona_enqueue_scripts() {

	wp_enqueue_script( 'jquery' );

	if ( ! is_admin() ) {

		$barcelona_post_id = NULL;
		if ( is_singular() ) {
			global $post;
			$barcelona_post_id = $post->ID;
		}

		/*
		 * Enqueue Styles
		 */
		$barcelona_font = barcelona_get_font();
		wp_register_style( 'barcelona-font', esc_url( $barcelona_font[0] ) );
		wp_enqueue_style( 'barcelona-font' );

		wp_register_style( 'bootstrap', BARCELONA_THEME_PATH .'assets/css/bootstrap.min.css', array(), '3.3.4' );
		wp_enqueue_style( 'bootstrap' );

		wp_register_style( 'font-awesome', BARCELONA_THEME_PATH .'assets/css/font-awesome.min.css', array(), '4.4.0' );
		wp_enqueue_style( 'font-awesome' );

		wp_register_style( 'vs-preloader', BARCELONA_THEME_PATH .'assets/css/vspreloader.min.css' );
		wp_enqueue_style( 'vs-preloader' );

		wp_register_style( 'owl-carousel', BARCELONA_THEME_PATH .'assets/lib/owl-carousel/assets/owl.carousel.min.css', array(), '2.0.0');
		wp_enqueue_style( 'owl-carousel' );

		wp_register_style( 'owl-theme', BARCELONA_THEME_PATH .'assets/lib/owl-carousel/assets/owl.theme.default.min.css', array(), '2.0.0' );
		wp_enqueue_style( 'owl-theme' );

		wp_register_style( 'jquery-boxer', BARCELONA_THEME_PATH .'assets/css/jquery.fs.boxer.min.css', array(), '3.3.0' );
		wp_enqueue_style( 'jquery-boxer' );

		wp_register_style( 'barcelona-stylesheet', BARCELONA_THEME_PATH .'style.css', array(), BARCELONA_THEME_VERSION );
		wp_enqueue_style( 'barcelona-stylesheet' );

		if ( is_rtl() ) {
			wp_register_style( 'barcelona-rtl', BARCELONA_THEME_PATH .'assets/css/barcelona-rtl.css', array(), BARCELONA_THEME_VERSION );
			wp_enqueue_style( 'barcelona-rtl' );
		}

		/*
		 * Enqueue Scripts
		 */
		wp_register_script( 'ie-html5', BARCELONA_THEME_PATH .'assets/js/html5.js');
		wp_enqueue_script( 'ie-html5' );

		wp_register_script( 'bootstrap', BARCELONA_THEME_PATH .'assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.4', true );
		wp_enqueue_script( 'bootstrap' );

		wp_register_script( 'retina-js', BARCELONA_THEME_PATH .'assets/js/retina.min.js' );
		wp_enqueue_script( 'retina-js' );

		wp_register_script( 'picturefill', BARCELONA_THEME_PATH .'assets/js/picturefill.min.js', array(), false, true );
		wp_enqueue_script( 'picturefill' );

		wp_register_script( 'owl-carousel', BARCELONA_THEME_PATH .'assets/lib/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '2.0.0', true );
		wp_enqueue_script( 'owl-carousel' );

		wp_register_script( 'boxer', BARCELONA_THEME_PATH .'assets/js/jquery.fs.boxer.min.js', array( 'jquery' ), '3.3.0', true );
		wp_enqueue_script( 'boxer' );

		if ( is_active_widget( false, false, 'barcelona-gplus-box' ) ) {
			wp_register_script( 'google-platform', esc_url( '//apis.google.com/js/platform.js' ), false, true );
			wp_enqueue_script( 'google-platform' );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_register_script( 'barcelona-main', BARCELONA_THEME_PATH .'assets/js/barcelona-main.js', array( 'jquery' ), BARCELONA_THEME_VERSION, true );
		wp_enqueue_script( 'barcelona-main' );
		wp_localize_script( 'barcelona-main', 'barcelonaParams', array(
			'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			'post_id' => $barcelona_post_id,
			'i18n' => array(
				'login_to_vote' => esc_html__( 'Please login to vote!', 'barcelona' )
			)
		) );

	}

}

/*
 * This theme styles the visual editor to resemble the theme style
 */
function barcelona_after_setup_theme() {

	add_action( 'wp_enqueue_scripts', 'barcelona_enqueue_scripts', 99 );

	add_editor_style( 'includes/admin/css/barcelona-editor.css' );

	if ( is_rtl() ) {
		add_editor_style( 'includes/admin/css/barcelona-editor-rtl.css' );
	}

}
add_action( 'after_setup_theme', 'barcelona_after_setup_theme' );

/*
 * Add custom codes for header
 */
function barcelona_header_custom_code() {

	$barcelona_extra_fonts = array();
	if ( is_active_widget( false, false, 'barcelona-about-me' ) ) {
		$barcelona_extra_fonts = array( 'Old+Standard+TT' );
	}

	$barcelona_font = barcelona_get_font( $barcelona_extra_fonts );
	$barcelona_background = barcelona_get_background();
	$barcelona_options = barcelona_get_options( array(
		'apple_touch_icon_iphone',
		'apple_touch_icon_ipad',
		'apple_touch_icon_retina',
		'favicon_url',
		'header_custom_code',
		'css_custom_code',
		'selection_color',
		'facebook_app_id',
		'add_facebook_og_tags'
	) );

	if ( ! empty( $barcelona_options['apple_touch_icon_iphone'] ) ) {
		echo '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'. esc_url( $barcelona_options['apple_touch_icon_iphone'] ) .'" />'. "\n";
	}

	if ( ! empty( $barcelona_options['apple_touch_icon_ipad'] ) ) {
		echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. esc_url( $barcelona_options['apple_touch_icon_ipad'] ) .'" />'. "\n";
	}

	if ( ! empty( $barcelona_options['apple_touch_icon_retina'] ) ) {
		echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'. esc_url( $barcelona_options['apple_touch_icon_retina'] ) .'" />'. "\n";
	}

	if ( ! empty( $barcelona_options['favicon_url'] ) ) {
		echo '<link rel="icon" href="'. esc_url( $barcelona_options['favicon_url'] ) .'" />'. "\n";
	}

	if ( $barcelona_options['add_facebook_og_tags'] == 'on' && is_singular() ):

		global $post;

		$barcelona_author_social_links = barcelona_get_author_social_links( $post->post_author );

		?>
		<meta property="og:title" content="<?php echo esc_attr( $post->post_title ); ?>" />
		<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
		<meta property="og:url" content="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>" />
		<meta property="og:description" content="<?php echo esc_attr( barcelona_get_excerpt( 60 ) ); ?>" />
		<?php if ( ! empty( $barcelona_options['facebook_app_id'] ) ): ?>
		<meta property="fb:app_id" content="<?php echo esc_attr( $barcelona_options['facebook_app_id'] ); ?>" />
		<?php endif; ?>
		<meta property="og:type" content="article" />
		<meta property="og:locale" content="<?php echo esc_attr( barcelona_get_locale() ); ?>" />
		<?php if( has_post_thumbnail() ): ?>
		<meta property="og:image" content="<?php barcelona_thumbnail_url( 'barcelona-lg' ); ?>" />
		<?php if ( array_key_exists( 'facebook', $barcelona_author_social_links ) ) { ?>
		<meta property="article:author" content="<?php echo esc_url( $barcelona_author_social_links['facebook']['href'] ); ?>" />
		<meta property="article:publisher" content="<?php echo esc_url( $barcelona_author_social_links['facebook']['href'] ); ?>" />
		<?php } ?>
		<?php endif;

	endif;

	// Add header custom code
	if ( ! empty( $barcelona_options['header_custom_code'] ) ) {
		// We trust the author here. The author can add custom html to header.
		echo $barcelona_options['header_custom_code'] ."\n";
	}

	// Add body & heading font styles
	echo wp_kses( $barcelona_font[1], array( 'style' => array( 'type' => array()) ) ) ."\n";

	if ( ! empty( $barcelona_background ) ) {
		$barcelona_options['css_custom_code'] .= "\n". $barcelona_background;
	}

	if ( ! empty( $barcelona_options['selection_color'] ) ) {
		$barcelona_options['css_custom_code'] .= "\n::-moz-selection { background-color: ". esc_html( $barcelona_options['selection_color'] ) ."; }\n::selection { background-color: ". esc_html( $barcelona_options['selection_color'] ) ."; }";
	}

	// Add css custom code
	if ( ! empty( $barcelona_options['css_custom_code'] ) ) {
		echo "<style type=\"text/css\">\n". esc_html( $barcelona_options['css_custom_code'] ) ."\n</style>\n";
	}

}
add_action( 'wp_head', 'barcelona_header_custom_code' );

/*
 * Add custom codes for footer
 */
function barcelona_footer_custom_code() {

	$barcelona_code = barcelona_get_option( 'footer_custom_code' );
	$barcelona_background = barcelona_get_background( true );

	if ( ! empty( $barcelona_background ) ) {

		if ( empty( $barcelona_code ) ) {
			$barcelona_code = '';
		}

		$barcelona_code .= "\n<script>jQuery(document).ready(function($){ $.backstretch('". esc_url( $barcelona_background ) ."'); });</script>";

	}

	// Add footer custom code
	if ( ! empty( $barcelona_code ) ) {
		// We trust the author here. The author can add custom html to footer.
		echo $barcelona_code ."\n";
	}

}
add_action( 'wp_footer', 'barcelona_footer_custom_code', 99999 );

/*
 * OptionTree Admin Style
 */
function barcelona_ot_admin_styles_after() {

	wp_register_style( 'google-font-montserrat', barcelona_get_protocol() .'//fonts.googleapis.com/css?family=Montserrat:400,700' );
	wp_enqueue_style( 'google-font-montserrat' );

	wp_register_style( 'barcelona-ot-admin', BARCELONA_THEME_PATH .'includes/admin/css/barcelona-ot-admin.css', array(), BARCELONA_THEME_VERSION );
	wp_enqueue_style( 'barcelona-ot-admin' );

	if ( is_rtl() ) {
		wp_register_style( 'barcelona-ot-admin-rtl', BARCELONA_THEME_PATH .'includes/admin/css/barcelona-ot-admin-rtl.css', array(), BARCELONA_THEME_VERSION );
		wp_enqueue_style( 'barcelona-ot-admin-rtl' );
	}

}
add_action( 'ot_admin_styles_after', 'barcelona_ot_admin_styles_after' );

/*
 * Enqueue Admin Scripts & Styles
 */
function barcelona_admin_enqueue_scripts( $hook ) {

	$barcelona_hook_arr = array(
		'widgets.php',
		'edit-tags.php',
		'post-new.php',
		'post.php',
		'appearance_page_ot-theme-options'
	);

	if ( in_array( $hook, $barcelona_hook_arr ) ) {

		wp_enqueue_style( 'font-awesome', BARCELONA_THEME_PATH . 'assets/css/font-awesome.min.css', array(), '4.4.0' );

		wp_enqueue_script( 'barcelona-admin', BARCELONA_THEME_PATH .'includes/admin/js/barcelona-admin.js', array( 'jquery', 'wp-color-picker' ), BARCELONA_THEME_VERSION, true );
		wp_enqueue_style( 'barcelona-admin', BARCELONA_THEME_PATH .'includes/admin/css/barcelona-admin.css', array( 'wp-color-picker' ), BARCELONA_THEME_VERSION, 'all' );

		if ( is_rtl() ) {
			wp_enqueue_style( 'barcelona-admin-rtl', BARCELONA_THEME_PATH .'includes/admin/css/barcelona-admin-rtl.css', array( 'wp-color-picker' ), time(), 'all' );
		}

		if ( $hook == 'edit-tags.php' || $hook == 'widgets.php' ) {
			wp_enqueue_media();
		}

	}

}
add_action( 'admin_enqueue_scripts', 'barcelona_admin_enqueue_scripts', 99 );

/*
 * Add IE conditions for spesific tags
 */
function barcelona_ie_conditional_scripts( $tag, $handle ) {

	if ( $handle == 'ie-html5' ) {
		$tag = "<!--[if lt IE 9]>\n" . $tag . "<![endif]-->\n";
	}

	return $tag;

}
add_filter( 'script_loader_tag', 'barcelona_ie_conditional_scripts', 10, 2 );

/*
 * Customizer live preview script
 */
function barcelona_customizer_live_preview() {

	wp_enqueue_script( 'barcelona-customize', BARCELONA_THEME_PATH .'includes/admin/js/barcelona-customize.js', array( 'jquery','customize-preview' ), BARCELONA_THEME_VERSION, true );

}
add_action( 'customize_preview_init', 'barcelona_customizer_live_preview' );