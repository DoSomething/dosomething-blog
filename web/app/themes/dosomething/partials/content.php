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

			<article class="figure -drop-left -large">
				<div class="figure__media">
          <?php if(has_post_thumbnail()) : ?>
            <?php the_post_thumbnail() ?>
          <?php endif; ?>
				</div>
				<div class="figure__body">
          <div <?php post_class(); ?>>
            <header class="post-header">
              <?php the_title( sprintf( '<h2 class="post-link-heading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
              <?php if ( 'post' === get_post_type() ) : ?>
              <div class="footnote">
                <?php dosomething_posted_on(true, false); ?>
              </div>
              <?php endif; ?>
            </header>

            <?php
              if(empty($post->post_excerpt)) {
                the_content( sprintf(
                  wp_kses( __( 'Continue reading&hellip;' ), array( 'p' => array( 'class' => array('footnote') ) ) ),
                  the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
              } else {
                echo '<p>' . $post->post_excerpt . '</p>';
                echo '<p class="footnote"><a href="' . esc_url(get_permalink()) . '">Continue reading&hellip;</a></p>';
              }
            ?>

          </div>
				</div>
			</article>


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
