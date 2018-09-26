<?php get_header(); ?>
<?php get_template_part('content','menu'); ?>
<div id="main">

	<!-- blog_list -->
	<section id="blog" class="site-width">


		<h1 class="title">BLOG</h1>
		<div id="content" class="article">

		</div>
		<?php if(have_posts()): ?>
		<?php while(have_posts()) : the_post(); ?>

		<article class="article-item">
			<h2 class="article-title"><a href="<?php the_permalink(); ?>">
					<?php the_title(); ?></a></h2>
			<h3 style="font-size:80%;">
				<?php the_author(); ?>
				<?php the_time("Y年m月j日") ?>
				<?php single_cat_title("カテゴリー:"); ?>
			</h3>
			<img src="img/photo5.jpeg" class="article-img">
			<p class="article-body">
				<?php the_content(); ?>
			</p>
		</article>


		<?php endwhile; ?>
		<div class="pagenation">
			<ul>
				<li class="prev">
					<?php previous_post_link('%link','前へ'); ?>
				</li>

				<li class="next">
					<?php next_post_link('%link','次'); ?>
				</li>
			</ul>
		</div>

		<!-- コメント -->
		<?php comments_template(); ?>

		<?php else: ?>
		<?php get_seatchform(); ?>
		<?php endif; ?>
		<?php get_sidebar(); ?>
	</section>


</div>
<?php get_footer(); ?>