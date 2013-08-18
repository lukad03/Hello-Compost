<?php

/*-----------------------------------------------------------------------------------
    Register Styles and Scripts
-----------------------------------------------------------------------------------*/

function hello_styles()  
{ 
    wp_register_style( 'open-sans', ('http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300') );
    wp_register_style( 'sidr-style', get_template_directory_uri() . '/css/jquery.sidr.dark.css' ); 

    wp_enqueue_style( 'hello-style', get_stylesheet_uri() );
    wp_enqueue_style( 'open-sans', get_stylesheet_uri() );
}

add_action('wp_enqueue_scripts', 'hello_styles');

function hello_scripts()
{
        wp_register_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery'), true);
        wp_register_script( 'froogaloop', get_template_directory_uri() . '/js/froogaloop-min.js', array( 'jquery'), true);
        wp_register_script( 'flex-min', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'froogaloop', 'fitvids'), true);
        wp_register_script( 'flex-slider-options', get_template_directory_uri().'/js/flex-options.js', array('flex-min'), true );
        wp_register_script( 'svg-js', get_template_directory_uri() . '/js/jquery.svg.js', array( 'jquery'), true);
        wp_register_script('sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array('jquery'), true);
        wp_register_script( 'hello-js', get_template_directory_uri() . '/js/hello.js', array('sidr'), true);
        wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), true);
        wp_register_script( 'hello-all', get_template_directory_uri() . '/js/hello-all.js', array('jquery', 'modernizr'), true);

        wp_enqueue_script('hello-all');

        if ( is_front_page() ) {
        wp_enqueue_script('flex-slider-options');
        wp_enqueue_script('hello-js');
        }
}


add_action( 'wp_enqueue_scripts', 'hello_scripts' );

/*-----------------------------------------------------------------------------------
    Register Menus
-----------------------------------------------------------------------------------*/

