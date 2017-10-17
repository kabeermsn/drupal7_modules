<div class="mask"></div>
<section class="container-fluid main-wrapper">
  <div class="top-block">
    <?php
    $block = module_invoke('snic_menu', 'block_view', 'main_menu_navigation_block');
    print render($block['content']);
    $block = module_invoke('snic_menu', 'block_view', 'general_spotlight_block');
    print render($block['content']);
    ?>
  </div>
  <?php
  $block = module_invoke('snic_menu', 'block_view', 'main_menu_wrapper_block');
  print render($block['content']);
  ?>
</section>
