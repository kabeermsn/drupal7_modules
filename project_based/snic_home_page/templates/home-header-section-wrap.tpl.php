<div class="mask"></div>
  <section class="container-fluid main-wrapper">
    <div class="top-block">
      <?php
        $block = module_invoke('snic_menu', 'block_view', 'main_menu_navigation_block');
        print render($block['content']);
        $block = module_invoke('snic_menu', 'block_view', 'home_spotlight_block');
        print render($block['content']);
      ?>
      <div class="down-arrow-link">
        <a href="#"><img src="<?php echo $imageRootPath; ?>/image/dwn-arrow.png" alt="" /></a>
      </div>
      <div class="dwld-btn-rt">
        <a href="/download-center">Download Center</a>
      </div>
      <div class="raq-btn-lt">
        <a href="/request_quote">Request a quote</a>
      </div>
    </div>
    <?php
      $block = module_invoke('snic_menu', 'block_view', 'main_menu_wrapper_block');
      print render($block['content']);
    ?>
  </section>
