<?php

$custom_header_defaults = array(
  'default-image' => get_template_directory_uri() . '/img/default.jpg',
    'header-text' => false,//ヘッダー画像にテキストをかぶせる

);
add_theme_support('custom-header');

//トップ画像
define('LOGO_SECTION', 'logo_section'); //セクションIDの定数化
define('LOGO_IMAGE_URL', 'logo_image_url'); //セッティングIDの定数化
function themename_theme_customizer( $wp_customize ) {
 $wp_customize->add_section( LOGO_SECTION , array(
 'title' => 'トップ画像', //セクション名
 'priority' => 30, //カスタマイザー項目の表示順
 'description' => 'サイトトップ画像設定。', //セクションの説明
 ) );

 $wp_customize->add_setting( LOGO_IMAGE_URL );
 $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, LOGO_IMAGE_URL, array(
 'label' => 'ロゴ', //設定ラベル
 'section' => LOGO_SECTION, //セクションID
 'settings' => LOGO_IMAGE_URL, //セッティングID
 'description' => '画像をアップロードするとヘッダーにあるデフォルトのサイト名と入れ替わります。',
 ) ) );

}
add_action( 'customize_register', 'themename_theme_customizer' );//カスタマイザーに登録

//ロゴイメージURLの取得
function get_the_logo_image_url(){
 return esc_url( get_theme_mod( LOGO_IMAGE_URL ) );
}

//電話番号設定
function number_register( $wp_customize ) {

  // セクション
  $wp_customize->add_section( 'phone-num-section', array(
    'title'     => 'infoエリア',
    'priority'  => 200,
  ));

  // Text セッティング
  $wp_customize->add_setting( 'phone-num-setting', array(
    'default'   => '',
    'type'      => 'option',
    'transport' => 'refresh',
  ));
  // Text コントロール
  $wp_customize->add_control( 'phone-num-options', array(
    'settings'  => 'phone-num-setting',
    'label'     => '電話番号入力',
    'section'   => 'phone-num-section',
    'type'      => 'text',
  ));

  // Text セッティング
  $wp_customize->add_setting( 'busi-time-setting', array(
    'default'   => '',
    'type'      => 'option',
    'transport' => 'refresh',
  ));
  // Text コントロール
  $wp_customize->add_control( 'busi-time-options', array(
    'settings'  => 'busi-time-setting',
    'label'     => '営業時間入力エリア(ex: 9:00~13:00/14:00~18:00)',
    'section'   => 'phone-num-section',
    'type'      => 'text',
  ));


}
add_action( 'customize_register', 'number_register' );


//コピーライト
function cpr_register( $wp_customize ) {

  // セクション
  $wp_customize->add_section( 'copy-right-section', array(
    'title'     => 'コピーライト設定',
    'priority'  => 200,
  ));

  // Text セッティング
  $wp_customize->add_setting( 'copy-right-setting', array(
    'default'   => '',
    'type'      => 'option',
    'transport' => 'refresh',
  ));
  // Text コントロール
  $wp_customize->add_control( 'copy-right-options', array(
    'settings'  => 'copy-right-setting',
    'label'     => 'コピーライト入力',
    'section'   => 'copy-right-section',
    'type'      => 'text',
  ));


}
add_action( 'customize_register', 'cpr_register' );


//custummenu
register_nav_menu('mainmenu',メインメニュー);

//pagenation
function pagination($pages = '',$range = 2)
{
    $showItems = ($range * 2) + 1;

    global $paged;//現在のページ値
    if(empty($paged))
    {
        $paged = 1;
    }

    if($pages==='')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;//全ページ取得

        if(!$pages)
        {
            $pages = 1;
        }
    }

    if($pages != 1 )
    {
        echo "<div class =\"pagenation\">\n";
        echo "<ul>\n";

        if($paged > 1)
        {
            echo "<li class =\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";
        }

        for($i=1;$i <= $pages;$i++)
        {
            if($pages <= $showItems || $pages != 1 && (!($i >= $paged+$range+1 || $i <= $paged-$range-1)))
            {
                echo ($paged == $i )? "<li class =\"active\>".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
            }
        }
        if($paged < $pages)
          echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";

        echo "</ul>\n";
        echo "</div>\n";
    }

}

