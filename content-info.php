<div class="company-ico">
  <div class="logo">
    <a href="#"><img class="img-responsive" src="<?php header_image(); ?>" alt="<?php if(header_image()) bloginfo('name'); ?>"></a>
  </div>
</div>
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
  <a href="#access"><p class="map"><i class="fas fa-map-marker-alt fa-2x"></i><span>MAP</span></p></a>
</div>
