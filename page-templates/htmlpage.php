<?php

/**
 * Template Name: HTML Page
 *
 * Template for displaying custom HTML.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

if (is_front_page()) {
	get_template_part('global-templates/hero');
}

$wrapper_id = 'full-width-page-wrapper';
if (is_page_template('page-templates/no-title.php')) {
	$wrapper_id = 'no-title-page-wrapper';
}

get_template_part('global-templates/inner-banner');
?>

<div class="wrapper" id="<?php echo $wrapper_id; ?>">

	<?php
	while (have_posts()) {
		the_post();
		the_content();
	}
	?>

</div><!-- #<?php echo $wrapper_id; ?> -->

<?php
get_footer();
