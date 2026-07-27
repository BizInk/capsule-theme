<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

if(!empty($_GET['category'])){
	if($_GET['category'] != 'all'){
		$cat_URL = get_category_link( get_cat_ID( $_GET['category'] ) );
		if(!empty($cat_URL)){
			wp_redirect($cat_URL);
			exit;
		}
	}
}

get_header();
get_template_part('global-templates/inner-banner');
get_template_part('global-templates/searchsection');

if (have_posts()) {
	get_template_part('global-templates/categoryselection');
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
						<a href="<?php the_permalink(); ?>" class="member-img">
						<img src="<?= $post_image; ?>" alt="<?php the_title(); ?>">
						</a>
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
  <p><?php esc_html_e('Sorry, there are no Blogs.', 'capsule-theme'); ?></p>
<?php
}
get_footer(); ?>