function register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __( 'Navigation Links' ),
      'footer-nav' => __( 'Footer Links' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

/*-----------------------------------------------------------------------------------
    Register Post Types
-----------------------------------------------------------------------------------*/

add_action('init', 'create_my_post_types');

function create_my_post_types() {
          register_post_type( 'gallery', array(
            'labels' => array(
                  'name' => __( 'Home Gallery' ),
                  'singular_name' => __( 'Gallery Item' ),
                  'add_new' => __( 'Add Gallery Item' ),
                  'add_new_item' => __( 'Add New Gallery Item' ),
                  'edit' => __( 'Edit' ),
                  'edit_item' => __( 'Edit Gallery Item' ),
                  'new_item' => __( 'New Gallery Item' ),
                  'view' => __( 'View Gallery' ),
                  'view_item' => __( 'View Gallery' ),
                  'search_items' => __( 'Search Gallery' ),
                  'not_found' => __( 'No Gallery Found' ),
                  'not_found_in_trash' => __( 'No Gallery over Yonder' ),
                  'parent' => __( 'Parent Gallery' ),
                          ),
            'description' => __( 'Homepage Gallery Items and Text' ),
            'public' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'supports' => array( 'title', 'thumbnail', 'page-attributes'),
            'can_export' => true,
            'menu_position' => 5,
            'has_archive' => false,
            'show_in_nav_menus' => false,
            
        ));
        register_post_type( 'bios', array(
            'labels' => array(
                  'name' => __( 'Bios' ),
                  'singular_name' => __( 'Bio' ),
                  'add_new' => __( 'Add Biography' ),
                  'add_new_item' => __( 'Add New Biography' ),
                  'edit' => __( 'Edit' ),
                  'edit_item' => __( 'Edit Biography' ),
                  'new_item' => __( 'New Biography' ),
                  'view' => __( 'View Bios' ),
                  'view_item' => __( 'View Bios' ),
                  'search_items' => __( 'Search Bios' ),
                  'not_found' => __( 'No Bios Found' ),
                  'not_found_in_trash' => __( 'No Bios over Yonder' ),
                  'parent' => __( 'Parent Bios' ),
                          ),
            'description' => __( 'Biographies of Team Members' ),
            'public' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'supports' => array( 'title', 'editor', 'thumbnail'),
            'can_export' => true,
            'menu_position' => 7,
            'has_archive' => false,
            'show_in_nav_menus' => false,
        ));

        register_post_type( 'press', array(
            'labels' => array(
                  'name' => __( 'Press' ),
                  'singular_name' => __( 'Press' ),
                  'add_new' => __( 'Add Mentions' ),
                  'add_new_item' => __( 'Add Mention' ),
                  'edit' => __( 'Edit' ),
                  'edit_item' => __( 'Edit Mention' ),
                  'new_item' => __( 'New Mention' ),
                  'view' => __( 'View Press' ),
                  'view_item' => __( 'View Press' ),
                  'search_items' => __( 'Search Press' ),
                  'not_found' => __( 'No Press Found' ),
                  'not_found_in_trash' => __( 'No press in this compost pile' ),
                  'parent' => __( 'Parent Press' ),
                          ),
            'description' => __( 'Press for Hello Compost' ),
            'public' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'supports' => array( 'title'),
            'can_export' => true,
            'menu_position' => 6,
            'has_archive' => false,
            'show_in_nav_menus' => false,
            
        ));
        register_post_type( 'how', array(
            'labels' => array(
                  'name' => __( 'How it Works' ),
                  'singular_name' => __( 'Step' ),
                  'add_new' => __( 'Add a Step' ),
                  'add_new_item' => __( 'Add a Step' ),
                  'edit' => __( 'Edit' ),
                  'edit_item' => __( 'Edit this step' ),
                  'new_item' => __( 'New Step' ),
                  'view' => __( 'View Steps' ),
                  'view_item' => __( 'View Step' ),
                  'search_items' => __( 'Search How it Works' ),
                  'not_found' => __( 'No Steps Found' ),
                  'not_found_in_trash' => __( 'No Steps in Ze Pile' ),
                  'parent' => __( 'Parent Steps' ),
                          ),
            'description' => __( 'How Hello Compost works' ),
            'public' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'supports' => array( 'title', 'editor', 'thumbnail'),
            'can_export' => true,
            'menu_position' => 7,
            'has_archive' => false,
            'show_in_nav_menus' => false,
        ));
}

/*-----------------------------------------------------------------------------------
    Register Taxonomies
-----------------------------------------------------------------------------------*/

function add_custom_taxonomies() {

    register_taxonomy('groups', 'bios', array(

        'hierarchical' => true,

        'labels' => array(
            'name' => __( 'Groups'),
            'singular_name' => __( 'Group'),
            'search_items' =>  __( 'Search Groups' ),
            'all_items' => __( 'All Groups' ),
            'parent_item' => __( 'Parent Group' ),
            'parent_item_colon' => __( 'Parent Group:' ),
            'edit_item' => __( 'Edit Group' ),
            'update_item' => __( 'Update Group' ),
            'add_new_item' => __( 'Add New Group' ),
            'new_item_name' => __( 'New Group Name' ),
            'menu_name' => __( 'Groups' ),
        ),

        'rewrite' => array(
            'slug' => 'groups', // This controls the base slug that will display before each term
            'with_front' => false, 
            'hierarchical' => true 
        ),
    ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );


/*-----------------------------------------------------------------------------------
    Image Options
-----------------------------------------------------------------------------------*/

add_theme_support('post-thumbnails');

add_image_size( 'bio', 500, 500, true);

add_image_size( 'gallery-massive', 2800, 1575, true);

add_filter( 'use_default_gallery_style', '__return_false' );

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
 
function remove_thumbnail_dimensions( $html ) {
        $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
        return $html;
}


function video_embed($url){
    if (strpos($url, "youtube.com")) {
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
    echo '<iframe id="youtubevideo" width="1280px" height="720px" src="http://www.youtube.com/embed/'.$my_array_of_vars['v'].'?vq=hd720&amp;fs=0&amp;modestbranding=1&amp;rel=0&amp;showinfo=0&amp;showsearch=0&amp;theme=light&amp;wmode=transparent&amp;enablejsapi=1&amp;"id="video_yt" frameborder="0"
    webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';  }

    else if (strpos($url, "vimeo.com")) {
    echo '<iframe id="vimeovideo" width="1280px" height="720px" src="http://player.vimeo.com/video/'.(int) substr(parse_url($url, PHP_URL_PATH), 1).'?portrait=0&color=CCCCCC" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';}
}

/*-----------------------------------------------------------------------------------
    Sidebars and Widgets
-----------------------------------------------------------------------------------*/

 function unregister_default_widgets() {
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Calendar');
     unregister_widget('WP_Widget_Archives');
     unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Search');
     unregister_widget('WP_Widget_Text');
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_Categories');
     unregister_widget('WP_Widget_Recent_Posts');
     unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_RSS');
     unregister_widget('WP_Widget_Tag_Cloud');
     unregister_widget('WP_Nav_Menu_Widget');
     unregister_widget('Twenty_Eleven_Ephemera_Widget');
 }
 add_action('widgets_init', 'unregister_default_widgets', 11);

 /*-----------------------------------------------------------------------------------
    Minify Theme
-----------------------------------------------------------------------------------*/

add_action( 'init', 'blockusers_init' );
function blockusers_init() {
  if (!current_user_can( 'manage_options' )) {
    if (is_admin()) {
        wp_redirect( home_url() );
        exit;
    }
  }
}

add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
  remove_menu_page('link-manager.php');
  remove_menu_page('edit.php');   
}

include('functions/widget.php');
include('functions/press-meta.php');
include('functions/gallery-meta.php');
include('functions/bio-meta.php');
include('functions/how-meta.php');

add_filter('show_admin_bar', '__return_false');

?>