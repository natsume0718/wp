<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
  <meta charset="utf-8">


  <title><?php wp_title(); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri();?>">
  <link rel="stylesheet" href="./css/normalize.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!--個別ページ用のmetaデータ-->
<?php if( is_single() || is_page() ): ?>
<meta name="description" content="<?php echo strip_tags( get_the_excerpt() ); ?>" />
<?php if ( has_tag() ): ?>
<?php $tags = get_the_tags();
$kwds = array();
foreach($tags as $tag){
$kwds[] = $tag->name;
}	?>
<meta name="keywords" content="<?php echo implode( ',',$kwds ); ?>">
<?php endif; ?>
<?php else: ?>
  <?php if(is_tag() || is_date() || is_search() || is_404()) : ?>
  <meta name="robots" content="noindex"/>
  <?php endif;?>
<?php endif; ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
