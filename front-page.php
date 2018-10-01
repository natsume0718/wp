<?php
/*Template Name: Home */
?>
<?php get_header(); ?>
<?php get_template_part('content','menu'); ?>
<?php get_template_part('content','info'); ?>

  <div id="visualWrapper">
    <img src='<?php echo get_the_logo_image_url(); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
  </div>
  <div class="container">
    <section id="top-section" class="section-center">
      <div class="news">
        <h2>News</h2>
        <ul class="news-list">
          <?php query_posts('posts_per_page=5'); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li>
              <p class="news-date">
              <?php the_time('Y.n.j'); ?>
            </p>
              <a class="news-title" href="<?php the_permalink(); ?>"><?php the_title();?></a>
            </li>
          <?php endwhile; endif; ?>
      <?php wp_reset_query(); ?>
        </ul>
        <div class="news-btn">
          <a href="#">
          <i class="fa fa-arrow-right">お知らせ・ブログ一覧</i>
          </a>
        </div>
        <div class="banner">
          <a href="#">
          <img src="./images/macbook.jpeg" alt="">
          </a>
        </div>
      </div>
      <div class="time">
        <div class="time-comment">
          <p>明日は臨時休診です。</p>
        </div>
        <table>
          <tbody>
            <tr>
              <th>受付時間</th>
              <th>月</th>
              <th>火</th>
              <th>水</th>
              <th>木</th>
              <th>金</th>
              <th>土</th>
              <th>日</th>
            </tr>


            <tr>
              <td>9:00~12:00</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
            </tr>


            <tr>
              <td>15:00~20:00</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
              <td>●</td>
            </tr>
            <tr>
              <td>20:00~</td>
              <td colspan="7">必ずお電話の上、ご来院ください。別途、時間外料金がかかります。</td>
            </tr>
          </tbody>
        </table>
        <div class="time-remark">
          <ul>
            <li>休診日：なし</li>
            <li>年中無休</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="message">
      <div class="message-head section-center">
        <h2><?php echo get_post_meta($post->ID,'vision-title',true); ?></h2>
        <div class="message-context section-center">
          <p>
  					<?php echo get_post_meta($post->ID,'vision',true); ?>
  				</p>
        </div>
      </div>

    </section>

    <section class="service section-center">
      <divs class="service-container">
        <div class="service-item">
          <h3>診察案内</h3>
          <img src="./images/coffee.jpg" alt="">
          <dl class="">
            <dt>飼い主様のお話を聞き<br>丁寧な診察を行います</dt>
            <dd>サンプルサンプルでサンプル</dd>
          </dl>
        </div>
        <div class="service-item">
          <h3>院内紹介</h3>
          <img src="./images/coffee.jpg" alt="">
          <dl class="">
            <dt>飼い主様のお話を聞き<br>丁寧な診察を行います</dt>
            <dd>サンプルサンプルでサンプル</dd>
          </dl>
        </div>
        <div class="service-item">
          <h3>スタッフ</h3>
          <img src="./images/coffee.jpg" alt="">
          <dl class="">
            <dt>飼い主様のお話を聞き<br>丁寧な診察を行います</dt>
            <dd>サンプルサンプルでサンプル</dd>
          </dl>
        </div>
        <div class="service-item">
          <h3>予約</h3>
          <img src="./images/coffee.jpg" alt="">
          <dl class="">
            <dt>飼い主様のお話を聞き<br>丁寧な診察を行います</dt>
            <dd>サンプルサンプルでサンプル</dd>
          </dl>
        </div>
    </section>
    <?php get_footer(); ?>
