<?php
// Include your functions files here
include('inc/enqueues.php');
// Add your theme support ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    // let wordpress manage the title
    add_theme_support( 'title-tag' );
    //add_theme_support( 'custom-background', $args );
    //add_theme_support( 'custom-header', $args );
    // Automatic feed links compatibility
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );
// Content width
if( !isset( $content_width ) ) {
    // @TODO : edit the value for your own specifications
    $content_width = 960;
}

require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
require_once get_template_directory() . '/inc/custom-fields/pages-meta.php';
require_once get_template_directory() . '/inc/TGM/example.php';


register_nav_menus( array(
    'head_menu' => 'Меню в шапке',
) );

// подключаем файлы со стилями
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/style.css', false, time() );
    wp_enqueue_style( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', false, time() );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'animate-puk', get_template_directory_uri() . '/js/animate-puk.js','','',true);
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js','','',true);
    wp_enqueue_script( 'TweenMax', get_template_directory_uri() . '/js/TweenMax.min.js','','',true);
    wp_enqueue_script( 'ScrollMagic', get_template_directory_uri() . '/js/ScrollMagic.min.js','','',true);
    wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/animation.gsap.min.js','','',true);
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', '','',true);
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', '','',true);
};

function create_post_type() {
  register_post_type( 'team',
    array(
      'labels' => array(
        'name' => 'Команда',
        'singular_name' => 'Участник'
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );

  register_post_type( 'projects',
    array(
      'labels' => array(
        'name' => 'Проекты',
        'singular_name' => 'Проект'
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );

  register_post_type( 'services',
    array(
      'labels' => array(
        'name' => 'Услуги',
        'singular_name' => 'Услуга'
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    )
  );
}

add_action( 'init', 'create_post_type' );

function create_taxonomy(){
  register_taxonomy('projects-categories', array('projects'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Категории',
      'singular_name'     => 'Категория',
      'search_items'      => 'Поиск категории',
      'all_items'         => 'Все категории',
      'view_item '        => 'Посмотреть Категорию',
      'parent_item'       => 'Родительская категория',
      'parent_item_colon' => 'Родительская категория:',
      'edit_item'         => 'Редактировать категорию',
      'update_item'       => 'Одновить категорию',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Новая',
      'menu_name'         => 'Категории',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => true, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => true,
    'update_count_callback' => '',
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );
}
add_action('init', 'create_taxonomy');

//Регистрация сайдбара
function true_register_wp_sidebars() {
 
  /* В боковой колонке - первый сайдбар */
  register_sidebar(
    array(
      'id' => 'true_side', // уникальный id
      'name' => 'Боковая колонка', // название сайдбара
      'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
      'before_widget' => '<div id="%1$s" class="side mb-6 widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
      'after_widget' => '</div>',
      'before_title' => '<h3 class="text-2xl mb-4 widget-title">', // по умолчанию заголовки виджетов в <h2>
      'after_title' => '</h3>'
    )
  );
}
add_action( 'widgets_init', 'true_register_wp_sidebars' );

function my_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {
      background-image: none;
      display: inline;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function wpb_login_logo_url_title() {
  return 'S2S-architect.com';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );

function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}

?>