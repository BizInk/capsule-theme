<!-- logo-section-start -->
<?php
$general_settings = get_sub_field('general_settings'); 
$logo_style = get_sub_field('logo_style'); 
$logo_layout = get_sub_field('logo_layout'); 
$general_class = '';

if( in_array('Add Common Padding', $general_settings) ){
  $general_class .= ' comman-padding';
}

if( in_array('Add Common Margin', $general_settings) ){
  $general_class .= ' comman-margin';
}

$logo_title = get_sub_field('logo_title');

if( have_rows('logo') ): ?>

    <section class="logo-section text-center<?php echo $general_class; ?>">
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
                    <?php while( have_rows('logo') ):
                        the_row();

                        $slider_image = get_sub_field('slider_image');
                        $logo_url = get_sub_field('add_logo_url');

                        if( !empty($slider_image) ){ ?>

                            <div class="logo">
                                <?php if( !empty($logo_url) ){ ?>
                                    
                                    <a href="<?php echo $logo_url ?>">
                                <?php } ?>
                                    
                                    <img src="<?php echo esc_url($slider_image['url']); ?>" class="img-fluid" alt="<?php echo $slider_image['alt'] ? esc_attr($slider_image['alt']):'slider-img'; ?>">

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
                    <?php while( have_rows('logo') ):
                        the_row();

                        $slider_image = get_sub_field('slider_image');
                        $logo_url = get_sub_field('add_logo_url');

                        if( !empty($slider_image) ){ ?>

                            <div class="<?php echo $logo_layout; ?> logo">
                                <?php if( !empty($logo_url) ){ ?>

                                    <a href="<?php echo $logo_url ?>" target="_blank">
                                <?php } ?>

                                    <img src="<?php echo esc_url($slider_image['url']); ?>" class="img-fluid" alt="<?php echo $slider_image['alt'] ? esc_attr($slider_image['alt']):'slider-img'; ?>">

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