<header class="banner" role="banner">
  <div class="container">
    <nav role="navigation">
      <button type="button" class="btn btn-default nav-toggle" aria-label="Left Align">
        MENU
      </button>
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
