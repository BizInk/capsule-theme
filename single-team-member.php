<?php
defined('ABSPATH') || exit;
get_header();
get_template_part('global-templates/inner-banner');

$member_image = get_field('member_image');
$member_image = !empty($member_image) ? $member_image : get_stylesheet_directory_uri() . '/images/testimonial-default.jpg';
$member_about_me_title = get_field('member_about_me_title');
$member_full_profile = get_field('member_full_profile'); 
$member_my_story_title = get_field('member_my_story_title');
$member_my_story = get_field('member_my_story'); 
$member_contact_text = get_field('member_contact_text'); 
$member_phone = get_field('member_phone'); 
$member_email = get_field('member_email'); 
$member_address = get_field('member_address'); 
$member_facebook = get_field('member_facebook'); 
$member_twitter = get_field('member_twitter'); 
$member_linkedin = get_field('member_linkedin');

$gravity_forms = get_field('gravity_forms', 'option'); 
?>

<section class="member-details-section comman-margin">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-12 col-md-5">
                <div class="member-img">
                    <img src="<?php echo $member_image; ?>" class="img-fluid" alt="<?php echo $member_about_me_title ? esc_html($member_about_me_title) : esc_html($member_about_me_title); ?>">
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="editor-design">
                    <div class="d-flex justify-content-between mb-4">
                        <?php if( !empty($member_about_me_title) ){ ?>

                            <h3><?php echo esc_html($member_about_me_title); ?></h3>
                        <?php } ?>
                        
                        <ul class="social-icons">
                            
                            <?php if( !empty($member_facebook) ){ ?>

                                <li><a href="<?php echo esc_url($member_facebook); ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <?php }

                            if( !empty($member_twitter) ){ ?>

                                <li><a href="<?php echo esc_url($member_twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <?php }

                            if( !empty($member_linkedin) ){ ?>

                                <li><a href="<?php echo esc_url($member_linkedin); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php echo $member_full_profile; ?>                    
                </div>

                <?php if( !empty($member_phone) || !empty($member_email) ){ ?>

                    <div class="address-wrpal">
                        <ul>
                            <?php if( !empty($member_phone) ){ ?>

                                <li><a href="tel:<?php echo $member_phone; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo __('Tel:','capsule-theme').''.$member_phone; ?></a></li>
                            <?php }
                            if( !empty($member_email) ){ ?>

                                <li><a href="mailto:<?php echo $member_email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo __('Email:','capsule-theme').''.$member_email; ?></a></li>
                            <?php }
                            if( !empty($member_address) ){ ?>

                                <li><a href="https://maps.google.com?q=<?php echo urlencode($member_address); ?>" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo __('Address:','capsule-theme') .' '. do_shortcode($member_address); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>

            <?php if( !empty($member_my_story) ){ ?>

                <div class="col-md-12">
                    <div class="editor-design">
                        <?php if( !empty($member_my_story_title) ){ ?>
                            <h3><?php echo esc_html($member_my_story_title); ?></h3>
                        <?php }
                        
                        echo $member_my_story; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>