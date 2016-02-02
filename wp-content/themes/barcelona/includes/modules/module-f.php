<?php
/**
 * Module F
 */

global $post, $wp_query;

if ( ! isset( $barcelona_q ) ) {
	$barcelona_q = $wp_query;
}

if ( ! isset( $barcelona_async ) ) {
	$barcelona_async = false;
}

if ( ! $barcelona_async ) {

	$barcelona_attr_str = '';
	if ( isset( $barcelona_mod_attr_data ) && is_array( $barcelona_mod_attr_data ) ) {
		foreach ( $barcelona_mod_attr_data as $j => $d ) {
			$barcelona_attr_str .= ' data-'. sanitize_key( $j ) .'="'. esc_attr( $d ) .'"';
		}
	}

	echo '<div class="posts-box posts-box-5'. ( is_single() ? ' posts-box-related-posts' : '' ) .'"'. $barcelona_attr_str .'>';

}

if ( isset( $barcelona_mod_header ) ) {
	echo $barcelona_mod_header;
}

$barcelona_counter = 1;
$barcelona_posts_payload = array();

while ( $barcelona_q->have_posts() ) { $barcelona_q->the_post();

	$barcelona_col = 'left';
	if ( is_single() ) {
		if ( $barcelona_counter % 3 == 1 ) {
			$barcelona_col = 'middle';
		} else if ( $barcelona_counter % 3 == 2 ) {
			$barcelona_col = 'right';
		}
	} else if ( $barcelona_counter % 2 == 0 ) {
		$barcelona_col = 'right';
	}

	$barcelona_posts_payload[ $barcelona_col ][] = get_post();
	$barcelona_counter++;

}

if ( ! $barcelona_async ) {
	echo '<div class="posts-wrapper row">';
}

foreach ( $barcelona_posts_payload as $barcelona_col => $barcelona_column_posts ):

	echo '<div class="col-'. ( is_single() ? 'md-4' : 'sm-6' )  .' col-' . sanitize_html_class( $barcelona_col ) . '">';

	$barcelona_counter = 0;

	foreach ( $barcelona_column_posts as $post ): setup_postdata( $post );

		?>
		<article class="post-summary<?php echo ' post-format-'. sanitize_html_class( barcelona_get_post_format() ) .' psum-' . ( $barcelona_counter == 0 ? 'featured' : 'small' ); ?>">

			<?php if ( $barcelona_counter == 0 ): ?>
				<div class="post-image">

					<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
						<?php
						barcelona_psum_overlay();
						barcelona_thumbnail( 'barcelona-md' );
						?>
					</a>

				</div><!-- .post-image -->
			<?php endif; ?>

			<div class="post-details">

				<h2 class="post-title">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
				</h2>

				<ul class="post-meta no-sep">
					<li class="post-date">
						<span class="fa fa-clock-o"></span><?php echo esc_html( get_the_time( BARCELONA_DATE_FORMAT ) ); ?>
					</li>
					<?php if ( $barcelona_counter == 0 ): ?>
						<li class="post-views">
							<span class="fa fa-eye"></span><?php barcelona_post_views(); ?>
						</li>
						<li class="post-likes">
							<span class="fa fa-thumbs-up"></span><?php barcelona_post_vote(); ?>
						</li>
						<li class="post-comments">
							<span class="fa fa-comments"></span><?php echo intval( $post->comment_count ); ?>
						</li>
					<?php endif; ?>
				</ul><!-- .post-meta -->

			</div><!-- .post-details -->

		</article>

		<?php

		$barcelona_counter++;

	endforeach;
	wp_reset_postdata();

	echo '</div>';

endforeach;

if ( ! $barcelona_async ) {
	echo '</div></div>';
}