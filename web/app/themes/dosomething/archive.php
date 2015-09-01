<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dosomething
 */

get_header(); ?>

<header class="header header--blog header--blog-home with-gradient" style="background-image: url(<?php header_image(); ?>)">
	<div class="wrapper">
		<h1 class="header__title"><?php single_cat_title() ?></h1>
		<?php
      the_archive_description( '<p class="header__subtitle">', '</div>' );
		?>
	</div>
</header>

<nav class="blog-navigation">
	<div class="wrapper">
		<ul class="waypoints -primary">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</ul>
	</div>
</nav>

<div class="container">
	<div class="wrapper">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="container__block -narrow">
					<?php

					/*
           * Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
					get_template_part( 'partials/content', get_post_format() );
					?>
				</div>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</div>
</div>

<nav class="pagination container">
	<div class="wrapper">
		<div class="container__block">
			<ul class="waypoints">
				<li class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></li>
				<li class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></li>
			</ul>
		</div>
	</div>
</nav>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
