<?php
/**
 * Template for displaying posts on the author archive
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h3>'
		);
		?>

		<?php if ( 'post' === get_post_type() ) : 
		if(function_exists('get_field')) {
			$show_date_on_posts = get_field('show_date_on_posts', 'option');
			if($show_date_on_posts == true){
				echo '<div class="entry-meta">';
				understrap_posted_on();
				echo '</div><!-- .entry-meta -->';
			}
		}
		endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
