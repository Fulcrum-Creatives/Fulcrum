<?php

/* Theme Variables
===============================================================================*/
/**
  * The name of your theme
  */
$theme_name =   'Nu Theme'; 
$content_width = 1200;
$theme_menu_list = array(
                    'Primary'
  );
$theme_sidebar_list = array(
                    'Blog Left' => array(
                              'class'         => '',
                              'before_widget' => '<li id="%1$s" class="widget %2$s">',
                              'after_widget'  => '</li>',
                              'before_title'  => '<div class="widget-header"><h2>',
                              'after_title'   => '</h2></div>'
                              ),
                      'Blog Right' => array(
                              'class'         => '',
                              'before_widget' => '<li id="%1$s" class="widget %2$s">',
                              'after_widget'  => '</li>',
                              'before_title'  => '<div class="widget-header"><h2>',
                              'after_title'   => '</h2></div>'
                              ),
                      'Blog Bottom' => array(
                              'class'         => '',
                              'before_widget' => '<li id="%1$s" class="widget %2$s">',
                              'after_widget'  => '</li>',
                              'before_title'  => '<div class="widget-header"><h2>',
                              'after_title'   => '</h2></div>'
                              )
  );
$first_menu_item_class_name = 'first-menu-item';          // First top menu item
$last_menu_item_class_name = 'last-menu-item';            // Last top menu item
$first_sub_menu_item_class_name = 'first-sub-menu-item';  // First sub-menu item
$last_sub_menu_item_class_name = 'last-sub-menu-item';    // Last sub-menu item
/* WordPress Global Variabls
===============================================================================*/
global  $user_ID,
        $wpdb;
