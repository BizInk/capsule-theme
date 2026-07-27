<?php 
$four_col_vid_title_color = get_sub_field('four_col_vid_title_color');
$four_col_vid_desc_color = get_sub_field('four_col_vid_desc_color');
$four_col_vid_title = get_sub_field('four_col_vid_title');
$four_col_vid_desc = get_sub_field('four_col_vid_desc');
$four_col_vid_button = get_sub_field('four_col_vid_button');
$four_col_vid_video_button = get_sub_field('four_col_vid_video_button');
$four_col_vid_bg = get_sub_field('four_col_vid_bg');
?>
<section class="video-banner-section comman-margin">
	<div class="full-width-wysiwyg text-center mb-0 py-5" style="background-image:url(<?php echo $four_col_vid_bg; ?>);">
		<div class="container">
			<div class="editor-design"<?= !empty($four_col_vid_desc_color) ? ' style="color: '. $four_col_vid_desc_color . '"' : null; ?>>
				<?php if( !empty($four_col_vid_title) ){ ?>

					<h1<?= !empty($four_col_vid_title_color) ? ' style="color: '. $four_col_vid_title_color . '"' : null; ?>><?= $four_col_vid_title; ?></h1>
				<?php }

				echo $four_col_vid_desc; ?>
			</div>
		</div>
	</div>

	<div class="container">	
		<div class="btn-groups">
			<?php if( !empty($four_col_vid_button['url']) && !empty($four_col_vid_button['title']) ){ ?>
			
				<a href="<?= $four_col_vid_button['url']; ?>" class="btn" target="<?= $four_col_vid_button['target']; ?>"><?= $four_col_vid_button['title']; ?></a>
			<?php }

			if( !empty($four_col_vid_video_button['url']) && !empty($four_col_vid_video_button['title']) ){ ?>

				<div class="play-video">
					<a href="#" data-bs-toggle="modal" data-bs-target="#videoModal"><span><i class="fa fa-play" aria-hidden="true"></i></span> <h5><?= $four_col_vid_video_button['title']; ?></h5></a>		
				</div>
			<?php } ?>
		</div>

		<?php 
		$vid_images = get_sub_field('four_col_vid_images') ?: [];
		$columns = count( $vid_images );
		$column_class = ' video-common-col';
		
		if( $columns == 3 ){
			$column_class = ' video-three-col';
		}
		else if( $columns == 4 ){
			$column_class = ' video-four-col';
		}

		if( have_rows('four_col_vid_images') ){ ?>

			<div class="row g-5<?= $column_class;; ?>">
				<?php while( have_rows('four_col_vid_images') ){
					the_row();

					$four_col_vid_image = get_sub_field('four_col_vid_image');
					$four_col_vid_image_title = get_sub_field('four_col_vid_image_title');
					$four_col_vid_link = get_sub_field('four_col_vid_link');

					if( !empty($four_col_vid_image['url']) ){ ?>

						<div class="col-12 col-md-6 col-lg-3">
							<div class="video-img-wrap">	
								<?= !empty($four_col_vid_link) ? '<a href="'. $four_col_vid_link .'">' : null; ?>
									
									<img src="<?php echo $four_col_vid_image['url']; ?>" alt="<?php echo $four_col_vid_image['alt'] ? esc_attr($four_col_vid_image['alt']):$four_col_vid_image_title; ?>">
																		
								<?= !empty($four_col_vid_link) ? '</a>' : null; ?>
							</div>
							<?php if( !empty($four_col_vid_image_title) ){ ?>

								<h4 class="text-center mt-5"><?= $four_col_vid_image_title; ?></h4>
							<?php } ?>
						</div>
					<?php }
				} ?>
			</div>
		<?php } ?>
	</div>
</section>

<?php if( !empty($four_col_vid_video_button['url']) && !empty($four_col_vid_video_button['title']) ){
	
	$youtube_url = $four_col_vid_video_button['url'];
	$youtube_url = explode('?v=', $four_col_vid_video_button['url']);
	$youtube_url = isset($youtube_url[1]) && !empty($youtube_url[1]) ? $youtube_url[1] : '';

	if( !empty($youtube_url) ){ ?>

		<!-- Video Modal Start -->
		<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-xl modal-dialog-centered">
		    <div class="modal-content">
		      <div class="modal-body p-0">
			  	<button type="button" class="btn-close btn-close-white position-absolute" data-bs-dismiss="modal" aria-label="Close"></button>
			  	<div class="ratio ratio-16x9">
				  <iframe width="1280" height="720" src="https://www.youtube.com/embed/<?= $youtube_url; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Video Modal End -->
	<?php }
} ?>