<?php if(count($latestNews)): ?>
<section class="news-wrapper container-fluid">
  <div class="news-wrap">
    <div class="news-title">
      <h3>latest</h3>
      <h1>News</h1>
    </div>
    <div class="news-slider cycle-slideshow" data-cycle-slides="> div" data-cycle-fx=fade
      data-cycle-speed=800 data-cycle-timeout=0 data-cycle-swipe=true data-cycle-prev=".prev-news" data-cycle-next=".next-news">
      <?php $index = 0; ?>
      <?php foreach($latestNews as $key => $value): ?>
        <?php
          $animClass = ($index != 0)? 'ins-animation':'';
          $index++;
          global $base_url;
          $uri = $value->field_image['und'][0]['uri'];
          $url = file_create_url($uri);
          $heading = $value->field_heading['und'][0]['value'];
          $heading = (strlen($heading) > 60)? substr($heading, 0, 60).'...':$heading;
          $details = $value->field_details['und'][0]['value'];
          $details = (strlen($details) > 180)? substr($details, 0, 180).'...':$details;
          $newsDate = (int) $value->field_news_date['und'][0]['value'];
          $newsDate = date('d M Y', $newsDate);
          $readMoreLink = $base_url.'/node/'.$value->nid;
        ?>
        <div class="news-cnt-wrap clearfix <?php echo $animClass; ?>">
          <div class="news-rt-cnt news-single-slid">
            <div><?php print theme('image_style',array('style_name' => 'home_news_cycle', 'path' => $uri)); ?></div>
          </div>
          <div class="news-lt-cnt">
            <h4><?php echo $heading; ?></h4>
            <span><?php echo $newsDate; ?></span>
            <?php echo $details; ?>
            <div class="rdm-btn">
              <?php echo l(t('Read more'), $readMoreLink); ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if(count($latestNews) > 1): ?>
      <div class="cycle-arrow-wrap">
        <span class="prev-news"><img src="<?php echo $imageRootPath; ?>/image/lt-arrow.png" alt="" /></span>
        <span class="next-news"><img src="<?php echo $imageRootPath; ?>/image/rt-arrow.png" alt="" /></span>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
