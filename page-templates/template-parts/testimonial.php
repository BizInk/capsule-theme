<?php
$general_settings = get_sub_field('general_settings');
$tesimonials_post_obj = get_sub_field('tesimonials_post_obj');
$general_class = '';

if( in_array('Add Common Padding', $general_settings) ){

	$general_class .= ' comman-padding';
}

if( in_array('Add Common Margin', $general_settings) ){

	$general_class .= ' comman-margin';
}

$testimonial_section_small_title = get_sub_field('testimonial_section_small_title');
$testimonial_section_title = get_sub_field('testimonial_section_title');
$testimonial_section_content = get_sub_field('testimonial_section_content');

$disable_testimonial_stars = get_field('disable_testimonial_stars', 'option') ?: false;
$disable_testimonial_links = get_field('disable_testimonial_links', 'option') ?: false;

if ( !empty($tesimonials_post_obj) ) { ?>

	<section class="testimonial-list<?= $general_class; ?>">
		<div class="full-width-wysiwyg text-center">
			<div class="container">
				<div class="editor-design">

					<?php if( !empty($testimonial_section_small_title) ){ ?>
						
						<h6><?= $testimonial_section_small_title; ?></h6>
					<?php }

					if( !empty($testimonial_section_title) ){ ?>

						<h2><?= $testimonial_section_title; ?></h2>
					<?php }

					echo $testimonial_section_content; ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row g-md-5">
				<?php foreach( $tesimonials_post_obj as $tesimonial ){

			        $reviewer_image = get_field('reviewer_image', $tesimonial);
					$reviewer_name = get_field('reviewer_name', $tesimonial);
					$reviewer_designation = get_field('reviewer_designation', $tesimonial);
					$review_content = get_field('review_content', $tesimonial);
					$rating_count = get_field('rating_count', $tesimonial); ?>
			        
			        <div class="col-12 col-md-6 col-lg-4 our-word">
						<?php 
						if(!$disable_testimonial_links):
							?><a href="<?php echo get_permalink($tesimonial);?>" class="card-wrap text-decoration-none d-block"><?php
						else:
							?><div class="card-wrap text-decoration-none d-block"><?php
						endif;
						if(!$disable_testimonial_stars): ?>
							<div class="star-wrap">
								<?php luca_star_rating($rating_count); ?>
							</div>
						<?php 
						endif;

							if( !empty($review_content) ){ ?>

								<div class="client-word-wrap"> <p><?= $review_content; ?></p></div>
							<?php } ?>

							<div class="client-details">
								<div class="icon-wrap">
									<img src="<?php echo $reviewer_image; ?>" alt="">
								</div>
								<div class="client-content">
									<?php if( !empty($reviewer_name) ){ ?>

										<h5><?= $reviewer_name; ?></h5>
									<?php }

									if( !empty($reviewer_designation) ){ ?>

										<span><?= $reviewer_designation; ?></span>
									<?php } ?>
								</div>
							</div>
						<?php
						if(!$disable_testimonial_links):
							?></a><?php
						else:
							?></div><?php
						endif;
						?>
					</div>
			    <?php } ?>			
			</div>
		</div>
	</section>
<?php } ?>