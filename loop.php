<?php if(have_posts()): ?>
<?php while(have_posts()) : the_post(); ?>
<article class="article">
	<div class="article-title">
		<h2><a href="<?php the_permalink(); ?>">
				<?php the_title(); ?></a></h2>
		<h3 style="font-size:80%;">
					<?php the_author(); ?>
					<?php the_time("Y年m月j日") ?>
					<?php single_cat_title("カテゴリー:"); ?>
		</h3>
	</div>
	<div class="article-context">
		<p>	<?php the_content(); ?></p>
	</div>
		<?php endwhile; ?>
</article>

	<?php else: ?>
	<?php get_searchform(); ?>
	<?php endif; ?>
			<?php if(function_exists("pagenation")) pageneation($additional_loop->max_num_paged); ?>
</div>
