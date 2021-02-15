<!DOCTYPE html>
<html>

  <head>

    <?php wp_head();?>
    
  </head>

<body>

<header class="sticky-top">      

<nav class="navbar navbar-expand-lg py-3 navbar-light bg-white shadow-sm">
  <div class="container">
    <a href="/" class="navbar-brand">
      <!-- Logo Image -->
      <img src="http://placehold.it/88x40" width="80" alt="" class="d-inline-block align-middle mr-2">
      <!-- Logo Text -->
     
    </a>

    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
    <span class="navbar-toggler-icon"></span>
    </button>
<?php

wp_nav_menu( array(
  'theme_location' => 'primary_menu',
  'menu_class' => 'nav navbar-nav ml-auto',
  'container' => 'div',
  'container_id' => 'navbarSupportedContent',
  'container_class' => 'collapse navbar-collapse',
  'add_li_class'  => 'nav-item',
  'link_class' => 'nav-link',

  'fallback_cb' => false
  ) );
?>
  </div>
</nav>

</header>








         
