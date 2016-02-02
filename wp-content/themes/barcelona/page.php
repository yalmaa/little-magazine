<?php

$barcelona_is_pw_req = post_password_required();

get_header();

barcelona_featured_img();

?>
<div class="<?php echo esc_attr( barcelona_single_class() ); ?>">

	<div class="<?php echo esc_attr( barcelona_row_class() ); ?>">

		<main id="main" class="<?php echo esc_attr( barcelona_main_class() ); ?>">

			<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>

				<article id="post-<?php echo intval( get_the_ID() ); ?>" <?php post_class(); ?> role="article">

					<?php barcelona_featured_img(); ?>

					<section class="post-content">
					<?php

						the_content();

						if ( ! $barcelona_is_pw_req ) {

							wp_link_pages( array(
								'before'   => '<div class="pagination"><span class="page-numbers title">' . esc_html__( 'Pages:', 'barcelona' ) . '</span>',
								'after'    => '</div>',
								'pagelink' => '%'
							) );

						}

					?>
					</section><!-- .post-content -->

					<footer class="post-footer">

						<?php comments_template(); ?>

					</footer><!-- .post-footer -->

				</article>

			<?php endwhile; endif; ?>

		</main>

		<?php get_sidebar(); ?>

	</div><!-- .row -->

</div><!-- .container -->
<?php

get_footer();