<?php if(count($mainSpotlights)): ?>
	<div class="spotlight-wrapper">
		<div class="spot-image cycle-slideshow" data-cycle-pager = ".pager-control" data-cycle-slides="> div"
			data-cycle-speed=1500 data-cycle-swipe=true>
			<?php foreach($mainSpotlights as $key => $value): ?>
				<?php
					$link = $value->field_link['und'][0]['value'];
					$uri = $value->field_image['und'][0]['uri'];
					$url = file_create_url($uri);
				?>
				<div class="">
					<div class="spot-mask">
					<img src="<?php echo $imageRootPath; ?>/image/spot-mask.png" alt="" />
					</div>
				<?php print theme('image_style',array('style_name' => 'home_spotlight', 'path' => $uri)); ?>
				<div class="spot-cnt-wrap">
					<h1><?php echo $value->field_spotlight_text['und'][0]['value']; ?></h1>
					<div class="rdm-btn">
						<?php echo l(t('discover more'), $link); ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="pager-control"></div>
	</div>
<?php endif; ?>
