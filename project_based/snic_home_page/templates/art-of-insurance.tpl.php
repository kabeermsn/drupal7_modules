<?php if(count($artOfInsuranceSpotlight)): ?>
  <section class="mid-cnt-wrap">
    <div class="skew-block"></div>
    <div class="tittel-wrap">
      <h3>The Art of</h3>
      <h1>insurance</h1>
    </div>
    <div class="inc-wrapper clearfix cycle-slideshow" data-cycle-slides="> div" data-cycle-fx=fade
      data-cycle-speed=800 data-cycle-timeout=0 data-cycle-swipe=true data-cycle-prev=".prev-ins" data-cycle-next=".next-ins">
      <?php $index = 0; ?>
      <?php foreach($artOfInsuranceSpotlight as $key => $value): ?>
        <?php
          $animClass = ($index != 0)? 'ins-animation':'';
          $index++;
          $link = $value->field_link['und'][0]['value'];
          $uri = $value->field_image['und'][0]['uri'];
          $url = file_create_url($uri);
          $heading = $value->field_heading['und'][0]['value'];
          $heading = (strlen($heading) > 60)? substr($heading, 0, 60).'...':$heading;
          $details = $value->field_details['und'][0]['value'];
          $details = (strlen($details) > 180)? substr($details, 0, 180).'...':$details;
        ?>
        <div class="clearfix <?php echo $animClass; ?>">
          <div class="inc-lt-cnt">
            <?php print theme('image_style',array('style_name' => 'home_insurance_spotlight', 'path' => $uri)); ?>
          </div>
          <div class="bg-line">
            <img src="<?php echo $imageRootPath; ?>/image/vr-line.png" alt="" />
          </div>
          <div class="inc-rt-cnt">
            <h2><?php echo $heading;?></h2>
            <?php echo $details;?>
            <div class="rdm-btn">
              <?php echo l(t('Read more'), $link); ?>
              <!-- <a href="#" >Read more</a> -->
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if(count($artOfInsuranceSpotlight) > 1): ?>
      <div class="cycle-arrow-wrap">
        <span class="prev-ins"><img src="<?php echo $imageRootPath; ?>/image/lt-arrow.png" alt="" /></span>
        <span class="next-ins"><img src="<?php echo $imageRootPath; ?>/image/rt-arrow.png" alt="" /></span>
      </div>
    <?php endif; ?>
  </section>
<?php endif; ?>