/* Includes
===============================================================================*/
/* Required
*************************************/
require(get_template_directory() . '/includes/constant-variables.php');
/* Custom Post Types
===============================================================================*/
include(THEME_DIR. 'includes/custom-post-types/cpt_our-areas.php');
include(THEME_DIR. 'includes/custom-post-types/cpt_portfolio.php');
include(THEME_DIR. 'includes/custom-post-types/cpt_team.php');
/* Custom Taxonomies
===============================================================================*/
include(THEME_DIR. 'includes/custom-taxonomies/tax_blog_post_type.php');
/* Custom Widgets
===============================================================================*/
include(THEME_DIR. 'includes/custom-widgets/widget-news-letter-sign-up.php');
//include(THEME_DIR. 'includes/custom-widgets/widget-teaser.php');
//include(THEME_DIR. 'includes/custom-widgets/widget-posts.php');
/* Content Width
===============================================================================*/
if (!isset($content_width));
/* Add Theme Support
===============================================================================*/
function addThemeSupport() {
    $custom_header_defaults = array(
      'default-image'          => '',
      'random-default'         => false,
      'width'                  => 0,
      'height'                 => 0,
      'flex-height'            => false,
      'flex-width'             => false,
      'default-text-color'     => '444',
      'header-text'            => true,
      'uploads'                => true,
      'wp-head-callback'       => '',
      'admin-head-callback'    => '',
      'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $custom_header_defaults );
    $custom_background_defaults = array(
      'default-color'          => '',
      'default-image'          => '',
      'wp-head-callback'       => '_custom_background_cb',
      'admin-head-callback'    => '',
      'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $custom_background_defaults );
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
}
add_action( 'after_setup_theme', 'addThemeSupport' );
/* Custom Thumbnail Sizes
===============================================================================*/
if ( function_exists('add_image_size') ) {
    add_image_size('portfolio-thumb', 260, 173); 
    add_image_size('portfolio-full', 600);
    add_image_size('widget-image', 550);
    add_image_size('blog-thumbnail', 100, 48, true);
}
/* Add Custom Admin CSS
===============================================================================*/
function admin_styles() {
  if ( is_admin() ) {
    wp_enqueue_style('main', THEME_URL . 'includes/css/styles.css');
  }
}
add_action('admin_print_styles', 'admin_styles');
/* Remove Admin Bar on Front-end
===============================================================================*/
  add_filter('show_admin_bar', '__return_false');
/* Editor Styles
===============================================================================*/
function add_editor_styles() {
  add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'add_editor_styles' );
/* Register Menus
===============================================================================*/
include(THEME_DIR. 'includes/classes/register_menus.php');
new Register_Menus_Class($theme_menu_list);
/* Register Sidebars
===============================================================================*/
include(THEME_DIR. 'includes/classes/register_sidebars.php');
new Register_Sidebars_Class($theme_sidebar_list);
/* Nav Menu First and Last Classes
===============================================================================*/
$first_last_classes = array(
                        $first_menu_item_class_name,
                        $last_menu_item_class_name,
                        $first_sub_menu_item_class_name,
                        $last_sub_menu_item_class_name,
);
include(THEME_DIR. 'includes/classes/first_last_classes.php');
new First_Last_Classes_Class($first_last_classes);
/* Clean Nav Menu Classes
===============================================================================*/
include(THEME_DIR. 'includes/classes/clean_menu_classes.php');
new Clean_Menu_Classes_Class($menu_class_list, $first_last_classes);
/* Clean Nav Menu IDs
===============================================================================*/
include(THEME_DIR. 'includes/classes/clean_menu_id.php');
new Clean_Menu_IDs_Class_Class();
/* Add ID Columns
===============================================================================*/
include(THEME_DIR. 'includes/classes/add_id_column.php');
new Add_Id_Column_Class();
/* Right Now Post Types
===============================================================================*/
include(THEME_DIR. 'includes/classes/right_now_post_types.php');
new right_now_post_types_class();
/*  Load JavaScript
===============================================================================*/
/* IE Conditional
*************************************/
function load_ie() {
  ob_start();?>
<!-- HTML5 and Media Query Support for IE -->
    <!--[if (lt IE 9) & (!IEMobile)]>
    <script src="<?php bloginfo('template_url'); ?>/js/ie.min.js"></script>
    <![endif]-->
<!-- wp-head -->
  <?php
  echo ob_get_clean(); echo "\n";
}
add_action('wp_head', 'load_ie',10);
/*  jQuery
*************************************/
function load_jquery() {
  wp_enqueue_script('jquery');
}
add_action('init', 'load_jquery');
/* Google Maps API
*************************************/
function load_google_maps() {
  wp_register_script('google-maps.js', '//maps.googleapis.com/maps/api/js?sensor=true', false, '1.0', true);
    wp_enqueue_script('google-maps.js');
}
add_action('init', 'load_google_maps');
/* Home js
*************************************/
function load_home_scripts() {
  wp_register_script('home.min.js', THEME_URL . 'js/home.min.js', false, '1.0', true);
  if(is_page('home')){
    wp_enqueue_script('home.min.js');
  }
}
add_action('init', 'load_home_scripts');
/* Portfolio js
*************************************/
function load_portfolio_scripts() {
  wp_register_script('portfolio.min.js', THEME_URL . 'js/portfolio.min.js', false, '1.0', true);
  if('portfolio' == get_post_type()){
    wp_enqueue_script('portfolio.min.js');
  }
}
add_action('init', 'load_portfolio_scripts');
/* Work js
*************************************/
function load_work_scripts() {
  wp_register_script('work.min.js', THEME_URL . 'js/work.min.js', false, '1.0', true);
  if(is_page('work')){
    wp_enqueue_script('work.min.js');
  }
}
add_action('init', 'load_work_scripts');
/* Team js
*************************************/
function load_team_scripts() {
  wp_register_script('team.min.js', THEME_URL . 'js/team.min.js', false, '1.0', true);
  if(is_page('team')){
    wp_enqueue_script('team.min.js');
  }
}
add_action('init', 'load_team_scripts');
/* Contact js
*************************************/
function load_contact_scripts() {
  wp_register_script('contact.min.js', THEME_URL . 'js/contact.min.js', false, '1.0', true);
  if(is_page('contact')){
    wp_enqueue_script('contact.min.js');
  }
}
add_action('init', 'load_contact_scripts');
/* Blog js
*************************************/
function load_blog_scripts() {
  wp_register_script('blog.min.js', THEME_URL . 'js/blog.min.js', false, '1.0', true);
  if(is_home() || is_singular('post')){
    wp_enqueue_script('blog.min.js');
  }
}
add_action('init', 'load_blog_scripts');
/* Comment
===============================================================================*/
function load_single_scripts(){
  wp_register_script('single.min.js', THEME_URL . 'js/single.min.js', false, '1.0', true);
  if(is_singular('post')){
    wp_enqueue_script('single.min.js');
    if( get_option('thread_comments'))  {
        wp_enqueue_script('comment-reply');
    }
  } 
}
add_action('init', 'load_single_scripts');
/* Custom Comments Layout
===============================================================================*/
/* Enqueue Comment Reply JavaScript
************************************
function enqueue_comments_reply() {
    if( get_option('thread_comments'))  {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_head', 'enqueue_comments_reply' );*/
/* Custom Comments Layout
*************************************/
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;?>
  <li id="comment-<?php comment_ID() ?>" <?php comment_class('comment-box') ?>>
    <?php global $user_ID; if( $user_ID ) : ?>
    <?php if( current_user_can('administrator') ) : ?>
      <div class="comment-approval">
        <p>
        <?php 
          if ($comment->comment_approved == '0') 
          _e("Your comment is awaiting moderation.", '') 
        ?>
        </p>
      </div>
    <?php endif; endif; ?>
    <article class="comment-container">
      <header class="comment-header comment-meta">
        <div class="comment-author vcard">
          <div class="comment-author-name author">
            <?php printf(__('%s says:', DOMAIN), get_comment_author_link()) ?>
          </div>
          <div class="comment-edit">
            <?php edit_comment_link(__('Edit', DOMAIN),'','') ?>
          </div>
        </div>
      </header>
      <section class="comment-body">
          <?php comment_text() ?>
      </section>
      <footer class="comment-footer">
          <div class="comment-reply">
              <?php 
                comment_reply_link(array_merge((array) $args, array(
                                                              'depth' => $depth,
                                                              'max_depth' => $args['max_depth'],
                                                              'reply_text' => __('Reply','')))); 
              ?>
          </div>
      </footer>
    </article>
  <?php // Do Not Close the <li> Tag -->  ?>
<?php }
/* Localization
===============================================================================*/
function localization(){
    load_theme_textdomain(DOMAIN, get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'localization');
/* Add Dividers in Admin Menu
===============================================================================*/
/**
 * Create the seperater for the admin menu
 * @param int $position The position of the seperator as defined in admin_menu_separator()
 */
function add_admin_menu_separator($position) {
  global $menu;
  $index = 0;
  foreach($menu as $offset => $section) {
    if (substr($section[2],0,9)=='separator')
        $index++;
    if ($offset>=$position) {
      $menu[$position] = array('','read',"separator{$index}",'','wp-menu-separator');
      break;
      }
  }
  ksort( $menu );
}
/**
 * Set the postion of the admin menu seperators
 * You can add multiple seperators with add_admin_menu_separator()
 */
/*
  5 - below Posts
 10 - below Media
 15 - below Links
 20 - below Pages
 25 - below comments
 60 - below first separator
 65 - below Plugins
 70 - below Users
 75 - below Tools
 80 - below Settings
100 - below second separator
*/
function admin_menu_separator() {
  add_admin_menu_separator(9);
}
add_action('admin_menu','admin_menu_separator');
/* Change Post Lable
===============================================================================*/

/* Remove deafult Dashboard widgets
===============================================================================*/
function remove_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
/* Move Author Meta Box
===============================================================================*/
function remove_author_metabox() {
    remove_meta_box( 'authordiv', 'post', 'normal' );
}
function move_author_to_publish_metabox() {
    global $post_ID;
    $post = get_post( $post_ID );
    echo '<div id="author" class="misc-pub-section" style="border-top-style:solid; border-top-width:1px; border-top-color:#EEEEEE; border-bottom-width:0px;">Author: ';
    post_author_meta_box( $post );
    echo '</div>';
}
add_action( 'admin_menu', 'remove_author_metabox' );
add_action( 'post_submitbox_misc_actions', 'move_author_to_publish_metabox' );
/* Add placeholer feild for gravity forms
===============================================================================*/
add_action("gform_field_standard_settings", "my_standard_settings", 10, 2);
function my_standard_settings($position, $form_id){
    if($position == 25){ ?>  
        <li class="admin_label_setting field_setting" style="display: list-item; ">
            <label for="field_placeholder">Placeholder Text
                <a href="javascript:void(0);" class="tooltip tooltip_form_field_placeholder" tooltip="&lt;h6&gt;Placeholder&lt;/h6&gt;Enter the placeholder/default text for this field.">(?)</a>
            </label>
            <input type="text" id="field_placeholder" class="fieldwidth-3" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
        </li>
        <?php 
    }
}
add_action("gform_editor_js", "my_gform_editor_js");
function my_gform_editor_js(){ ?>
<script>
  jQuery(document).bind("gform_load_field_settings", function(event, field, form){
    jQuery("#field_placeholder").val(field["placeholder"]);
  });
</script>
<?php
}
add_action('gform_enqueue_scripts',"my_gform_enqueue_scripts", 10, 2);
function my_gform_enqueue_scripts($form, $is_ajax=false){?>
    <script>
        jQuery(function(){
            <?php
            foreach($form['fields'] as $i=>$field){
                if(isset($field['placeholder']) && !empty($field['placeholder'])){      
                    ?>        
                    jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');       
                    <?php
                }
            }
            ?>
        });
    </script>
<?php
}
/* Replace Excerpt Elipsis
===============================================================================*/
function replace_excerpt($content) {
   if(is_home() || is_single()){
       return str_replace('[...]',
               '...',
               $content
       );
     }
}
add_filter('the_excerpt', 'replace_excerpt');
/* Malicious URL Requests
===============================================================================*/
include(THEME_DIR. 'includes/classes/malicious_url_requests.php');
new Malicious_URL_Requests_Class($user_ID);
/* Remove WordPress Generated tags in head
===============================================================================*/
function remove_generated_tags(){
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'index_rel_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'start_post_rel_link', 10, 0);
  remove_action('wp_head', 'parent_post_rel_link', 10, 0);
  remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
}
add_action( 'init', 'remove_generated_tags' );
/* Hide Login Error Messages
===============================================================================*/
add_filter('login_errors',create_function('$a', "return null;"));
/* Force Site to break out of frames to prevent scraping
===============================================================================
function break_out_of_frames() {
  if (!is_preview()) {
    echo "\n<script type=\"text/javascript\">";
    echo "\n<!--";
    echo "\nif (parent.frames.length > 0) { parent.location.href = location.href; }";
    echo "\n-->";
    echo "\n</script>\n\n";
  }
}
add_action('wp_head', 'break_out_of_frames');*/
/* Development 
===============================================================================*/
/*===============================================================================
  REMOVE FOR PRODUCTION !!!!!!!!!!!!!!!!
===============================================================================*/
/* Current Screen Information
===============================================================================*/
global $hook_suffix;
include(THEME_DIR. 'includes/development/current_screen_info.php');
new Current_Screen_Info_Class($hook_suffix);
?>