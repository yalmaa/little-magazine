<?php
/**
 * Module A
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

	echo '<div class="posts-box posts-box-1"'. $barcelona_attr_str .'>';

}

if ( isset( $barcelona_mod_header ) ) {
	echo $barcelona_mod_header;
}

if ( ! $barcelona_async ) {
	echo '<div class="posts-wrapper row">';
}

$barcelona_counter = 0;
while ( $barcelona_q->have_posts() ): $barcelona_q->the_post();

	$barcelona_col_classes = ( $barcelona_counter == 0 ) ? array( 'col-sm-8 col-left', 'psum-featured' ) : array( 'col col-sm-12 col-xs-6', 'psum-small' );
	$barcelona_col_classes[1] .= ' post-format-'. sanitize_html_class( barcelona_get_post_format() );

	if ( $barcelona_counter == 1 ) {
		echo '<div class="col-sm-4 col-right"><div class="row">';
	}

	?>
	<div class="<?php echo esc_attr( $barcelona_col_classes[0] ); ?>">

		<article class="post-summary <?php echo esc_attr( $barcelona_col_classes[1] ); ?>">

			<div class="post-image">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
					<?php
						barcelona_psum_overlay();
						barcelona_thumbnail( 'barcelona-md' );
					?>
				</a>

			</div><!-- .post-image -->

			<div class="post-details">

				<h2 class="post-title">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_attr( get_the_title() ); ?></a>
				</h2>

				<?php if ( $barcelona_counter == 0 ): ?>
				<p class="post-excerpt">
					<?php echo esc_html( barcelona_get_excerpt( 30 ) ); ?>
				</p>
				<?php endif; ?>

				<ul class="post-meta no-sep">
					<li class="post-date">
						<span class="fa fa-clock-o"></span><?php echo esc_html( get_the_time( BARCELONA_DATE_FORMAT ) ); ?>
					</li>
				</ul><!-- .post-meta -->

			</div><!-- .post-details -->

		</article>

	</div>
	<?php

	if ( $barcelona_counter != 0 && $barcelona_counter == $barcelona_q->post_count - 1 ) {
		echo '</div></div>';
	}

	$barcelona_counter++;

endwhile;
wp_reset_postdata();

if ( ! $barcelona_async ) {
	echo '</div></div>';
}