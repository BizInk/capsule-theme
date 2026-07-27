<?php 
$newsletter_title = get_sub_field('newsletter_title');
$newsletter_content = get_sub_field('newsletter_content');
$gravity_forms = get_sub_field('gravity_forms');
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
            <div class="col-md-9 col-lg-6">
                <?= do_shortcode('[gravityform id="'. $gravity_forms .'" title="false"]'); ?>
            </div>
        </div>
        
    </div>
</section>