<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MangerLocalTheme
 */

?>
	<div class="entry-content">
	<img src="<?php the_post_thumbnail_url(); ?>" alt="">
		<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'MangerLocalTheme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->