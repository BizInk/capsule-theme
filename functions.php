<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define('DEFAULT_IMG', get_stylesheet_directory_uri().'/images/default.jpg');

require_once 'inc/cpt.php';
include 'inc/savecss.php';

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );


/** Force Showing of ACF Meta Boxes */
function capsule_acf_init() {
    acf_update_setting('remove_wp_meta_box', false);
}
add_action('acf/init', 'capsule_acf_init');

/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	wp_localize_script('child-understrap-scripts', 'WPURLS', array( 'siteurl' => get_option('siteurl') ));
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Load the child theme's text domain
 */
function capsule_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'capsule_child_theme_textdomain' );

/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );

/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

/*Website Settings*/
if( function_exists('acf_add_options_page') ){

	acf_add_options_page(array(
		'page_title' => 'Website Settings',
		'menu_title' => 'Website Settings',
		'menu_slug' => 'website-settings',
		'capability' => 'edit_posts',
		'icon_url' => 'dashicons-info',
		'redirect' => false
	));

	acf_add_options_page(array(
		'page_title' => 'Admin Settings',
		'menu_title' => 'Admin Settings',
		'menu_slug' => 'admin-settings',
		'capability' => 'manage_options',
		'icon_url' => 'dashicons-carrot',
		'redirect' => false
	));
}


// This theme uses wp_nav_menu() in two locations.  
register_nav_menus( array(  
	'footer-menu' => __( 'Footer Menu', 'capsule' ),
	'client-area' => __( 'Client Area', 'capsule' )
));


add_filter( 'gform_enable_password_field', '__return_true' );
add_filter('acf/settings/save_json', 'capsule_acf_json_save_point');
 
function capsule_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'capsule_acf_json_load_point');
function capsule_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

add_action( 'init', 'cupsule_custom_init' );
function cupsule_custom_init() {
	remove_post_type_support('fixed-price-packages','excerpt');
	remove_post_type_support('testimonial','excerpt');
	remove_post_type_support('team-member','excerpt');
	remove_post_type_support('mail-template','excerpt');
	remove_post_type_support('checklist','excerpt');

	// Remove editor from only flexible page template
	if ( isset($_GET['post']) ) {

        $page_id = $_GET['post'];
		$template = get_post_meta($page_id, '_wp_page_template', true);
		if( $template == 'page-templates/flexible-content.php' ){	
	        remove_post_type_support('page', 'editor');
		}
	}
}

// Adding option to select gravity form in ACF
add_filter( 'acf/load_field/name=gravity_forms', 'luca_acf_populate_gf_forms_ids' );
function luca_acf_populate_gf_forms_ids( $field ) {
	if ( class_exists( 'GFFormsModel' ) ) {
		$choices = [];

		foreach ( \GFFormsModel::get_forms() as $form ) {
			$choices[ $form->id ] = $form->title;
		}

		$field['choices'] = $choices;
	}

	return $field;
}

// Function to show star rating
function luca_star_rating($rating){
	if( $rating > 0 && $rating <= 5 ){

	    $rating_round = (int)$rating;
	    $half = $rating - $rating_round;
	    $half = $half > 0 ? true : false;

	    while( $rating_round > 0 ){
	    	echo '<i class="fa fa-star" aria-hidden="true"></i>';

	    	$rating_round--;
	    }

	    echo $half ? '<i class="fa fa-star-half-o" aria-hidden="true"></i>' : null;
	}
}

// Shortcode for yellow text
add_shortcode('yellow-text', 'yellow_text_cb');
function yellow_text_cb($atts, $content = null ){
    return '<span class="yellow">' . $content . '</span>';
}

// Shortcode for line break
add_shortcode('br', 'br_cb');
function br_cb(){
    return '<br>';
}

// Shortcode for current year
add_shortcode('current-year', 'current_year_cb');
function current_year_cb(){
    return date('Y');
}

// Ajax callback function to fetch and load more posts on blog page
add_action("wp_ajax_fetch_blog_posts", "fetch_blog_posts");
add_action("wp_ajax_nopriv_fetch_blog_posts", "fetch_blog_posts");

function fetch_blog_posts() {

	$category = $_POST['category'];
	$pagenumber = $_POST['pagenumber'];
    $ppp = 3;

	$posts_args = array(
	    'post_status' => 'publish', 
	    'order' => 'DESC',
	    'paged'	=> $pagenumber,
	    'posts_per_page' => $ppp, 
	);

	if( !empty($category) ){

		$posts_args['cat'] = $category;
	}

	$posts_loop = new WP_Query( $posts_args );

	$return_content = array('content' => '', 'load_more' => '');

	if( $posts_loop->have_posts() ){

		ob_start();

		if( $pagenumber == 1 ){ ?>

			<div class="row g-lg-5">
		<?php }
			while( $posts_loop->have_posts() ){
				$posts_loop->the_post();

				$post_image = has_post_thumbnail() ? get_the_post_thumbnail_url() : DEFAULT_IMG; ?>

				<div class="col-md-6 col-xl-4 team-member">
	                    <div class="team-member-wrap">
	                        
	                        <a href="<?php the_permalink(); ?>" class="member-img">
	                        	<img src="<?= $post_image; ?>" alt="blog-post-img">
	                        </a>
	                        <div class="member-details">
	                        	
	                            <a href="<?php the_permalink(); ?>" class="member-name"><h4><?php the_title(); ?></h4></a>
	                            <?php the_excerpt(); ?>
	   
	                            <a href="<?php the_permalink(); ?>" class="readmore">Read More</a>                           
	                        </div>
	                    </div>
	            </div>
			<?php }
		if( $pagenumber == 1 ){ ?>
			
			</div>
		<?php }
		$return_content['content'] = ob_get_contents();
		ob_end_clean();

		if( $posts_loop->found_posts > ($ppp*$pagenumber) ){
			
			$return_content['load_more'] = ' <div class="d-flex justify-content-center"><a href="#" class="btn blue-btn load-more" data-pagenumber="'. ($pagenumber+1) .'">Load More<img src="'. get_stylesheet_directory_uri() .'/images/arrow-right.png" class="img-fluid btn-arrow" alt=""></a></div>';
		}

	}

	wp_reset_query();

	echo json_encode($return_content);

die();
}

add_filter('excerpt_more', 'luca_excerpt_more');
function luca_excerpt_more( $more ) {
    return '...';
}

add_filter('get_the_excerpt', 'luca_change_excerpt');
function luca_change_excerpt( $text ){
    return rtrim( str_replace(array('[', ']'), array('', ''), $text));
}

add_filter( 'excerpt_length', 'luca_excerpt_length', 999 );
function luca_excerpt_length( $length ) {
    return 30;
}

/**
 * Show BizInk logo on login page
 */
add_action('login_head', 'capsule_login_page_styles');
function capsule_login_page_styles() { 
	?>
	<style>
		#login h1 a {
			background: url(<?php echo get_stylesheet_directory_uri() . '/images/login-logo.png' ?>) no-repeat center center;
			padding-bottom: 30px;
			height: 70px;
			width: 310px;
			background-size: 310px 80px;
		}
	</style>
	<?php 
}

// Theme Updater
require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
$myUpdateChecker = PucFactory::buildUpdateChecker('https://github.com/BizInk/capsule-theme',__FILE__,'capsule-theme');
$myUpdateChecker->setBranch('master');
$myUpdateChecker->setAuthentication('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');