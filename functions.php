<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_filter('wpcf7_form_elements', function($content) {
  $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

  $content = str_replace('<br />', '', $content);

  return $content;
});
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_load_js', '__return_false');
function add_google_tag_manager() {
  ?>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-EP3D7F33ZM"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-EP3D7F33ZM');
  </script>
  <?php
}
add_action('wp_head', 'add_google_tag_manager');
//Loading jQuery in footer
function jquery_enqueue() {
    wp_deregister_script('jquery');
    // wp_register_script('jquery', "https://code.jquery.com/jquery-3.7.1.slim.min.js", false, null, true);
    // wp_enqueue_script('jquery');
}
if (!is_admin()) add_action("wp_enqueue_scripts", "jquery_enqueue", 11);
add_filter('wpcf7_autop_or_not', '__return_false');
function google_fonts() {
    wp_enqueue_style( 'google-fonts-bitter', 'https://fonts.googleapis.com/css2?family=Bitter:wght@400;500;700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );
function add_styles() {
    // wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), null);
    wp_register_style('main-styles', get_stylesheet_directory_uri() . '/scss/style.css', array(), filemtime(get_stylesheet_directory() . '/scss/style.css'), 'all');
    wp_enqueue_style('main-styles');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', false, null, true);
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/scripts.min.js', true, filemtime(get_stylesheet_directory() . '/js/scripts.min.js'), true);
}
function my_deregister_scripts() {
    wp_deregister_script( 'wp-embed' );
}
add_action('wp_footer', 'my_deregister_scripts');
add_action('wp_enqueue_scripts', 'add_styles');

// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');
register_nav_menu('footer-menu', 'Footer menu');
register_nav_menu('legal-menu', 'Legal menu');

add_action( 'init', 'register_acf_blocks', 5 );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/hero' );
    register_block_type( __DIR__ . '/blocks/home-services' );
    register_block_type( __DIR__ . '/blocks/home-meet-the-team' );
    register_block_type( __DIR__ . '/blocks/page-services' );
    register_block_type( __DIR__ . '/blocks/page-attorneys' );
    register_block_type( __DIR__ . '/blocks/page-pawfessionals' );
    register_block_type( __DIR__ . '/blocks/page-contact' );
    register_block_type( __DIR__ . '/blocks/buttons' );
}

add_theme_support( 'editor-styles' );

if ( ! function_exists( 'mm_law_styles' ) ) {
	/**
	 * Registers an editor stylesheet for the theme.
	 */
	function mm_law_styles() {
    add_editor_style( 'custom-editor-style.css' );
    add_editor_style( 'scss/bootstrap.css' );
		add_editor_style( 'blocks/hero/style.css' );
    add_editor_style( 'blocks/home-services/style.css' );
    add_editor_style( 'blocks/home-meet-the-team/style.css' );
    add_editor_style( 'blocks/page-services/style.css' );
    add_editor_style( 'blocks/page-attorneys/style.css' );
    add_editor_style( 'blocks/page-pawfessionals/style.css' );
    add_editor_style( 'blocks/page-contact/style.css' );
	}
}
add_action( 'admin_init', 'mm_law_styles' );