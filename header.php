<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap5');
$navbar_type       = get_theme_mod('understrap_navbar_type', 'collapse');

$company_phone = get_field('company_phone', 'options');
$company_email = get_field('company_email', 'options');

$facebook = get_field('facebook', 'options');
$twitter = get_field('twitter', 'options');
$linkedin = get_field('linkedin', 'options');
$instagram = get_field('instagram', 'options');
$youtube = get_field('youtube', 'options');
$threads = get_field('threads', 'options');
$google_my_business = get_field('google_my_business', 'options');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php
	wp_head();
	$header_custom_css = get_field('header_custom_css', 'option');
	if( !empty($header_custom_css) ){
		echo '<style>'. $header_custom_css .'</style>';
	} ?>
	<?php
	echo get_field('custom_embed_code_head', 'options');
	?>
</head>
<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<header id="wrapper-navbar" class="">
			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>
			<div class="top-nav">
				<div class="container">
					<?php if (has_nav_menu('client-area')) {

						$client_area_menu = wp_get_nav_menu_name('client-area'); ?>

						<div class="client-area-wrap">
							<div class="client-area-anchor"><?php echo $client_area_menu ?? __("Client Area",'capsule'); ?><i class="fa fa-angle-down" aria-hidden="true"></i></div>
							<div class="client-area-cont">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'client-area',
										'menu_class' => 'menu',
										'menu_id'	=> 'menu-client-area',
										'fallback_cb' => false
									)
								); ?>
							</div>
						</div>
					<?php } ?>

					<div class="header-contact">
						<ul>
							<?php if (!empty($company_phone)) { ?>
								<li><a href="tel:<?= $company_phone; ?>" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i><?= $company_phone; ?></a></li>
							<?php }
							if (!empty($company_email)) { ?>
								<li><a href="mailto:<?= $company_email; ?>" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i><?= $company_email; ?></a></li>
							<?php } ?>
						</ul>

						<!-- Social icons -->
						<nav class="social-icons">
							<ul>
								<?php if (!empty($facebook)) { ?>
									<li><a href="<?= esc_url($facebook); ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
								<?php }
								
								if (!empty($twitter)) { ?>
									<li><a href="<?= esc_url($twitter); ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
								<?php }

								if (!empty($linkedin)) { ?>
									<li><a href="<?= esc_url($linkedin); ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
								<?php }

								if (!empty($instagram)) { ?>
									<li><a href="<?= esc_url($instagram); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
								<?php }

								if (!empty($youtube)) { ?>
									<li><a href="<?= esc_url($youtube); ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
								<?php }

								if( !empty($threads) ){ ?>
									<li><a href="<?= esc_url($threads); ?>" target="_blank"><i class="fa-brands fa-threads"></i></a></li>
								<?php }

								if( !empty($google_my_business) ){ ?>
									
									<li><a href="<?= $google_my_business; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="16px" height="16px"><path d="M 9.2832031 4 C 7.488935 4 5.9052102 5.2051958 5.4277344 6.9355469 L 2 19.365234 L 2 19.5 C 2 23.078268 4.9217323 26 8.5 26 C 10.813035 26 12.845511 24.77516 13.998047 22.945312 C 15.146939 24.778014 17.180833 26 19.5 26 C 21.819167 26 23.853061 24.778014 25.001953 22.945312 C 26.154489 24.77516 28.186965 26 30.5 26 C 32.813993 26 34.847721 24.77447 36 22.943359 C 37.152279 24.77447 39.186007 26 41.5 26 C 45.078268 26 48 23.078268 48 19.5 L 48 19.365234 L 44.570312 6.9355469 C 44.092963 5.2056548 42.509782 4 40.714844 4 L 9.2832031 4 z M 9.2832031 6 L 14.851562 6 L 13.197266 18 L 4.4511719 18 L 7.3554688 7.46875 C 7.5959929 6.597101 8.3794712 6 9.2832031 6 z M 26 6 L 33.128906 6 L 34.783203 18 L 26 18 L 26 6 z M 15 18 L 24 18 L 24 19.5 C 24 19.668891 24.012611 19.834272 24.025391 20 L 15 20 L 15 19.5 L 15 18 z M 36.802734 18 L 45.548828 18 L 45.984375 19.580078 C 45.981749 19.724009 45.951091 19.859765 45.935547 20 L 37.050781 20 C 37.032383 19.833631 37 19.67153 37 19.5 L 37 19.431641 L 36.802734 18 z M 4.0644531 20 L 12.949219 20 C 12.699714 22.256206 10.826202 24 8.5 24 C 6.175282 24 4.3143567 22.254621 4.0644531 20 z M 26.099609 20 L 34.900391 20 C 34.642986 22.247621 32.820142 24 30.5 24 C 28.179858 24 26.357014 22.247621 26.099609 20 z M 14 25.974609 C 12.517 27.235609 10.599 28 8.5 28 C 6.845 28 5.306 27.519172 4 26.701172 L 4 43 C 4 44.654 5.346 46 7 46 L 43 46 C 44.654 46 46 44.654 46 43 L 46 26.701172 C 44.694 27.519172 43.155 28 41.5 28 C 39.401 28 37.483 27.235609 36 25.974609 C 34.517 27.235609 32.599 28 30.5 28 C 28.401 28 26.483 27.235609 25 25.974609 C 23.517 27.235609 21.599 28 19.5 28 C 17.401 28 15.483 27.235609 14 25.974609 z M 35.5 29 C 37.546 29 39.372453 29.952547 40.564453 31.435547 L 39.132812 32.867188 C 38.314813 31.740187 36.996 31 35.5 31 C 33.019 31 31 33.019 31 35.5 C 31 37.981 33.019 40 35.5 40 C 37.453 40 39.102609 38.742 39.724609 37 L 36 37 L 36 35 L 41.974609 35 C 41.986609 35.166 42 35.331 42 35.5 C 42 39.084 39.084 42 35.5 42 C 31.916 42 29 39.084 29 35.5 C 29 31.916 31.916 29 35.5 29 z"/></svg></a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<?php get_template_part('global-templates/navbar', $navbar_type . '-' . $bootstrap_version); ?>
		</header>
		<?php
		include get_stylesheet_directory() . '/inc/password-check.php';
		?>