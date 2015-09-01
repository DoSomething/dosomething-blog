<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dosomething
 */

?>

<article id="post-<?php the_ID(); ?>">
	<header class="post-header">
    <?php the_title( sprintf( '<h2 class="post-link-heading"><a href="%s" rel="bookmark"><span>', esc_url( get_permalink() ) ), '</span></a></h2>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="footnote">
			<?php dosomething_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>

		<?php if(has_post_thumbnail()) { ?>

			<article class="figure -left -medium">
				<div class="figure__media">
					<?php the_post_thumbnail() ?>
				</div>
				<div class="figure__body">
          <div <?php post_class(); ?>>

            <?php
            the_content( sprintf(
            /* translators: %s: Name of current post. */
              wp_kses( __( 'Continue reading&hellip;' ), array( 'p' => array( 'class' => array('footnote') ) ) ),
              the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );
            ?>

          </div>
				</div>
			</article>


    <?php } else { ?>

      <div <?php post_class(); ?>>
        <?php
        the_content( sprintf(
        /* translators: %s: Name of current post. */
          wp_kses( __( 'Continue reading&hellip;' ), array( 'p' => array( 'class' => array('footnote') ) ) ),
          the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) );
        ?>
      </div>

		<?php } ?>


		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dosomething' ),
				'after'  => '</div>',
			) );
		?>

	<ul class="form-actions -inline">
		<li class="footnote"><?php dosomething_entry_footer(); ?></li>
	</ul>
</article>
