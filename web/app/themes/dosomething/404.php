<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dosomething
 */

get_header(); ?>

<header class="header header--blog header--blog-home with-gradient" style="background-image: url(<?php header_image(); ?>)">
	<div class="wrapper">
		<h1 class="header__title">Not Found</h1>
		<p class="header__subtitle">Sorry, we couldn't find that page!</p>
	</div>
</header>

<nav class="blog-navigation">
	<div class="wrapper">
		<ul class="waypoints -primary">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</ul>
	</div>
</nav>

<main class="container">
	<div class="wrapper">
		<div class="container__block -narrow">
			<p><?php esc_html_e( 'It looks like we couldn\'t find the page you were looking for.', 'dosomething' ); ?></p>
		</div>

	</div>
</main>

<?php get_footer(); ?>
