
<?php
if(function_exists('get_field')){
    $enable_search = get_field('enable_search','option') ? get_field('enable_search','option') : false;
    if($enable_search){
        ?>
        <div class="container search-selection pt-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-4">
                    <h4><?php _e('Search','tab-theme'); ?></h4>
                    <?php get_search_form(array('echo' => true));?>
                </div>
            </div>
            
        </div>
        <?php
    }
}
?>