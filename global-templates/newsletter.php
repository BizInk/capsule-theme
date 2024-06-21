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
                        <?php 
                        if( !empty($newsletter_title) ){

                            ?><h2><?php echo $newsletter_title; ?></h2><?php

                        }
                        echo $newsletter_content; ?>
                    </div>
                </div>
            </div>
            <div class="col col-md-9 col-lg-6">
                <?php 
				if(!empty($gravity_forms) && function_exists('gravity_form')):
                    if(gettype($gravity_forms) != 'array'){
                        $gravity_forms = array('id' => $gravity_forms);
                    }
                    echo '<!-- Gravity Form ID: '.$gravity_forms.'-->';
                    gravity_form_enqueue_scripts($gravity_forms['id'], true);
                    gravity_form( $gravity_forms['id'], false, false, false, '', true, 12 );
				endif;
				?>
			</div>
		</div>
    </div>
</section>