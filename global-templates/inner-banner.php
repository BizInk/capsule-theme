<?php if( is_page() ){

	$inner_banner_title = get_field('inner_banner_title');
	$inner_banner_content = get_field('inner_banner_content'); 
    if(empty($inner_banner_title)){
        $inner_banner_title = get_the_title();
    }
}else if( is_singular('team-member') ){

	$inner_banner_title = get_the_title();
	$inner_banner_content = '<p>'.get_field('member_position').'</p>';
}else if( is_singular('testimonial') ){

    $inner_banner_title = get_the_title();
    $inner_banner_content = '';
}else if( is_single() ){
    global $post;
    $author_id=$post->post_author;
    $inner_banner_title = get_field('inner_banner_title');
    if(empty($inner_banner_title)){
        $inner_banner_title = get_the_title();
    }
    $inner_banner_content = '<p class="post-meta">
            <span>'. get_the_author_meta('display_name', $author_id) .'</span> | <span>'. get_the_date('d M, Y') .'</span>
        </p>';
}
else if( is_home() ){
    $inner_banner_title = get_the_title();
    if( empty($inner_banner_title) ){
        $inner_banner_title = __('Blog', 'capsule-theme'); 
    }
    $inner_banner_title = __('Blog', 'capsule-theme'); // Temp Fix
    $inner_banner_content = get_field('inner_banner_content', 'option');
}
else if( is_archive() ){
    $inner_banner_title = single_cat_title( '', false );
    if(empty($inner_banner_title) && is_post_type_archive()){
        $inner_banner_title = post_type_archive_title( '', false );
    }
    $inner_banner_content = '';
}
else if( is_404() ){
    $inner_banner_title = get_field('404_banner_title', 'option'); 
    $inner_banner_content = get_field('404_banner_content', 'option');
    if(empty($inner_banner_title)){
        $inner_banner_title = "Error 404";
    }
}

if( empty($inner_banner_title) || !$inner_banner_title ){
    $inner_banner_title = get_field('inner_banner_title', 'option');
    if(empty($inner_banner_title)){
        $inner_banner_title = get_the_title();
    }
}

if( empty($inner_banner_content) || !$inner_banner_content ){
    $inner_banner_content = get_field('inner_banner_content', 'option');
}

if( !is_search() ){ ?>

    <!-- call-to-action-section-start -->
    <!-- <section class="call-to-action-section" <//?= $background_html; ?>>    -->
    <section class="call-to-action-section">
        <div class="full-width-wysiwyg text-center">
            <div class="container">
                <div class="editor-design">
                    <?php 
                    
                    if( !empty($inner_banner_title) ) { ?>

                        <h1><?php echo do_shortcode($inner_banner_title); ?></h1>
                    <?php }
                    else{
                        echo '<h1>'. get_the_title() .'</h1>';
                    }
                    if( !empty($inner_banner_content) && !is_singular('resource') ) {

                        echo $inner_banner_content;
                    } ?>
                </div>
            </div>
        </div>      
    </section>
    <!-- call-to-action-section-end --> 
<?php } ?>