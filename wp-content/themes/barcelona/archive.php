<?php

$barcelona_mod_header = '<div class="box-header archive-header has-title"><h2 class="title">'. get_the_archive_title() .'</h2></div>';

get_header();

barcelona_breadcrumb();

if ( is_category() && barcelona_get_option( 'show_cat_title' ) == 'off' ) {
	unset( $barcelona_mod_header );
}

if ( barcelona_featured_posts() && isset( $barcelona_mod_header ) ) {
	unset( $barcelona_mod_header );
}

?>
<div class="container">

	<div class="<?php echo esc_attr( barcelona_row_class() ); ?>">

		<main id="main" class="<?php echo esc_attr( barcelona_main_class() ); ?>">
		<?php

			if ( is_author() && barcelona_get_option( 'show_author_box' ) == 'on' ) {
				barcelona_author_box();
			}

			include( locate_template( 'includes/modules/module-'. barcelona_get_option( 'posts_layout' ) .'.php' ) );

			barcelona_page_nav();

		?>
		</main>

		<?php get_sidebar(); ?>

	</div><!-- .row -->

</div><!-- .container -->
<?php

get_footer();