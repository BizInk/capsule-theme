<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after
*
* @package Understrap
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;
$container = get_theme_mod('understrap_container_type');
get_template_part('sidebar-templates/sidebar', 'footerfull');

$footer_logo = get_field('footer_logo', 'options');
$footer_text = get_field('footer_text', 'options');
$column_1_title = get_field('column_1_title', 'options');
$column_2_title = get_field('column_2_title', 'options');
$column_3_title = get_field('column_3_title', 'options');
$column_4_title = get_field('column_4_title', 'options');
$disclaimer_text = get_field('disclaimer_text', 'options');

$footer_shape_color_1 = get_field('footer_shape_color_1', 'options');
$footer_shape_color_2 = get_field('footer_shape_color_2', 'options');

$company_phone = get_field('company_phone', 'options');
$company_email = get_field('company_email', 'options');
$company_address = get_field('company_address', 'options');

$facebook = get_field('facebook', 'options'); 
$twitter = get_field('twitter', 'options'); 
$linkedin = get_field('linkedin', 'options');
$instagram = get_field('instagram', 'options');
$youtube = get_field('youtube', 'options');
$threads = get_field('threads', 'options');
$google_my_business = get_field('google_my_business', 'options');

$copyright_information = get_field('copyright_information', 'options'); ?>
<!-- logo-section-start -->
<?php
$logo_style = get_field('global_logo_style','options'); 
$logo_layout = get_field('global_logo_layout','options'); 
$logo_title = get_field('global_logo_title', 'options');

