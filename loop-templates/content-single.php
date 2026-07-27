<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' ); 
		if(function_exists('get_field')) {
			$show_date_on_posts = get_field('show_date_on_posts', 'option');
			if($show_date_on_posts == true){
				echo '<div class="entry-meta">';
				understrap_posted_on();
				echo '</div><!-- .entry-meta -->';
			}
		} 
		?>
    </div><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content default-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content --> 

</article><!-- #post-## -->
