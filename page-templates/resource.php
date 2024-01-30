<?php

/**
 * Template Name: Resource
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

get_template_part('global-templates/inner-banner');

$content_topics_small_title = get_field('content_topics_small_title');
$content_topics_title = get_field('content_topics_title');
$content_topics_content = get_field('content_topics_content');
$content_topics_align = get_field('content_topics_align');
$content_types_small_title = get_field('content_types_small_title');
$content_types_title = get_field('content_types_title');
$content_types_content = get_field('content_types_content');

$content_topics = get_terms(array(
    'taxonomy' => 'content-topic',
    'hide_empty' => false,
));

if( !empty($content_topics) ){ ?>

    <section class="infobox-section resource-infobox services-infobox">
        <div class="full-width-wysiwyg text-center">
            <div class="container">
                <div class="editor-design">
                    
                    <?php if( !empty($content_topics_small_title) ){ ?>
                        
                        <h6><?php echo $content_topics_small_title; ?></h6>
                    <?php }
                    
                    if( !empty($content_topics_title) ){ ?>
                        
                        <h2><?php echo $content_topics_title; ?></h2>
                    <?php }

                    echo $content_topics_content; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="infobox-warp">
                <div class="row gy-5 g-md-5">

                    <?php
                    foreach( $content_topics as $content_topic ){

                        $icon = get_field('content_topic_icon', $content_topic); ?>

                        <a href="<?php echo get_term_link($content_topic); ?>" class="col-md-6 col-lg-4 col-xl-3 text-decoration-none<?php echo $content_topics_align ? ' text-center' : null; ?>">
                            <div class="info-box h-100">
                                
                                <?php if( !empty($icon) ){ ?>
                                    
                                    <img src="<?php echo $icon; ?>" class="img-fluid" alt="">
                                <?php } ?>
                                <h5><?php echo $content_topic->name; ?></h5>

                                <?php if( !empty($content_topic->description) ){ ?>

                                    <div class="info-description">
                                        <p><?php echo do_shortcode($content_topic->description); ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </a>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </section>
<?php }

$content_types = get_terms(array(
    'taxonomy' => 'content-type',
    'hide_empty' => false,
));

if( !empty($content_types) ){ ?>

    <section class="infobox-section resource-infobox checklist-infobox">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 1226" class="shape-light-grey">
                <g id="Mask_Group_2" data-name="Mask Group 2" transform="translate(0 -4941)" clip-path="url(#clip-path)">
                    <path id="Path_150" data-name="Path 150" d="M0,39.554S564.9-44.391,1127.7-44.391,2251.2,39.554,2251.2,39.554s375.088,1090.965,20.686,1386.133-826.348,31.227-1326.069,123.258S0,1425.688,0,1425.688Z" transform="translate(-252 4985.235)" fill="#f9f9f9"></path>
                </g>
            </svg>
            <div class="shape-color" style="background-color: #f9f9f9;"></div>
        <div class="full-width-wysiwyg text-center">
            <div class="container">
                <div class="editor-design">
                    
                    <?php if( !empty($content_types_small_title) ){ ?>
                        
                        <h6><?php echo $content_types_small_title; ?></h6>
                    <?php }

                    if( !empty($content_types_title) ){ ?>
                        
                        <h2><?php echo $content_types_title; ?></h2>
                    <?php }

                    echo $content_types_content; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="infobox-warp">
                <div class="row gy-5 g-md-5">

                    <?php
                    foreach( $content_types as $content_type ){ ?>

                        <div class="col-md-6 col-lg-4">
                            <div class="info-box text-center h-100">                        
                                <h4><?php echo $content_type->name; ?></h4>
                                <div class="info-description">

                                    <?php if( !empty($content_type->description) ){ ?>

                                        <p><?php echo do_shortcode($content_type->description); ?></p>
                                    <?php } ?>
                                </div>
                                <a href="<?php echo get_term_link($content_type); ?>" class="btn">View More</a>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </section>

<?php
}

get_footer(); ?>