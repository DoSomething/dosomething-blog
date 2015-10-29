<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dosomething
 */

get_header(); ?>
<?php if ( have_posts() ) : the_post(); ?>


<header class="header <?php if(has_post_thumbnail()): echo '-hero'; endif; ?>" <?php if(has_post_thumbnail()) : echo 'style="background-image: url(' . dosomething_featured_image_url() . ');"'; endif; ?>>
	<div class="wrapper">
		<h1 class="header__title"><?php the_title() ?></h1>
		<p class="header__subtitle">by <?php the_author(); ?></p>
	</div>
</header>

<main class="container">
	<div class="wrapper">

		<div class="container__block -narrow">
			<div class="post-date">
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="footnote">
						<?php dosomething_posted_on(false); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</div>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post">
					<?php the_content(); ?>
				</div>

				<ul class="form-actions -inline">
					<li class="footnote"><?php dosomething_entry_footer(); ?></li>
				</ul>
			</article><!-- #post-## -->

		</div>

		<div class="container__block -narrow">
			<div class="author figure -left">
				<div class="figure__media">
					<div class="avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ) ) ?>
					</div>
				</div>
				<div class="figure__body">
					<h3>By <?php the_author(); ?></h3>
					<p><?php the_author_meta('description'); ?></p>

					<?php $twitter = get_the_author_meta('twitter') ?>
					<ul class="social-icons">
						<?php if($twitter): ?><li><a href="<?php echo $twitter; ?>" class="social-icon -twitter"><span>Twitter</span> <?php echo str_replace('https://twitter.com/', '', $twitter); ?></a></li><?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</main>

<?php endif; ?>

<?php get_footer(); ?>

