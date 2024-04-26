<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package it-one
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<script src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/js/jquery.js"></script>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

	<script type="module" src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/js/index.js"></script>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />



	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/css/styles.css">




	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-light ">
			<a class="navbar-brand" href="/"><img
					src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/logo-letras.svg"
					alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'depth' => 2,
						'container' => false,
						'menu_class' => 'navbar-nav ',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'walker' => new WP_Bootstrap_Navwalker()
					)
				);
				?>
			</div>

		</nav>
	</header>