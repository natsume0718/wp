<div id="content" class="article">
			<?php if(have_posts()): ?>
			<?php while(have_posts()):the_post(); ?>
			<article class="article-item">
				<h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<h3 style="font-size:80%;"><?php the_author(); ?> <?php the_time("Y年m月j日") ?> <?php single_cat_title("カテゴリー:"); ?></h3>
				<img src="img/photo5.jpeg" class="article-img">
				<p class="article-body">
				 <?php the_content(); ?>
				</p>
			</article>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php if(function_exists("pagenation")) pageneation($additional_loop->max_num_paged); ?>
</div>