
<?php get_header(); ?>
<?php get_template_part('content','menu'); ?>
<?php get_template_part('content','info'); ?>
      <div class="single-container">
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
          <?php comments_template(); ?>
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
        </article>

          <?php else: ?>
          <?php get_searchform(); ?>
          <?php endif; ?>
        <span class="sidebar-font"><?php get_sidebar(); ?></span>
      </div>
<?php get_footer(); ?>
