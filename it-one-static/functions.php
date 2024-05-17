<?php
/**
 * it-one functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package it-one
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function it_one_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on it-one, use a find and replace
	 * to change 'it-one' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('it-one', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'it-one'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'it_one_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'it_one_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function it_one_content_width()
{
	$GLOBALS['content_width'] = apply_filters('it_one_content_width', 640);
}
add_action('after_setup_theme', 'it_one_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function it_one_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'it-one'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'it-one'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'it_one_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function it_one_scripts()
{
	wp_enqueue_style('it-one-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('it-one-style', 'rtl', 'replace');

	wp_enqueue_script('it-one-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'it_one_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



function register_my_menus()
{
	register_nav_menus(
		array(
			'header-menu' => __('Header Menu', 'theme_name')
		)
	);
}
add_action('init', 'register_my_menus');


require_once get_template_directory() . '/walker-class.php';


// Função para adicionar o meta box
function add_custom_meta_box()
{
	add_meta_box(
		'featured_post', // ID do meta box
		'Destacar Post', // Título do meta box
		'custom_meta_box_markup', // Callback que renderiza o conteúdo do meta box
		'post', // Tipo de post onde será adicionado
		'side', // Contexto (lado)
		'high' // Prioridade
	);
}

// Hook para adicionar o meta box
add_action('add_meta_boxes', 'add_custom_meta_box');

// Callback para renderizar o conteúdo do meta box
function custom_meta_box_markup($post)
{
	wp_nonce_field('featured_post_nonce_action', 'featured_post_nonce');

	$is_featured = get_post_meta($post->ID, 'featured_post', true);
	?>
	<input type="checkbox" name="featured_post" <?php checked($is_featured, 'yes'); ?> /> Marcar como Destacado
	<?php
}

// Função para salvar os dados do meta box
function save_custom_meta_box($post_id, $post, $update)
{
	// Verificar se o nonce está definido e é válido
	if (!isset($_POST['featured_post_nonce']) || !wp_verify_nonce($_POST['featured_post_nonce'], 'featured_post_nonce_action')) {
		return $post_id;
	}

	// Verificar se o usuário atual tem permissão para editar o post
	if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	// Verificar se não é uma revisão automática
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;



	}

	if (isset($_POST['post_categories'])) {
		$categories = $_POST['post_categories']; // 'post_categories' deve ser um array de IDs de termos
		wp_set_post_terms($post_id, $categories, 'category');
	}

	// Verificar o valor enviado e atualizar o meta
	$is_featured = (isset($_POST['featured_post']) && $_POST['featured_post'] === 'on') ? 'yes' : 'no';
	update_post_meta($post_id, 'featured_post', $is_featured);
}

// Hook para salvar os dados quando o post é salvo
add_action('save_post', 'save_custom_meta_box', 10, 3);




function register_featured_taxonomy()
{
	$labels = array(
		'name' => _x('Destacados', 'Taxonomy General Name', 'textdomain'),
		'singular_name' => _x('Destacado', 'Taxonomy Singular Name', 'textdomain'),
		'menu_name' => __('Destacados', 'textdomain'),
		'all_items' => __('Todos os Destacados', 'textdomain'),
		'parent_item' => __('Item Pai', 'textdomain'),
		'parent_item_colon' => __('Item Pai:', 'textdomain'),
		'new_item_name' => __('Novo Nome de Destacado', 'textdomain'),
		'add_new_item' => __('Adicionar Novo Destacado', 'textdomain'),
		'edit_item' => __('Editar Destacado', 'textdomain'),
		'update_item' => __('Atualizar Destacado', 'textdomain'),
		'view_item' => __('Ver Destacado', 'textdomain'),
		'separate_items_with_commas' => __('Separe os destacados com vírgulas', 'textdomain'),
		'add_or_remove_items' => __('Adicionar ou remover destacados', 'textdomain'),
		'choose_from_most_used' => __('Escolher entre os mais usados', 'textdomain'),
		'popular_items' => __('Destacados Populares', 'textdomain'),
		'search_items' => __('Procurar Destacados', 'textdomain'),
		'not_found' => __('Não Encontrado', 'textdomain'),
		'no_terms' => __('Sem Destacados', 'textdomain'),
		'items_list' => __('Lista de Destacados', 'textdomain'),
		'items_list_navigation' => __('Navegação da Lista de Destacados', 'textdomain'),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false, // Define se é uma taxonomia hierárquica como categorias ou não hierárquica como tags.
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_rest' => true, // Habilita suporte ao Gutenberg.
	);
	register_taxonomy('destacado', array('post'), $args);
}
add_action('init', 'register_featured_taxonomy');




function calculate_reading_time($post_id)
{
	$post_content = get_post_field('post_content', $post_id);
	$word_count = str_word_count(strip_tags($post_content));
	$reading_time = ceil($word_count / 200); // 200 palavras por minuto
	return $reading_time;
}


if (!function_exists('setup_theme')):
	function setup_theme()
	{
		add_theme_support('post-thumbnails'); // Habilita suporte para imagens destacadas
	}
endif;
add_action('after_setup_theme', 'setup_theme');



// Função para definir o comprimento do excerpt
function custom_excerpt_length($length)
{
	return 20; // Altere o número de acordo com o comprimento desejado
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);


// Função para remover o "[...]" do final do excerpt
function custom_excerpt_more($more)
{
	return ''; // Retorna uma string vazia para remover o texto de truncamento
}
add_filter('excerpt_more', 'custom_excerpt_more');



// Adiciona classes aos elementos de texto gerados pelo the_content
function add_classes_to_content_elements($content)
{
	// Adiciona classes aos parágrafos
	$content = str_replace('<p>', '<p class="custom-paragraph">', $content);

	// Adiciona classes aos títulos (h1, h2, h3, h4, h5, h6)
	$content = preg_replace('/<h([1-6])>/', '<h$1 class="custom-heading">', $content);

	// Adiciona classes às listas (ul, ol, li)
	$content = str_replace('<ul>', '<ul class="custom-list">', $content);
	$content = str_replace('<ol>', '<ol class="custom-list">', $content);
	$content = str_replace('<li>', '<li class="custom-list-item">', $content);

	// Adiciona classes às citações (blockquote)
	$content = str_replace('<blockquote>', '<blockquote class="custom-blockquote">', $content);

	// Adiciona classes aos links (a)
	$content = str_replace('<a ', '<a class="custom-link" ', $content);

	return $content;
}
add_filter('the_content', 'add_classes_to_content_elements');


function registrar_cases_post_type()
{
	$args = array(
		'public' => true,
		'label' => 'Cases',
		'supports' => array('title', 'editor', 'thumbnail'), // Adicione quaisquer outros suportes necessários
	);
	register_post_type('cases', $args);
}
add_action('init', 'registrar_cases_post_type');



function registrar_taxonomia_categorias_do_case()
{
	$labels = array(
		'name' => 'Categorias do Case',
		'singular_name' => 'Categoria do Case',
		'menu_name' => 'Categorias',
		'all_items' => 'Todas as Categorias',
		'edit_item' => 'Editar Categoria',
		'view_item' => 'Ver Categoria',
		'update_item' => 'Atualizar Categoria',
		'add_new_item' => 'Adicionar Nova Categoria',
		'new_item_name' => 'Novo Nome da Categoria',
		'search_items' => 'Buscar Categorias',
		'not_found' => 'Nenhuma categoria encontrada',
		'not_found_in_trash' => 'Nenhuma categoria encontrada na lixeira',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => true,
		'show_admin_column' => true,
		'rewrite' => array('slug' => 'categoria_do_case'),
	);

	register_taxonomy('categoria_do_case', 'cases', $args);
}
add_action('init', 'registrar_taxonomia_categorias_do_case');



function redirect_cases_single_template($template)
{
	// Verifica se a postagem atual é do tipo "cases"
	if (is_singular('cases')) {
		// Define o caminho para o template single-cases.php
		$template = locate_template(array('single-cases.php'));
	}

	// Retorna o template escolhido
	return $template;
}
add_filter('single_template', 'redirect_cases_single_template');
