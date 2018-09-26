<?php

//custummenu
register_nav_menu('mainmenu',メインメニュー);


add_action('widgets_init','createWidgetsArea');

function createWidgetsArea()
{
  register_sidebar(array(
    'name' => 'rightSidebar',
    'id' => 'sidebar',
    'description' => 'サイドバーを表示します',
    'before_widget' => '<div class="wp-widget">',
    'after_widget' => "</div>",
    'before_title' => '<h2 class="wp-widgettitle">',
    'after_title' => "</h2>"
  ));


}