add_action('widgets_init','createWidgetsArea');

function createWidgetsArea()
{
  register_sidebar(array(
    'name' => 'サイドバー',
    'id' => 'sidebar',
    'description' => 'サイドバーを表示します',
    'before_widget' => '<div class="wp-widget">',
    'after_widget' => "</div>",
    'before_title' => '<h2 class="wp-widgettitle">',
    'after_title' => "</h2>"
  ));
}

//投稿ページへのカスタムボックス
add_action('admin_menu','add_custom_inputbox');
add_action('save_post','save_custom_postdata');

function add_custom_inputbox()
{
  //id属性、カスタムフィールド名、メタボックスに表示される関数名、postなら投稿pageなら固定、配置順序
  add_meta_box('about_id','vision入力欄','custom_area','page','normal');
  //add_meta_box('about_id','ABOUT入力欄','custom_area','page','normal');
}

//メタボックスの関数名と一致させる
function custom_area()
{
  global $post;
  echo 'コメント : <textarea cols="50" rows="5" name = "vision_msg">'.get_post_meta($post->ID,'vision',true).'</textarea><br>';
}

function save_custom_postdata($post_id)
{
  $vision_msg ='';
  //内容を取り出す
  if(isset($_POST['vision_msg']))
  {
    $vision_msg = $_POST['vision_msg'];
  }

  if($vision_msg != get_post_meta($post_id,'vision',true))
  {
    update_post_meta($post_id,'vision',$vision_msg);
  }
  elseif($vision_msg =='')
  {
    delete_post_meta($post_id,'vision',get_post_meta($post_id,'vision',true));
  }

}

//ウィジェットエリア生成の関数の登録
add_action('widgets_init','create_widget_area');
//ウィジェットが生成する関数の登録
//add_action( 'widgets_init', create_function(' ', 'return register_widget("Widget_item1");' ));
add_action('widgets_init', create_function('', 'return register_widget("Widget_item1");'));


function create_widget_area()
{
  register_sidebar(array(
    'name' => '電話連絡エリア',
    'id' => 'phone',
    'description' => '',
    'before_widget' => '<div>',
    'after_widget' => "</div>",
  ));
}

//ウィジェット生成
class Widget_item1 extends WP_Widget
{
  //コンストラクタ
  function Widget_item1()
  {
     parent::WP_Widget(false,$name ='電話連絡エリア');
  }

  function form($instance){
    $title = esc_attr($instance['title']);
    $body = esc_attr($instance['body']);
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">
        <?php echo "電話番号"; ?>
      </label>
      <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_id('title');?>" value="<?php echo $title; ?>" />
    </p>
    <p>
    <label for="<?php echo $this->get_field_id('body'); ?>">
      <?php echo "営業時間(ex:10:00~24:00)"; ?>
    </label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_id('body');?>" value="<?php echo $body; ?>"/>
    </p>
    <?php
  }
  function update($new_instance,$old_instance)
  {
    $instance = $old_instance;
    $instance['title']=strip_tags($new_instance['title']);
    $instance['body']=strip_tags($new_instance['body']);
    return $instance;
  }

  function widget($args, $instance)
  {
    extract( $args );
    //ウィジェットから入力された情報の取得
    $title = apply_filters('widget_title',$instance['title']);
    $body = apply_filters('widget_body',$instance['body']);

    if($title)
    {
      ?>
      <p class="tel">
        <a href="tel:<?php echo $title; ?>">
          <i class="fa fa-phone"><?php echo $title; ?></i>
        </a>
      </p>
      <p class="busi-time"><?php echo $body; ?></p>
      <?php
    }
  }
}
?>
