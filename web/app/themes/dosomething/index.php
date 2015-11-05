<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dosomething
 */

get_header(); ?>

<header class="header -hero header--blog-home" style="background-image: url(<?php header_image(); ?>)">
	<div class="wrapper">
		<h1 class="header__title"><?php bloginfo('title'); ?></h1>
		<p class="header__subtitle"><?php bloginfo('description'); ?></p>
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

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="container__block">
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
</main>

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

<?php get_footer(); ?>
