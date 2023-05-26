<!-- infobox-section-start -->
<?php
$general_settings = get_sub_field('general_settings');
$info_box_small_title = get_sub_field('info_box_small_title');
$info_box_title = get_sub_field('info_box_title');
$info_box_content = get_sub_field('info_box_content');
$general_class = '';

if( in_array('Add Common Padding', $general_settings) ){

	$general_class .= ' comman-padding';
}

if( in_array('Add Common Margin', $general_settings) ){

	$general_class .= ' comman-margin';
}

if( have_rows('information_box') ):
	?>
	<section class="infobox-section<?= $general_class; ?>">

		<div class="full-width-wysiwyg text-center">
			<div class="container">
				<div class="editor-design">

					<?php if( !empty($info_box_small_title) ){ ?>

						<h6><?= $info_box_small_title; ?></h6>
					<?php }

					if( !empty($info_box_title) ){ ?>
						
						<h2><?= $info_box_title; ?></h2>
					<?php }

					echo $info_box_content; ?>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="infobox-warp">
				<div class="row gy-5 g-md-5">
					<?php if( have_rows('information_box') ):

						while( have_rows('information_box') ):
							the_row();

							$info_image = get_sub_field('info_image');
							$info_title = get_sub_field('info_title');
							$info_description = get_sub_field('info_description');
							$info_button = get_sub_field('info_button');
							?>
							<div class="col-md-6 col-lg-4 col-xl-3">
								<div class="info-box  h-100">

									<?php if( !empty($info_image) ) { ?>

										<img src="<?php echo $info_image; ?>" class="img-fluid" alt="">
									<?php }

									if( !empty($info_title) ) { ?>

										<h5><?php echo $info_title; ?></h5>
									<?php }

									if( !empty($info_description) ) { ?>

										<div class="info-description"><?php echo $info_description; ?></div>
									<?php }

									if( !empty($info_button['url']) && !empty($info_button['title']) ) { ?>

										<a href="<?php echo $info_button['url']; ?>" class="btn btn-sm navyblue-btn mt-2"><?php echo $info_button['title']; ?></a>
									<?php } ?>
								</div>
							</div>
						<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- infobox-section-end -->