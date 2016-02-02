<?php
/*
 * Template Name: Authors
 */

get_header();

$barcelona_authors = get_users( array(
	'fields' => 'ID',
	'who'    => 'authors',
	'order'  => 'DESC',
	'orderby'=> 'post_count'
) );

?>
<div class="container">

	<div class="<?php echo esc_attr( barcelona_row_class() ); ?>">

		<main id="main" class="<?php esc_attr( barcelona_main_class() ); ?>">

			<div class="box-header has-title">
				<h3 class="title"><?php echo esc_html( get_the_title() ); ?></h3>
			</div>

			<?php
			foreach ( $barcelona_authors as $barcelona_author_id ) {
				barcelona_author_box( $barcelona_author_id, false );
			}
			?>

		</main>

		<?php get_sidebar(); ?>

	</div>

</div>
<?php

get_footer();