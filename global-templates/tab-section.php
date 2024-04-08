<!-- tab-section-start -->
<?php
//echo "sfdgsdfgsfdg";
//ecit();
//??
?>
<section class="tab-section">
  <div class="container">
    <div class="tab-wrap">
      <div class="row align-item-center flex-md-row flex-column-reverse">
        <div class="col-md-6">
          <div class="container responsive-tabs">
            <?php if( have_rows('tabbing_and_description') ): ?>
            <ul class="nav nav-tabs" role="tablist">
                <?php $i=0; while ( have_rows('tabbing_and_description') ) : the_row(); 
                  $tab_titile = get_sub_field('tab_titile');
                ?>
              <li class="nav-item">
                <a id="tab-<?php echo $i; ?>" href="#pane-<?php echo $i; ?>" class="nav-link <?php if($i=0) { echo "active"; } ?>" data-bs-toggle="tab" role="tab"><?php echo  $tab_titile; ?></a>
              </li>
              <?php $i++; endwhile; ?>
            </ul>
            <div id="content" class="tab-content" role="tablist">
              <?php $i=0; while ( have_rows('tabbing_and_description') ) : the_row(); ?>
              <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                <div class="card-header" role="tab" id="heading-A">
                  <h5 class="mb-0">
                    <a data-bs-toggle="collapse" href="#collapse-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse-A<?php echo $i; ?>">
                      <?php echo $tab_titile; ?>
                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                  </h5>
                </div>
                <div id="collapse-<?php echo $i; ?>" class="collapse show" data-bs-parent="#content" role="tabpanel" aria-labelledby="heading-A<?php echo $i; ?>">
                  <?php $tab_description = get_sub_field('tab_description'); ?>
                  <?php if($tab_description) {  ?>
                    <div class="card-body editor-design">
                      <?php echo $tab_description; ?>
                    </div>
                <?php } ?>
                </div>
              </div>
              <?php $i++; endwhile; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <?php 
          $tab_right_image = get_sub_field('tab_right_image');
        ?>
        <div class="col-md-6 text-end mb-5 mb-md-0">
          <?php if($tab_right_image) { ?>
            <img src="<?php echo $tab_right_image; ?>" class="img-fluid" alt="<?php echo $tab_titile; ?>">
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- tab-section-end -->
