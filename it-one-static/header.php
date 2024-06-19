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
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">



	<script src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/js/jquery.js"></script>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

	<script type="module" src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/js/index.js"></script>


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css" />
	<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />



	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/css/styles.css">





	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class=" header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="/">
				<img class="desktop-only"
					src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/logo-letras.svg"
					alt="Logo">
				<img class="mobile-only"
					src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/logo-mobile.svg" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/menu.svg" alt="Menu">
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'depth' => 2,
						'container' => false,
						'menu_class' => 'navbar-nav',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'walker' => new WP_Bootstrap_Navwalker()
					)
				); ?>
				<div class="mobile-only redes">

					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<g clip-path="url(#clip0_2807_5554)">
							<path
								d="M12 2.162C15.204 2.162 15.584 2.174 16.849 2.232C18.157 2.292 19.504 2.59 20.457 3.543C21.419 4.505 21.708 5.839 21.768 7.151C21.826 8.416 21.838 8.796 21.838 12C21.838 15.204 21.826 15.584 21.768 16.849C21.709 18.15 21.404 19.51 20.457 20.457C19.495 21.419 18.162 21.708 16.849 21.768C15.584 21.826 15.204 21.838 12 21.838C8.796 21.838 8.416 21.826 7.151 21.768C5.86 21.709 4.482 21.397 3.543 20.457C2.586 19.5 2.292 18.153 2.232 16.849C2.174 15.584 2.162 15.204 2.162 12C2.162 8.796 2.174 8.416 2.232 7.151C2.291 5.855 2.599 4.487 3.543 3.543C4.503 2.583 5.842 2.292 7.151 2.232C8.416 2.174 8.796 2.162 12 2.162ZM12 0C8.741 0 8.332 0.014 7.052 0.072C5.197 0.157 3.355 0.673 2.014 2.014C0.668 3.36 0.157 5.198 0.072 7.052C0.014 8.332 0 8.741 0 12C0 15.259 0.014 15.668 0.072 16.948C0.157 18.801 0.675 20.648 2.014 21.986C3.359 23.331 5.2 23.843 7.052 23.928C8.332 23.986 8.741 24 12 24C15.259 24 15.668 23.986 16.948 23.928C18.802 23.843 20.646 23.326 21.986 21.986C23.333 20.639 23.843 18.802 23.928 16.948C23.986 15.668 24 15.259 24 12C24 8.741 23.986 8.332 23.928 7.052C23.843 5.197 23.326 3.354 21.986 2.014C20.643 0.671 18.797 0.156 16.948 0.072C15.668 0.014 15.259 0 12 0Z"
								fill="#2C6CED" />
							<path
								d="M11.9999 5.83789C8.59689 5.83789 5.83789 8.59689 5.83789 11.9999C5.83789 15.4029 8.59689 18.1619 11.9999 18.1619C15.4029 18.1619 18.1619 15.4029 18.1619 11.9999C18.1619 8.59689 15.4029 5.83789 11.9999 5.83789ZM11.9999 15.9999C9.79089 15.9999 7.99989 14.2089 7.99989 11.9999C7.99989 9.79089 9.79089 7.99989 11.9999 7.99989C14.2089 7.99989 15.9999 9.79089 15.9999 11.9999C15.9999 14.2089 14.2089 15.9999 11.9999 15.9999Z"
								fill="#2C6CED" />
							<path
								d="M18.4058 7.03381C19.2011 7.03381 19.8458 6.3891 19.8458 5.59381C19.8458 4.79852 19.2011 4.15381 18.4058 4.15381C17.6105 4.15381 16.9658 4.79852 16.9658 5.59381C16.9658 6.3891 17.6105 7.03381 18.4058 7.03381Z"
								fill="#2C6CED" />
						</g>
						<defs>
							<clipPath id="clip0_2807_5554">
								<rect width="24" height="24" fill="white" />
							</clipPath>
						</defs>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<g clip-path="url(#clip0_2807_5559)">
							<path
								d="M20.4504 20.4505H16.8939V14.8811C16.8939 13.5529 16.8703 11.8439 15.0442 11.8439C13.192 11.8439 12.9082 13.2904 12.9082 14.7853V20.4505H9.35293V8.99709H12.7674V10.5618H12.8147C13.5114 9.37202 14.8053 8.6612 16.1831 8.71206C19.788 8.71206 20.4516 11.0834 20.4516 14.1668L20.4504 20.4505ZM5.33997 7.43118C4.19983 7.43118 3.27613 6.50747 3.27613 5.36733C3.27613 4.22719 4.19983 3.30349 5.33997 3.30349C6.48011 3.30349 7.40381 4.22719 7.40381 5.36733C7.40381 6.50747 6.48011 7.43118 5.33997 7.43118ZM7.11759 20.4505H3.55761V8.99709H7.11759V20.4505ZM22.2233 0.00134427H1.77053C0.804248 -0.00930019 0.0118272 0.76538 0 1.73166V22.2684C0.0118272 23.2358 0.804248 24.0105 1.77053 23.9999H22.2233C23.1919 24.0117 23.9879 23.237 24.0009 22.2684V1.73048C23.9867 0.761831 23.1907 -0.0128484 22.2233 0.000161495"
								fill="#2C6CED" />
						</g>
						<defs>
							<clipPath id="clip0_2807_5559">
								<rect width="24" height="24" fill="white" />
							</clipPath>
						</defs>
					</svg>
				</div>
			</div>
		</nav>
	</header>