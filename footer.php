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
                <div class="row g-5 grid-section">
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
$newsletter_title = get_field('newsletter_title', 'options');
$newsletter_content = get_field('newsletter_content', 'options');
$gravity_forms = get_field('gravity_forms', 'options');
?>
<section class="newsletter-section">
    <div class="container">
        <div class="row flex-column text-center">
            <div class="col-md-9">
                <div class="full-width-wysiwyg text-left">
                    <div class="editor-design">
                        <?php if( !empty($newsletter_title) ){ ?>
                            <h2><?= $newsletter_title; ?></h2>
                        <?php }
                        echo $newsletter_content; ?>
                    </div>
                </div>
            </div>
            <div class="col col-md-9 col-lg-6">
                <?php echo !empty($gravity_forms) ? do_shortcode('[gravityform id="'. $gravity_forms .'" title="false"]') : ''; ?>
            </div>
        </div>
        
    </div>
</section>

<footer>
	<div class="container">
		<div class="row footer-wrap">
			<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
				<?php if(!empty($column_1_title)): echo '<h5>'.esc_html($column_1_title).'</h5>'; endif; ?>
				<div class="footer-logo">
					<a href="<?= site_url(); ?>"><img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>"></a>
				</div>				
				<div class="footer-content">
					<?= $footer_text; ?>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
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
				<nav class="social-nav">
					<ul>
						<?php if( !empty($facebook) ){ ?>
							<li><a href="<?= esc_url($facebook); ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
						<?php }
						if( !empty($twitter) ){ ?>
							<li><a href="<?= esc_url($twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<?php }
						if( !empty($linkedin) ){ ?>
							<li><a href="<?= esc_url($linkedin); ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
						<?php }
						if (!empty($instagram)) { ?>
							<li><a href="<?= esc_url($instagram); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<?php }
						if (!empty($youtube)) { ?>
							<li><a href="<?= esc_url($youtube); ?>" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
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