if( have_rows('global_logos','options') ): ?>

    <section class="logo-section text-center comman-padding">
        <?php if( !empty($logo_title) ){ ?>

            <div class="full-width-wysiwyg text-center">
                <div class="container">
                    <div class="editor-design">
                        <h2><?php echo $logo_title; ?></h2>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="container">
            <?php if( $logo_style == 'slider' ){ ?>

                <div class="logo-slider">
                    <?php while( have_rows('global_logos','options') ):
                        the_row();

                        $slider_image = get_sub_field('logo_image');
                        $logo_url = get_sub_field('logo_image_url');
						$logo_image_alt = get_sub_field('logo_image_alt');
						
                        if( !empty($slider_image) ){ ?>

                            <div class="logo">
                                <?php if( !empty($logo_url) ){ ?>
                                    
                                    <a href="<?php echo $logo_url ?>">
                                <?php } ?>
                                    
                                    <img src="<?php echo esc_url($slider_image['url']); ?>" class="img-fluid" alt="<?php echo $logo_image_alt ? esc_attr($logo_image_alt) : esc_attr($slider_image['alt']); ?>">

                                <?php if( !empty($logo_url) ){ ?>
                                    
                                    </a>
                                <?php } ?>
                            </div>
                        <?php }
                    endwhile; ?>
                </div>
            <?php 
            }
            else { 
            ?>
                <div class="row justify-content-center">
                    <?php while( have_rows('global_logos','options') ):
                        the_row();

                        $slider_image = get_sub_field('logo_image');
                        $logo_url = get_sub_field('logo_image_url');
						$logo_image_alt = get_sub_field('logo_image_alt');

                        if( !empty($slider_image) ){ ?>

                            <div class="<?php echo $logo_layout; ?> logo">
                                <?php if( !empty($logo_url) ){ ?>

                                    <a href="<?php echo $logo_url ?>" target="_blank">
                                <?php } ?>

                                    <img src="<?php echo esc_url($slider_image['url']); ?>" class="img-fluid" alt="<?php echo $logo_image_alt ? esc_attr($logo_image_alt) : esc_attr($slider_image['alt']); ?>">

                                <?php if( !empty($logo_url) ){ ?>
                                    
                                    </a>
                                <?php } ?>
                            </div>
                        <?php }
                    endwhile; ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php endif; ?>
<!-- logo-section-end -->
<?php 
$enable_newsletter_section = get_field('enable_newsletter_section', 'options');
if( $enable_newsletter_section == true || $enable_newsletter_section == 'yes' ){
	get_template_part('global-templates/newsletter');
}
?>
<footer>
	<div class="container">
		<div class="row footer-wrap">
			<div class="col-md-6 col-lg-3 mb-4 mb-lg-0 px-lg-4">
				<?php 
				if(!empty($column_1_title)): echo '<h5>'.esc_html($column_1_title).'</h5>'; endif;
				if(!empty($footer_logo) && !empty($footer_logo['url'])): ?>
					<div class="footer-logo">
						<a href="<?= site_url(); ?>"><img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>"></a>
					</div>
				<?php endif; ?>
				<div class="footer-content">
					<?= $footer_text; ?>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
				<?php if(!empty($column_2_title)): echo '<h5>'.esc_html($column_2_title).'</h5>'; endif; ?>
				<nav class="contact-details">
					<ul>
						<?php if( !empty($company_phone) ){ ?>
							<li><a href="tel:<?= $company_phone; ?>" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i><?= $company_phone; ?></a></li>						
						<?php }
						if( !empty($company_email) ){ ?>
							<li><a href="mailto:<?= $company_email; ?>" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i><?= $company_email; ?></a></li>
						<?php } 
						if( !empty($company_address) ){ ?>
							<li><span><i class="fa fa-compass" aria-hidden="true"></i><?= $company_address; ?></span></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
			<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
				<?php if(!empty($column_3_title)): echo '<h5>'.esc_html($column_3_title).'</h5>'; endif; ?>
				<nav class="social-icons">
					<ul>
						<?php if( !empty($facebook) ){ ?>
							<li><a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
						<?php }
						if( !empty($twitter) ){ ?>
							<li><a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<?php }
						if( !empty($linkedin) ){ ?>
							<li><a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<?php }
						if (!empty($instagram)) { ?>
							<li><a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<?php }
						if (!empty($youtube)) { ?>
							<li><a href="<?php echo esc_url($youtube); ?>" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
						<?php } 
						if( !empty($threads) ){ ?>
									
							<li><a href="<?= $threads; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-threads-fill" viewBox="0 0 16 16">
							<path d="M6.81 9.204c0-.41.197-1.062 1.727-1.062.469 0 .758.034 1.146.121-.124 1.606-.91 1.818-1.674 1.818-.418 0-1.2-.218-1.2-.877Z"/>
							<path d="M2.59 16h10.82A2.59 2.59 0 0 0 16 13.41V2.59A2.59 2.59 0 0 0 13.41 0H2.59A2.59 2.59 0 0 0 0 2.59v10.82A2.59 2.59 0 0 0 2.59 16ZM5.866 5.91c.567-.81 1.315-1.126 2.35-1.126.73 0 1.351.246 1.795.711.443.466.696 1.132.754 1.983.245.103.472.224.678.363.832.559 1.29 1.395 1.29 2.353 0 2.037-1.67 3.806-4.692 3.806-2.595 0-5.291-1.51-5.291-6.004C2.75 3.526 5.361 2 8.033 2c1.234 0 4.129.182 5.217 3.777l-1.02.264c-.842-2.56-2.607-2.968-4.224-2.968-2.675 0-4.187 1.628-4.187 5.093 0 3.107 1.69 4.757 4.222 4.757 2.083 0 3.636-1.082 3.636-2.667 0-1.079-.906-1.595-.953-1.595-.177.925-.651 2.482-2.733 2.482-1.213 0-2.26-.838-2.26-1.936 0-1.568 1.488-2.136 2.663-2.136.44 0 .97.03 1.247.086 0-.478-.404-1.296-1.426-1.296-.911 0-1.16.288-1.45.624l-.024.027c-.202-.135-.875-.601-.875-.601Z"/>
							</svg></a></li>
						<?php }

						if( !empty($google_my_business) ){ ?>
							
							<li><a href="<?= $google_my_business; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="16px" height="16px"><path d="M 9.2832031 4 C 7.488935 4 5.9052102 5.2051958 5.4277344 6.9355469 L 2 19.365234 L 2 19.5 C 2 23.078268 4.9217323 26 8.5 26 C 10.813035 26 12.845511 24.77516 13.998047 22.945312 C 15.146939 24.778014 17.180833 26 19.5 26 C 21.819167 26 23.853061 24.778014 25.001953 22.945312 C 26.154489 24.77516 28.186965 26 30.5 26 C 32.813993 26 34.847721 24.77447 36 22.943359 C 37.152279 24.77447 39.186007 26 41.5 26 C 45.078268 26 48 23.078268 48 19.5 L 48 19.365234 L 44.570312 6.9355469 C 44.092963 5.2056548 42.509782 4 40.714844 4 L 9.2832031 4 z M 9.2832031 6 L 14.851562 6 L 13.197266 18 L 4.4511719 18 L 7.3554688 7.46875 C 7.5959929 6.597101 8.3794712 6 9.2832031 6 z M 26 6 L 33.128906 6 L 34.783203 18 L 26 18 L 26 6 z M 15 18 L 24 18 L 24 19.5 C 24 19.668891 24.012611 19.834272 24.025391 20 L 15 20 L 15 19.5 L 15 18 z M 36.802734 18 L 45.548828 18 L 45.984375 19.580078 C 45.981749 19.724009 45.951091 19.859765 45.935547 20 L 37.050781 20 C 37.032383 19.833631 37 19.67153 37 19.5 L 37 19.431641 L 36.802734 18 z M 4.0644531 20 L 12.949219 20 C 12.699714 22.256206 10.826202 24 8.5 24 C 6.175282 24 4.3143567 22.254621 4.0644531 20 z M 26.099609 20 L 34.900391 20 C 34.642986 22.247621 32.820142 24 30.5 24 C 28.179858 24 26.357014 22.247621 26.099609 20 z M 14 25.974609 C 12.517 27.235609 10.599 28 8.5 28 C 6.845 28 5.306 27.519172 4 26.701172 L 4 43 C 4 44.654 5.346 46 7 46 L 43 46 C 44.654 46 46 44.654 46 43 L 46 26.701172 C 44.694 27.519172 43.155 28 41.5 28 C 39.401 28 37.483 27.235609 36 25.974609 C 34.517 27.235609 32.599 28 30.5 28 C 28.401 28 26.483 27.235609 25 25.974609 C 23.517 27.235609 21.599 28 19.5 28 C 17.401 28 15.483 27.235609 14 25.974609 z M 35.5 29 C 37.546 29 39.372453 29.952547 40.564453 31.435547 L 39.132812 32.867188 C 38.314813 31.740187 36.996 31 35.5 31 C 33.019 31 31 33.019 31 35.5 C 31 37.981 33.019 40 35.5 40 C 37.453 40 39.102609 38.742 39.724609 37 L 36 37 L 36 35 L 41.974609 35 C 41.986609 35.166 42 35.331 42 35.5 C 42 39.084 39.084 42 35.5 42 C 31.916 42 29 39.084 29 35.5 C 29 31.916 31.916 29 35.5 29 z"/></svg></a></li>
						<?php } ?>
					</ul>
				</nav>
			</div>
			<div class="col-md-6 col-lg-2">
				<?php if(!empty($column_4_title)): echo '<h5>'.esc_html($column_4_title).'</h5>'; endif;
				if( has_nav_menu('footer-menu') ){
					wp_nav_menu(
						array(
							'container'		  => 'nav',
							'theme_location'  => 'footer-menu',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu'
						)
					);
				} ?>
			</div>
		</div>
	</div>
	<?php if( !empty($disclaimer_text) ){ ?>
		<div class="disclaimer-wrap">
			<div class="container">
				<div class="row">
					<div class="col col-md-12">
						<div class="disclaimer-content">
							<?= $disclaimer_text; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="social-wrap">
		<div class="container">
			<div class="row">
				<div class="col col-md-12">
					<div class="copyright-wrap" style="color:<?php echo get_field('copyright_color', 'options') ? get_field('copyright_color', 'options') : '#fefefe'; ?>;">
						<?= do_shortcode($copyright_information); ?> | <a style="color:<?php echo get_field('copyright_color', 'options') ? get_field('copyright_color', 'options') : '#fefefe'; ?>;" href="https://www.bizinkonline.com"><?php _e('Website By Bizink','capsule-theme');?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page we need this extra closing tag here -->
<script>
	function fetch_blog_posts(category='', pagenumber=1){
		var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
		if( jQuery('.blog-posts-cont').length ){
			if( pagenumber == 1 ){
				jQuery('.blog-posts-cont').html('Loading...');
			} else{
				jQuery('.load-more').text('Loading...');
			}
			jQuery.ajax({
				type : "post",
				url  : ajaxurl,
				data : {action: "fetch_blog_posts", category: category, pagenumber: pagenumber},
				success: function(response) {
					var result = JSON.parse(response);

					if( pagenumber == 1 ){
						
						jQuery('.blog-posts-cont').html(result.content);
					}else{
						jQuery('.load-more').remove();
						jQuery('.blog-posts-cont .row').append(result.content);
					}
					jQuery('.blog-posts-cont').append(result.load_more);
				}
			}); 
		}
	}

	fetch_blog_posts(); 
	jQuery(document).on('click', '.filter-wrap li', function(e){
		e.preventDefault();
		jQuery('.filter-wrap li.active').removeClass('active');
		jQuery(this).addClass('active');
		fetch_blog_posts(jQuery(this).attr('data-cat'));
	});

	jQuery(document).on('click', '.load-more', function(e){
		e.preventDefault();
		fetch_blog_posts(jQuery('.filter-wrap li.active').attr('data-cat'), jQuery(this).attr('data-pagenumber'));
	});
</script>
<?php 
echo get_field('custom_embed_code_-_footer', 'options');
wp_footer();
?>
</body>
</html>