<?php
/**
 * Search results partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-header">

		<?php the_title(sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h2>'); ?>
 
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

	</div><!-- .entry-header -->

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->

	<div class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</div><!-- .entry-footer -->

</article><!-- #post-## -->
