<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

$error_button = get_sub_field('error_button');

get_template_part( 'global-templates/inner-banner'); 
?>

<div class="wrapper" id="error-404-wrapper">
    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">
        <div class="row">
            <div class="col-md-12 content-area" id="primary">
                <main class="site-main" id="main">
                    <section class="page-not-found text-center">
                        <div class="container">

                            <?php
                            if(function_exists('get_field')):
                            
                            if(get_field('404_title','option')) { 
                                echo '<h1>'.get_field('404_title','option').'</h1>';
                            }

                            if(get_field('404_sub_title','option')) { 
                                echo '<h2>'.get_field('404_sub_title','option').'</h2>';
                            }

                            if(get_field('404_description','option')) { 
                                echo '<p>'.get_field('404_description','option').'</p>';
                            }

                            $error_button = get_field('error_button','option') ?? false;

                            if(!empty($error_button) && !empty($error_button['title']) && !empty($error_button['url'])) { ?>
                                <a href="<?php echo $error_button['url']; ?>" class="btn btn-outline-primary mt-4"><?php echo $error_button['title']; ?></a>
                            <?php }
                            
                            endif;
                            ?>

                        </div>
                    </section>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .row -->
    </div><!-- #content -->
</div><!-- #error-404-wrapper -->

<?php
get_footer();
