<?php
$general_settings = get_sub_field('general_settings');
$general_class = '';

if( in_array('Add Common Padding', $general_settings) ){
    $general_class .= ' comman-padding';
}

if( in_array('Add Common Margin', $general_settings) ){
    $general_class .= ' comman-margin';
}

$latest_posts_small_title = get_sub_field('latest_posts_small_title');
$latest_posts_title = get_sub_field('latest_posts_title');
$latest_posts_content = get_sub_field('latest_posts_content');
$latest_posts_button = get_sub_field('latest_posts_button');
$latest_posts_background_color = get_sub_field('latest_posts_background_color');

$latest_posts_args = array(
    'post_type' => 'post',
    'posts_per_page'  => 3,
    'order' => 'DESC',
    'post_status' => 'publish',
);

$latest_posts_query = new WP_Query($latest_posts_args);

if ( $latest_posts_query->have_posts() ) { ?>

    <section class="four-col-team-section<?= $general_class; ?>">

        <div class="full-width-wysiwyg text-center">
            <div class="container">
                <div class="editor-design">

                    <?php if( !empty($latest_posts_small_title) ){ ?>

                        <h6><?= $latest_posts_small_title; ?></h6>
                    <?php }

                    if( !empty($latest_posts_title) ){ ?>

                        <h2><?= $latest_posts_title; ?></h2>
                    <?php }

                    echo $latest_posts_content; ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="team-wrap">
                <div class="row g-lg-5">
                    <?php while ( $latest_posts_query->have_posts() ) {

                        $latest_posts_query->the_post();
                        $excerpt = get_the_excerpt();
                        $latest_posts_image = has_post_thumbnail() ? get_the_post_thumbnail_url() : DEFAULT_IMG; ?>

                        <div class="col-12 col-md-6 col-xl-4 team-member">
                            <div class="team-member-wrap">
                                <a href="<?php the_permalink(); ?>" class="member-img">
                                    <img src="<?= $latest_posts_image; ?>" alt="<?php the_title(); ?>">
                                </a>
                                <div class="member-details">
                                <a href="<?php the_permalink(); ?>">
                                    <h4 class="member-name"><?php the_title(); ?></h4>
                                </a>
                                    <?php if( !empty($excerpt) ){ ?>
                                        
                                        <p><?php echo wp_trim_words($excerpt, 15, ''); ?></p>
                                    <?php } ?>
                                    <a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read More','capsule-theme'); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php }
                    wp_reset_query(); ?>
                </div>
            </div>

            <?php if( !empty($latest_posts_button['url']) && !empty($latest_posts_button['title']) ){ ?>

                <a href="<?= $latest_posts_button['url']; ?>" class="btn" target="<?= $latest_posts_button['target']; ?>"><?= $latest_posts_button['title']; ?></a>
            <?php } ?>
        </div>
    </section>
<?php } ?>