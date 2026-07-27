<?php
$category_selection_type = get_field('category_selection', 'option');
if( $category_selection_type != 'none' ):
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC',
    ));

    $cat_id = get_query_var('cat',false);

    if ( !empty($terms) ) :
        ?>
        <div class="container category-selection d-flex justify-content-center pt-4">
            <div class="filter-wrap d-flex justify-content-center flex-column">
                <h4><?php _e('Select Category','tab-theme'); ?></h4>
                <?php
                if($category_selection_type == 'button'):
                    ?>
                    <div class="button-select d-flex flex-row flex-wrap">
                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn <?php if($cat_id == false): echo 'active'; endif;?>"><?php _e('All','tab-theme');?></a>
                        <?php
                        foreach( $terms as $category ) {
                            if( (!empty($_GET['category']) && $category->slug == $_GET['category']) || $cat_id == $category->term_id ) {
                                echo '<a href="'. get_category_link( $category->term_id ) .'" class="btn active">'. esc_html( $category->name ) .'</a>';
                            } 
                            else {
                                echo '<a href="'. get_category_link( $category->term_id ) .'" class="btn">'. esc_html( $category->name ) .'</a>';
                            }
                        }
                        ?>
                    </div>
                <?php
                else:
                ?>
                    <select class="d-flex justify-content-between align-items-center dropdown">
                        <option value="all"><?php _e('All','tab-theme'); ?></option>
                        <?php
                            foreach( $terms as $category ) {
                                
                                if( (!empty($_GET['category']) && $category->slug == $_GET['category']) || $cat_id == $category->term_id ) {
                                    echo '<option value="'. esc_attr( $category->slug ) .'" selected>'. esc_html( $category->name ) .'</option>';
                                } 
                                else {
                                    echo '<option value="'. esc_attr( $category->slug ) .'">'. esc_html( $category->name ) .'</option>';
                                }
                            }
                        ?>
                    </select>
                
                    <?php
                endif;
                ?>
            </div>
        </div>
        <?php
    endif;
endif;