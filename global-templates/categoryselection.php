<?php
$terms = get_terms( array(
    'taxonomy' => 'category',
    'hide_empty' => true,
    'orderby' => 'name',
	'order' => 'ASC',
));

if ( !empty($terms) ) :
    ?>
    <div class="container category-selection d-flex justify-content-center">
        <div class="filter-wrap d-flex justify-content-center flex-column">
            <h4><?php _e('Select Category','capsule-theme'); ?></h4>
            <select class="d-flex justify-content-between align-items-center dropdown">
                <option value="all"><?php _e('All','capsule-theme'); ?></option>
                <?php
                    foreach( $terms as $category ) {
                        $cat_id = get_query_var('cat',false);
                        if( (!empty($_GET['category']) && $category->slug == $_GET['category']) || $cat_id == $category->term_id ) {
                            echo '<option value="'. esc_attr( $category->slug ) .'" selected>'. esc_html( $category->name ) .'</option>';
                        } 
                        else {
                            echo '<option value="'. esc_attr( $category->slug ) .'">'. esc_html( $category->name ) .'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    </div>
	<?php
endif;
/*
if( $category->parent == 0 ) {
    echo '<optgroup label="'. esc_attr( $category->name ) .'">';
    foreach( $terms as $subcategory ) {
        if($subcategory->parent == $category->term_id) {
            echo '<option value="'. esc_attr( $subcategory->term_id ) .'">'. esc_html( $subcategory->name ) .'</option>';
        }
    }
    echo '</optgroup>';
}
*/