<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" >

<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="profile" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>



<?php wp_head(); ?>

</head>

<body>




<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand"> <?php if ( function_exists( 'the_custom_logo' ) ) {
 the_custom_logo();
   }?>  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <?php wp_nav_menu(array(
        'menu'                 => 'Menu',
        'container'            => 'ul',
        'container_class'      => 'collapse navbar-collapse',
        'container_id'         => 'navbarSupportedContent',
        'container_aria_label' => '',
        'menu_class'           => 'navbar-nav',
        'menu_id'              => 'navbar-nav',
        'echo'                 =>  true,
        'fallback_cb'          => 'wp_page_menu'
       
    )); ?>
 
    </div>
  </div>
</nav>

