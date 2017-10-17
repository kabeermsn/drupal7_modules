<header class="header-block clearfix">
	<div class="logo-wrap">
		<?php if($logoColor): ?> <!-- 1:white, 0:blue -->
			<?php $menuWhite = 'menu-white' ?>
			<a href="/"><img src="<?php echo $imageRootPath; ?>/image/logo-2.png" alt="" /></a>
		<?php else: ?>
			<?php $menuWhite = '' ?>
			<a href="/"><img src="<?php echo $imageRootPath; ?>/image/logo-1.png" alt="" /></a>
		<?php endif; ?>
	</div>
	<div class="mobile-logo">
		<a href="/"><img src="<?php echo $imageRootPath; ?>/image/mob-logo-1.png" alt="" /></a>
	</div>
	<div class="menu-wrap <?php echo $menuWhite; ?> clearfix">
		<ul>
		<?php $index = 0; ?>
		<?php foreach($mainNavMenus as $key => $menu): ?>
			<li class="menu-nav<?php echo $index; ?>"><a href="#"><?php echo t($menu['title']); ?></a></li>
			<?php $index++; ?>
		<?php endforeach; ?>
		</ul>
		<div class="menu">
			<div class="bar"></div>
			<div class="bar"></div>
			<div class="bar"></div>
		</div>
	</div>
</header>
