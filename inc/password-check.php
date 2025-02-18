<?php
if (post_password_required($post)) {
    ?>
    <section class="full-width-section comman-margin">
        <div class="full-width-wysiwyg comman-padding">
            <div class="container">
                <div class="row editor-design text-center">
                    <?php echo get_the_password_form(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    get_footer();
    die();
}
?>