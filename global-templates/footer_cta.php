<?php
$footer_cta_title = get_field('footer_cta_title', 'options');
$footer_cta_content = get_field('footer_cta_content', 'options');
$first_button = get_field('first_button', 'options');
$second_button = get_field('second_button', 'options');
?>
<section class="footer-cta-section">
    <div class="container">
        <div class="row flex-column text-center">
            <div class="col">
                <div class="full-width-wysiwyg text-left">
                    <div class="editor-design">
                        <?php 
                        if( !empty($footer_cta_title) ){
                            echo '<h2>'.$footer_cta_title.'</h2>';
                        }
                        echo $footer_cta_content; ?>
                    </div>
                </div>
            </div>
		</div>
        <div class="row flex-column text-center">
            <div class="col">
                <div class="full-width-wysiwyg text-center">
                    <div class="editor-design">
                        <?php
                            if($first_button){
                                echo '<a class="btn button" target="'.$first_button['target'].'" href="'.$first_button['link'].'">'.$first_button['title'].'</a>';
                            }
                            if($second_button){
                                echo '<a class="btn button" target="'.$second_button['target'].'" href="'.$second_button['link'].'">'.$second_button['title'].'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>