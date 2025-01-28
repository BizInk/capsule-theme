<?php
$general_settings = get_sub_field('general_settings');
$general_class = '';

if (in_array('Add Common Padding', $general_settings)) {

	$general_class .= ' comman-padding';
}

if (in_array('Add Common Margin', $general_settings)) {

	$general_class .= ' comman-margin';
}

if (have_rows('column_section')):

	while (have_rows('column_section')):
		the_row();

		$gravity_forms_show = get_sub_field('gravity_forms_show');
		$gravity_forms = get_sub_field('gravity_forms');

		$column_small_title = get_sub_field('column_small_title');
		$column_hero_title = get_sub_field('column_hero_title');
		$column_hero_description = get_sub_field('column_hero_description');
		$column_hero_image = get_sub_field('column_hero_image');
		$column_hero_button = get_sub_field('column_hero_button');

		if (!empty($gravity_forms) && !empty($column_small_title) && !empty($column_hero_title) && !empty($column_hero_description)):
?>
			<section class="two-col-section<?= $general_class; ?>">
				<div class="container">
					<?php $column_image_position = '';

					if (get_sub_field('column_image_position') == 'right') {

						$column_image_position = 'flex-md-row';
					} else if (get_sub_field('column_image_position') == 'left') {

						$column_image_position = 'flex-md-row-reverse';
					} ?>

					<div class="row align-item-center <?php echo $column_image_position; ?> flex-column-reverse">
						<div class="col col-md-6 col-left mb-5 mb-md-0">
							<div class="col-content default-content">

								<?php if (!empty($column_small_title)) { ?>
									<h6><?php echo $column_small_title; ?></h6>
								<?php }
								if (!empty($column_hero_title)) { ?>
									<h2><?php echo do_shortcode($column_hero_title); ?></h2>
								<?php }

								if (!empty($column_hero_description)) {
									echo $column_hero_description;
								}

								if (!empty($gravity_forms) && !empty($gravity_forms_show)) {
									echo do_shortcode('[gravityform id="' . $gravity_forms . '" title="false"]');
								}

								if (!empty($column_hero_button['url']) && !empty($column_hero_button['title'])) { ?>
									<a href="<?= $column_hero_button['url']; ?>" class="btn" target="<?= $column_hero_button['target']; ?>"><?= $column_hero_button['title']; ?></a>
								<?php } ?>

							</div>
						</div>
						<div class="col col-md-6 col-right mb-5 mb-md-0">
							<?php

							if (!empty($column_hero_image)) { ?>

								<img src="<?php echo esc_url($column_hero_image['url']); ?>" class="img-fluid" alt="<?php echo $column_hero_image['alt'] ? esc_attr($column_hero_image['alt']) : get_sub_field('column_hero_title'); ?>">
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
<?php endif;
	endwhile;
endif; ?>