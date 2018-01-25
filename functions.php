<?php 
require_once('wp-bootstrap-navwalker.php');
define('TASCC_USE_CDN',false);

add_action( 'init', 'tascc_init' );
if(!function_exists('tascc_init')){
    function tascc_init(){
        register_post_type( 'events',
            array(
                    'labels' => array(
                    'name' => __( 'Special Events' ),
                    'singular_name' => __( 'Special Event' )
                ),
                'public' => true,
                'has_archive' => true,
                'supports'=>array(
                    'title',
                    'editor',
                    'excerpt'
                )
                
            )
        );

    }

}



add_action( 'after_setup_theme', 'tascc_setup' );

function tascc_setup() {
    

    register_nav_menus( array(
        'main'    => __( 'Main Menu', 'tascc' ),
        'footer' => __( 'Footer Menu', 'tascc' ),
    ) );

    add_theme_support( 'post-thumbnails' );
    add_image_size( 'tascc-featured-image', 2000, 1200, true );
}


add_action( 'wp_enqueue_scripts', 'tascc_enqueue_styles' );
function tascc_enqueue_styles() {
    $bootstrap_style = 'bootstrap-style';
    $editor_styles = 'editor_styles';
    $font = 'google-font';



    if(TASCC_USE_CDN){
        wp_enqueue_style( $google_font,'//fonts.googleapis.com/css?family=Open+Sans',null,null);
        wp_enqueue_style( $bootstrap_style, '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css',null,null);
    }else{
        wp_enqueue_style( $google_font,get_stylesheet_directory_uri() . '/fonts/OpenSans/OpenSans.css',null,null);
        wp_enqueue_style( $bootstrap_style, get_stylesheet_directory_uri() . '/bootstrap/bootstrap.min.css', null, null);
    }

     wp_enqueue_style( $editor_styles, get_stylesheet_directory_uri() . '/editor-style-shared.css',null,null);

    wp_enqueue_style( 'tascc-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($google_font, $bootstrap_style,$editor_styles),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

}


add_action('wp_enqueue_scripts', 'tascc_enqueue_my_scripts');
function tascc_enqueue_my_scripts() {

	$popper_script = 'popper-script';
    $bootstrap_script = 'bootstrap=script';

    if(TASCC_USE_CDN){
    	wp_enqueue_script($popper_script,'//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
        wp_enqueue_script($bootstrap_script, '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js', array('jquery',$popper_script), true); 
    }else{
        wp_enqueue_script($popper_script, get_stylesheet_directory_uri() . '/bootstrap/popper.min.js');
        wp_enqueue_script($bootstrap_script, get_stylesheet_directory_uri() . '/bootstrap/bootstrap.min.js', array('jquery', $popper_script), true);
    }
}


add_action('wp_print_styles','tascc_dequeue');
function tascc_dequeue() {
    wp_dequeue_style( 'style');
    wp_dequeue_style( 'twentyseventeen-fonts');
    wp_dequeue_style( 'twentyseventeen-style');
}


if(!function_exists('tascc_donate_bar')){
    function tascc_donate_bar() {
        return '<div class="donate highlight-bg-1"><a href="/donate">Join us! <button class="btn">Donate</button></a></div>';
    }
}


if(!function_exists('tascc_custom_header_title')){
    function tascc_custom_header_title() {
        $feature_title = get_post_custom_values('feature_title');
        if(!empty($feature_title)){
            return '<div class="feature-title">' . $feature_title[0] . '</div>';
        }else{
            return '';
        }
    }
}

add_filter('post_gallery', 'tascc_gallery', 10, 2);
function tascc_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Here's your actual output, you may customize it to your need
    $output = "<div class=\"row\">\n";

    //var_dump($attachments);

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'thumbnail');

        //var_dump($attachment);

        $output .= "<div class=\"col-md-2\">\n";
        $output .= "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" class=\"mw-100\" />\n";
        $output .= '<p class="caption small">' . $attachment->post_excerpt . '</p>' . "\n";
        $output .= "</div>\n";
    }

    $output .= "</div>\n";

    return $output;
}




?>