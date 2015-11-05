<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dosomething
 */

?>

<footer class="container -padded blog-footer">
  <div class="wrapper">
    <div class="container__block -half">
      <h4>Catch up with our latest posts&hellip;</h4>
      <ul class="post-link-list">
        <?php
        $recent_posts = wp_get_recent_posts([
          'numberposts' => 5,
          'post_status' => 'publish'
        ]);
        foreach( $recent_posts as $recent ){
          echo '<li><a href="' . get_the_permalink($recent['ID']) . '"><span>' . $recent['post_title'] . '</span>';
          if($recent['post_author']) {
            echo ' <em class="footnote">by ' . get_the_author_meta('display_name', $recent['post_author']) . '</em>';
          }
          echo '</a></li>';
        }
        ?>
      </ul>
    </div>

    <div class="container__block -half">
      <h4>Awesome things&trade;</h4>
      <ul class="post-link-list">
        <li>
          <a href="https://www.dosomething.org/about/who-we-are">
            <span>What is DoSomething.org?</span><br/>
            <em class="footnote">who we are & what we do</em>
          </a>
        </li>
        <li>
          <a href="https://www.dosomething.org/about/were-hiring">
            <span>We're hiring!</span><br/>
            <em class="footnote">work with us</em>
          </a>
        </li>
        <li>
          <a href="https://www.dosomething.org/about/donate-pretty-please">
            <span>Donate</span><br/>
            <em class="footnote">help us make an impact</em>
          </a>
        </li>
      </ul>
    </div>

    <div class="container__block -narrow">
      <div class="footnote">&copy; 2015 DoSomething.org</div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
