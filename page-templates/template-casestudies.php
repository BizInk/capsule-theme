<?php
/**
* Template Name: Case Studies
*
* Template to display listing of team members page
*
* @package Understrap
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
get_template_part('global-templates/inner-banner');

$case_study_latest_title = get_field('case_study_latest_title');
$case_study_more_small_title = get_field('case_study_more_small_title');
$case_study_more_title = get_field('case_study_more_title');
$case_study_more_desc = get_field('case_study_more_desc');
$case_study_more_ppp = get_field('case_study_more_ppp');

$latest_ppp = 4;
$latest_case_args = array(
    'post_type'  => 'case-study',
    'posts_per_page' => $latest_ppp,
);
$latest_case_studies = get_posts( $latest_case_args );

if( !empty($latest_case_studies) ){ ?>

    <section class="case-studies-two-col-section">
        <div class="container">
            <div class="row g-5">
                <?php if( isset($latest_case_studies[0]) ){

                    $content_zero = wp_trim_words($latest_case_studies[0]->post_content, 80, '');
                    $case_study_author_image = get_field('case_study_author_image', $latest_case_studies[0]);
                    $case_study_author_name = get_field('case_study_author_name', $latest_case_studies[0]);
                    $case_study_author_position = get_field('case_study_author_position', $latest_case_studies[0]);
                    ?>

                    <div class="col-md-12 col-lg-7">
                        <div class="case-study-card">
                            <?php if( has_post_thumbnail($latest_case_studies[0]) ){ ?>

                                <div class="case-studies-img-wrap">
                                    <img src="<?php echo get_the_post_thumbnail_url($latest_case_studies[0]); ?>" class="img-fluid" alt="<?php echo $latest_case_studies[0]->post_title; ?>">
                                </div>
                            <?php } ?>

                            <div class="case-study-details">
                                <h3><?php echo $latest_case_studies[0]->post_title; ?></h3>
                                <?php if( !empty($content_zero) ){ ?>

                                    <p><?php echo $content_zero; ?></p>
                                <?php }

                                if( !empty($case_study_author_image) || !empty($case_study_author_name) || !empty($case_study_author_position) ){ ?>

                                    <div class="client-details">
                                        <?php if( !empty($case_study_author_image['url']) ){ ?>

                                            <div class="icon-wrap">
                                                <img src="<?php echo $case_study_author_image['url']; ?>" alt="<?php echo $case_study_author_image['alt']; ?>" title="<?php echo $case_study_author_image['title']; ?>">
                                            </div>
                                        <?php }
                                        if( !empty($case_study_author_name) || !empty($case_study_author_position) ){ ?>

                                            <div class="client-content">
                                                <?php if( !empty($case_study_author_name) ){ ?>
                                                    
                                                    <h5><?php echo $case_study_author_name; ?></h5>
                                                <?php }
                                                if( !empty($case_study_author_position) ){ ?>
                                                    
                                                    <span><?php echo $case_study_author_position; ?></span>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php }

                array_shift($latest_case_studies);

                if( !empty($latest_case_studies) ){ ?>

                    <div class="col-md-12 col-lg-5">
                        <div class="case-study-sidebar">
                            <h3><?php echo $case_study_latest_title; ?></h3>
                            <?php foreach( $latest_case_studies as $latest_case_study ){

                                $case_study_author_image = get_field('case_study_author_image', $latest_case_study);
                                $case_study_author_name = get_field('case_study_author_name', $latest_case_study);
                                $case_study_author_position = get_field('case_study_author_position', $latest_case_study); ?>

                                <div class="row mb-5">
                                    <?php if( has_post_thumbnail($latest_case_study) ){ ?>

                                        <div class="col-md-5 case-study-sidebar-img">
                                            <img src="<?php echo get_the_post_thumbnail_url($latest_case_study); ?>" class="img-fluid" alt="<?php echo $latest_case_study->post_title; ?>">
                                        </div>
                                    <?php } ?>

                                    <div class="col-md-7 case-study-sidebar-details">
                                        <h4><?php echo $latest_case_study->post_title; ?></h4>
                                        <?php 
                                        if( !empty($case_study_author_image) || !empty($case_study_author_name) || !empty($case_study_author_position) ){ ?>

                                            <div class="client-details">
                                                <?php if( !empty($case_study_author_image['url']) ){ ?>

                                                    <div class="icon-wrap">
                                                        <img src="<?php echo $case_study_author_image['url']; ?>" alt="<?php echo $case_study_author_image['alt']; ?>" title="<?php echo $case_study_author_image['title']; ?>">
                                                    </div>
                                                <?php }
                                                if( !empty($case_study_author_name) || !empty($case_study_author_position) ){ ?>

                                                    <div class="client-content">
                                                        <?php if( !empty($case_study_author_name) ){ ?>
                                                            
                                                            <h5><?php echo $case_study_author_name; ?></h5>
                                                        <?php }
                                                        if( !empty($case_study_author_position) ){ ?>
                                                            
                                                            <span><?php echo $case_study_author_position; ?></span>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }

$total_case_studies = $count_posts = wp_count_posts('case-study')->publish;
$other_case_args = array(
    'post_type'  => 'case-study',
    'posts_per_page' => ($total_case_studies-$latest_ppp),
    'offset' => $latest_ppp,
);
$other_case_studies = get_posts( $other_case_args );

if( !empty($other_case_studies) ){ ?>

    <section class="case-study-card-section comman-margin">
        <?php if( !empty($case_study_more_small_title) || !empty($case_study_more_title) || !empty($case_study_more_desc) ){ ?>

            <div class="full-width-wysiwyg text-center">
                <div class="container">
                    <div class="editor-design">
                        <?php if( !empty($case_study_more_small_title) ){ ?>
                            
                            <h6><?php echo $case_study_more_small_title; ?></h6>
                        <?php }
                        if( !empty($case_study_more_title) ){ ?>
                            
                            <h2><?php echo $case_study_more_title; ?></h2>
                        <?php }
                        echo $case_study_more_desc; ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="container">
            <div class="row g-lg-5">
            <?php $counter = 1;
            foreach( $other_case_studies as $other_case_study ){

                $content_other = wp_trim_words($other_case_study->post_content, 20, '');
                $case_study_author_image = get_field('case_study_author_image', $other_case_study);
                $case_study_author_name = get_field('case_study_author_name', $other_case_study);
                $case_study_author_position = get_field('case_study_author_position', $other_case_study); ?>

                <div class="col-md-6 col-xl-4 team-member <?php echo $counter; ?>" <?php echo $counter > $case_study_more_ppp ? 'style="display:none;"' : ''; ?> data-pagenumber="casestudy<?php echo ceil($counter/$case_study_more_ppp); ?>">
                    <div class="team-member-wrap">
                        <?php if( has_post_thumbnail($other_case_study) ){ ?>
                            
                            <a href="<?php echo get_permalink($other_case_study); ?>" class="member-img">
                                <img src="<?php echo get_the_post_thumbnail_url($other_case_study); ?>" alt="<?php echo $other_case_study->post_title; ?>">
                            </a>
                        <?php } ?>

                        <div class="member-details">
                            <a href="<?php echo get_permalink($other_case_study); ?>" class="member-name">
                                <h4><?php echo $other_case_study->post_title; ?></h4>
                            </a>

                            <p><?php echo $content_other; ?></p>
                            <?php 
                            if( !empty($case_study_author_image) || !empty($case_study_author_name) || !empty($case_study_author_position) ){ ?>

                                <div class="client-details">
                                    <?php if( !empty($case_study_author_image['url']) ){ ?>

                                        <div class="icon-wrap">
                                            <img src="<?php echo $case_study_author_image['url']; ?>" alt="<?php echo $case_study_author_image['alt']; ?>" title="<?php echo $case_study_author_image['title']; ?>">
                                        </div>
                                    <?php }
                                    if( !empty($case_study_author_name) || !empty($case_study_author_position) ){ ?>

                                        <div class="client-content">
                                            <?php if( !empty($case_study_author_name) ){ ?>
                                                
                                                <h5><?php echo $case_study_author_name; ?></h5>
                                            <?php }
                                            if( !empty($case_study_author_position) ){ ?>
                                                
                                                <span><?php echo $case_study_author_position; ?></span>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php $counter++;
            } ?>
            </div>

            <?php if( count($other_case_studies) > $case_study_more_ppp ){ ?>

                <div class="d-flex justify-content-center">
                    <a href="javascript:void(0);" class="btn blue-btn load-more" data-pagenumber="1">Load More</a>
                </div>
            <?php } ?>
        </div>
    </section>

    <script>
        // Script to load more casestudy
        jQuery(document).on('click', '.load-more', function(e){
            e.preventDefault();
            var pagenumber = parseInt(jQuery(this).attr('data-pagenumber'));
            pagenumber = parseInt(pagenumber+1);
            jQuery('[data-pagenumber="casestudy'+ pagenumber +'"]').show();
            jQuery(this).attr('data-pagenumber', pagenumber);
            pagenumber = parseInt(pagenumber+1);
            
            if( jQuery('[data-pagenumber="casestudy'+ pagenumber +'"]').length == 0 ){
                jQuery(this).remove();
            }
        });
    </script>
<?php }
get_footer(); ?>