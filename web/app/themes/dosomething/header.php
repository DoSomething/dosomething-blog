<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dosomething
 */

?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="">

  <div class="chrome">
    <div class="wrapper">

      <?php if ( is_front_page() && is_home() ) : ?>

        <nav class="navigation -white -floating">
          <a class="navigation__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span>DoSomething.org</span></a>
        </nav>

      <?php else : ?>

        <nav class="navigation -white -floating">
          <a class="navigation__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span>DoSomething.org</span></a>
          <div class="navigation__byline">
            You're reading <a href="/"><?php bloginfo('title') ?></a>, the <a
              href="https://www.dosomething.org">DoSomething.org</a> blog.
          </div>
        </nav>

      <?php endif; ?>
