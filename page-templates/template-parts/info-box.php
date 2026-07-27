<!-- infobox-section-start -->
<?php
$general_settings = get_sub_field('general_settings');
$alignment = get_sub_field_object('alignment');
$column_counts = get_sub_field('column_counts');
$center_info_boxes = get_sub_field('center_info_boxes');
$info_box_small_title = get_sub_field('info_box_small_title');
$info_box_title = get_sub_field('info_box_title');
$info_box_content = get_sub_field('info_box_content');
$general_class = '';
$align_class = '';

if( in_array('Add Common Padding', $general_settings) ){

	$general_class .= ' comman-padding';
}

if( in_array('Add Common Margin', $general_settings) ){

	$general_class .= ' comman-margin';
}

if( $alignment['value'] == "Align left" ){
	$align_class .= 'text-start';
}

if( $alignment['value'] == "Align right"  ){
	$align_class .= 'text-end';
}

if( $alignment['value'] == "Align center" ){
	$align_class .= 'text-center';
}

if( have_rows('information_box') ):
	?>
	<section class="infobox-section<?php echo $general_class; ?>">

		<div class="full-width-wysiwyg text-center">
			<div class="container">
				<div class="editor-design">

					<?php if( !empty($info_box_small_title) ){ ?>

						<h6><?php echo $info_box_small_title; ?></h6>
					<?php }

					if( !empty($info_box_title) ){ ?>
						
						<h2><?php echo $info_box_title; ?></h2>
					<?php }

					echo $info_box_content; ?>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="infobox-warp">
				<div class="row gy-5 g-md-5<?php echo $center_info_boxes ? ' justify-content-center': null; ?>">
					<?php if( have_rows('information_box') ):

						while( have_rows('information_box') ):
							the_row();

							$info_image = get_sub_field('info_image');
							$info_title = get_sub_field('info_title');
							$info_description = get_sub_field('info_description'); 
							$info_button = get_sub_field('info_button');
							?>
							<div class="col-12 col-md-6 col-lg-4 <?php echo $column_counts; ?>">
								<div class="info-box h-100 <?php echo $align_class ?>">

									<?php if( !empty($info_image) ) { ?>

										<img src="<?php echo $info_image; ?>" class="img-fluid" alt="<?php echo $info_title ? $info_title : 'info-img'; ?>">
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