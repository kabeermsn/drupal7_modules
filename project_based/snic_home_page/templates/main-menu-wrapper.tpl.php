<!-- ALL Menus Show -->
<div class="open-menu-wrapper clearfix">
	<div class="block1">
		<a href="/"><img src="<?php echo $imageRootPath; ?>/image/logo-2.png" alt="" /></a>
		<a href="/"><img src="<?php echo $imageRootPath; ?>/image/mob-logo-2.png" alt="" class="mob-logo-2" /></a>
	</div>
	<div class="menu-block-wrap clearfix">
	<?php foreach($allMenus as $menuIndex=>$menu): ?>
		<div class="menu-sub" data-menu="menu-nav<?php echo $menuIndex;?>">
			<?php if(sizeof($menu['childrens'])) : ?>
				<h3 data-menu="menu-nav<?php echo $menuIndex;?>"><?php echo $menu['parent']['title']; ?></h3>
				<div class="rtl-cnt">
					<ul>
					<?php foreach($menu['childrens'] as $childIndex=>$children): ?>
						<?php if(sizeof($menu['grand_childrens'][$childIndex])) : ?>
							<li data-child-attr="child-nav<?php echo $menuIndex.$childIndex;?>"><a href="#" ><?php echo $children->link_title; ?></a></li>
						<?php else: ?>
							<?php
								$options = unserialize($children->options);
								$attributes = isset($options['attributes'])? $options['attributes']:array();
							?>
							<li><?php echo l(t($children->link_title), $children->link_path, array('attributes' => $attributes)); ?></li>
						<?php endif; ?>
					<?php endforeach; ?>
					</ul>
				</div>
			<?php else: ?>
				<h3><?php echo l(t($menu['parent']['title']), $menu['parent']['href'], array('attributes' => $menu['parent']['attributes'])); ?></h3>
			<?php endif; ?>
			<?php if(isset($menu['parent']['bg_img_url'])): ?>
				<?php print theme('image_style',array('style_name' => 'menu_image', 'path' => $menu['parent']['bg_img_url'])); ?>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
	</div>
	<?php
		$block = module_invoke('snic_menu', 'block_view', 'main_side_menus_block');
	  	print render($block['content']);
  	?>
</div>

<!-- Induvidual Menus Show -->

<?php foreach($allMenus as $menuIndex => $menu) : ?>
	<div class="main-nav clearfix" id="menu-nav<?php echo $menuIndex; ?>">
		<div class="block1">
			<a href="/"><img src="<?php echo $imageRootPath; ?>/image/logo-2.png" alt="" /></a>
		</div>
		<div class="menu-block-wrap clearfix">
			<div class="crpt-cnt-wrap">
				<?php if(sizeof($menu['childrens'])) : ?>
					<h3><?php echo $menu['parent']['title']; ?></h3>
					<ul>
						<?php foreach($menu['childrens'] as $childIndex => $children): ?>
							<?php if(sizeof($menu['grand_childrens'][$childIndex])) : ?>
								<li class="sub" data-child-attr="child-nav<?php echo $menuIndex.$childIndex;?>">
									<a href="#" ><?php echo t($children->link_title); ?></a>
									<ul>
										<?php foreach($menu['grand_childrens'][$childIndex] as $grandIndex => $grandChildren) : ?>
											<?php
												$grandOptions = unserialize($grandChildren->options);
												$grandAttributes = isset($grandOptions['attributes'])? $grandOptions['attributes']:array();
											?>
											<li><?php echo l(t($grandChildren->link_title), $grandChildren->link_path, array('attributes' => $grandAttributes)); ?></li>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php else: ?>
								<?php
									$childOptions = unserialize($children->options);
									$childAttributes = isset($childOptions['attributes'])? $childOptions['attributes']:array();
								?>
								<li><?php echo l(t($children->link_title), $children->link_path, array('attributes' => $childAttributes)); ?></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				<?php else: ?>
					<h3><?php echo l(t($menu['parent']['title']), $menu['parent']['href'], array('attributes' => $menu['parent']['attributes'])); ?></h3>
				<?php endif; ?>
				<a href="#" class="bck-btn">back to main menu</a>
			</div>
			<?php if(isset($menu['parent']['bg_img_url_2'])): ?>
				<div class="menu-img">
					<?php print theme('image_style',array('style_name' => 'menu_image', 'path' => $menu['parent']['bg_img_url_2'])); ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
			$block = module_invoke('snic_menu', 'block_view', 'main_side_menus_block');
		  	print render($block['content']);
	  	?>
	</div>
<?php endforeach; ?>
