<?php
/**
* Template Name: Career
*
* Template to display listing of team members page
*
* @package Understrap
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
get_template_part('global-templates/inner-banner');

$career_top_section_title = get_field('career_top_section_title');
$career_top_section_subtitle = get_field('career_top_section_subtitle');
$career_top_align = get_field('career_top_align');
$career_top_align_class = ($career_top_align == 'left') ? ' flex-md-row-reverse flex-column-reverse' : null;
$career_top_image = get_field('career_top_image');
$career_top_title = get_field('career_top_title');
$career_top_subtitle = get_field('career_top_subtitle');
$career_top_content = get_field('career_top_content');

if( !empty($career_top_image) && !empty($career_top_title) ){ ?>

    <section class="two-col-section careers-two-col-section comman-padding">
        <div class="container">
            <div class="row align-item-center<?php echo $career_top_align_class; ?>">
                <div class="col-md-6 col-left mb-5 mb-md-0">
                    <div class="col-content default-content">
                        <h6><?php echo $career_top_title; ?></h6>
                        <?php if( !empty($career_top_subtitle) ){ ?>

                            <h2><?php echo $career_top_subtitle; ?></h2>
                        <?php }
                        
                        echo $career_top_content; ?>
                    </div>
                </div>
                <div class="col-md-6 col-right mb-5 mb-md-0">
                    <img src="<?php echo $career_top_image['url']; ?>" class="img-fluid" alt="<?php echo $career_top_image['alt']; ?>" title="<?php echo $career_top_image['title']; ?>">
                </div>
            </div>
        </div>
    </section>
<?php }

$career_info_small_title = get_field('career_info_small_title');
$career_info_title = get_field('career_info_title');
$career_info_desc = get_field('career_info_desc');
if( have_rows('career_info_boxes') ){ ?>

    <section class="careers-info-box-section comman-margin">
        <?php if( !empty($career_info_small_title) || !empty($career_info_title) || !empty($career_info_desc) ){ ?>
        
            <div class="full-width-wysiwyg text-center">
                <div class="container">
                    <div class="editor-design">
                        <?php if( !empty($career_info_small_title) ){ ?>
                        
                            <h6><?php echo $career_info_small_title; ?></h6>
                        <?php }
                        if( !empty($career_info_title) ){ ?>

                            <h2><?php echo $career_info_title; ?></h2>
                        <?php }
                        
                        echo $career_info_desc; ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="container">
            <div class="infobox-warp">
                <div class="row gy-5 g-md-5">
                    <?php while(have_rows('career_info_boxes')){
                        the_row();

                        $career_info_box_icon = get_sub_field('career_info_box_icon');
                        $career_info_box_title = get_sub_field('career_info_box_title');
                        $career_info_box_desc = get_sub_field('career_info_box_desc');

                        if( !empty($career_info_box_icon) || !empty($career_info_box_icon) || !empty($career_info_box_icon) ){ ?>

                            <div class="col-md-6 col-lg-4">
                                <div class="info-box">
                                    <img src="<?php echo $career_info_box_icon['url']; ?>" class="img-fluid" alt="<?php echo $career_info_box_icon['alt']; ?>" title="<?php echo $career_info_box_icon['title']; ?>">
                                    <h5><?php echo $career_info_box_title; ?></h5>
                                </div>
                                <div class="info-description text-center">
                                    <?php echo $career_info_box_desc; ?>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
<?php }

$career_positions_small_title = get_field('career_positions_small_title');
$career_positions_title = get_field('career_positions_title');
$career_positions_desc = get_field('career_positions_desc');
$career_positions_jobs = get_field('career_positions_jobs');

if( !empty($career_positions_jobs) ){ ?>

    <section class="infobox-section careers-open-position-section comman-margin">
        <?php if( !empty($career_positions_small_title) || !empty($career_positions_title) || !empty($career_positions_desc) ){ ?>

            <div class="full-width-wysiwyg text-center">
                <div class="container">
                    <div class="editor-design">
                        <?php if( !empty($career_positions_small_title) ){ ?>

                            <h6><?php echo $career_positions_small_title; ?></h6>
                        <?php }
                        if( !empty($career_positions_title) ){ ?>

                            <h2><?php echo $career_positions_title; ?></h2>
                        <?php }
                        
                        echo $career_positions_desc; ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="container">
            <div class="infobox-warp">
                <div class="row gy-5 g-md-5">
                    <?php foreach( $career_positions_jobs as $career_positions_job ){ ?>

                        <div class="col-md-6 col-lg-4">
                            <div class="info-box h-100 text-center">
                                <h5><?php echo $career_positions_job->post_title; ?></h5>
                                <?php if( !empty($career_positions_job->post_content) ){ ?>

                                    <div class="info-description">
                                        <?php echo $career_positions_job->post_content; ?>
                                    </div>
                                <?php } ?>
                                
                                <a href="<?php echo get_permalink($career_positions_job); ?>" class="btn">Apply Now</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php }

get_footer(); ?>