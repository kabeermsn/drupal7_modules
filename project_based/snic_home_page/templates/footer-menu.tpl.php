<footer class="footer-wrapper container-fluid">
  <div class="foot-top-wrap clearfix">
    <div class="social-media-wrap clearfix">
      <h4>follow us online</h4>
      <?php if(variable_get('instagram_url') && variable_get('instagram_image_fid') != 0): ?>
        <?php
          $file = file_load(variable_get('instagram_image_fid'));
          $uri = $file->uri;
          $url = file_create_url($uri);
          $instagramUrl = variable_get('instagram_url');
        ?>
        <a target="_blank" href="<?php echo $instagramUrl; ?>"><img src="<?php echo $url; ?>" alt="" /></a>
      <?php endif; ?>
    </div>
    <div class="awd-wrap">
      <img src="<?php echo $imageRootPath; ?>/image/award-img1.png" alt="" />
    </div>
  </div>
  <div class="foot-bottom-wrap">
    <ul>
    <?php foreach($footerMenus as $key => $value): ?>
        <li><?php echo l(t($value['title']), $value['href'], array('attributes' => $value['attributes'])); ?></li>
      <?php endforeach; ?>
    </ul>
    <span><?php echo variable_get('snic_copy_right'); ?></span>
  </div>
</footer>
