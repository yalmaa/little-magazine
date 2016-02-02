<?php
/*
 * Posts Widget
 */

class Barcelona_Widget_Posts extends WP_Widget {

	public function __construct() {

		$widget_ops = array(
			'classname'   => 'barcelona-widget-posts',
			'description' => esc_html_x( 'Displays the posts with more stylish way', 'Posts widget description', 'barcelona' )
		);

		parent::__construct( 'barcelona-recent-posts', sprintf( esc_html_x( '%s Posts', 'Posts widget name', 'barcelona' ), BARCELONA_THEME_NAME ), $widget_ops );

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );

	}

	public function widget( $args, $instance ) {

		$barcelona_cache = array();
		if ( ! $this->is_preview() ) {
			$barcelona_cache = wp_cache_get( 'barcelona-posts', 'widget' );
		}

		if ( ! is_array( $barcelona_cache ) ) {
			$barcelona_cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $barcelona_cache[ $args['widget_id'] ] ) ) {
			echo wp_kses_post( $barcelona_cache[ $args['widget_id'] ] );
			return;
		}

		ob_start();

		$barcelona_params = array(
			'no_found_rows'         => true,
			'post_status'           => 'publish',
			'ignore_sticky_posts'   => true
		);

		if ( empty( $instance['offset'] ) || ! $barcelona_params['offset'] = absint( $instance['offset'] ) ) {
			$barcelona_params['offset'] = 0;
		}

		if ( empty( $instance['number'] ) || ! $barcelona_params['posts_per_page'] = absint( $instance['number'] ) ) {
			$barcelona_params['posts_per_page'] = 5;
		}

		if ( ! empty( $instance['category'] ) ) {
			$barcelona_params['cat'] = $instance['category'];
		}

		if ( ! empty( $instance['filter_posts'] )  ) {

			$barcelona_params['post__in'] = array_values( array_filter( array_map( function ( $v ) {
				$v = trim( $v );
				if ( ! is_numeric( $v ) || $v <= 0 ) {
					$v = false;
				}
				return $v;
			}, explode( ',', $instance['filter_posts'] ) ), function( $v ) { return is_numeric( $v ); } ) );

			if ( empty( $barcelona_params['post__in'] ) ) {
				unset( $barcelona_params['post__in'] );
			}

		}

		switch ( $instance['orderby'] ) {
			case 'views':
				$barcelona_params['orderby'] = 'meta_value_num';
				$barcelona_params['meta_key'] = '_barcelona_views';
				break;
			case 'comments':
				$barcelona_params['orderby'] = 'comment_count';
				break;
			case 'votes':
				$barcelona_params['orderby'] = 'meta_value_num';
				$barcelona_params['meta_key'] = '_barcelona_vote_up';
				break;
			case 'random':
				$barcelona_params['orderby'] = 'rand';
				break;
			case 'posts':
				$barcelona_params['orderby'] = 'post__in';
				break;
			default:
				$barcelona_params['orderby'] = 'date';
		}

		$barcelona_params['order'] = ( $instance['order'] != 'asc' ) ? 'DESC' : 'ASC';

		$barcelona_query = new WP_Query( $barcelona_params );

		if ( $barcelona_query->have_posts() ):

			echo wp_kses_post( $args['before_widget'] );

			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['title'] ) . wp_kses_post( $args['after_title'] );
			}

			?>
			<div class="posts-box posts-box-sidebar row">
			<?php while ( $barcelona_query->have_posts() ) : $barcelona_query->the_post(); ?>
				<div class="col col-md-12 col-sm-6 col-xs-12">
					<div class="post-summary post-format-<?php echo sanitize_html_class( barcelona_get_post_format() ); ?> psum-horizontal psum-small clearfix">
						<div class="post-image">
							<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
								<?php
									barcelona_psum_overlay();
									barcelona_thumbnail( 'barcelona-md' );
								?>
							</a>
						</div>
						<div class="post-details">
							<h2 class="post-title">
								<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
							</h2>
							<ul class="post-meta no-sep">
								<li class="post-date">
									<span class="fa fa-clock-o"></span><?php echo esc_html( get_the_time( BARCELONA_DATE_FORMAT ) ); ?>
								</li>
							</ul>
						</div>
					</div><!-- .post-summary -->
				</div>
			<?php endwhile; ?>
			</div>
			<?php

			echo wp_kses_post( $args['after_widget'] );

			wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {

			$barcelona_cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'barcelona-posts', $barcelona_cache, 'widget' );

		} else {

			ob_end_flush();

		}

	}

	public function flush_widget_cache() {

		wp_cache_delete( 'barcelona-posts', 'widget' );

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']          = strip_tags( $new_instance['title'] );
		$instance['number']         = absint( $new_instance['number'] );
		$instance['offset']         = absint( $new_instance['offset'] );
		$instance['filter_posts']   = strip_tags( $new_instance['filter_posts'] );
		$instance['category']       = $new_instance['category'];
		$instance['orderby']        = sanitize_key( $new_instance['orderby'] );
		$instance['order']          = sanitize_key( $new_instance['order'] );

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['barcelona-posts'] ) ) {
			delete_option( 'barcelona-posts' );
		}

		return $instance;

	}

	public function form( $instance ) {

		$barcelona_title        = isset( $instance['title'] ) ? $instance['title'] : '';
		$barcelona_number       = isset( $instance['number'] ) ? $instance['number'] : 5;
		$barcelona_offset       = isset( $instance['offset'] ) ? $instance['offset'] : 0;
		$barcelona_filter_posts = isset( $instance['filter_posts'] ) ? $instance['filter_posts'] : '';
		$barcelona_category     = isset( $instance['category'] ) ? intval( $instance['category'] ) : '';
		$barcelona_orderby      = isset( $instance['orderby'] ) ? sanitize_key( $instance['orderby'] ) : 'date';
		$barcelona_order        = isset( $instance['order'] ) ? sanitize_key( $instance['order'] ) : 'desc';

		$barcelona_categories = get_categories();

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'barcelona' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $barcelona_title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'barcelona' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo absint( $barcelona_number ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Posts Offset:', 'barcelona' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="text" value="<?php echo absint( $barcelona_offset ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Choose category:', 'barcelona' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>">
				<option value=""><?php esc_html_e( '- All -', 'barcelona' ); ?></option>
				<?php foreach ( $barcelona_categories as $barcelona_cat ): ?>
				<option value="<?php echo intval( $barcelona_cat->term_id ); ?>"<?php echo ( $barcelona_category == $barcelona_cat->term_id ) ? ' selected' : ''; ?>><?php echo esc_html( $barcelona_cat->name ) .' ('. intval( $barcelona_cat->count ) .')'; ?></option>
				<?php endforeach; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'filter_posts' ) ); ?>"><?php esc_html_e( 'Filter by Post Manually:', 'barcelona' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'filter_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'filter_posts' ) ); ?>" class="widefat" type="text" value="<?php echo esc_attr( $barcelona_filter_posts ); ?>" />
			<span class="barcelona-widget-description"><?php esc_html_e( 'Specify post ids separated by comma. i.e. 45,73,132,19', 'barcelona' ); ?></span>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Order Posts by', 'barcelona' ) ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" class="barcelona-select-post-orderby">
				<option value="date"<?php echo ( $barcelona_orderby == 'date' ) ? ' selected' : ''; ?>><?php esc_html_e( 'Date', 'barcelona' ) ?></option>
				<option value="views"<?php echo ( $barcelona_orderby == 'views' ) ? ' selected' : ''; ?>><?php esc_html_e( 'Number of Views', 'barcelona' ) ?></option>
				<option value="comments"<?php echo ( $barcelona_orderby == 'comments' ) ? ' selected' : ''; ?>><?php esc_html_e( 'Number of Comments', 'barcelona' ) ?></option>
				<option value="votes"<?php echo ( $barcelona_orderby == 'votes' ) ? ' selected' : ''; ?>><?php esc_html_e( 'Number of Votes', 'barcelona' ) ?></option>
				<option value="random"<?php echo ( $barcelona_orderby == 'random' ) ? ' selected' : ''; ?>><?php esc_html_e( 'Random', 'barcelona' ) ?></option>
				<option value="posts"<?php echo ( $barcelona_orderby == 'posts' ) ? ' selected' : ''; ?>><?php esc_html_e( 'Manual Post IDs', 'barcelona' ) ?></option>
			</select>
		</p>

		<p class="barcelona-post-order-type"<?php echo ( $barcelona_orderby == 'random' ) ? ' style="display: none;' : ''; ?>>
			<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Order Type', 'barcelona' ) ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>">
				<option value="desc"<?php echo ( $barcelona_order == 'desc' ) ? ' selected' : ''; ?>><?php esc_html_e( 'Descending', 'barcelona' ) ?></option>
				<option value="asc"<?php echo ( $barcelona_order == 'asc' ) ? ' selected' : ''; ?>><?php esc_html_e( 'Ascending', 'barcelona' ) ?></option>
			</select>
		</p>
		<?php

	}

}