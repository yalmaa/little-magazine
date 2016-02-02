<?php
/**
 * Module C
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

	echo '<div class="posts-box posts-box-2"'. $barcelona_attr_str .'>';

}

if ( isset( $barcelona_mod_header ) ) {
	echo $barcelona_mod_header;
}

if ( ! $barcelona_async ) {
	echo '<div class="posts-wrapper">';
}

while ( $barcelona_q->have_posts() ): $barcelona_q->the_post();

	?>
	<article class="post-summary psum-horizontal post-format-<?php echo sanitize_html_class( barcelona_get_post_format() ); ?> clearfix">

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
				<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
			</h2>

			<p class="post-excerpt">
				<?php echo esc_html( barcelona_get_excerpt( 36 ) ); ?>
			</p>

			<ul class="post-meta no-sep">
				<li class="post-date">
					<span class="fa fa-clock-o"></span><?php echo esc_html( get_the_time( BARCELONA_DATE_FORMAT ) ); ?>
				</li>
			</ul><!-- .post-meta -->

		</div><!-- .post-details -->

	</article>
	<?php

endwhile;
wp_reset_postdata();

if ( ! $barcelona_async ) {
	echo '</div></div>';
}