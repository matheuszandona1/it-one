<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package it-one
 */

get_header();
?>

<main id="primary" class="page-post">

	<section class="post">
		<h1 class="post_title">
			<?php the_title(); ?>
		</h1>
		<h3 class="post_excerpt">
			<?php the_excerpt(); ?>
		</h3>
		<div class="blog_card--infos">
			<?php
			$reading_time = calculate_reading_time(get_the_ID());
			?>
			<div class="date"><?php echo get_the_date('d/m/Y'); ?></div>
			<span>•</span>
			<?php
			$author_id = get_post_field('post_author', get_the_ID());
			if (!empty($author_id)) {
				echo '<p>' . get_the_author_meta('display_name', $author_id) . '</p>';
			} else {
				echo '<p>Autor não encontrado.</p>';
			}
			?>

			<span>•</span>

			<?php
			$categories = get_the_category();
			if (!empty($categories)) {
				$first_category = $categories[0];
				echo '<p> <a href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a></p>';
			}
			?>

			<span>•</span>

			<div class="time-reading"><?php echo $reading_time; ?> min de leitura</div>
		</div>

		<div class="post-thumbnail">
			<?php if (has_post_thumbnail()): ?>
				<?php the_post_thumbnail('large'); ?>
			<?php else: ?>
				<img src="<?php echo get_stylesheet_directory_uri() . '/img/default-thumbnail.jpg'; ?>" alt="Imagem Padrão">
			<?php endif; ?>
		</div>
		<div class="post-grid">
			<div class="post-content">
				<?php the_content(); ?>
			</div>
			<div class="post-sidebar">
				<div class="post-relacionado-div">
					<h3 class="d-title">Posts relacionados</h3>
					<?php
					// Obtém as categorias do post atual
					$categories = get_the_category();
					if (!empty($categories)) {
						// Pega o ID da primeira categoria
						$category_id = $categories[0]->term_id;

						// Consulta para obter posts relacionados pela mesma categoria
						$related_posts = new WP_Query(
							array(
								'posts_per_page' => 2, // Quantidade de posts relacionados a exibir
								'category__in' => array($category_id), // ID da categoria atual
								'post__not_in' => array(get_the_ID()), // Excluir o post atual da consulta
							)
						);

						// Verifica se há posts relacionados
						if ($related_posts->have_posts()) {
							while ($related_posts->have_posts()) {
								$related_posts->the_post();
								?>
								<div class="post-relacionado">
									<div class="blog_card">
										<div class="blog_card--infos">
											<div class="date"><?php echo get_the_date('d/m/Y'); ?></div>
											<span>•</span>
											<div class="time-reading"><?php echo calculate_reading_time(get_the_ID()); ?> min de
												leitura</div>
										</div>
										<a href="<?php the_permalink(); ?>" class="blog_card--title">
											<h4><?php the_title(); ?></h4>
										</a>
										<div class="button--container">
											<a href="<?php the_permalink(); ?>" class="read-more">
												Ler mais
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/arrow_forward.svg"
													alt="">
											</a>
										</div>
									</div>
								</div>
								<?php
							}
							// Restaura os dados do post globais
							wp_reset_postdata();
						}
					}
					?>


				</div>
				<?php get_template_part('template-parts/newsletter'); ?>
			</div>
		</div>

	</section>


	<section class="news">
		<h3 class="d-title">Outros Posts</h3>
		<div class="blog_container">

			<?php
			// Nova consulta para obter três posts aleatórios
			$random_posts = new WP_Query(
				array(
					'posts_per_page' => 3, // Número de posts a serem exibidos
					'orderby' => 'rand' // Ordenar aleatoriamente
				)
			);

			// Verifica se há posts
			if ($random_posts->have_posts()) {
				// Loop sobre os posts
				while ($random_posts->have_posts()) {
					$random_posts->the_post();
					$reading_time = calculate_reading_time(get_the_ID());
					?>

					<div class="blog_card">
						<a href="<?php the_permalink(); ?>" class="blog_card--thumb">
							<?php
							if (has_post_thumbnail()) {
								the_post_thumbnail('thumbnail');
							} else {
								echo '<img src="' . get_stylesheet_directory_uri() . '/dev/dist/res/img/assets/blog-img.webp" alt="">';
							}
							?>
						</a>
						<div class="blog_card--infos">
							<div class="date"><?php echo get_the_date('d/m/Y'); ?></div>
							<span>•</span>
							<div class="time-reading"><?php echo $reading_time; ?> min de leitura</div>
						</div>
						<a href="<?php the_permalink(); ?>" class="blog_card--title">
							<h4><?php the_title(); ?></h4>
						</a>
						<div class="button--container">
							<a href="<?php the_permalink(); ?>" class="read-more">
								Ler mais
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/arrow_forward.svg"
									alt="">
							</a>
						</div>
					</div>

					<?php
				}
				// Restaura os dados do post globais
				wp_reset_postdata();
			} else {
				// Se não houver posts, exibe uma mensagem padrão
				echo '<p>Não há posts disponíveis.</p>';
			}
			?>


		</div>
		<div class="button--container ib">
			<?php
			$all_posts_page = get_page_by_path('all-posts');
			if ($all_posts_page) {
				$all_posts_url = get_permalink($all_posts_page->ID);
				?>
				<a href="<?php echo esc_url($all_posts_url); ?>" class="button white" style="background-color:transparent;">
					<p> Ver mais artigos</p>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/dev/dist/res/img/assets/navigate_next.svg"
						alt="">
				</a>
				<?php
			} else {
				// Se a página "all-posts" não existir, exiba uma mensagem de erro ou fallback
				echo '<p>Página não encontrada</p>';
			}
			?>
		</div>




	</section>

	<?php get_template_part('template-parts/newsletter'); ?>
	<div class="divider last">
		<span class="first"></span>
		<span class="second"></span>
		<span class="third"></span>
		<span class="fourth"></span>
	</div>
</main>

<?php
get_footer();
