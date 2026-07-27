<!-- logo-section-start logo content -->
<?php
$general_settings = get_sub_field('general_settings'); 
$general_class = '';

if( in_array('Add Common Padding', $general_settings) ){
  
  $general_class .= ' comman-padding';
}

if( in_array('Add Common Margin', $general_settings) ){
  
  $general_class .= ' comman-margin';
}

$logo_title = get_sub_field('logo_title');
$logo_description = get_sub_field('content');
$logo_layout = get_sub_field('layout') ?? 'left';

if( have_rows('logo') ): ?>

    <section class="logo-section logo-section-content text-center<?= $general_class; ?>">
        <div class="full-width-wysiwyg text-center">
            <div class="container">
                <div class="row gap-4">
                    <div class="col <?php if($logo_layout == 'right'):echo 'order-1';endif;?>">
                        <div class="editor-design">
                            <h2><?php echo $logo_title; ?></h2>
                            <div class="content">
                                <?php echo $logo_description; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col <?php if($logo_layout == 'right'):echo 'order-0';endif;?>">
                        <div class="logo-grid">
                            <?php if( have_rows('logo') ):
                                while( have_rows('logo') ):
                                the_row();
                                    $grid_image = get_sub_field('slider_image');
                                    $logo_url = get_sub_field('add_logo_url');
                                    if( !empty($grid_image) ){ ?>
                                        <div class="logo">
                                            <?php if( !empty($logo_url) ){ ?>
                                                <a href="<?php echo $logo_url; ?>" target="_blank">
                                            <?php } ?>
                                                <img src="<?php echo $grid_image['url']; ?>" class="img-fluid" alt="<?php echo $grid_image['alt']?$grid_image['alt']:$logo_title; ?>">
                                            <?php if( !empty($logo_url) ){ ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php }
                                endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- logo-section-end -->