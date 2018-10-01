<section>
  <div class="info">

<?php if ( get_option('phone-num-setting')) : ?>
<p class="tel">
  <a href="tel:<?php echo $title; ?>">
    <i class="fa fa-phone"><?php echo esc_html(get_option( 'phone-num-setting' )); ?></i>
  </a>
</p>
<?php endif; ?>
<?php if ( get_option('busi-time-setting')) : ?>
<p class="busi-time"><?php echo esc_html(get_option( 'busi-time-setting' )); ?></p>
<?php endif; ?>
  </div>
</section>

<section class="access section-center" id="access">
  <h2>Access Map</h2>
  <iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.830828060774!2d139.7670516!3d35.6811673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd8a12697%3A0xd2005b335be1da6e!2z5p2x5Lqs44K544OG44O844K344On44Oz44Ob44OG44Or!5e0!3m2!1sja!2sjp!4v1537152107438" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

</div>
</div>
<footer>(C)<?php echo esc_html(get_option( 'copy-right-setting' )); ?> All Right Reserved.</footer>
</body>
</html>
