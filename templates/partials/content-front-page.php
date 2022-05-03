<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package outa
 */

?>

        
</header>

	<?php get_the_post_thumbnail(); ?>

	<div class="entry-content">


		<?php the_title( '<h1 class="entry-title">', '</h1>' );

		the_content();
		?>
	</div>