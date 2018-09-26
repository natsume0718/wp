<header>
  <a href="#" id="nav-btn">&#9776;</a>
  <nav id="nav-menu">
    <?php wp_nav_menu(array(
      'theme_location'=>'mainmenu',
      'container'=>'',
      'menu_class'=>'',
      'item_wrap'=>'<div>%3%s</div>'
    )); ?>
  </nav>
</header>
