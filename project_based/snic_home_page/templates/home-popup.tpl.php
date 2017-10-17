<?php if(count($homePopUp) && $showPopup): ?>
  <?php
  $value = reset($homePopUp);
  $uri = $value->field_image['und'][0]['uri'];
  $url = file_create_url($uri);
  $details = $value->field_details['und'][0]['value'];
  ?>

  <div class="modal home-popup fade in" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="<?php echo $imageRootPath; ?>/image/pop-up-close.png" alt="" /></button>
        </div>
        <div class="modal-body">
          <?php print theme('image_style',array('style_name' => 'home_popup', 'path' => $uri)); ?>
          <?php echo $details;?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
