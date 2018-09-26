<?php get_header(); ?>
<?php get_template_part('content','menu'); ?>

	<!-- blog_list -->
	<section id="blog_list" class="site-width">
		<h1 class="title"><?php echo get_the_category(); ?></h1>

    <div id="content" class="article">
      <?php get_template_part('loop'); ?>
      <?php if (function_exists("pagination")) {
        pagination($additional_loop->max_num_pages);
      } ?>
    </div>

		<?php get_sidebar(); ?>


	</section>

<?php get_footer(); ?>
