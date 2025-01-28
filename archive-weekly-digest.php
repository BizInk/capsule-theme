<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
get_template_part('global-templates/inner-banner');
get_template_part('global-templates/searchsection');

if (have_posts()) {
?>

<section class="four-col-team-section blog-listing-section comman-margin">    
    <div class="container">
		<div class="team-wrap"> <!-- blog-posts-cont -->
			<div class="row g-4 g-lg-5">
			<?php
			while (have_posts()) {
				the_post();
				$post_image = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri() . '/images/default.jpg';
				?>
				<div class="col-12 col-md-6 col-xl-4 team-member weekly-digest">
					<div class="team-member-wrap">
						<div class="member-details p-4">
							<a href="<?php the_permalink(); ?>">
								<h4 class="member-name"><?php the_title(); ?></h4>
							</a>
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			</div>
		</div>
		<?php
      /**blog-posts-cont <a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read More', 'tab-theme'); ?></a>*/
      wp_reset_postdata();
      ?>
      <div class="post-navigation">
        <?php
        the_posts_pagination(array(
          'mid_size'  => 2,
          'prev_text' => __('&lt;', 'textdomain'),
          'next_text' => __('&gt;', 'textdomain'),
        ));
        ?>
      </div>
    </div>
</section>
<?php
} else {
?>
  <p><?php esc_html_e('Sorry, there are no Weekly Digests.', 'capsule-theme'); ?></p>
<?php
}
get_footer(); ?>