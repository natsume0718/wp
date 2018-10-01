<?php get_header(); ?>
<?php get_template_part('content','menu'); ?>
<?php get_template_part('content','info'); ?>



	<section id="blog_list" class="single-container">
		<h1 class="title">BLOG</h1>

		<div class="article">
      <?php get_template_part('loop'); ?>
      <?php if (function_exists("pagination")) {
        pagination($additional_loop->max_num_pages);
      } ?>
    </div>

		<?php get_sidebar(); ?>
	</section>

<?php get_footer(); ?>
